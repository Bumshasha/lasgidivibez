<?php include 'header.php' ?>
<?php
$servername = "localhost";
$dbname = 'lasgidi';
$username = "root";
$password = "@Edmund123";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// collect value of input field


/* create a prepared statement */
$stmt = "select count(id) as total,sum(viewed) as views,count(rate) as rated from posts";
$result = $mysqli->query($stmt);

// Fetch all
$data = $result->fetch_assoc();

// Free result set


$stmt2 = "select count(id) as total from user";
$result2 = $mysqli->query($stmt);

// Fetch all
$data2 = $result2->fetch_assoc();

// Free result set
$result->free_result();

$mysqli->close();
// print_r($data) . 'hello';
$jdata = json_encode($data);
// echo $jdata;
?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Users</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#"><?= $data2['total'] ?></a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Posts</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#"><?= $data['total'] ?></a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Views</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#"><?= $data['views'] ?></a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Rated</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#"><?= $data['rated'] ?> time(s)</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Danger Card</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">0</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div> -->
        </div>


    </div>
</main>

<?php include 'footer.php' ?>