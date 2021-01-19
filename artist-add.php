<?php
    if(isset($_POST['artist-name'])){
        @require_once('function-db.php');
        $dbLink = dbConnect();
        if($dbLink){
            $query = $dbLink -> prepare('INSERT INTO artist VALUES(?,?)');
            $query -> execute([NULL, $_POST['artist-name']]);
        }
    }
    header('Location: artist-list.php');
?>