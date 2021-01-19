<?php
    $pageTitle = 'Formularz logowania';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
</head>
<body>
    <a href="index.php">Strona główna</a>
    <h1><?php echo $pageTitle; ?></h1>
    <form action="" method="post">
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="password" placeholder="Hasło" required>
        <input type="submit" value="Zaloguj">
    </form>
    <?php
        if(isset($_POST['login']) && isset($_POST['password'])){
            @require_once('function-db.php');
            $dbLink = dbConnect();
            if($dbLink){
                $query = $dbLink -> prepare('SELECT * FROM user WHERE login = ?');
                $query -> execute([$_POST['login']]);
                if($row = $query -> fetch(PDO::FETCH_ASSOC)){
                    $hash = md5($_POST['password']);
                    if($row['password'] == $hash){
                        session_start();
                        $_SESSION['user-authentication-id'] = 1;
                        header('Location: admin-panel.php');
                    }
                }
            }
            echo '<p>Błąd logowania. Spróbuj ponownie.</p>';
        }
    ?>
</body>
</html>