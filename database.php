<?php
     
 $username = "root";
     
 $password = "raj";
     
 $host = "localhost";
     
 $connector = mysql_connect($host,$username,$password)
          
      or die("Unable to connect");
     
 $selected = mysql_select_db("sensor", $connector)
       
      or die("Unable to connect");
     
 ?>

<!doctype html>
    
<html lang="en">
   
<head>
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<meta charset="UTF-8">
      
<title>IOT based Plant watering system</title>
    
<img src="image.png" alt="some_text" align="right" style="width:304px;height:228p">
   
<h1 style="color:blue ;font-family:verdana;font-size:400%"><center><u>Moisture Sensor Data</u></center></h1>
      
  
<h6 style="color:black;font-family:verdana;font-size:100%"><right><b>Created by:</b>RajDalsaniya</right></h6>
    
<h6 style="color:black;font-family:verdana;font-size:100%"><right><b>Guided by:</b>Prof.Harsh Kapdaiya</right></h6>
     
<h6 style="color:black;font-family:verdana;font-size:100%"><right><b>Semester</b>:7</right></h6>
    
</head>

<?php
	
$sql="select * from moisture";
	
$result=mysql_query($sql);
	
?>

    
<table border="1px solid black" class="table" style= "color: #761a9b; margin: 0 auto;">


<tr>
	
<th style= "color:red "><b><h5>Date</h5></b></th>
	
<th style= "color:red "><b><h5>Time</h5> </b></th>
	
<th style= "color:red "><b><h5>Percentage</h5></b></th>

</tr>	


<?php while($row=mysql_fetch_array($result))

{?>

<tr>
 
<?php echo "<td>".$row['date']."</td>"."<td>".$row['time']."</td>"."<td>".$row['percentage']."</td>";
?>
</tr>

<?php
}
?>

</table>

</body>

</html>