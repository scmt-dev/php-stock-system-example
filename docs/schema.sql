
CREATE TABLE terms (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    group_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    category VARCHAR(50),
    stock_quantity INT,
    reorder_point INT,
    unit_price DECIMAL(10, 2),
    barcode VARCHAR(50) UNIQUE,
    category_id INT REFERENCES terms(id),
    unit_id INT REFERENCES terms(id),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table for inventory
CREATE TABLE inventory (
    id INT PRIMARY KEY AUTO_INCREMENT,
    product_id INT,
    event_date DATE,
    event_type VARCHAR(20), -- Examples: 'purchase', 'sale', 'adjustment'
    quantity_change INT,
    unit_price DECIMAL(10, 2),
    note TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_product_inventory FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'user',
    disabled BOOLEAN NOT NULL DEFAULT FALSE,
    profile VARCHAR(255),
    last_login_at DATETIME,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table for user_changes_log
CREATE TABLE user_log (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    table_name VARCHAR(50),
    record_id INT,
    action_type VARCHAR(20), -- 'INSERT', 'UPDATE', 'DELETE'
    change_date DATETIME,
    description TEXT,
    ip VARCHAR(20),
    raw_data JSON,
    CONSTRAINT fk_user_log FOREIGN KEY (user_id) REFERENCES users(id)
);