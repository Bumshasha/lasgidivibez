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
                                <th>Title</th>
                                <th>Story</th>
                                <th>Date</th>
                                <th>Audit</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Story</th>
                                <th>Date</th>
                                <th>Audit</th>
                        </tfoot>
                        <tbody>
                            <?php

                            $servername = "localhost";
                            $dbname = 'lasgidi';
                            $username = "root";
                            $password = "";

                            $mysqli = new mysqli($servername, $username, $password, $dbname);

                            // collect value of input field

                            $wid = $_SESSION['id'];
                            /* create a prepared statement */
                            $stmt = "select id,story,title,publish,created from posts ";
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
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['story']; ?></td>
                                    <td><?php echo $row['created']; ?></td>
                                    <td> <button type="button" onclick='edit( <?= json_encode($row) ?>)' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                                            Edit
                                        </button>
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


        <!-- Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Post</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // Set image placement folder
                                $target_dir = "./images/";
                                //File name
                                $filename = basename($_FILES["file"]["name"]);
                                // Get file path
                                $Now = new DateTime('now', new DateTimeZone('Pacific/Chatham'));
                                $imageExt = strtolower(pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION));
                                // echo  $Now->format('Y-m-d H:i:s');
                                $newname = $Now->format('Y-m-d_H:i:s') . '.' . $imageExt;
                                $target_file = $target_dir . basename($newname);
                                // Get file extension

                                // Allowed file types
                                $allowd_file_ext = array("jpg", "jpeg", "png", "mp4");





                                if (!file_exists($_FILES["file"]["tmp_name"])) {
                                    $resMessage = array(
                                        "status" => "alert-danger",
                                        "message" => "Select image to upload."
                                    );
                                } else if (!in_array($imageExt, $allowd_file_ext)) {
                                    $resMessage = array(
                                        "status" => "alert-danger",
                                        "message" => "Allowed file formats .jpg, .jpeg, .mp4 and .png."
                                    );
                                } else if ($_FILES["file"]["size"] > 2097152) {
                                    $resMessage = array(
                                        "status" => "alert-danger",
                                        "message" => "File is too large. File size should be less than 2 megabytes."
                                    );
                                } else if (file_exists($target_file)) {
                                    $resMessage = array(
                                        "status" => "alert-danger",
                                        "message" => "File already exists."
                                    );
                                } else {
                                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                                        $title = $_POST['title'];
                                        $category = $_POST['category'];
                                        $content = $_POST['content'];
                                        $name = $_SESSION['fullname'];
                                        $id = $_SESSION['id'];
                                        $publish = $_POST['publish'];
                                        $pid = $_POST['id'];
                                        if (
                                            empty($title) || empty($category) || empty($content)
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
                                            $stmt = $mysqli->prepare("update posts set `title`=?, `story`=?,`category`=? ,`writer_id`=?,`writer`=?,`image`=?,`publish`=? where id =?");

                                            /* bind parameters for markers */
                                            $stmt->bind_param("ssssssss", $title, $content, $category, $id, $name, $newname, $publish, $pid);

                                            /* execute query */


                                            if ($stmt->execute()) {
                                                echo "Post created successful";
                                            } else {
                                                echo
                                                $stmt->error;
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="formFileLg" class="form-label">Image/Video</label>
                                    <input class="form-control form-control-lg" name="file" id="formFileLg" type="file">
                                </div>
                            </div>

                            <div class="form-floating mb-3">
                                <input id='title' class="title form-control" id="inputTitle" name="title" type="type" placeholder="name@example.com" />
                                <label for="inputTitle">Title </label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea id="story" class="story form-control" id="inputContent" name="content" type="textarea" placeholder="name@example.com">
                                            </textarea>
                                <label for="inputContent">Story</label>
                            </div>

                            <div class="form-floating mb-3">
                                <select id="category" class="category form-select" name="category" aria-label="Default select example">
                                    <option selected>select categories</option>
                                    <option value="the_lagos_experience">The Lagos Experience</option>
                                    <option value="eko_ile">Eko Ile</option>
                                    <option value="culture">Culture</option>
                                    <option value="events">Events This Weekend</option>
                                    <option value="tourist">Tourist Sites</option>
                                    <option value="reading">Free Reading</option>
                                </select>
                                <label for="inputPassword">Category</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="publish" name="publish" type="date" placeholder="name@example.com" />
                                <label for="inputTitle">Publish </label>
                            </div>
                            <div class="card-footer text-center py-3">
                                <input type="text" id="id" hidden name="id" class="btn btn-primary btn-lg" />
                                <input type="submit" value="submit" name="submit" class="btn btn-primary btn-lg" />
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="ddeletModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">

                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Post</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        You are deleting post
                        <form action="deletePost.php" method="GET">

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
    const edit = (data) => {
        console.log('data', data)

        var content = document.getElementById("story").value = data.story || ' '
        var title = document.getElementById("title").value = data.title || ' '
        var category = document.getElementById("category").value = data.category || ' '
        var publish = document.getElementById("publish").value = data.publish || ' '
        var id = document.getElementById("id").value = data.id || ' '
    }
    const deletePost = (data) => {
        console.log('data', data)
        var id = document.getElementById("iddelete").value = data.id || ' '
    }
</script>

<?php include 'footer.php' ?>