<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Albums</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>
<body>
    <h1>Albums</h1>
    <a href="albumDetails.php">Add a new Album</a>

    <?php
    //step 1 - connect to the database
    $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200318170', 'gc200318170', 'UU0vTl-Syo');

    //step 2 - create a SQL command
    $sql = "SELECT * FROM albums";
    //step 3 - prepare the command
    $cmd = $conn->prepare($sql);
    //step 4 - execute and store the results
    $cmd->execute();
    $albums = $cmd->fetchAll();
    //step 5 - disconnect from the DB
    $conn = null;

    //create a table and display the results
    //table header
    echo '<table class="table table-striped table-hover">
        <tr><th>Title</th>
            <th>Year</th>
            <th>Aritist</th>
            <th>Genre</th>
            <th>Delete</th></tr>';

    //table data
    foreach($albums as $album)
    {
        echo '<tr><td>'.$album['title'].'</td>
                  <td>'.$album['year'].'</td>
                  <td>'.$album['artist'].'</td>
                  <td>'.$album['genre'].'</td>
                  <td><a href="deleteAlbum.php?albumID='.$album['albumID'].'"class="btn btn-danger">Delete</a></td></tr>';
    }

    echo '</table>'
    ?>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</html>