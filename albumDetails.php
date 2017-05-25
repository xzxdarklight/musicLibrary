<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Album Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

</head>
<body>
    <main class="container">
        <h1>Album Details</h1>

        <?php
            if (!empty($_GET['albumID']))
                $albumID = $_GET['albumID'];
            else
                $albumID = null;

            $title = null;
            $year = null;
            $artist = null;
            $genrePicked = null;

            //if the albumID exists, it is an edit situation and we need to load the album from the DB
            if(!empty($albumID))
            {
                $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200318170', 'gc200318170', 'UU0vTl-Syo');
                $sql = "SELECT * FROM albums WHERE albumID = :albumID";
                $cmd = $conn->prepare($sql);
                $cmd->bindParam(':albumID', $albumID, PDO:: PARAM_INT);
                $cmd->execute();
                $album = $cmd->fetch();
                $conn = null;

                $title = $album['title'];
                $year = $album['year'];
                $artist = $album['artist'];
                $genrePicked = $album['genre'];
            }
        ?>

        <form method="post" action="saveAlbum.php">
             <fieldset class="form-group">
                 <label for="title" class="col-sm-1">Title: *</label>
                 <input name="title" id="title" required placeholder="Album title" value="<?php echo $title?>" />
             </fieldset>

            <fieldset class="form-group">
                <label for="year" class="col-sm-1">Year: </label>
                <input name="year" id="year" type="number" min="1900" placeholder="Release Year" value="<?php echo $year?>"/>
            </fieldset>

            <fieldset class="form-group">
                <label for="artist" class="col-sm-1">Artist: *</label>
                <input name="artist" id="artist" required placeholder="Artist Name" value="<?php echo $artist?>"/>
            </fieldset>

           <fieldset>
               <label for="genre" class="col-sm-1">Genre: *</label>
               <select name="genre" id="genre">
                   <?php
                   //Step 1 Connect to the database
                   $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200318170', 'gc200318170', 'UU0vTl-Syo');

                   //Step 2 create the SQL statement
                   $sql = "SELECT * FROM genres";
                   //Step 3 Prepare & execute the SQL statement
                   $cmd = $conn->prepare($sql);
                   $cmd->execute();
                   $genres = $cmd->fetchAll();

                   //Step 4 loop over the results to build the list with <option> </option>

                   //echo '<option selected></option>'; //this would create a blank space for user, auto selected
                   //added if statment and echo below to bring over the ordinal genre when editing the album
                   foreach ($genres as $genre)
                   {
                       if($genrePicked == $genre['genre'])
                           echo '<option selected>'.$genre['genre'].'</option>';
                       else
                           echo '<option>'.$genre['genre'].'</option>';
                   }

                   //Step 5 disconnect from the DB
                   $cmd = null;
                   ?>

               </select>
           </fieldset>


            <button class="btn btn-success col-sm-offset-1">Save</button>
        </form>
    </main>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</html>