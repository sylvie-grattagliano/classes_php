
<?php
require_once("Users-pdo.php");
require_once("navbar.php"); 

$user = new Userspdo();
$users = $user->getAllUsers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>tableau Userspdo</title>
</head>
<body>
    

    <div id="section1">
    <table>
<thead>
    <tr>
        <th>id</th>
        <th>login</th>
        <th>email</th>
        <th>firstname</th>
        <th>lastname</th>
        

    </tr>

</thead>

<tbody>
</body>
</html>
<!--boucle -->


<?php foreach ($users as $row) { ?>
    <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["login"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
        <td><?php echo $row["firstname"]; ?></td>
        <td><?php echo $row["lastname"]; ?></td>
        


    </tr>
<?php } ?>


</tbody>
</div>
</table>

