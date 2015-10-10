<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>candidate page</title>
<meta name="description" content="JobNinja">
<meta name="keywords" content="JobNinja, jobs, employment, bay area, silicon valley, online job search, career">
<meta name="author" content="WebNinja">
<link rel="stylesheet" href="css/main.css" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

<style>


h2{

    text-align: center;
    font-family: 'Lato', sans-serif;
    margin-top: 10%;
}

table,tr, th{
  border: 2px black solid;
  font-size: 17px;
  font-weight: bold;
  padding: 10px;
    font-family: 'Lato', sans-serif;

}
th{
  background-color: #424242;
    color: #0099cc;
  padding: 10px;
  font-size: 20px;
    font-family: 'Lato', sans-serif;

}
legend {
  display: block;
  width: 100%;
  text-align: center;
}
fieldset{
      display: inline;
    margin: 25px;
    padding: 200px;
    width: 750px;
    height: 350px
    float: inherit;
    border: 2px solid #000000; 
    clear: left;
        font-family: 'Lato', sans-serif;

}
button {
     
    /*Step 2: Basic Button Styles*/
    display: block;
    height: 35px;
    min-width: 100px;
    background-color: #000000;
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
  <p>
         <?php
            //gets the value from the form
            $pos = $_POST['pos'];
            $fcgorexp = $_POST['fcgorexp'];
            $deg = $_POST['deg'];
            $cgpa = $_POST['cgpa'];
            $exp = $_POST['exp'];
			            $skill = $_POST['skill'];

           $test = " ";


                

                $servername = "localhost";
                $username = "root";
                $password = "divya";
                $dbname = "mydb";

                try {
                    //database connectivity
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    if((strlen($pos)) > 0)
                    {
                        if($fcgorexp == "Fresh Graduate")
                        {
                            $query = "SELECT j.firstname,j.lastname,j.email,b.industrytype,b.degree,e.gpa,e.university FROM JobSeeker j,BasicProfile b,Education WHERE b.industrytype = '$pos' AND e.gpa >= '$cgpa'";
						}
                        else
                        {
                            $query = "SELECT j.firstname,j.lastname,j.email,b.industrytype,b.degree,x.yearsofexp,x.emplname,x.description FROM JobSeeker j,BasicProfile b,Experience x WHERE b.industrytype = '$pos' AND x.yearsofexp >= '$exp' AND x.description = '$skill'";
                        }
                    }
                    $result = $conn->query($query);
                    $row = $result->fetch(PDO::FETCH_ASSOC);

                    //No rows found display message
                    
                    if(!$row)
                        {
                            $test = "Sorry No Candidates Matching Your Search Criteria !";
                            
                        }

                    //rows are found
                    else
                        {
                           print "<h2>Candidates Matching your Criteria</h2>\n";
                           print "<table>\n";

                            print "        <tr>\n";
                            foreach ($row as $field => $value) {
                                print"       <th>$field</th>\n";
                                
                            }
                            print "     </tr>\n";
                            $data = $conn->query($query);
                            $test = $data->setFetchMode(PDO::FETCH_ASSOC);
                            
                            foreach ($data as $row) {
                            print "       <tr>\n";
                            foreach ($row as $name => $value) {
                                if($name == 'UG' || $name == 'Graduate' || $name == 'HTML' || $name == 'PHP' || $name == 'MySQL')
                                    {
                                        if($value == 0)
                                        {
                                            $value = 'NO';
                                        }
                                        else
                                        {
                                            $value = 'YES';
                                        }
                                    } 


                                    print "     <td>$value</td>\n";
                                    
                                }
                                print "     </tr>\n";
                                
                            }
                            print "    </table>\n";
                            }
                        }

                        //error exception caught here
                        catch(PDOException $e)
                            {
                            echo $sql . "<br>" . $e->getMessage();
                            }

                            $conn = null;

           
            
        
        ?>
    </p>

   <br><br><br><br>
    <h2 id="para"><?php echo $test;?></h2> <br><br><br>
    <button class = "back" onclick="history.go(-1);" style="margin-left:50%;">Back</button>
  



</body>
</html>