<?
include "../lib/dbconn.php";
$num = $_GET[num];


		
$sql = "select * from  peterpan_order where num='$num'";
	$result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);   

		
$sql = "select * from   peterpan_product where num='$row[product_name]'";
	$result = mysql_query($sql, $connect);
    $roww = mysql_fetch_array($result);  
	




if($row[progress] == "�ԱݿϷ�"){


	$count = $roww[count] -$row[product_count];
	$product = $roww[product] +$row[product_count];
	$sql = "update peterpan_product set count = '$count' ,product = '$product'   where num='$row[product_name]'";
}

if($row[progress] == "�ֹ����"){

	$count = $roww[count] +$row[product_count];
	$product = $roww[product] -$row[product_count];
		$sql = "update peterpan_product set count = '$count' ,product = '$product' where num='$row[product_name]'";
}
	mysql_query($sql, $connect);

	mysql_close();    

	echo"
		<script>
     window.alert('��ǰ��� ���� �Ǿ����ϴ�!.')
	   window.close();
	</script>";

?>
