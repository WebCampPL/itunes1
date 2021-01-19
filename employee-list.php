<?php
    $pageTitle = 'Lista pracowników';
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
            <th>Nazwisko</th>
            <th>Imię</th>
            <th>Stanowisko</th>
            <th>Telefon</th>
            <th>Email</th>
        </tr>
    <?php
        @require_once('function-db.php');
        $dbLink = dbConnect();
        if($dbLink){
            $query = $dbLink -> prepare('SELECT LastName, FirstName, Title, Phone, Email FROM employee ORDER BY LastName ASC');
            $query -> execute();
            $num = 1;
            foreach($query as $row){
                echo '<tr>
                    <td>', $num++, '</td>
                    <td>', $row['LastName'], '</td>
                    <td>', $row['FirstName'], '</td>
                    <td>', $row['Title'], '</td>
                    <td>', $row['Phone'], '</td>
                    <td>', $row['Email'], '</td>
                </tr>';
            }
        }
    ?>
    </table>
</body>
</html>