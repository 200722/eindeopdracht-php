<?php
include_once '../config/database.php';
include_once '../config/vars.php';

$database = new Database();
$db = $database->getConnection();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create</title>
</head>

<body>
    <h1>Create view</h1>
    <form action="<?php echo $url; ?>scheldwoord/create.php" method='POST'>
        <div class="form-group">
            <label class="control-label col-sm-2" for="category_id">woord:</label>
            <div class="col-sm-6">
                <input type="text" name="woord" class="form-control" id="woord" placeholder="woord" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="naam">Goedgekeurd:</label>
            <div class="col-sm-6">
                <input type="text" name="Goedgekeurd" class="form-control" id="Goedgekeurd" placeholder="Goedgekeurd" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="">Gradatie_scheldwoord:</label>
            <div class="col-sm-6">
                <input type="text" name="Gradatie_scheldwoord" class="form-control" id="Gradatie_scheldwoord" placeholder="" required>
            </div>
        </div>


        <button type="submit" name="update" class="btn btn-primary">Create</button>
    </form>
</body>

</html>