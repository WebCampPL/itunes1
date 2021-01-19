<?php
    $pageTitle = 'Lista albumów';
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
    <?php
        @require_once('function-db.php');
        $dbLink = dbConnect();
        if($dbLink){
            $query = $dbLink -> prepare('SELECT album.AlbumId, album.Title, artist.Name 
            FROM album LEFT JOIN artist ON album.ArtistId = artist.ArtistId ORDER BY album.Title ASC');
            $query -> execute();
            $num = 1;
            foreach($query as $row){
                echo '<h3>', $num++, '. ', $row['Title'], '<em>(', $row['Name'], ')</em></h3>';
                $queryTrack = $dbLink -> prepare('SELECT Name FROM track WHERE AlbumId = ? ORDER BY Name ASC');
                $queryTrack -> execute([$row['AlbumId']]);
                echo '<ul>';
                foreach($queryTrack as $rowTrack){
                    echo '<li>', $rowTrack['Name'], '</li>';
                }
                echo '</ul>';
            }
        }
    ?>
</body>
</html>