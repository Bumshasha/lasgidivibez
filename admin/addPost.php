<?php include 'header.php' ?>

<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main class="">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-white">
                                    <h3 class="text-center font-weight-light  my-4">Add Post</h3>
                                </div>
                                <div class="card-body">

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
                                                    if (
                                                        empty($title) || empty($category) || empty($content)
                                                    ) {
                                                        echo "No Blank Fields";
                                                    } else {


                                                        // echo ($id . " " . $name . " " . $publish);
                                                        $servername = "localhost";
                                                        $dbname = 'lasgidi';
                                                        $username = "root";
                                                        $password = "@Edmund123";

                                                        $mysqli = new mysqli($servername, $username, $password, $dbname);
                                                        /* create a prepared statement */
                                                        $stmt = $mysqli->prepare("INSERT INTO posts (`title`,`story`,`category`,`writer_id`,`writer`,`image`,`publish`) VALUES (?,?,?,?,?,?,?)");

                                                        /* bind parameters for markers */
                                                        $stmt->bind_param("sssssss", $title, $content, $category, $id, $name, $newname, $publish);

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
                                            <input class="form-control" id="inputTitle" name="title" type="type" placeholder="name@example.com" />
                                            <label for="inputTitle">Title </label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" id="inputContent" name="content" type="textarea" placeholder="name@example.com">
                                            </textarea>
                                            <label for="inputContent">Content</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputTitle" name="publish" type="date" placeholder="name@example.com" />
                                            <label for="inputTitle">Publish </label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" name="category" aria-label="Default select example">
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

                                        <div class="card-footer text-center py-3">
                                            <input type="submit" value="submit" name="submit" class="btn btn-primary btn-lg" />
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

<?php include 'footer.php' ?>