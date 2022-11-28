<?php
 

 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "StudentDB";
 
 // Create connection
 $conn = new mysqli($servername, $username, $password,$dbname);
 
 // Check connection
 if ($conn->connect_error) 
 {
     die("Connection failed: " . $conn->connect_error);
 }
 else
 {
    // echo "Connected successfully";
 }

/* Receiving the data form registration page */

$studentname = $_GET['studentname'];
$studentpassword=$_GET['studentpassword'];
$studentroll=$_GET['studentroll'];
$studentmobile=$_GET['studentmobile'];
$studentemailid=$_GET['studentemailid'];


$sql1 = "SELECT s_name,s_password,s_roll,s_mobile,s_email FROM studentinfo where s_email = '$studentemailid'";
//echo "query:".$sql1;
$result = $conn->query($sql1);
if ($result->num_rows > 0)
{
    echo "<h1><b> User Name is already present</b></h1>";
}
else
{
        /*encrypt password */
        $encrypt_password = password_hash($studentpassword,PASSWORD_DEFAULT);

        $sql = "insert into studentinfo (s_name,s_password,s_roll,s_mobile,s_email) values ('$studentname','$encrypt_password',$studentroll,$studentmobile,'$studentemailid')";
        //echo "Query:".$sql;
        if ($conn->query($sql) === TRUE)
	    {
		        echo "<b><h1>Registration done successfully</h1><b>";
                echo "<h3><a href='loginpage.html'>click here for login</a></h3>";
         
	    }
        else
	    {
		        echo "Error while inserting data: " . $conn->error;
	    }

}
$conn->close();

?>