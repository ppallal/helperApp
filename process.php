<?php
	$foo = file_get_contents("php://input");
	$data = json_decode($foo, true);
	
	require("connect.php");
	$no = $data['no'];
	$req = $data['req'];
	
	if( !strcmp($req,"updateLocation") )
	{
		$lat = $data['lat'];
		$long = $data['long'];
		
		$result = mysqli_query($con,"INSERT INTO location VALUES($no,$lat,$long,now());");
	}
	else if( !strcmp($req,"askHelp") )
	{
		if(isset($data['data']))
			$text = $data['data'];
		$prio = $data['prio'];
		$lat = $data['lat'];
		$long = $data['long'];
		$time = $data['time'];
		
		$result = mysqli_query($con,"INSERT INTO help VALUES($no,$prio,now()+$time,$lat,$long,now());");
	}
	/*while($row = mysqli_fetch_array($result)) {
		echo $row['FirstName'] . " " . $row['LastName'];
		echo "<br>";
	}
	*/
	
	
?>