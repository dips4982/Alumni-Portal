<?php
session_start();
if(!empty(($_SESSION["x"])) or !empty($_SESSION["y"]))
        {
            header("location:alum.php");
            exit;
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 { 
    background-color: #1abc9c; /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #ffffff; /* White */
    color: #555555;
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Alumni Portal</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">HOME</a></li>
        <li><a href="alumni.php">ALUMNI</a></li>
        <li><a href="login.php">LOGIN</a></li>
        <li><a href="signup2.php">SIGNUP</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">VISVESVARAYA NATIONAL INSTITUTE OF TECHNOLOGY</h3>
  <form action="" method="POST">
  <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
          </div>
          </div>
          <button type="submit" class="btn btn-default" name="btn1" value="login">Submit</button>
        </form>
      </div>
  <h3>SINCE 1960</h3>
</div>


<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Designed and developed by: <a href="https://www.w3schools.com">Diplesh Mankape</a></p> 
</footer>

</body>
</html>
<?php
if(isset($_POST["btn1"]))
{


// Create connection
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname="alumni";*/
$servername = "localhost";
$username = "id10079735_alumnidiplesh";
$password = "alumnidiplesh";
$dbname="id10079735_alumnidiplesh";


// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if($_POST["btn1"]=="login")
{
    $email=$_POST["email"];
    $pass=$_POST["password"];
    //echo "$email";
    //echo "$pass";

    $sql="SELECT * from personalinfo WHERE password='$pass' and email='$email'";
    //echo "$sql";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row= mysqli_fetch_assoc($result)){
      //      echo "Login successfull";
            $e=$_POST["email"];
$p=$_POST["password"];
$_SESSION["x"]=$e;
$_SESSION["y"]=$p;
        header("location:alum.php");
        exit;
        }
        
    }
    else 
    {
        echo "Incorrect email id or password";
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

}
?>