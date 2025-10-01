<!DOCTYPE html>
<?php 
include('func1.php');
$con=mysqli_connect("localhost","root","","myhmsdb");
$doctor = $_SESSION['dname'];
$id = null;
$Sex = '';
$Age = '';
$Rhythms = '';
$Electric = '';
$Conduction = '';
$Extrasystolies = '';
$Hypertrophies = '';
$Cardiac = '';
$Ischemia = '';
$Nonspecific = '';
$Others = '';

if(isset($_GET['ID'])) {
  $id = $_GET['ID'];
  $sql = "SELECT * FROM ludb WHERE ID=$id";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $Sex = $row['Sex'];
    $Age = $row['Age'];
    $Rhythms = $row['Rhythms'];
    $Electric = $row['Electric axis of the heart'];
    $Conduction = $row['Conduction abnormalities'];
    $Extrasystolies = $row['Extrasystolies'];
    $Hypertrophies = $row['Hypertrophies'];
    $Cardiac = $row['Cardiac pacing'];
    $Ischemia = $row['Ischemia'];
    $Nonspecific = $row['Non-specific repolarization abnormalities'];
    $Others = $row['Other states'];
    }
}
  if(isset($_POST['edit'])) {
    $Sex = $_POST['Sex'];
    $Age = $_POST['Age'];
    $Rhythms = $_POST['Rhythms'];
    $Electric = $_POST['Electric_axis_of_the_heart'];
    $Conduction = $_POST['Conduction_abnormalities'];
    $Extrasystolies = $_POST['Extrasystolies'];
    $Hypertrophies = $_POST['Hypertrophies'];
    $Cardiac = $_POST['Cardiac_pacing'];
    $Ischemia = $_POST['Ischemia'];
    $Nonspecific = $_POST['Non_specific_repolarization_abnormalities'];
    $Others = $_POST['Other_states'];

    $query = "UPDATE ludb SET Sex='$Sex', Age='$Age', Rhythms='$Rhythms', 
          `Electric axis of the heart`='$Electric', 
          `Conduction abnormalities`='$Conduction', 
          Extrasystolies='$Extrasystolies', Hypertrophies='$Hypertrophies', 
          `Cardiac pacing`='$Cardiac', Ischemia='$Ischemia', 
          `Non-specific repolarization abnormalities`='$Nonspecific', `Other states`='$Others' WHERE ID=$id";

    $result = mysqli_query($con, $query);
    
    if($result) {
        echo '<script>';
        echo 'alert("Edited successfully!");';
        echo 'window.location.href = "doctor-panel.php";'; // Redirect to admin panel
        echo '</script>';
        exit(); // Ensure script stops executing here
    } else {
        echo "<script>alert('Unable to edit the record!');</script>";
    }
  }
?>

<html lang="en">
  <head>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta name="viewport" content="width=device-width, -scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    
        <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> SMART HOSPITAL </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <style >
    .bg-primary {
        background: -webkit-linear-gradient(left, #00b09b, #96c93d);
    }
    .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #342ac1;
        border-color: #007bff;
    }
    .text-primary {
        color: #342ac1!important;
    }
    #list-pres {
      width: 127%;
      height:500px;
    }
    .btn-primary{
      background-color: #00b09b;
      border-color: #00b09b;
    }
    .btn-delete{
      background-color: red;
      color:#fff;
      margin: 5px;
    }
  </style>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
       <a class="nav-link" href="doctor-panel.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Back</a>
      </li>
    </ul>
</div>
</nav>
<title> Edit Medical Record </title>
</head>
  <style type="padding-top:50px;">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>
  <body style="padding-top:70px;">
    <h3 style = "margin-left: 40%;  font-family: 'IBM Plex Sans', sans-serif;"> Edit  Medical Record </h3>
    <div class="col-md-8" style="margin-top: 3%;">
      <div class="tab-content" id="nav-tabContent" style="width: 950px;">
      <!-- <div class="tab-pane fade" id="list-adrec" role="tabpanel" aria-labelledby="list-adrec-list"> -->
        <form class="form-group" method="post" >
          <div class="row" style ="margin-left: 20%;">
                  <div class="col-md-4"><label>Sex:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="Sex" onkeydown="return alphaOnly(event);" required placeholder="Enter sex (F/M)" value= "<?php echo $Sex; ?>"></div><br><br>
                  
                  <div class="col-md-4"><label>Age:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="Age" onkeydown="return alphaOnly(event);" required value= "<?php echo $Age; ?>"></div><br><br>

                  <div class="col-md-4"><label>Rhythms:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="Rhythms" value= "<?php echo $Rhythms; ?>"></div><br><br>

                  <div class="col-md-4"><label>Electric axis of the heart:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="Electric_axis_of_the_heart" value= "<?php echo $Electric; ?>"></div><br><br>

                  <div class="col-md-4"><label>Conduction abnormalities:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="Conduction_abnormalities" value= "<?php echo $Conduction; ?>"></div><br><br>

                  <div class="col-md-4"><label>Extrasystolies:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="Extrasystolies" value= "<?php echo $Extrasystolies; ?>"></div><br><br>

                  <div class="col-md-4"><label>Hypertrophies:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="Hypertrophies" value= "<?php echo $Hypertrophies; ?>"></div><br><br>

                  <div class="col-md-4"><label>Cardiac pacing:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="Cardiac_pacing" value= "<?php echo $Cardiac; ?>"></div><br><br>

                  <div class="col-md-4"><label>Ischemia:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="Ischemia" value= "<?php echo $Ischemia; ?>"></div><br><br>

                  <div class="col-md-4"><label>Non-specific repolarization abnormalities:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="Non_specific_repolarization_abnormalities" value= "<?php echo $Nonspecific; ?>"></div><br><br>

                  <div class="col-md-4"><label>Other states:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="Other_states" value= "<?php echo $Others; ?>"></div><br><br>

                </div>
          <input type="submit" name="edit" value="Edit Record" class="btn btn-primary" style ="margin-left: 60%;">
        </form>
      </div>
      </div>
    </div>