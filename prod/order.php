<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/cart.css" rel="stylesheet" type="text/css" media="all">

</head>
<body>

<?

session_start();
$id=$_SESSION['userid'];
$cart_num=$_GET['cart_num'];
$num=$_GET[num];
$pid=$_GET[pid];
$mode=$_GET[mode];
$c_count=$_GET[c_count];
$c_price=$_GET[c_price];
// 1. ���� ��Ŭ��� ����

	include "../lib/dbconn.php";

// 2. �α��� ���� ���� ȸ���� �α��� �������� ������
if(!$id){
    alert("�α����ϼž� �̿��� �����մϴ�.");
}
if($mode=="dir")
{
	$sql = "select * from system_product where num='$num'";
$result = mysql_query($sql, $connect);
}
else{
// 3. ��ٱ��� ��� �̱�
$sql = "select system_cart.num, system_cart.id, system_cart.pro_id, system_cart.cart_count, system_cart.cart_price, system_product.pro_name, system_product.pro_price, system_product.pro_point, system_product.file_name_0, system_product.file_copied_0 from system_cart left join system_product on system_cart.pro_id = system_product.pro_id where system_cart.id='".$_SESSION['userid']."'";
$result = mysql_query($sql, $connect);
}
?>

<body>
<div id="wrap">
  <div id="header"> <!-- ù��° ��� �޴� -->
    <? include "../menu/top_menu2.php"; ?>
	</Div> 

	<Div> <!-- �ι��� ��� �޴� -->
    <? include "../menu/main_meun2.php"; ?>
	</div>

  <div id="content">

<br/>
<table style="width:1000px;height:50px;border:5px #CCCCCC solid;">
    <tr>
        <td align="center" valign="middle" style="font-zise:15px;font-weight:bold;">����</td>
    </tr>
</table>
<div id="list_top_title">
			<ul>
				<li id="list_title1">��ǰ����</li>
				<li id="list_title2">��ǰ��</li>
				<li id="list_title3">��ǰ�ܰ�</li>
				<li id="list_title4">��ǰ����</li>
				<li id="list_title5">�Ұ�</li>
			</ul>		
		</div>


<br/>
<table style="width:1000px;height:50px;border:0px;">
<table cellspacing="1" style="width:1000px;height:50px;border:0px;background-color:#999999;">
    <tr>
		<td align="center" valign="middle" width="40%" style="height:30px;background-color:#CCCCCC;">����</td>
        <td align="center" valign="middle" width="40%" style="height:30px;background-color:#CCCCCC;">��ǰ��</td>
        <td align="center" valign="middle" width="20%" style="height:30px;background-color:#CCCCCC;">��ǰ�ܰ�</td>
        <td align="center" valign="middle" width="20%" style="height:30px;background-color:#CCCCCC;">��ǰ����</td>
        <td align="center" valign="middle" width="20%" style="height:30px;background-color:#CCCCCC;">�Ұ�</td>
		<td align="center" valign="middle" width="20%" style="height:30px;background-color:#CCCCCC;">������</td>
    </tr>
<?
// 4.������ ����ȭ ���� üũ�� ���� ���� ����
$i = 0;
$sum = 0;
$mode=$_GET[mode];
if($mode=="dir")
{
	while($row = mysql_fetch_array($result)){
	$num = $row[num];
	$pro_name=$row[pro_name];
	$pro_id=$row[pro_id];
	$pro_price=number_format($row[pro_price]);
	$pro_point=number_format($row[pro_point]);
	$cart_count=number_format($row[pro_count]);
	$cart_price=number_format($row[pro_price]);
	$image_name[0]   = $row[file_name_0];
	$ord_point=$pro_point*$cart_count;
		$image_copied[0] = $row[file_copied_0];
		$imageinfo = GetImageSize("./data/".$image_copied[0]);
		$image_width[0] = $imageinfo[0];
			$image_height[0] = $imageinfo[1];
			$image_type[0]  = $imageinfo[2];
		$img_name = $image_copied[0];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[0];
			echo "<tr><td align='center' valign='middle' style='height:30px;background-color:#FFFFFF;'><img src='$img_name' width='100'>";
	}
}
	else
	{
// 5.�����Ͱ� ���� ���� �ݺ��ؼ� ���� �� �پ� �б�
while($row = mysql_fetch_array($result)){
	$num = $row[num];
	$pro_name=$row[pro_name];
	$pro_id=$row[pro_id];
	$pro_price=number_format($row[pro_price]);
	$pro_point=number_format($row[pro_point]);
	$cart_count=number_format($row[cart_count]);
	$cart_price=number_format($row[cart_price]);
	$image_name[0]   = $row[file_name_0];
	$ord_point=$pro_point*$cart_count;
		$image_copied[0] = $row[file_copied_0];
		$imageinfo = GetImageSize("./data/".$image_copied[0]);
		$image_width[0] = $imageinfo[0];
			$image_height[0] = $imageinfo[1];
			$image_type[0]  = $imageinfo[2];
		$img_name = $image_copied[0];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[0];
				
			echo "<tr><td align='center' valign='middle' style='height:30px;background-color:#FFFFFF;'><img src='$img_name' width='100'>";
}
	}
?>
    
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?=$pro_name?></td>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?=$pro_price?>��</td>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?=$cart_count?>��</td>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?=$cart_price?>��</td>
		<td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?=$ord_point?>��</td>
    </tr>
<?

    // 6.������ ���� üũ�� ���� ������ 1 ������Ű�� ������ ���ϱ�
    $i++;
    $sum += $row[cart_price];
	$sum2 += $ord_point;
	
// 7.�����Ͱ� �ϳ��� ������ 
if($i == 0){
?>
    <tr>
        <td align="center" valign="middle" colspan="4" style="height:50px;background-color:#FFFFFF;">��ǰ�� �ϳ��� �����ϴ�.</td>
    </tr>
<?
}

?>
    <tr>
        <td align="center" valign="middle" colspan="4" style="height:50px;background-color:#FFFFFF;">�� �� : <?=number_format($sum)?>��</td>
		<td align="center" valign="middle" colspan="4" style="height:50px;background-color:#FFFFFF;">�������� : <?=number_format($sum2)?>��</td>
    </tr>
</table>
<?
		$sum=number_format($sum);
		$_SESSION['sum']=$sum;
		$sum2=number_format($sum2);
		$_SESSION['sum2']=$sum2;
		$_SESSION['cart_num']=$num;
		?>
<br/>
<?
// 8. �� ����Ʈ ���ϱ�
$sql = "select * from system_member where id = '$id'";
$result = mysql_query($sql, $connect);
$row = mysql_fetch_array($result);

?>
<table style="width:1000px;height:50px;border:5px #CCCCCC solid;">
    <tr>
        <td align="center" valign="middle" style="font-zise:15px;font-weight:bold;">�� ����Ʈ : <?=number_format($row[point])?>��</td>
    </tr>
</table>
<br>
<table style="width:1000px;height:50px;">
    <tr>
        <td align="center" valign="middle">
        
 

        <input type="button" value=" �����ϱ� " onClick="location.href='../shop1.php?o_point=<?=$sum2?>&cart_count=<?=$cart_count?>&pro_id=<?=$pro_id?>';">
        
        </td>
    </tr>
</table>

</div>
		</body>
		</html>