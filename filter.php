<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $category = $_POST['category'];
    $publish = $_POST['publish'];
    if (
        empty($category) && empty($publish)
    ) {
        echo "select at least one filter";
    } else {


        // echo ($id . " " . $name . " " . $publish);
        $servername = "localhost";
        $dbname = 'lasgidi';
        $username = "root";
        $password = "@Edmund123";

        $mysqli = new mysqli($servername, $username, $password, $dbname);
        /* create a prepared statement */
        $stmt = "select id,story,title,publish,image,liked,viewed,created from posts where date(published) <= $publish and category=$category";
        $result = $mysqli->query($stmt);

        // Fetch all
        $data = $result->fetch_all(MYSQLI_ASSOC);

        // Free result set
        $result->free_result();

        $mysqli->close();
        // print_r($data) . 'hello';
        $jdata = json_encode($data);
        echo $jdata;
    }
}
