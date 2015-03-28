CREATE DATABASE todo_app;

GRANT ALL PRIVILEGES ON todo_app.* TO 'todo_db_user'@'localhost' IDENTIFIED BY 'noite';

FLUSH PRIVILEGES;

use todo_app;
