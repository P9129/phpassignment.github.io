<html>
<body bgcolor="khaki">
 <center>
 <h1> <b> DASHBOARD</b> </h1>
 <table border=1>
 <th>  STUDENT NAME</th>  
 

<?php
 

// PHP Program connect to database

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
	//echo "Connected successfully";
}



$sql = $sql = "SELECT * FROM studentinfo ";
$count = 0;

$result = $conn->query($sql);


if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{

        echo "<tr>";
		echo "<td>".$row["s_name"]."</td>";
	    #echo "<td>".$row["s_password"]."</td>";
		#echo "<td>".$row["s_roll"]."</td>";
		#echo "<td>".$row["s_mobile"]."</td>";
        #echo "<td>".$row["s_email"]."</td>";
		echo "</tr>"; 
        $count = $count + 1;

	}
}
 else 
 {
    echo "0 results";
}
echo "</table>";
echo "</br>";
echo "<h1><b>Number of Students Registered are :  $count </b><h1>";
echo "</form>";
echo "</body>";
echo "</html>";

$conn->close();

?>


	<a href="loginpage.html" alink="red"  vlink="green"> Go Back </a>

 
</body>
</html>