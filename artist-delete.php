<?php
    if(isset($_POST['artist-id'])){
        @require_once('function-db.php');
        $dbLink = dbConnect();
        if($dbLink){
            $query = $dbLink -> prepare('DELETE FROM artist WHERE ArtistId = ?');
            $query -> execute([$_POST['artist-id']]);
        }
    }
    header('Location: artist-list.php');
?>