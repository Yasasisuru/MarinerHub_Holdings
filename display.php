<?php

session_start();
if (isset($_SESSION['imoNumber'])) {
    $imoNumber = $_SESSION['imoNumber'];

}

date_default_timezone_set('Asia/Kolkata');
$Date = date('Y - m - d ');
$Time = date('h : i : s - a');

//  date and time





$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marinerhub";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// contact table
$query = "SELECT * FROM  contact  WHERE imoNumber='$imoNumber' ";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row1 = $result->fetch_assoc();
}


// vessel table
$query = "SELECT * FROM  vessel  WHERE imoNumber='$imoNumber' ";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row2 = $result->fetch_assoc();
}

// vesseldetails
$query = "SELECT * FROM  vesseldetails  WHERE imoNumber='$imoNumber' ";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row3 = $result->fetch_assoc();
}

// Details
$query = "SELECT * FROM  repair  WHERE imoNumber='$imoNumber' ";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row4 = $result->fetch_assoc();
}



$conn->close();


?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="data/css/bootstrap.css">
    <link rel="stylesheet" href="data/css/style.css">
    <link rel="icon" href="data/img/iconn.png" />
    <title>MarinerHub Holdings</title>
    <style>
        .column {
            float: left;
            width: 50%;
            text-align: left;
            font-size: 20px;
            font-weight: 100px;
            padding: 10px;

        }

        .row:after {
            content: "";
            display: table;
            clear: both;


        }

        .margi {
            margin-top: 80px;
            margin-bottom: 50px;
        }
    </style>
    <title>MarinerHub Holdings</title>
</head>

<body>



    <!--    navigation bar     -->
    <div class="navbar fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark container ">
            <a href="#"> <img src="data/img/logo.png" alt="MarinerHub Holdings.logo" width="120px"></a>
            <ul class="nav ms-auto ">
                <li class="nav-item ">
                    <a class="nav-link active text-white" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Services </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Contact us </a>
                </li>
            </ul>
        </nav>
    </div>



    <!--  Display -->
    <div class="col-12 container">
        <div class=" col-12 align-items-center text-center ">
            <img src="data/img/logo.png" class="logo ">

        </div>


        <div class="border border-4 border-dark container  text-start align-items-start">

            <div>
                <!-- date and time -->

                <div class="row">
                    <div class="column">
                        <?php echo " Date - :$Date "; ?>
                    </div>

                </div>
                <div class="row">
                    <div class="column">
                        <?php echo " Time - :$Time "; ?>
                    </div>

                </div>

                <!-- contact info display -->

                <div class="row">
                    <h4 class="text-center text-secondary margi"> Contact Information</h4>
                </div>
                <div class="row">
                    <div class="column">Company Name :</div>
                    <div class="column">
                        <?php echo $row1['companyNAme']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">IMO Number :</div>
                    <div class="column">
                        <?php echo $row1['imoNumber']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">Contact Person :</div>
                    <div class="column">
                        <?php echo $row1['contactPerson']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">Email Address :</div>
                    <div class="column">
                        <?php echo $row1['email']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">Phone Number :</div>
                    <div class="column">
                        <?php echo $row1['phoneNumber']; ?>
                    </div>
                </div>




                <!-- vessel info display -->

                <div class="row">
                    <h4 class="text-center text-secondary margi"> Vessel Details</h4>
                </div>
                <div class="row">
                    <div class="column">Vessel Name :</div>
                    <div class="column">
                        <?php echo $row2['vasselName']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">Type of Vessel :</div>
                    <div class="column">
                        <?php echo $row2['vesselType']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">Csaptain name Operator :</div>
                    <div class="column">
                        <?php echo $row2['shipOperator']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">Ship's Length :</div>
                    <div class="column">
                        <?php echo $row3['lengh'] . " m"; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">Ship's Width :</div>
                    <div class="column">
                        <?php echo $row3['width'] . " m"; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">Ship's Draft :</div>
                    <div class="column">
                        <?php echo $row3['draft'] . " m"; ?>
                    </div>
                </div>

                <!-- maintain display -->
                <div class="row">
                    <h4 class="text-center text-secondary margi"> Vessel Details
                    </h4>
                </div>
                <div class="row">
                    <div class="column">Repair Needs :</div>
                    <div class="column">
                        <?php echo $row4['repairNeeds']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">Specific Areas of Repair :</div>
                    <div class="column">
                        <?php echo $row4['specificAreas']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="column">Urgency Level :</div>
                    <div class="column">
                        <?php echo $row4['urgentLevel']; ?>
                    </div>
                </div>



            </div>

           


        </div>
    </div>









    <!-- footer -->

    <footer class="col-12 text-dark ">
        <div class="container ">
            <div class="row text-center">
                <div class="col-3">
                    <h5 class="text-uppercase"> MarinerHub Holdings</h5>
                    <p class=" p-11">For inquiries and communication with MarinerHub Holding,
                        you can reach out through their official contact channels, <br>
                        ensuring a direct and efficient connection <br> for business or informational purposes</p>
                </div>

                <div class="col-6"></div>

                <div class="col-3 align">
                    <h5 class="text-uppercase">Contact</h5>
                    <ul class=" list-unstyled text-start">
                        <li class="list">
                            <img src="data/img/house-fill.svg" class="iamg"> No 22/7 Colombo SL
                        </li>
                        <li class="list">
                            <img src="data/img/email.svg" class="iamg"> MarinerHubHoldings@gmail.com
                        </li>
                        <li class="list">
                            <img src="data/img/telephone.svg" class="iamg"> 011 - 2250170
                        </li>
                        <li class="list">
                            <img src="data/img/printer.svg" class="iamg"> 011 - 2250171
                        </li>
                    </ul>


                </div>

            </div>


            <!-- Copyright -->
            <div class="row text-center margin">
                <div class=" col-4  ">
                    <img class="fit" src="data/img/logo.png" alt="">
                </div>
                <div class=" col-4  ">
                    © 2020 Copyright:
                    <a class="text-dark" href="https://mdbootstrap.com/">MarinerHub Holdings.com</a>
                </div>

                <div class=" col-4">
                    <a href="#"> <img src="data/img/facebook.svg" width="25px" alt="facebook" class="iamg"></a>
                    <a href="#"> <img src="data/img/google.svg" width="25px" alt="google" class="iamg"></a>
                    <a href="#"> <img src="data/img/linkedin.svg" width="25px" alt="linkedin" class="iamg"></a>
                    <a href="#"> <img src="data/img/twitter.svg" width="25px" alt="twitter" class="iamg"></a>
                    <a href="#"> <img src="data/img/youtube.svg" width="25px" alt="youtube" class="iamg"></a>
                </div>

            </div>
            <!-- Copyright -->

</body>

</html>