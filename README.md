# DMS Assignment NoSQL Injection
SEG2102 - Database Management System

Group 12 Members:
BENJAMIN KAN JIA CHUEN 22085880
ADEN CHAN WENG CHUNG 22062434
SUAH LI JEA RICHIE 22055735

Requirements and Tools used:
Visual Studio Code           => Text editor
XAMPP v3.3.0
 - Apache module             => To run PHP code
PHP 8.2.12                   => Main language of test environment
Composer 1.54.16574          => PHP dependency manager
MongoDB 1.20                 => Test database management system
Burp Suite Community Edition => Used for proxy intercepting

Setup:
1. Install XAMPP and the Apache module
2. Install PHP into computer and as extension in Visual Studio Code
3. Install Composer either locally in computer or through Visual Studio Code extensions
4. Install MongoDB, extract the dll file and paste in C:\xampp\php\ext
5. Add extension=mongodb in php.ini located in C:\xampp\php
6. Install Burp Suite Community Edition
7. Run the database create through localhost\DMS-Assignment-NoSQL-Injection\DatabaseCreate.php (Alternatively, files can be navigated through localhost\\DMS-Assignment-NoSQL-Injection)
8. For performing injection,
   a. Open Burp Suite
   b. Navigate to proxy and open browser
   c. Open login.php
   d. Turn intercept on and type random username and password followed by submitting the form
   e. Replace the last line of the prompt with "name[$ne]=e&pwd[$ne]=e"
   f. Click forward
   g. Access is granted
9. To attempt on extra defense login page,
   a. Same as above
   b. Access is not granted
