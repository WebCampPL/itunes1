<?php
    $pageTitle = 'Formularz dodawania pracownika';
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
    <form action="employee-add.php" method="post">
        <div>
            <input type="text" name="l-name" placeholder="Nazwisko" required>
        </div>
        <div>
            <input type="text" name="f-name" placeholder="Imię" required>
        </div>
        <div>
            <input type="text" name="title" placeholder="Stanowisko">
        </div>
        <div>
            Data urodzenia: <input type="date" name="b-date" required>
        </div>
        <div>
            Data zatrudnienia: <input type="date" name="h-date" required>
        </div>
        <div>
            <input type="text" name="adress" placeholder="Adres">
        </div>
        <div>
            <input type="text" name="city" placeholder="Miejscowość">
        </div>
        <div>
            <input type="text" name="post-code" placeholder="Kod pocztowy">
        </div>
        <div>
            <input type="tel" name="phone" placeholder="Telefon">
        </div>
        <div>
            <input type="email" name="email" placeholder="E-mail">
        </div>
        <div>
            <input type="submit" value="Dodaj">
        </div>
    </form>
</body>
</html>