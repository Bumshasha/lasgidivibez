<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Small Business - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="bg_image justify-content-around align-items-center">
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
                             <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                         </form>

                        </li>';
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
                            
                        </form>

                        </li>';
                            echo '<li class="nav-item"><a class="nav-link " aria-current="page" href="./admin/register.php">Become a writer</a></li>';
                            echo '<li class="nav-item"><a class="nav-link " aria-current="page" href="./admin/login.php">Login</a></li>';
                            echo ' <form action="allStories.php" class="d-flex" role="search"> <li> <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></li>';
                        }
                    } catch (\Throwable $th) {
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container justify-content-around align-items-center">
        <div class="col-md-12 card bg-light-border-subtle my-5 py-4 text-center" style="background-color: #a3abb3;" id="about">
            <div class="card-body">
                <em>
                    <h2 class="text-white m-0">Featured ARTICLES</h2>
                </em>
            </div>

        </div>

        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 p-5 gx-lg-5">


                <div class="col-md-12 mb-5 " id="cards2">

                </div>
            </div>
            <!-- <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img id="img1" class="img-fluid rounded mb-4 mb-lg-0" src="https://dummyimage.com/900x400/dee2e6/6c757d.jpg" alt="..." width="500" height="500" /></div>
            <div class="col-lg-5 bg-white p-5">
                <h1 class="font-weight-light title" id="title">Business Name or Tagline</h1>
                <p id="story">This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
                <a class="btn btn-primary" href="#!">View</a>
            </div>
        </div> -->
            <!-- Call to Action-->
            <div class="card  my-5 py-4 text-center" style="background-color: #a3abb3;" id="about">
                <div class="card-body">
                    <p class="text-white m-0">WHAT TO DO IN LAGOS</p>
                </div>

            </div>
            <div class="col-md-12 px-3 mb-5 bg-white">
                <div class="row">
                    <div class="col-md-3 bg-grey border-start p-2">
                        <a class="nav-link active" aria-current="page" href="category.php?category=the_lagos_experience">The Lagos Experience</a>
                    </div>
                    <div class="col-md-3 bg-grey border-start p-2">
                        <a class="nav-link px-10" href="category.php?category=eko_ile">Eko Ile</a>
                    </div>
                    <div class="col-md-3 bg-grey border-start p-2">
                        <a class="nav-link" href="category.php?category=Culture">Culture</a>
                    </div>
                    <div class="col-md-3 bg-grey border-start p-2">
                        <a class="nav-link" href="category.php?category=events">Events This Weekend</a>
                    </div>
                </div>


            </div>

            <div class="card text-white bg-light-border-subtle my-5 py-4 text-center" style="background-color: #a3abb3;" id="about">
                <div class="card-body">
                    <p class="text-white m-0">LATEST ARTICLES</p>
                </div>

            </div>
            <!-- Content Row-->
            <div class="row gx-4 gx-lg-5">


                <div class="col-md-12 mb-5 " id="cards">

                </div>
            </div>
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
        const pullData = async () => {
            var req = await fetch('./getPosts.php')
            var res = await req.json()
            console.log('res', res)
            // var postiamge = document.getElementById('img1').src = "./admin/images/" + res[1].image;
            // document.getElementById('title').innerHTML = res[1].title
            // document.getElementById('story').innerHTML = res[1].story
            var data = ''
            res.forEach(element => {
                console.log('element', element)
                data += "<div class='col-md-4 mb-5'><div class='card h-100'> <div class='card-body'><h2 class='card-title'>" + element['title'] + "</h2><p class='card-text'>" + element['story'] + "</p></div><div class='card-footer'><a class='btn btn-primary btn-sm' href='#!'>View</a></div></div></div>"
            });
            var postiamge = document.getElementById('cards').outerHTML = data;
            var postiamge2 = document.getElementById('cards2').outerHTML = data;

        }
        pullData()
    </script>
</body>

</html>