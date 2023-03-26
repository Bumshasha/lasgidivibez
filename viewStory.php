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
                            echo '<li class="nav-item"><a class="nav-link" href="admin/index.php">Dashboard</a></li>';
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
    <div class="container mt-5 px-4 px-lg-5 h-100  justify-content-around align-content-center">
        <div class="col-md-12 d-flex flex-column align-items-center vh-100 w-100">
            <?php
            $servername = "localhost";
            $dbname = 'lasgidi';
            $username = "root";
            $password = "";

            $mysqli = new mysqli($servername, $username, $password, $dbname);
            try {
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
                        $password = "";

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
                $id = $_GET['id'];
                $stmt = "select id,story,title,publish,image,rate,viewed,created from posts where id = $id ";
                $result = $mysqli->query($stmt);

                // Fetch all
                $data = $result->fetch_assoc();

                // Free result set
                $result->free_result();

                $stmt2 = "select * from comments where postid = $id ";
                $cresult = $mysqli->query($stmt2);

                // Fetch all
                $cdata = [];
                $cdata = $cresult->fetch_all(MYSQLI_ASSOC);

                // Free result set
                $cresult->free_result();

                // 

                //update views
                $stmt3 = $mysqli->prepare("update posts set `viewed`=? where id =?");

                /* bind parameters for markers */
                $views = $data['viewed'] + 1;
                $stmt3->bind_param("ss", $views, $data['id']);

                /* execute query */


                if ($stmt3->execute()) {

                    $mysqli->close();
                    // echo "Post updated successful";
                } else {
                    echo
                    $stmt3->error;
                }
            } catch (\Throwable $th) {
            }

            echo "
           <div class='col-md-10 mt-10 mb-5'>
                    <div class='card col-md-12 h-100 d-flex align-items-center'>
                     <div class=''><img id='img1' class='img-fluid rounded mb-4 mb-lg-0' src=" . "/admin/images/" . $data['image'] . " alt='...' width='500' height='500'/></div>
                    <h2 class='card-title'>" . $data['title'] . "</h2>
                        <div class='card-body'>
                            
                            <p class='card-text'> " . $data['story'] . "</p>
                        </div>
                        <a href='http://www.twitter.com/share?url=http://www.lasigidivibez.com/'><img src='assets/twitter.png' width='40' height='30'></a>
                    </div>
                </div>"; ?>
            <form action="rate.php" method="POST">

                <div class="row col-md-12">
                    <div class="form-floating mb-3">
                        <div class=" row form-floating mb-3">
                            <select class="form-select" name="rate" aria-label="Default select example">
                                <option selected>select rate</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <label for="inputPassword">Rate</label>

                        </div>
                        <div class="form-floating">
                            <input type="text" id="id" hidden name="oldvalue" value="<?= $data['rate'] ?>" class="btn btn-primary btn-lg" />
                            <input type="text" id="id" hidden name="postid" value="<?= $data['id'] ?>" class="btn btn-primary btn-lg" />
                            <input type="submit" value="Rate" name="submit" class="btn btn-primary btn-lg" />
                        </div>
                    </div>



                </div>

            </form>

        </div>
        <?php
        foreach ($cdata as $crow) {
        ?>
            <div class='col-md-4 mb-5'>
                <div class='card h-100'>
                    <div class='card-body'>
                        <h2 class='card-title'><?= $crow['name'] ?></h2>
                        <p class='card-text'><?= $crow['comment'] ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <form action="" method="POST">

            <div class="row col-md-12">
                <div class="form-floating mb-3">
                    <input class="form-control" id="inputTitle" name="name" type="type" placeholder="name@example.com" />
                    <label for="inputTitle">Username </label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="inputContent" name="comment" type="textarea" placeholder="name@example.com">
                                            </textarea>
                    <label for="inputContent">Comment</label>
                </div>

                <div class="card-footer text-center py-3  col-md-4">
                    <input type="text" id="id" hidden name="title" value="<?= $data['title'] ?>" class="btn btn-primary btn-lg" />
                    <input type="text" id="id" hidden name="postid" value="<?= $data['id'] ?>" class="btn btn-primary btn-lg" />
                    <input type="submit" value="submit" name="submit" class="btn btn-primary btn-lg" />
                </div>
            </div>

        </form>

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
        const addComment = async (e) => {
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
        addComment()
    </script>
</body>

</html>