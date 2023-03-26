<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $comment = $_POST['comment'];
    $name = $_POST['name'];
    $postid = $_POST['postid'];
    if (
        empty($category) && empty($name)
    ) {
        echo "select at least one filter";
    } else {


        // echo ($category . " " . $publish);

        /* create a prepared statement */
        $servername = "localhost";
        $dbname = 'lasgidi';
        $username = "root";
        $password = "@Edmund123";

        $mysqli = new mysqli($servername, $username, $password, $dbname);
        /* create a prepared statement */
        $stmt = $mysqli->prepare("INSERT INTO comments (`comment`,`name`,`post_title`,`postid`) VALUES (?,?,?,?)");

        /* bind parameters for markers */
        $stmt->bind_param("ssss", $comment, $name, $title, $postid);

        /* execute query */


        if ($stmt->execute()) {
            $stmt->close();
            echo "Comment created successful";
        } else {
            echo
            $stmt->error;
        }
    }
}
