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

        <form method="post" action="saveAlbum.php">
             <fieldset class="form-group">
                 <label for="title" class="col-sm-1">Title: *</label>
                 <input name="title" id="title" required placeholder="Album title" />
             </fieldset>

            <fieldset class="form-group">
                <label for="year" class="col-sm-1">Year: </label>
                <input name="year" id="year" type="number" min="1900" placeholder="Release Year"/>
            </fieldset>

            <fieldset class="form-group">
                <label for="artist" class="col-sm-1">Artist: *</label>
                <input name="artist" id="artist" required placeholder="Artist Name"/>
            </fieldset>
            <button class="btn btn-success col-sm-offset-1">Save</button>
        </form>
    </main>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</html>