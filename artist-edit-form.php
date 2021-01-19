<?php
    if(isset($_POST['artist-id']) && isset($_POST['artist-name'])){
        $pageTitle = 'Edycja artysty';
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
    <form action="artist-edit.php" method="POST">
        <div>
            <label>Nazwa artysty:</label><br>
            <input type="text" name="artist-name" value="<?php echo $_POST['artist-name']; ?>" required>
            <input type="hidden" name="artist-id" value="<?php echo $_POST['artist-id']; ?>" required>
        </div>
        <div>
            <input type="submit" value="Zatwierdź zmianę">
        </div>
    </form>
</body>
</html>
<?php
    }
    else{
        header('Location: artist-list.php');
    }
?>