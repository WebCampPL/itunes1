<?php
    $sortTab = ['name-asc', 'composer-asc', 'price-asc'];
    if(isset($_GET['sort'])){
        if($_GET['sort'] == 'name-asc')
            $sortTab[0] = 'name-desc';
        elseif($_GET['sort'] == 'composer-asc')
            $sortTab[1] = 'composer-desc';
        elseif($_GET['sort'] == 'price-asc')
            $sortTab[2] = 'price-desc';
    }
    $pageTitle = 'Lista utworów';
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
    <table>
        <tr>
            <th>L.p.</th>
            <th><a href="?sort=<?php echo $sortTab[0]; ?>">Nazwa</a></th>
            <th><a href="?sort=<?php echo $sortTab[1]; ?>">Kompozytor</a></th>
            <th><a href="?sort=<?php echo $sortTab[2]; ?>">Cena</a></th>
        </tr>
    <?php
        @require_once('function-db.php');
        $dbLink = dbConnect();
        if($dbLink){
            $queryStr = 'SELECT * FROM track';
            if(isset($_GET['sort'])){
                if($_GET['sort'] == 'name-asc')
                    $queryStr .= ' ORDER BY Name ASC';
                elseif($_GET['sort'] == 'name-desc')
                    $queryStr .= ' ORDER BY Name DESC';
                elseif($_GET['sort'] == 'composer-asc')
                    $queryStr .= ' ORDER BY Composer ASC';
                elseif($_GET['sort'] == 'composer-desc')
                    $queryStr .= ' ORDER BY Composer DESC';
                elseif($_GET['sort'] == 'price-asc')
                    $queryStr .= ' ORDER BY UnitPrice ASC';
                elseif($_GET['sort'] == 'price-desc')
                    $queryStr .= ' ORDER BY UnitPrice DESC';
            }
            $query = $dbLink -> prepare($queryStr);
            $query -> execute();
            $num = 1;
            foreach($query as $row){
                $trackName = (strlen($row['Name'])>50)?substr($row['Name'],0,50).'...':$row['Name'];
                $composerName = (strlen($row['Composer'])>50)?substr($row['Composer'],0,50).'...':$row['Composer'];
                echo '<tr>
                    <td>', $num++, '</td>
                    <td>', $trackName, '</td>
                    <td>', $composerName, '</td>
                    <td>', $row['UnitPrice'], "$</td>
                </tr>";
            }
        }
    ?>
    </table>
</body>
</html>