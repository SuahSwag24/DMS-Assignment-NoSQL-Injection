<?php

    require 'vendor/autoload.php'; // Composer's autoloader

    use MongoDB\Client;

    if (isset($_POST['name']) && isset($_POST['pwd'])) 
    {
        $username = $_POST['name'];
        $password = $_POST['pwd'];

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

            $documentArray = $collection->find($query);
            $documents = iterator_to_array($documentArray);

            if($documents) 
            {
                header("Location: user.php?name=" . $documents[0]['username']);
                exit();
            }

            echo "Login failed!";
        } 
        catch (Exception $e) 
        {
            echo $e->getMessage();
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>DMS Assignment Test Case</title>
    </head>
    <form method="POST" action="login.php">
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