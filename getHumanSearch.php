<?php

	//建立連線
	$con=mysqli_connect("localhost","root","860319","we")or die("Error " . mysqli_error($con));
	//設定字碼集
	mysqli_query($con,"set names utf8");

	if (mysqli_connect_errno($con))
	{
	   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//sql寫mysql指令
	$sql = "select 學生姓名,就讀學校,技能編號,收藏清單 from 學生帳號";

	$res = mysqli_query($con,$sql)or die("Error in Selecting " . mysqli_error($con));;
	$result = array();


	//只需要改array_push內的row1,row2
	while($row = mysqli_fetch_array($res)){
		array_push($result,array(
		'row1'=>$row[0],
		'row2'=>$row[1],
		'row3'=>$row[2],
		'row4'=>$row[3]
		));
	}

	echo json_encode(array("result"=>$result),JSON_UNESCAPED_UNICODE);

	mysqli_close($con);
?>
