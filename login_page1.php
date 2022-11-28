<?php
 

$studentpassword=$_GET['studentpassword'];
$studentemailid=$_GET['studentemailid'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StudentDB";

$s_name = "";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}
else
{
	//echo "Connected successfully";
}

//SELECT * FROM studentinfo where s_email = 'shinde@gmail.com' and s_password='shinde';
/*encrypt password*/ 
#$encrypt_password = password_hash($studentpassword,PASSWORD_DEFAULT);
$sql = "SELECT s_name,s_password,s_roll,s_mobile,s_email FROM studentinfo where s_email = '$studentemailid'";
//echo "query:".$sql;
$result = $conn->query($sql);
?>

<html>
    <head>
        <title>Students Details </title>
    </head>
    <body bgcolor="khaki">
        <center>
        <form name="StudentInformation" action="#" method="get">
            <div class="StudentInformationAttribute">
                
                <table>


<?php 
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{

 ?>
 <?php
          $encrypt_password = $row["s_password"];
          $check_password = password_verify($studentpassword,$encrypt_password) ;
          
          if($check_password == true)
          {


 ?>
 

                <tr> <lable> <h1> Hi!&nbsp;<?php echo $row["s_name"]?>, You Have Logged in Successfully. </h1> </lable>
                </tr>
                <tr> <lable> <h1> Student Information </h1> </lable>
                </tr>    
                <tr>
                    <td>  Student Name : </td> <td> <?php echo $row["s_name"]?> </td>
                </tr>
                <tr>
                    <td> Student Password : </td> <td><?php echo $row["s_password"]?></td>
                </tr>   
                <tr> 
                    <td> Student Roll : </td> <td><?php echo $row["s_roll"]?> </td>
                </tr>
                <tr>
                    <td>Student Mobile : </td> <td><?php echo$row["s_mobile"]?> </td>
                </tr>
                <tr>
                    <td>Student Email : </td> <td><?php echo $row["s_email"]?></td>
                </tr>

                

                
<?php
          }
          else
          {
               echo "<b><h1>Password is incorrect</h1></b>";
          }

	}
}
 else 
 {
    //echo "0 results";
    echo " No such record is found ";

}
$conn->close();
?>
</div>
</center> 
</table> 
<br>
<div>
    <a href="dashboard.php" alink="red"  vlink="green"> <h2><b>Click Here for  Dashboard <b><h2></a>
</div>
</form>

</body>   
</html>
