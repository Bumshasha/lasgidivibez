<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login </title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="bgloginimage" id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main class="">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-white">
                                    <h3 class="text-center font-weight-light  my-4">Login</h3>
                                    <h4>Welcome to Lagidi Vibez</h4>
                                </div>
                                <div class="card-body">
                                    <?php

                                    session_start();
                                    // session_destroy();

                                    $servername = "localhost";
                                    $dbname = 'lasgidi';
                                    $username = "root";
                                    $password = "";
                                    try {
                                        $mysqli = new mysqli($servername, $username, $password, $dbname);
                                    } catch (\Throwable $th) {
                                        echo $th;
                                    }

                                    try {

                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            // collect value of input field

                                            $email = $_POST['email'];

                                            $passw = $_POST['password'];

                                            // if (empty($email) || empty($passw)) {
                                            //     echo "No Blank Fields";
                                            // } else {
                                            /* create a prepared statement */

                                            $stmt = "select * from user where email='$email'";
                                            $result = $mysqli->query($stmt);
                                            // print_r($result);

                                            /* fetch value */
                                            if ($result) {


                                                // Free result set
                                                $data = $result->fetch_all(MYSQLI_ASSOC);
                                                // echo $data[0] . 'hello';
                                                // Free result set
                                                $result->free_result();


                                                // $mysqli->close();

                                                $jdata = json_encode($data);
                                                if ($data[0]['password'] === md5($passw)) {

                                                    // $response = json_encode(array("message" => "successfully logged in", "status" => 200, "data" => array("fullname" => $data[0][3] . ' ' . $data[0][4], "role" =>  $data[0][6], "id" => $$data[0][0])));
                                                    $_SESSION['fullname'] = $data[0]['firstname'] . ' ' . $data[0]['lastname'];
                                                    $_SESSION['id'] = $data[0]['id'];
                                                    $_SESSION['role'] = $data[0]['role'];
                                                    // echo ($_SESSION['fullname']);
                                                    echo ("Login successful");
                                                    sleep(2);

                                                    header('Location: index.php');
                                                } else {
                                                    $response = json_encode(array("message" =>  "failed to login", "status" => 404));
                                                    echo ("Wrong email or password");
                                                }
                                            }
                                            // }
                                        }
                                    } catch (\Throwable $th) {
                                        echo ($th);
                                    }


                                    ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="index.php">Home</a>

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

</html>