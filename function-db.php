<?php
    function dbConnect(){
        try{
            $dbLink = new PDO('mysql:dbname=chinook;host=localhost', 'root', '');
            return $dbLink;
        }
        catch (Exception $error)
        {
            return false;
        }
    }
?>