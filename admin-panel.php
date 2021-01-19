<?php
    session_start();
    if(isset($_SESSION['user-authentication-id'])){
        $pageTitle = 'Panel administracyjny';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
    <?php
        @include_once('template-nav.php');
    ?>
    <h1><?php echo $pageTitle; ?></h1>
    <p>Jesteś w ukrytym penelu administracyjnym.</p>
    <a href="logout.php">Wyloguj</a>
</body>
</html>
<?php
    }
    else{
        header('Location: login.php');
    }
?>