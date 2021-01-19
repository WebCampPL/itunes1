<?php
    if(isset($_POST['t-name']) && isset($_POST['album-id']) && isset($_POST['media-id']) && isset($_POST['genre-id']) && isset($_POST['t-time']) && isset($_POST['t-price'])){
        $tComposer = (isset($_POST['t-composer']))?$_POST['t-composer']:NULL;
        $tBytes = (isset($_POST['t-bytes']))?$_POST['t-bytes']:NULL;
        @require_once('function-db.php');
        $dbLink = dbConnect();
        if($dbLink){
            $query = $dbLink -> prepare('INSERT INTO track VALUES(?,?,?,?,?,?,?,?,?)');
            $query -> execute([NULL, $_POST['t-name'], $_POST['album-id'], $_POST['media-id'], $_POST['genre-id'], $tComposer, $_POST['t-time'], $tBytes, $_POST['t-price']]);
        }
    }
    header('Location: index.php');
?>