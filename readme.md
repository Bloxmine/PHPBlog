## Blog Application - README.md

This repository contains the code for a simple PHP blog application. Users can register, log in, create posts, edit posts, delete posts, and view posts in a larger format.

**Features:**

* User authentication (login, logout)
* Post creation
* Post editing
* Post deletion
* Post viewing with details
* Dashboard for managing posts

**Requirements:**

* PHP (any new version would do)
* MySQL database

**Setup:**

1. Clone this repository.
2. Create a database and configure the connection details in the `includes/db.php` file.
3. Create a table named `users` with the following columns:
    * id (INT PRIMARY KEY AUTO_INCREMENT)
    * username (VARCHAR(255) UNIQUE)
    * password (VARCHAR(255))
4. Create a table named `posts` with the following columns:
    * id (INT PRIMARY KEY AUTO_INCREMENT)
    * user_id (INT FOREIGN KEY REFERENCES users(id))
    * title (VARCHAR(255))
    * content (TEXT)
    * created_at (DATETIME DEFAULT CURRENT_TIMESTAMP)

**Running the application:**

1. Place the files in a web server document root.
2. Access the application through your web browser (e.g., http://localhost/index.php).

**Additional Notes:**

* This is a basic implementation and can be extended with features like user roles, comments, categories, etc.
* The code uses prepared statements to prevent SQL injection vulnerabilities.
* Remember to secure your database credentials in the `db.php` file.
* This uses a `secrets.php` file to store your passwords if required.

**License:**

This project is provided without an explicit license. You are free to use and modify the code at your own discretion.
