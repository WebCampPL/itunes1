<?php
    if(isset($_POST['artist-name']) && isset($_POST['artist-id'])){
        @require_once('function-db.php');
        $dbLink = dbConnect();
        if($dbLink){
            $query = $dbLink -> prepare('UPDATE artist SET Name = ? WHERE ArtistId = ?');
            $query -> execute([$_POST['artist-name'], $_POST['artist-id']]);
        }
    }
    header('Location: artist-list.php');
?>