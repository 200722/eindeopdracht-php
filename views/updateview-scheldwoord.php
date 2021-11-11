<?php
include_once '../config/database.php';
include_once '../config/vars.php';
include_once '../objects/scheldewoord.php';

$database = new Database();
$db = $database->getConnection();





// initialize object 
$scheldewoord = new scheldewoord($db);


$result = $scheldewoord->read('');

$general_result = $scheldewoord->read('');




if (isset($_GET['id'])) {
    $result = $scheldewoord->read($_GET['id']);
    $update_id = $_GET['id'];
}



// Get scheldewoord by ID

$num = $result->num_rows;

if ($num > 0) {
    // scheldewoords array
    $scheldewoords_arr = array();
    // scheldewoord data ophalen
    $id = 0;
    while ($row = $result->fetch_assoc()) {
        // extract row
        // this will make $row['name'] to
        // just $name only

        extract($row);
        $scheldewoord_item = array(
            "id" => $id,
            "woord" => $woord,
            "Goedgekeurd" => $Goedgekeurd,
            "Gradatie_scheldwoord" => $Gradatie_scheldwoord,

        );
        array_push($scheldewoords_arr, $scheldewoord_item);
    }
    // set response code - 200 OK
    http_response_code(200);
    //echo($scheldewoord_arr[0]['id']);
} else {
    // set response code - 404 Not found
    http_response_code(404);
    // tell the user no scheldewoords found
    echo json_encode(
        array("message" => "Geen scheldewoord gevonden")
    );
}

$update_id = $scheldewoords_arr[0]['id'];

// General query - Hidden 
$num = $general_result->num_rows;

if ($num > 0) {
    // scheldewoords array
    $general_scheldewoords_arr = array();
    // scheldewoord data ophalen
    $id = 0;
    while ($row = $general_result->fetch_assoc()) {
        // extract row
        // this will make $row['name'] to
        // just $name only

        extract($row);
        $scheldewoord_item = array(
            "id" => $id,
            "woord" => $woord,
            "Goedgekeurd" => $Goedgekeurd,
            "Gradatie_scheldwoord" => $Gradatie_scheldwoord,
        );
        array_push($general_scheldewoords_arr, $scheldewoord_item);
    }
    // set response code - 200 OK
    http_response_code(200);
    //echo($scheldewoord_arr[0]['id']);
} else {
    // set response code - 404 Not found
    http_response_code(404);
    // tell the user no scheldewoords found
    echo json_encode(
        array("message" => "Geen scheldewoord gevonden")
    );
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update view</title>
</head>

<body>
    <h1>Update view</h1>
    <!-- form -->
    <form action="<?php echo $url; ?>views/updateview-scheldwoord.php" method='GET'>
        <div class="form-group">
            <label class="control-label col-sm-2" for="naam">scheldewoord ophalen op ID:</label>
            <div class="col-sm-6">
                <select name="id">
                    <?php
                    foreach ($general_scheldewoords_arr as $row) {
                        echo '<option value="' . $row['id'] . '" ' . (($row['id'] == $update_id) ? 'selected' : '') . '>' . $row['id'] . '</option>';
                    }
                    ?>
                </select>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <!-- form -->
    <form action="<?php echo $url; ?>scheldwoord/update.php" method='POST'>
        <div class="form-group">
            <div class="col-sm-6">
                <input type="hidden" name="id" value="<?php echo $update_id; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="category_id">woord</label>
            <div class="col-sm-6">
                <input type="text" name="woord" class="form-control" id="category_id" placeholder="woord" required value='<?php echo $scheldewoords_arr[0]['woord']; ?>'>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="naam">Goedgekeurd</label>
            <div class="col-sm-6">
                <input type="text" name="Goedgekeurd" class="form-control" id="Goedgekeurd" placeholder="Goedgekeurd" required value='<?php echo $scheldewoords_arr[0]['Goedgekeurd'];; ?>'>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="Gradatie_scheldwoord">Gradatie_scheldwoord:</label>
            <div class="col-sm-6">
                <input type="text" name="Gradatie_scheldwoord" class="form-control" id="Gradatie_scheldwoord" placeholder="Gradatie_scheldwoord" required value='<?php echo $scheldewoords_arr[0]['Gradatie_scheldwoord']; ?>'>
            </div>
        </div>




        <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
</body>

</html>