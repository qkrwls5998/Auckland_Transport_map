<!DOCTYPE html>
<html>
<body>

<p>

<select name="D1" style="width: 212px; height: 34px">
<?php // query.php
	 require_once 'include/config.php';
	 $route_short_name = 009;
	 $conn = new mysqli($hostname, $username, $password, $database);
	 if ($conn->connect_error) die($conn->connect_error);
	 $query = "SELECT trip_id FROM trips WHERE route_id in (SELECT route_id FROM routes WHERE route_short_name = '{$route_short_name}')";
	 $result = $conn->query($query);
	 if (!$result) die($conn->error);
	 $rows = $result->num_rows;
	 for ($j = 0 ; $j < $rows ; ++$j){
		 $result->data_seek($j);
		 $res = $result->fetch_assoc()['route_short_name'];
		 //echo 'Author: ' . $result->fetch_assoc()['author'] . '<br>';
		 echo "<option value= '$res' > $res </option>";
		 		 }
	 $result->close();
	 $conn->close();
 ?>
</select></p>


</body>
</html>