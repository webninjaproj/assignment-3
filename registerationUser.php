<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>registeruser</title>
<meta name="description" content="JobNinja">
<meta name="keywords" content="JobNinja, jobs, employment, bay area, silicon valley, online job search, career">
<meta name="author" content="WebNinja">

<link rel="stylesheet" href="css/main.css" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>


<style>
h1{
  font-family: 'Lato', sans-serif;
}


input{
  margin-bottom: 10px;
  margin-left: 10px;
  border: 2px black solid;
  background: white;
  font-family: 'Lato', sans-serif;
  }

input[type="text"] {
    width: 200px;
    height: 20px;
    font-family: 'Lato', sans-serif;

}
input[type="password"] {
    width: 200px;
    height: 20px;
}
#buttonp{
  text-align: center;
  
}
button {
     
    /*Step 2: Basic Button Styles*/
    display: block;
    height: 35px;
    min-width: 100px;
    background-color: #000000;
    margin-left: 10%;
    /*Step 3: Text Styles*/
    color: #0099cc;
    text-align: center;
    font-weight: bold; 
    border-color: #000000;
    font-family: 'Lato', sans-serif;
    font-size: 75%;

}
.button{
  background: black;
  text-align: center;
  display: inline;
}

#form{

  font-family: 'Lato', sans-serif;
  font-size: 125%;
}
legend {
  display: block;
  width: 100%;
  text-align: center;
}
fieldset{
  width: 900px;
  margin: auto;
  padding: 10px;
  font-family: 'Lato', sans-serif;
  font-size: 20px;
  border: 2px solid #000000; 
  
}

.error {color: #FFFFFF;}

</style>
</head>

<body background="images/bg.jpg">
<header> <ul><img src="images/ninja.png"><ban>JobNinja.Com</ban></ul></header>
<nav id="dropdown-menu">
<ul>
  <li><a href="home.html">Home</a></li>
  <li><a href="login.php">Applicant</a></li>
  <li><a href="employee.html">Employer</a></li>
  <li><a href="about.html">About Us</a></li></ul></nav> 
  <?php
// define variables and set to empty values

$fname = $email = $lname = $user = $pass = $repass = $test = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   
    
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $user = $_POST['username'];
      $pass =$_POST['password'];

      

try {

    require_once 'connection.php';
    $conn = new PDO("mysql:host=".servername.";dbname=".dbname, username, password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($query);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if(!$row)
    {
      $sql = "INSERT INTO user (email, username, password)
      VALUES ('$email', '$user', '$pass')";
    
    // use exec() because no results are returned
    $conn->exec($sql);
   

    header('Location: http://localhost/thankyou.php');
    exit();

    }
    else
    {

    $test ="User already Exsits!";
    }
  }


    
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

  $conn = null;


}
?>



<form id ="form" align="center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  <fieldset>
    <legend>User Registration !</legend>

    <p><span class="error"><?php echo $test;?></span></p>
    
  <p ><span class="error" >* All fields are required</span></p>
   <label for='fname'>First Name: </label> &nbsp &nbsp &nbsp
   <input type="text" name="fname" style="margin-left:40px;"placeholder="First Name">
   
   <br><br>
   <label for='lname'>Last Name: </label> &nbsp &nbsp &nbsp
   <input type="text" name="lname" style="margin-left:40px;"placeholder="Last Name">
   
   <br><br>
   <label for='email'> Email: </label> &nbsp &nbsp &nbsp
   <input type="text" name="email" style = "margin-left:90px;" placeholder="Email Address">
   
   <br><br>
   <label for='username'>Username: </label> &nbsp &nbsp &nbsp
   <input type="text" name="username" style="margin-left:50px;" placeholder="Enter a Username">
   
   <br><br>
   <label for='password'>Password: </label> &nbsp &nbsp &nbsp
   <input type="password" name="password" style="margin-left:50px;" placeholder="Enter a Password">
   
   <br><br>
   <label for='password'> Re-type Password: </label> &nbsp &nbsp &nbsp
   <input type="password" name="repass" style="margin-right:30px;" placeholder=" Retype the Password">
   
   <br><br>

            <p id = "buttonp">
                <button class ="button" type="submit" value="submit">SUBMIT</button>
                <button class="button" type="reset" value="Reset">RESET</button>
            </p>

   </fieldset>
</form>





</body>
</html>