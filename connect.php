
<?php

//error_reporting(0);
//  Contact Information

$Company = $_POST['Company'];
$imo = $_POST['imo'];
$Person = $_POST['Person'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];

//  Vessel 
$Vessel = $_POST['Vessel'];
$vesselType = $_POST['vessel_type'];
$location = $_POST['location'];
$captain = $_POST['captain'];

// vessel detail 
$length = $_POST['length'];
$width = $_POST['width'];
$Draft = $_POST['Draft'];


//  repair 
$repair = $_POST['repair'];
$SpecificAreas = $_POST['Specific_Areas'];
$optradio = $_POST['optradio'];


session_start(); // Start the session
$_SESSION['imoNumber'] = $imo ;


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "marinerhub";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

//    table table 01 ................;

$sql = "INSERT INTO vessel (imoNumber, vasselName, vesselType,currentLocation,shipOperator )
VALUES ('$imo', '$Vessel', '$vesselType','$location','$captain')";

if (mysqli_query($conn, $sql)) {
  $last_id = mysqli_insert_id($conn);

} 


//    table table 02 ................;

$sql1 = "INSERT INTO contact (imoNumber,companyNAme,contactPerson,email,phoneNumber)
VALUES ('$imo', '$Company', '$Person ','$Email','$Phone')";

if (mysqli_query($conn, $sql1)) {
  $last_id = mysqli_insert_id($conn);
 
} 


//  table 3 ******************************

$sql2 = "INSERT INTO  repair (imoNumber,repairNeeds,specificAreas,urgentLevel)
VALUES ('$imo','$repair','$SpecificAreas','$optradio')";

if (mysqli_query($conn, $sql2)) {
  $last_id = mysqli_insert_id($conn);
  
}
 



//    table 4 

$sql3 = "INSERT INTO vesseldetails (vesselName,imoNumber,width,lengh,draft)
VALUES ('$Vessel','$imo','$width','$length','$Draft')";

if (mysqli_query($conn, $sql3)) {
  $last_id = mysqli_insert_id($conn);
  
}

mysqli_close($conn);

header("Location:display.php?signup=success");
?>