<?php


    require 'vendor/autoload.php';

    use MongoDB\Client;

    if (isset($_POST['name']) && isset($_POST['pwd'])) 
    {
        /**
         * Sanitzation function to prevent NoSQL injections
         * Turns the given username and password input into raw string that will not be picked up by MongoDB
         */
        $username = htmlspecialchars(strip_tags(trim((string) $_POST['name'])));
        $password = htmlspecialchars(strip_tags(trim((string) $_POST['pwd'])));

        try
        {

            $client = new Client("mongodb://localhost:27017");
            $database = $client->selectDatabase("UserDB");
            $collection = $database->selectCollection("Collection");
            
            $query =
            [
                'username' => $username,
                'password' => $password 
            ];

            $documents = $collection->findOne($query);

            //The following algorithm only returns a match IF it is one-to-one matching
            if(isset($documents) && $documents['username'] == $username && $documents['password'] == $password)
            {
                header("Location: user.php?name=" . $documents['username']);
                exit();
            }

            echo "Login failed!";
        } 
        catch (Exception $e) 
        {
            error_log("Error: ". $e->getMessage());
        }
    }
    
?>


<!DOCTYPE html>
<html>
    <head>
        <title>DMS Assignment Test Case</title>
    </head>
    <form method="POST" action="loginSanitized.php">
        <div>
            <label for="username">Username:</label> <br>
            <input type="text" name="name">
            <br>
            <label for="password">Password:</label> <br>
            <input type="password" name="pwd">
            <br> <br>
            <input type="submit">
        </div>
    </form>
</html>