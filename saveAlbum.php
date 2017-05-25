<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving Album</title>
</head>
<body>
<?php
    $title = $_POST['title'];
    $year = $_POST['year'];
    $artist = $_POST['artist'];
    $genre = $_POST['genre'];

    //echo 'title:'.$title.'<br />';
    //echo 'year:'.$year.'<br />';
    //echo 'artist:'.$artist.'<br />';
    //Don't need these echo statements, they were used to show them when working on this page in browser.

    //step 1 - Connect to the database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200318170', 'gc200318170', 'UU0vTl-Syo');

    //step 2 - Create SQL command to INSERT a record
    $sql = "INSERT INTO albums (title, year, artist, genre)
                VALUES (:title, :year, :artist, :genre)";
    //step 3 - Prepare the SQL command and bind the arguments to prevent SQL injection
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
    $cmd->bindParam(':year', $year, PDO::PARAM_INT, 4);
    $cmd->bindParam(':artist', $artist, PDO::PARAM_STR, 50);
    $cmd->bindParam(':genre', $genre, PDO::PARAM_STR, 20);
    //step 4 - execute
    $cmd->execute();
    //step 5 - disconnect from the database
    $cmd = null;
    //step 6 - redirect to the albums page
    header('location:albums.php');
?>
</body>

</html>