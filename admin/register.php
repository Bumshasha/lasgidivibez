<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register </title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bgregisterimage">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header bg-white">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                                        <?php

                                        session_start();
                                        $servername = "localhost";
                                        $dbname = 'lasgidi';
                                        $username = "root";
                                        $password = "Bumshaha@gidi";

                                        $mysqli = new mysqli($servername, $username, $password, $dbname);
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            // collect value of input field

                                            $firstname = $_POST['firstname'];
                                            $lastname = $_POST['lastname'];
                                            $email = $_POST['email'];
                                            $mobile = $_POST['mobile'];
                                            $pass = $_POST['password'];
                                            $confirm = $_POST['confirm'];
                                            $role = "writer";
                                            $passhash = md5($pass);
                                            if (
                                                empty($firstname) || empty($lastname) || empty($email) || empty($mobile) || empty($pass) || empty($confirm) || empty($role)
                                            ) {
                                                echo "No Blank Fields";
                                                return false;
                                            } else {


                                                // echo ($fname . " " . $lname . " " . $pass . " " . $role);

                                                /* create a prepared statement */
                                                $stmt = $mysqli->prepare("INSERT INTO user (`email`,`phone`,`firstname`,`lastname`,`role`,`password`) VALUES (?,?,?,?,?,?)");

                                                /* bind parameters for markers */
                                                $stmt->bind_param("ssssss", $email, $mobile, $firstname, $lastname, $role, $passhash);

                                                /* execute query */
                                                if ($stmt->execute()) {
                                                    echo "Sign up successful";
                                                    header('Location: login.php');
                                                } else {
                                                    echo 'Error: failed to register';
                                                }
                                            }
                                        }
                                        ?>
                                        <div class=" row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="firstname" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                    <label for="inputFirstName">First name</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input class="form-control" name="lastname" id="inputLastName" type="text" placeholder="Enter your last name" />
                                                    <label for="inputLastName">Last name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="mobile" id="inputPassword" type="text" placeholder="Mobile number" />
                                                <label for="inputPassword">Mobile</label>
                                            </div>
                                        </div>
                                        <div class="row mb-3 p-2">


                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Create a password" />
                                                    <label for="inputPassword">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="confirm" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <select class="form-select" name="role" aria-label="Default select example">
                                                    <option selected>select role</option>
                                                    <option value="writer">writer</option>
                                                    <option value="editor">Editor</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0 center ">
                                            <input type="submit" value="submit" name="submit" class="btn btn-primary btn-lg" />
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer bg-white text-center py-3">
                                    <div class="small"><a href="login.html">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>