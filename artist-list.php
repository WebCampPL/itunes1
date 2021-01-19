<?php
    $pageTitle = 'Lista artystów';
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
    <form action="" method="GET">
        <select name="sort">
            <option value="name-asc">Nazwa - rosnąco</option>
            <option value="name-desc">Nazwa - malejąco</option>
        </select>
        <input type="submit" value="Sortuj">
    </form>
    <table>
        <tr>
            <th>L.p.</th>
            <th>Nazwa</th>
            <th> </th>
            <th> </th>
        </tr>
    <?php
        @require_once('function-db.php');
        $dbLink = dbConnect();
        $queryStr = 'SELECT * FROM artist';
        if(isset($_GET['sort'])){
            if($_GET['sort']=='name-asc')
                $queryStr = 'SELECT * FROM artist ORDER BY Name ASC';
            else
                $queryStr = 'SELECT * FROM artist ORDER BY Name DESC';
        }
        if($dbLink){
            $query = $dbLink -> prepare($queryStr);
            $query -> execute();
            $num = 1;
            foreach($query as $row){
                echo '<tr>
                    <td>', $num++, '</td>
                    <td>', $row['Name'], '</td>
                    <td>
                        <form method="POST" action="artist-edit-form.php">
                            <input type="hidden" name="artist-id" value="', $row['ArtistId'], '">
                            <input type="hidden" name="artist-name" value="', $row['Name'], '">
                            <input type="submit" value="Edytuj">
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="artist-delete.php">
                            <input type="hidden" name="artist-id" value="', $row['ArtistId'], '">
                            <input type="submit" value="Usuń">
                        </form>
                    </td>
                </tr>';
            }
        }
    ?>
    </table>
    <script>
        function acceptForm(){
            return confirm('Potwierdź wybór.');
        }
        let formsArray = document.getElementsByTagName('form');
        for(let i=0; i < formsArray.length; i++){
            formsArray[i].onsubmit = acceptForm;
        }
    </script>
</body>
</html>