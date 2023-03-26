 <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Set image placement folder


        $id = $_GET['pid'];
        if (
            empty($id)
        ) {
            echo "No Blank Fields";
        } else {


            // echo ($id . " " . $name . " " . $publish);
            $servername = "localhost";
            $dbname = 'lasgidi';
            $username = "root";
            $password = "";

            $mysqli = new mysqli($servername, $username, $password, $dbname);
            /* create a prepared statement */
            $stmt = $mysqli->prepare("delete from user where id =?");

            /* bind parameters for markers */
            $stmt->bind_param("s", $id);

            /* execute query */


            if ($stmt->execute()) {
                echo "Post deleted successful";
                header('Location: auditPosts.php');
            } else {
                echo
                $stmt->error;
            }
        }
    }
    ?>