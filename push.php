<?php
	$foo = file_get_contents("php://input");
	$data = json_decode($foo, true);
	
	require("connect.php");
	$no = $data['no'];
	//$no=990059163;
	//$req = $data['req'];
	$result = mysqli_query($con,"SELECT * FROM assigns a, Auth b,help c where c.helpid=a.helpid and c.no=a.no");
	//$result = mysqli_query($con,"SELECT * FROM assigns a INNER JOIN auth b ON a.no=b.no;");
	$i=0;
	echo '[';
	while($row = mysqli_fetch_array($result)) 
	{
		echo "{ \"name\":\"".$row['name']."\",\"no\" :\"".$row['no']."\",\"lat\":\"";
		//echo ":".$row['name'];
		//$ll = mysqli_query($con,"SELECT * FROM help where helpid=".$row['helpid']);
		//$lld = mysqli_fetch_array($ll);
		echo $row['lat']."\",\"long\":\"".$row['long']."\",\"data\":\"" . $row['data']."\",\"prio\":\"".$row['prio']."\"";
		echo "},";
	}
	echo '{}]';
	

	
	
?>