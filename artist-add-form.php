<?php
    $pageTitle = 'Formularz dodawania artysty';
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
    <form action="artist-add.php" method="POST">
        <div>
            <input type="text" name="artist-name" placeholder="Nazwa artysty" required>
        </div>
        <div>
            <input type="submit" value="Dodaj">
        </div>
    </form>
</body>
</html>