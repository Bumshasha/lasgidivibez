<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $rate = (intval($_POST['rate']) + intval($_POST['oldvalue'])) / 2;
    echo $rate;
    $postid = $_POST['postid'];
    if (
        empty($rate) && empty($postid)
    ) {
        echo "select at least one filter";
    } else {


        // echo ($id . " " . $name . " " . $publish);
        $servername = "localhost";
        $dbname = 'lasgidi';
        $username = "root";
        $password = "";

        $mysqli = new mysqli($servername, $username, $password, $dbname);
        /* create a prepared statement */
        $stmt = "update  posts set rate=$rate where id=$postid";
        $result = $mysqli->query($stmt);


        $mysqli->close();
        // print_r($data) . 'hello';
        $jdata = json_encode($data);
        echo $jdata;
        header("Location: viewStory.php?id=" . $postid);
    }
}
