# Create user
CREATE USER IF NOT EXISTS 'dev'@'localhost' IDENTIFIED BY 'your_password';

# Grant priveleges
GRANT ALL PRIVILEGES ON *.* TO 'dev'@'localhost';
FLUSH PRIVILEGES;

# Delete user
DROP USER IF EXISTS 'dev'@'localhost';

