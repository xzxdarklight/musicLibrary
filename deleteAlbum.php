<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Deleting Album</title>
</head>
<body>
<?php
//Step 1 - connect to the database
$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200318170', 'gc200318170', 'UU0vTl-Syo');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Step 2 - create the SQL command
$sql = "DELETE FROM albums WHERE albumID = :albumID";
//step 3 - prepare and execute sql
$cmd = $conn->prepare($sql);
$cmd->bindParam('albumID', $_GET['albumID'], PDO::PARAM_INT);
$cmd->execute();
//step 4 - disconnect from the database
$cmd = null;
//step 5 - redirect to the albums.php page

header('location:albums.php');
?>
</body>
</html>