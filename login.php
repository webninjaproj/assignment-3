<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>About Job Ninja Title Page</title>
<meta name="description" content="JobNinja">
<meta name="keywords" content="JobNinja, jobs, employment, bay area, silicon valley, online job search, career">
<meta name="author" content="WebNinja">
<link rel="stylesheet" href="css/main.css" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>


<style>
#button a 
{ color: Black;

}
h1{
  font-family: 'Lato', sans-serif;
}


body{
  text-align: center;
}
select{

  font-size: 15px;
  margin-left: 15px;
  border: 2px black solid;
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
legend{ 
  padding-top: 20px;
  text-align: center;
  font-weight: bold;
  font-size: 25px;
 
}
fieldset{
  width: 900px;
  margin: auto;
  padding: 10px;
  font-family: 'Lato', sans-serif;
  font-size: 10px;
  border: 2px solid #000000; 
  
}

h2 {
  font-color: #1FA5BF;
  font-size: 30px;
}

label {
  padding-right: 10px;
  font-weight:bold;
  }

.button{
  background: black;
  text-align: center;
  display: inline;
}
#buttonp{
  text-align: center;
  
}
#LookingFor{
  padding-top: 20px;
  padding-bottom: 0px;
}  
#MaxSalary{
  padding-bottom: 10px;
}                   
#LookingFor, #Education, #MinCGPA, #Skills, #MinExp, #MaxSalary{
  border: none;
  text-align: center;
    font-size: 20px;

}
button {
     
    /*Step 2: Basic Button Styles*/
    display: block;
    height: 35px;
    min-width: 100px;
    background-color: #000000;
    font-family: 'Lato', sans-serif;
    /*Step 3: Text Styles*/
    color: #0099cc;
    text-align: center;
    font-weight: bold; 
  border-color: #000000


}


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
//define var
$user = $pass = $usernameErr = $passwordErr = $loginErr="";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   $valid = true;
 if (empty($_POST["username"])) 
   {
     $usernameErr = "username is required";
     $valid= false;
   } else {
     $user = test_input($_POST["username"]);
 }

   if (empty($_POST["password"])) 
     {
     $passwordErr = "password is required";
     $valid = false;
     } 
    else
     {
     $pass = test_input($_POST["password"]);
	 }
  if($valid)
    {
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


    if($row)
    {
  
      header('Location: http://localhost/thankyou.php');

    }
    else
    {

      $loginErr = "Login failed! Username password doesn't match";
    }

   }


    
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

  $conn = null;

}

}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>


<form id ="form" align="center" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<fieldset <legend>LOGIN</legend>
   <p>
<fieldset id="LookingFor">
	
<label for='username'>Username: </label> &nbsp &nbsp &nbsp

<input type="text" name="username" id ="username" style="margin-left:50px;" placeholder="Enter a Username">

<span class="error"><?php echo $usernameErr;?></span>
<br><br>
<label for='password'>Password: </label> &nbsp &nbsp &nbsp

<input type="password" name="password" id ="password" style="margin-left:50px;" placeholder="Enter a Password">

<span class="error"><?php echo $passwordErr;?></span>

<p><?php echo $loginErr;?></p>
<br><br>
<p id = "buttonp">
        <button class ="button" type="submit" value="Submit">SUBMIT</button> &nbsp &nbsp &nbsp
        <a href="registerationUser.php" style="color:Black">REGISTER NOW!</a>
</p>
</fieldset>


</form>

  
<script>
function validate(form)
{
	var username =  document.getElementByID("username").value;
	var password = document.getElementByID("password").value;
	
	//only letter and numbers and min length 3-20 char
	var checkusername = /^[A-Za-z0-9_]{3,20}$/;
	
	//allows numbers, letters, and special char but min length 6 -20
	var checkpassword = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
	
	if(!checkusername.test(username))
	{
		alert("You must enter a valid username.");
		
	}
	if(!checkpassword.test(password))
	{
		alert("You must enter a valid password.");
	}
	if(checkpassword.test(password) && checkpassword.test(login))
	{
	window.location(thankyou.php);
	}
}
</script>




</body>
</html>
