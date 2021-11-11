<?php


class scheldewoord
{
    private $conn;
    private $table_name = "scheldwoord";


    // object properties
    public $id;
    public $woord;
    public $Goedgekeurd;
    public $Gradatie_scheldwoord;


    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Getters and setters

    public function set_id($id)
    {
        $this->id = $id;
        //filter de tekst

    }
    public function get_id()
    {
        return $this->id;
    }
    public function set_woord($woord)
    {
        $this->woord = $woord;
    }
    public function get_woord()
    {
        return $this->woord;
    }

    public function set_Goedgekeurd($Goedgekeurd)
    {
        $this->Goedgekeurd = $Goedgekeurd;
    }
    public function get_Goedgekeurd()
    {
        return $this->Goedgekeurd;
    }

    public function set_Gradatie_scheldwoord($Gradatie_scheldwoord)
    {
        $this->Gradatie_scheldwoord = $Gradatie_scheldwoord;
    }
    public function get_Gradatie_scheldwoord()
    {
        return $this->Gradatie_scheldwoord;
    }


    function read($id)
    {
        if ($id == '') {
            $where = '';
        } else {
            $where = " WHERE id = $id";
        }
        // select all query
        $query = "SELECT * FROM " . $this->table_name . $where;
        $result = $this->conn->query($query);
        return $result;
    }

    public function create($scheldwoord)
    {
        // // insert query
        // $woord = $woord->get_woord();
        // $Goedgekeurd = $Goedgekeurd->get_Goedgekeurd();
        // $Gradatie_scheldwoor = $Gradatie_scheldwoord->get_Gradatie_scheldwoord();

        $query = "INSERT INTO scheldwoord (woord, Goedgekeurd, Gradatie_scheldwoord ) VALUES ('$this->woord','$this->Goedgekeurd', '$this->Gradatie_scheldwoord')";
        $result = $this->conn->query($query);
        if ($result === TRUE) {
            return "New record created successfully";
        } else {
            return "Error: <br>" . $this->conn->error;
        }
    }

    function update($scheldewoord)
    {

        // Useing getter 
        $id = $scheldewoord->get_id();
        $woord = $scheldewoord->get_woord();
        $Goedgekeurd = $scheldewoord->get_Goedgekeurd();
        $Gradatie_scheldwoord = $scheldewoord->get_Gradatie_scheldwoord();



        $query = "UPDATE scheldwoord SET woord='$woord', Goedgekeurd='$Goedgekeurd', Gradatie_scheldwoord='$Gradatie_scheldwoord' WHERE id = '$id'";
        $result = $this->conn->query($query);
        if ($result === TRUE) {
            return "Record with id '$id' updated successfully";
        } else {
            return "Error: <br>" . $this->conn->error;
        }
    }


    function delete($scheldewoord)
    {

        // Useing getter 
        $id = $scheldewoord->get_id();
        $woord = $scheldewoord->get_woord();
        $Goedgekeurd = $scheldewoord->get_Goedgekeurd();
        $Gradatie_scheldwoord = $scheldewoord->get_Gradatie_scheldwoord();


        $query = "DELETE FROM `scheldwoord` WHERE id = '$id' ";

        $result = $this->conn->query($query);
        if ($result === TRUE) {
            return "Record with id '$id' DELETE successfully";
        } else {
            return "Error: <br>" . $this->conn->error;
        }
    }

    function filter($value)

    {
        if (isset($_POST['Gradatie_scheldwoord'])) {
            if ($_POST["Gradatie_scheldwoord"] == "one") {





                $string_to_array = explode(" ", $value);

                foreach ($string_to_array as $word) {

                    $query = "SELECT * FROM `scheldwoord` WHERE `woord` like '%$word%'";
                    // echo $query;
                    // echo "<br>";\

                    // $result = mysqli_query($query);
                    // $result = mysqli_query($con, $query);

                    $result = $this->conn->query($query);

                    while ($row = $result->fetch_assoc()) {

                        // $str = 'this is a fucking word';
                        // $pattern = '/fucking/i';
                        // echo preg_replace($pattern, '*', $str);

                        // $str = 'this is a fucking word';
                        // $pattern = '/fucking/i';
                        // echo preg_replace($pattern, '*', $str);


                        $word_found = $row['woord'];
                        $new_word = preg_replace('/(?!^.?).(?!.{0}$)/', '*', $word);
                        $key = array_search($word_found, $string_to_array);
                        $length = strlen($word_found) - 1;
                        $replace = array($key => $new_word);
                        $string_to_array = array_replace($string_to_array, $replace);
                        // print_r($replace);
                    }
                }
                $new_string = implode(" ", $string_to_array);
                return $new_string;
            }
            // voor2
            if ($_POST["Gradatie_scheldwoord"] == "two") {
                $string_to_array = explode(" ", $value);

                foreach ($string_to_array as $word) {

                    $query = "SELECT * FROM `scheldwoord` WHERE `woord` like '$word'";
                    // echo $query;
                    // echo "<br>";\

                    // $result = mysqli_query($query);
                    // $result = mysqli_query($con, $query);

                    $result = $this->conn->query($query);

                    while ($row = $result->fetch_assoc()) {

                        // $str = 'this is a fucking word';
                        // $pattern = '/fucking/i';
                        // echo preg_replace($pattern, '*', $str);

                        // $str = 'this is a fucking word';
                        // $pattern = '/fucking/i';
                        // echo preg_replace($pattern, '*', $str);


                        $word_found = $row['woord'];
                        $new_word = preg_replace('/(?!^.?).(?!.{0}$)/', '*', $word);
                        $key = array_search($word_found, $string_to_array);
                        $length = strlen($word_found) - 1;
                        $replace = array($key => $new_word);
                        $string_to_array = array_replace($string_to_array, $replace);
                        // print_r($replace);
                    }
                }
                $new_string = implode(" ", $string_to_array);
                return $new_string;
            }
            // voor3
            if ($_POST["Gradatie_scheldwoord"] == "Three") {
                $string_to_array = explode(" ", $value);

                foreach ($string_to_array as $word) {

                    $query = "SELECT * FROM `scheldwoord` WHERE `woord` like '$word'";


                    $result = $this->conn->query($query);

                    while ($row = $result->fetch_assoc()) {
                    }
                }
                $new_string = implode(" ", $string_to_array);
                return $new_string;
            }
        }
    }
}
