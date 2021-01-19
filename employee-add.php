<?php
    if(isset($_POST['l-name']) && isset($_POST['f-name']) && isset($_POST['b-date']) && isset($_POST['h-date'])){
        $title = (isset($_POST['title']))?$_POST['title']:NULL;
        $adress = (isset($_POST['adress']))?$_POST['adress']:NULL;
        $city = (isset($_POST['city']))?$_POST['city']:NULL;
        $postCode = (isset($_POST['postCode']))?$_POST['postCode']:NULL;
        $phone = (isset($_POST['phone']))?$_POST['phone']:NULL;
        $email = (isset($_POST['email']))?$_POST['email']:NULL;
        @require_once('function-db.php');
        $dbLink = dbConnect();
        if($dbLink){
            $query = $dbLink -> prepare('INSERT INTO employee VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
            $query -> execute([NULL, $_POST['l-name'], $_POST['f-name'], $title, NULL, $_POST['b-date'], $_POST['h-date'], $adress, $city, NULL, NULL, $postCode, $phone, NULL, $email]);
        }
    }
    header('Location: employee-list.php');
?>