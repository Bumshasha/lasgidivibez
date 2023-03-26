<?php session_start() ?>
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
        <div class="container nav justify-content-center">
            <a class="navbar-brand" href="#!">Lasgidi Vibez</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb--20 mb-lg-0 ">


                    <?php
                    try {
                        $fullname = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : null;
                        if ($fullname) {
                            echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                About
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Terms & Conditions</a></li>
                                <li><a class="dropdown-item" href="#">Privacy Policy</a></li>


                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Community
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="category.php?category=tourist">Find a Tourist Site</a></li>
                                <li><a class="dropdown-item" href="category.php?category=reading">Free Reading Club</a></li>


                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                What To Do In Lagos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="category.php?category=the_lagos_experience">My Lagos Experience</a></li>
                                <li><a class="dropdown-item" href="category.php?category=eko_ile">Eko Ile</a></li>
                                <li><a class="dropdown-item" href="category.php?category=culture">Culture</a></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="category.php?category=events">Events this weekend</a></li>
                            </ul>
                             

                        </li>';
                            echo '<form action="allStories.php"  role="search">
                        <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                         </form>';
                            echo '<li class="nav-item"><a class="nav-link" href="index.php">Dashboard</a></li>';
                            echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                About
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Terms & Conditions</a></li>
                                <li><a class="dropdown-item" href="#">Privacy Policy</a></li>


                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Community
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="category.php?category=tourist">Find a Tourist Site</a></li>
                                <li><a class="dropdown-item" href="category.php?category=reading">Free Reading Club</a></li>


                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                What To Do In Lagos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="category.php?category=the_lagos_experience">My Lagos Experience</a></li>
                                <li><a class="dropdown-item" href="category.php?category=eko_ile">Eko Ile</a></li>
                                <li><a class="dropdown-item" href="category.php?category=culture">Culture</a></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="category.php?category=events">Events this weekend</a></li>
                            </ul>
                            
   

                        </li>';
                            echo '<li class="nav-item"><a class="nav-link " aria-current="page" href="./admin/register.php">Become a writer</a></li>';
                            echo '<li class="nav-item"><a class="nav-link " aria-current="page" href="./admin/login.php">Login</a></li>';
                            echo ' <form action="allStories.php" class="d-flex" role="search"> <li> <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search"></li>';
                        }
                    } catch (\Throwable $th) {
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container px-4 px-lg-5 h-100  justify-content-around align-content-center">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">

            <div class="row col-md-12">
                <div class="form-floating mb-3 col-md-4">
                    <input class="form-control" id="inputTitle" name="publish" type="date" placeholder="name@example.com" />

                    <label for="inputTitle">Published </label>
                </div>
                <div class="form-floating mb-3  col-md-4">
                    <input class="form-control" id="inputTitle" name="key" type="text" placeholder="Some Text" />
                    <label for="inputKeyword">Type in keyword</label>
                </div>

                <div class="card-footer text-center py-3  col-md-4">
                    <input class="form-control" id="inputTitle" name="category" value="<?= $_GET['category'] ?>" hidden type="text" placeholder="Some Text" />
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

                $text = $_POST['key'];
                $category = $_POST['category'];
                $publish = empty($_POST['publish']) ? 'null' : "'" . $_POST['publish'] . "'";
                if (
                    empty($category) && empty($publish)
                    && empty($cat)
                ) {
                    echo "select at least one filter";
                } else {


                    // echo ($category . " " . $publish);

                    /* create a prepared statement */
                    $stmt = "select * from posts where story like '%$text%' or date(publish) =$publish";
                    $result = $mysqli->query($stmt);
                    $data = [];
                    // Fetch all
                    if ($result) {
                        // header('Location: category.php?category=' . $cat);
                        $data = $result->fetch_all(MYSQLI_ASSOC);

                        // Free result set
                        $result->free_result();

                        $mysqli->close();
                        // print_r($data) . 'hello';
                        $jdata = json_encode($data);
                    }
                }
            } else {
                // echo ;
                $cat = $_GET['category'];
                $stmt = "select id,story,title,publish,image,rate,viewed,created from posts where category='" . $cat . "'";
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
                            <img src="admin/images/<?= $row['image'] ?>" width='100' height='100'>
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