<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwarka utworów</title>
</head>
<body>
    <?php
        @include_once('template-nav.php');
    ?>
    <h1>Wyszukiwarka utworów</h1>
    <form action="" method="POST">
        <input type="text" name="s" placeholder="Czego szukasz?" required>
        <input type="submit" value="Szukaj">
    </form>
    <?php
    if(isset($_POST['s'])){
    ?>
    <h2>Wynik wyszukiwania:</h2>
    <table>
        <tr>
            <th>L.p.</th><th>Nazwa</th><th>Album</th><th>Artysta</th><th>Kompozytor</th><th>Cena</th>
        </tr>
    <?php
        @require_once('function-db.php');
        $dbLink = dbConnect();
        if($dbLink){
            $sKey = '%'.$_POST['s'].'%';
            $query = $dbLink -> prepare('SELECT track.Name as tName, track.Composer, track.UnitPrice, album.Title, artist.Name as aName  FROM track 
            LEFT JOIN album ON track.AlbumId = album.AlbumId 
            LEFT JOIN artist ON album.ArtistId = artist.ArtistId 
            WHERE track.Name LIKE ? OR track.Composer LIKE ? OR album.Title LIKE ? OR artist.Name LIKE ? 
            ORDER BY track.Name ASC');
            $query -> execute([$sKey, $sKey, $sKey, $sKey]);
            $num = 1;
            foreach($query as $row){
                $trackName = (strlen($row['tName'])>50)?substr($row['tName'],0,50).'...':$row['tName'];
                $composerName = (strlen($row['Composer'])>50)?substr($row['Composer'],0,50).'...':$row['Composer'];
                echo '<tr>
                    <td>', $num++, '</td>
                    <td>', $trackName, '</td>
                    <td>', $row['Title'], '</td>
                    <td>', $row['aName'], '</td>
                    <td>', $composerName, '</td>
                    <td>', $row['UnitPrice'], '$</td>
                </tr>';
            }
        }
    ?>
    </table>
    <?php
    }
    ?>
</body>
</html>