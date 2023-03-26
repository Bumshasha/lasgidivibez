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
                                <th>Email</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Audit</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Audit</th>
                        </tfoot>
                        <tbody>
                            <?php

                            $servername = "localhost";
                            $dbname = 'lasgidi';
                            $username = "root";
                            $password = "@Edmund123";

                            $mysqli = new mysqli($servername, $username, $password, $dbname);

                            // collect value of input field

                            $wid = $_SESSION['id'];
                            /* create a prepared statement */
                            $stmt = "select id,email,firstname,lastname,role,phone from user ";
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
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                    <td><?php echo $row['role']; ?></td>
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

                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Users</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                            <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {


                                $lname = $_POST['lastname'];
                                $fname = $_POST['firstname'];
                                $email = $_POST['email'];
                                $role = $_SESSION['role'];
                                $id = $_SESSION['id'];
                                $phone = $_POST['mobile'];
                                $pid = $_POST['id'];
                                if (
                                    empty($lname) || empty($fname) || empty($email)
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
                                    $stmt = $mysqli->prepare("update user set `email`=?, `phone`=?,`firstname`=? ,`lastname`=?,`role`=? where id =?");

                                    /* bind parameters for markers */
                                    $stmt->bind_param("ssssss", $email, $phone, $fname, $lname, $role, $pid);

                                    /* execute query */


                                    if ($stmt->execute()) {
                                        echo "Post created successful";
                                    } else {
                                        echo
                                        $stmt->error;
                                    }
                                }
                            }
                            ?>
                            <div class="form-floating mb-3">
                                <div class=" row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input id="fname" class="form-control" name="firstname" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                            <label for="inputFirstName">First name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input id="lname" class="form-control" name="lastname" id="inputLastName" type="text" placeholder="Enter your last name" />
                                            <label for="inputLastName">Last name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input id="email" class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                    <label for="inputEmail">Email address</label>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input id="phone" class="form-control" name="mobile" id="inputPassword" type="text" placeholder="Mobile number" />
                                        <label for="inputPassword">Mobile</label>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <select id="role" class="form-select" name="role" aria-label="Default select example">
                                            <option selected>select role</option>
                                            <option value="writer">writer</option>
                                            <option value="editor">Editor</option>

                                        </select>
                                    </div>
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

        var email = document.getElementById("email").value = data.email || ' '
        var lname = document.getElementById("lname").value = data.lastname || ' '
        var fname = document.getElementById("fname").value = data.firstname || ' '
        var phone = document.getElementById("phone").value = data.phone || ' '
        var role = document.getElementById("role").value = data.role || ' '
        var id = document.getElementById("id").value = data.id || ' '
    }
    const deletePost = (data) => {
        console.log('data', data)
        var id = document.getElementById("iddelete").value = data.id || ' '
    }
</script>

<?php include 'footer.php' ?>