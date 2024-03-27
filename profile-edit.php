<?php 
session_start();
include_once 'config/db.php';
$user = $_SESSION['user'];
if (!($user)) {
    header('Location: login.php');
    exit;
}

if(isset($_POST['submit'])) {
    // update user profile with email and name
    $email = $_POST['email'];
    $name = $_POST['name'];
    $sql = "UPDATE users SET email = ?, name = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ssi', $email, $name, $user['id']);
    $stmt->execute();
    $stmt->close();

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 0;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Check file max size 3mb
    $maxSize = 1024 * 1024 * 3;
    if ($_FILES["fileToUpload"]["size"] > $maxSize) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        $sql = "UPDATE users SET profile = ? WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('si', $target_file, $user['id']);
        $stmt->execute();
        $stmt->close();
        } else {
        echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update profile</title>
</head>
<body>
    <h1>Update Profile</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <p>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>">
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>">
        </p>
        <p>
            <label for="image">Image</label>
            <input type="file" accept="image/*" name="fileToUpload" id="image">
            <img src="" alt="" id="preview" width="100" height="100">
        </p>
        <p>
            <input type="submit" name="submit" value="Update">
        </p>
    </form>
</body>
</html>

<script>
// preview image
document.querySelector('#image').addEventListener('change', function() {
    const reader = new FileReader();
    reader.addEventListener('load', () => {
        document.querySelector('#preview').setAttribute('src', reader.result);
    });
    reader.readAsDataURL(this.files[0]);
});

</script>