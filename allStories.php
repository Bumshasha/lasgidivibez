<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Lasgidi Vibez</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="bg_image">
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <a class="navbar-brand" href="#!">Lasgidi Vibez</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="allStories.php">Stories</a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container px-4 px-lg-5 h-100  justify-content-around align-content-center">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">

            <div class="row col-md-12">
                <div class="form-floating mb-3 col-md-4">
                    <input class="form-control" id="inputTitle" name="publish" type="date" placeholder="name@example.com" />
                    <label for="inputTitle">Published </label>
                </div>
                <div class="form-floating mb-3  col-md-4">
                    <select class="form-select" name="category" aria-label="Default select example">
                        <option selected> </option>
                        <option value="night-life">Night Life</option>
                        <option value="food">Food</option>
                        <option value="traditions">Traditions</option>
                        <option value="hotspots">Hotspots</option>
                    </select>
                    <label for="inputPassword">Category</label>
                </div>

                <div class="card-footer text-center py-3  col-md-4">
                    <input type="submit" value="submit" name="submit" class="btn btn-primary btn-lg" />
                </div>
            </div>

        </form>
        <div class="col-md-12 d-flex flex-column justify-content-around align-items-center vh-100 w-100">
            <?php
            $servername = "localhost";
            $dbname = 'lasgidi';
            $username = "root";
            $password = "@Edmund123";

            $mysqli = new mysqli($servername, $username, $password, $dbname);
            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $category = $_POST['category'];
                $publish = empty($_POST['publish']) ? 'null' : "'" . $_POST['publish'] . "'";
                if (
                    empty($category) && empty($publish)
                ) {
                    echo "select at least one filter";
                } else {


                    // echo ($category . " " . $publish);

                    /* create a prepared statement */
                    $stmt = "select * from posts where category='$category' or date(publish) =$publish";
                    $result = $mysqli->query($stmt);
                    $data = [];
                    // Fetch all
                    if ($result) {
                        $data = $result->fetch_all(MYSQLI_ASSOC);

                        // Free result set
                        $result->free_result();

                        $mysqli->close();
                        // print_r($data) . 'hello';
                        $jdata = json_encode($data);
                    }
                }
            } else {
                $stmt = "select id,story,title,publish,image,rate,viewed,created from posts ";
                $result = $mysqli->query($stmt);

                // Fetch all
                $data = $result->fetch_all(MYSQLI_ASSOC);

                // Free result set
                $result->free_result();

                $mysqli->close();
                // print_r($data) . 'hello';
                $jdata = json_encode($data);
            }
            foreach ($data as $row) {
            ?>
                <div class='col-md-4 mb-5'>
                    <div class='card h-100'>
                        <div class='card-body'>
                            <h2 class='card-title'><?= $row['title'] ?></h2>
                            <p class='card-text'><?= $row['story'] ?></p>
                        </div>
                        <div class='card-footer'><a class='btn btn-primary btn-sm' href="viewStory.php?id=<?= $row['id'] ?>">View</a></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container px-4 px-lg-5">
            <p class="m-0 text-center text-white">Copyright &copy; Lasgidi Vibez 2023</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script>
        const pullData = async (e) => {
            e.preventDefault()
            var cat = document.getElementById('category').value
            var publish = document.getElementById('publish').value
            var req = await fetch('./filter.php', {
                method: "POST",
                body: {
                    category: cat,
                    publish: publish
                }
            })
            var res = await req.json()
            console.log('res', res)

            var postiamge = document.getElementById('cards').outerHTML = data;

        }
        pullData()
    </script>
</body>

</html>