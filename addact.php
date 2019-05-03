<?php
 

$link = mysqli_connect("localhost","root" ,"","SummerPlan")
or die( mysqli_connect_error() );
 
echo "Connected to SummerPlan Database<br/>";



mysqli_query($link,"CREATE TABLE IF NOT EXISTS activitesList(
		Activity VARCHAR(30) ,
		Importance VARCHAR(20) )")
	or die( mysqli_connect_error());

	echo "Results Table Created!";



 

$query = "INSERT INTO activitesList (Activity, Importance)
VALUES (' $_POST[activityName] ', ' $_POST[Importance]') ";



mysqli_query($link,$query)
or die( mysqli_connect_error());
	
echo "Data is successfully inserted...";




 
	$query = "SELECT * FROM activitesList";
  $result = mysqli_query($link, $query) or
  die( mysqli_connect_error());
    echo "<h2> Here is your summer vacation activity list</h2>";
   echo "<table style='border: 1px solid black;'>";
   echo "<tr>
        <th style='border: 1px solid black;'>Activity</th>
		<th  style='border: 1px solid black;'>Importance</th>
		</tr>";
  	while($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
		
  		echo "<tr><td  style='border: 1px solid black;'>" . $row["Activity"].
		"</td><td  style='border: 1px solid black;'>" . $row['Importance']. "</td></tr>";
  	
  	}
	echo "</table>";


?>