<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Hello PHP
    <?php echo 21/2; ?>
    </title>
</head>
<body>
    Hello World! 1+1
    <?php 
        echo 1+1;
        $name = 'Souphaphone';
        echo '<br>Hello '.$name;
        $age = 21;
        echo '<br>I am '.$age.' years old';
        $pi = 3.14;
        echo '<br>PI = '.$pi;
        $isAdmin = true;
        echo '<br>I am admin? '.$isAdmin;
        $colors = ['red','green','blue', 1];
        echo '<br>'.$colors[0];
        echo '<br>'.$colors[1];
        echo '<br>'.$colors[2];

    ?>
</body>
</html>