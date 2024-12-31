<?php

    require 'vendor/autoload.php';
    use MongoDB\Client;

    try
    {
        $client = new Client("mongodb://localhost:27017");
        $database = $client->selectDatabase("UserDB");
        $collection = $database->selectCollection("Collection");
        $result = $collection->insertOne
        ([
            'username' => 'Ben',
            'password' => 'bendoesdms'
        ]);

        echo "Inserted document with ID: " . $result->getInsertedId() . "\n";

        // Find all documents
        $documents = $collection->find();

        foreach ($documents as $document) 
        {
            echo json_encode($document) . "\n";
        }
    }
    catch (Exception $e)
    {
        echo "Error: " . $e->getMessage();
    }

?>