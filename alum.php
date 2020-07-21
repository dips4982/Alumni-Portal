<?php
session_start();
if(empty($_SESSION["x"]) or empty($_SESSION["y"]))
        {
            header("location:index.php");
            exit;
        }

//echo "dipman";

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
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully<br>";

$email=$_SESSION["x"];
$pass=$_SESSION["y"];
//echo "$email";
//echo "$pass";
$sql="SELECT * from personalinfo WHERE email='$email' and password='$pass'";

$result = mysqli_query($conn, $sql);
$n="";
$u="";
$m="";
$e="";
$p="";
$y="";
$po="";
$b="";
$c="";
$pos="";
$ep="";

if (mysqli_num_rows($result) > 0) {
 // output data of each row
 while($row = mysqli_fetch_assoc($result)) {
$u=$row["uid"];
$n=$row["name"];
$m=$row["mobile"];
$e=$row["email"];
$p=$row["password"];
//echo "$u";
//echo "diplesh";
}
}
else 
{
    echo "0 results";
}

//echo "$u";
//echo "$p";

$sql3="SELECT * from currentstatus WHERE uid='$u'";
$sql4="SELECT * from education WHERE uid='$u'";
$result3 = mysqli_query($conn, $sql3);
if (mysqli_num_rows($result3) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result3)) {
   $c=$row["company"];
   $pos=$row["position"];
   $ep=$row["exp"];
   }
   }
   else 
   {
       echo "0 results";
   }

   $result4 = mysqli_query($conn, $sql4);
if (mysqli_num_rows($result4) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result4)) {
   $y=$row["year"];
   $po=$row["pointer"];
   $b=$row["branch"];
   }
   }
   else 
   {
       echo "0 results";
   }




if(isset($_POST["btn"]))
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
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

    $btn=$_POST["btn"];
if($btn=="updateeducation")
    {
        $year=$_POST["year"];
        $pointer=$_POST["pointer"];
        $branch=$_POST["branch"];
        $sql = "UPDATE education SET year='$year',pointer='$pointer',branch='$branch' WHERE uid='$u'";

        if (mysqli_query($conn, $sql)) {
  //          echo "Record updated successfully";
            $y=$row["year"];
            $po=$row["pointer"];
            $b=$row["branch"];
            header("location:alum.php");
            exit;
            
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }


    }


  else if($btn=="updatecurrent")
    {
        $company=$_POST["company"];
        $position=$_POST["position"];
        $experience=$_POST["experience"];
        $sql1 = "UPDATE currentstatus SET company='$company',position='$position',exp='$experience' WHERE uid='$u'";

        if (mysqli_query($conn, $sql1)) {
    //        echo "Record updated successfully";
            $c=$row["company"];
            $pos=$row["position"];
            $ep=$row["exp"];
            header("location:alum.php");
            exit;
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }


    }

    else if($btn=="updatepersonal")
    {
        $name=$_POST["name"];
        $mobile=$_POST["mobile"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $sql2 = "UPDATE personalinfo SET name='$name',mobile='$mobile',email='$email',password='$password' WHERE uid='$u'";

        if (mysqli_query($conn, $sql2)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }


    }

}


?>


<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative; 
  }
  #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  #section41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}

  .button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}


  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">ALUMNI INFO</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#section1">Personal Info</a></li>
          <li><a href="#section2">Current Status</a></li>
          <li><a href="#section3">Education</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Section 4 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#section41">Section 4-1</a></li>
              <li><a href="#section42">Section 4-2</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>    

<div id="section1" class="container-fluid">
  <h1>Personal Info</h1>
  <div class="container">
      
  <form  action="" method="post">
  <div class="form-group">
      <tr>
      <th><label for="name">Name:</label></th>
      <th><input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo "$n"; ?>"></th>
      </tr>
    </div>
    <div class="form-group">
        <tr>
      <th><label for="email">Email:</label></th>
      <th><input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo "$e"; ?>"></th>
        </tr>
    </div>
    <div class="form-group">
        <tr>
      <th><label for="pwd">Password:</label></th>
      <th><input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="<?php echo "$p"; ?>"></th>
        </tr>
    </div>
    <div class="form-group">
        <tr>
      <th><label for="mobile">Mobile No:</label></th>
      <th><input type="number" class="form-control" id="mobile" placeholder="Enter Mobile no" name="mobile" value="<?php echo "$m"; ?>"></th>
        </tr>
    </div>
    <div class="form-group">
        <tr>
      <th><label for="year">YEAR:</label></th>
      <th><input type="number" class="form-control" id="mobile" placeholder="Enter year" name="year" ></th>
        </tr>
    </div>
    <div class="form-group">
        <tr>
        <th><input type="submit" value="updatepersonal" name="btn"></th>
        </tr>
    </div>
    
</form>
    </div>
</div>
<div id="section2" class="container-fluid">
  <h1>CURRENT STATUS</h1>
  <div class="container">
      <form action="" method="post">
  <div class="form-group">
      <tr>
      <th><label for="name">Company:</label></th>
      <th><input type="text" class="form-control" id="name" placeholder="Enter company" name="company"  value="<?php echo "$c"; ?>"></th>
      </tr>
    </div>
    <div class="form-group">
      <tr>
      <th><label for="name">Position:</label></th>
      <th><input type="text" class="form-control" id="name" placeholder="Enter position" name="position"  value="<?php echo "$pos"; ?>"></th>
      </tr>
    </div>
    <div class="form-group">
      <tr>
      <th><label for="name">Experience:</label></th>
      <th><input type="number" class="form-control" id="name" placeholder="Enter experience" name="experience"  value="<?php echo "$ep"; ?>"></th>
      </tr>
</div>
<div class="form-group">
      <tr>
      <th><input type="submit" value="updatecurrent" name="btn"></th>
      </tr>
    </div>
    </form>
    </div>
</div>
<div id="section3" class="container-fluid">
  <h1>EDUCATION</h1>
  <div class="container">
      <form action="" method="post">
      <div class="form-group">
      <tr>
      <th><label for="pointer">Year:</label></th>
      <th><input type="number" class="form-control" id="year" placeholder="Enter year" name="year" value="<?php echo "$y"; ?>"></th>
      </tr>
    </div>
  <div class="form-group">
      <tr>
      <th><label for="name">Branch:</label></th>
      <th><input type="text" class="form-control" id="name" placeholder="<?php echo "$b"; ?>"></th>
                          <select style="background-color:black" name="branch" value="<?php echo "$b"; ?>">
                            <option value="cse" >Computer science</option>
                            <option value="ece" >Electronics</option>
                            <option value="eee" >Electrical</option>
                            <option value="mech">Mechanical</option>
                            <option value="chem">Chemical</option>
                            <option value="civ" >Civil</option>
                            <option value="meta">Metallurgy</option>
                          </select>
      </tr>
    </div>
    <div class="form-group">
      <tr>
      <th><label for="pointer">Pointer:</label></th>
      <th><input type="number" class="form-control" id="pointer" placeholder="Enter pointer" name="pointer" value="<?php echo "$po"; ?>"></th>
      </tr>
    </div>
    <div class="form-group">
      <tr>
      <th><input type="submit" value="updateeducation" name="btn"></th>
      </tr>
    </div>
</form>
</div>
</div>
<div id="section41" class="container-fluid"> 

<a href="index.php" class="button">HOME</a>
</div>


</body>
</html>
