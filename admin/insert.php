<html>
<head>
</head>
<body>
<?
	session_start();
		include "../lib/dbconn.php";
		$num = $_GET[num];
		$table = peterpan_order;
		$adminod = $_POST[adminod];
			$bureum = $_POST[bureum];
	


	$sql = "update $table set progress = '$adminod' ,bureum = '$bureum'  where num='$num'";
	
	mysql_query($sql, $connect);

	mysql_close();    

		
		
		echo"
		<script>
     window.alert('�ֹ�����  ������ �Ǿ����ϴ�.')
	   location.href = 'updata.php?num=$num';
	</script>";
?>
</body>
</html>