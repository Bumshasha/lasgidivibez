<?php include 'header.php' ?>
<div id="content">
    <main>
        <div class="container-fluid px--4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Comments</th>
                                <th>Post</th>
                                <th>Date</th>
                                <th>Audit</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Comments</th>
                                <th>Post</th>
                                <th>Date</th>
                                <th>Audit</th>
                        </tfoot>
                        <tbody>
                            <?php

                            $servername = "localhost";
                            $dbname = 'lasgidi';
                            $username = "root";
                            $password = "Bumshaha@gidi";

                            $mysqli = new mysqli($servername, $username, $password, $dbname);

                            // collect value of input field

                            $wid = $_SESSION['id'];
                            /* create a prepared statement */
                            $stmt = "select id,comment,post_title,created from comments ";
                            $result = $mysqli->query($stmt);

                            // Fetch all
                            $data = $result->fetch_all(MYSQLI_ASSOC);

                            // Free result set
                            $result->free_result();

                            $mysqli->close();
                            // print_r($data) . 'hello';
                            $jdata = json_encode($data);
                            foreach ($data as $row) {
                            ?>


                                <tr>
                                    <td><?php echo $row['comment']; ?></td>
                                    <td><?php echo $row['post_title']; ?></td>
                                    <td><?php echo $row['created']; ?></td>

                                    <td>
                                        <button type="button" onclick='deletePost( <?= json_encode($row) ?>)' class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                    </td>

                                </tr>
                            <?php
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

        <!--Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="ddeletModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Set image placement folder


                            $id = $_POST['pid'];
                            if (
                                empty($id)
                            ) {
                                echo "No Blank Fields";
                            } else {


                                echo ($id);
                                $servername = "localhost";
                                $dbname = 'lasgidi';
                                $username = "root";
                                $password = "Bumshaha@gidi";

                                $mysqli = new mysqli($servername, $username, $password, $dbname);
                                /* create a prepared statement */
                                $stmt = $mysqli->prepare("delete from comments where id =?");

                                /* bind parameters for markers */
                                $stmt->bind_param("s", $id);

                                /* execute query */


                                if ($stmt->execute()) {
                                    echo "Post deleted successful";
                                } else {
                                    echo
                                    $stmt->error;
                                }
                            }
                        }
                        ?>
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Comment</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        Comment: <span id="comment"></span><br>
                        Post Topic: <span id="post_title"></span>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-floating mb-3">

                                <div class="card-footer text-center py-3">
                                    <input type="text" id="iddelete" hidden name="pid" class="btn btn-primary btn-lg" />
                                    <input type="submit" value="Delete" name="submit" class="btn btn-primary btn-lg" />
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    const deletePost = (data) => {
        console.log('data', data)
        var comment = document.getElementById("comment").innerHTML = data.comment || ' '
        var post_title = document.getElementById("post_title").innerHTML = data.post_title || ' '
        var id = document.getElementById("iddelete").value = data.id || ' '
    }
</script>

<?php include 'footer.php' ?>