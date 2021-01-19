<?php
    $pageTitle = 'Formularz dodawania utworu';
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
    <form action="track-add.php" method="post">
        <div><input type="text" name="t-name" placeholder="Nazwa utworu" requred></div>
        <div>Album:<br><select name="album-id">
            <option value=""></option>
            <?php
                @require_once('function-db.php');
                $dbLink = dbConnect();
                if($dbLink){
                    $query = $dbLink -> prepare('SELECT AlbumId, Title FROM album ORDER BY Title ASC');
                    $query -> execute();
                    foreach($query as $row){
                        echo '<option value="', $row['AlbumId'], '">', $row['Title'], '</option>';
                    }
                }
            ?>
        </select></div>
        <div>Typ pliku:<br><select name="media-id">
            <?php
                if($dbLink){
                    $query = $dbLink -> prepare('SELECT MediaTypeId, Name FROM mediatype');
                    $query -> execute();
                    foreach($query as $row){
                        echo '<option value="', $row['MediaTypeId'], '">', $row['Name'], '</option>';
                    }
                }
            ?>
        </select></div>
        <div>Gatunek:<br><select name="genre-id">
            <option value=""></option>
            <?php
                if($dbLink){
                    $query = $dbLink -> prepare('SELECT GenreId, Name FROM genre');
                    $query -> execute();
                    foreach($query as $row){
                        echo '<option value="', $row['GenreId'], '">', $row['Name'], '</option>';
                    }
                }
            ?>
        </select></div>
        <div><input type="text" name="t-composer" placeholder="Kompozytor"></div>
        <div><input type="number" name="t-time" placeholder="Czas w milisekundach" required></div>
        <div><input type="number" name="t-bytes" placeholder="Wielkość w bajtach"></div>
        <div><input type="number" step="0.01" name="t-price" placeholder="Cena" required></div>
        <input type="submit" value="Dodaj utwór">
    </form>
</body>
</html>