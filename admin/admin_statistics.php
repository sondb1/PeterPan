<div id="statistics">
	<div id="counter">
	</div>

<!--###################################�Ǹų���###########################################-->
	<?
// 1. ���� ��Ŭ��� ����
session_start();
$id=$_SESSION['id'];
$num=$SESSION['num'];
$page=$_GET[page];
$table="peterpan_order";

 ?>
 <?
include "../lib/dbconn.php";


// 2. �α��� ���� ���� ȸ���� �α��� �������� ������


$scale=10;
$mode = $_GET[mode];
if($mode=="list")
{
	 $date1 = $_GET[date1];
 $date2 = $_GET[date2];
}
else if($mode=="search")
{
 $date1 = $_POST[date1];
 $date2 = $_POST[date2];
}
    if ($mode=="search" || $mode=="list")
	{	



		if(!$date1 || !$date2)  
		{
			echo("
				<script>
				 window.alert('�˻��� �ܾ �Է��� �ּ���!');
			     history.go(-1);
				</script>
			");
			exit;
		}
		$date2 = date('Y-m-d', strtotime($date2.' +1 day')); 

	$sql = "select * from $table  where order_day>='$date1' and order_day<='$date2' order by num desc";
	}
$day30 = date('Y-m-d', strtotime($nowday.' -30 day')); 
$day90 = date('Y-m-d', strtotime($nowday.' -90 day')); 
$day180 = date('Y-m-d', strtotime($nowday.' -180 day')); 
$day270 = date('Y-m-d', strtotime($nowday.' -270 day')); 
$day365 = date('Y-m-d', strtotime($nowday.' -365 day')); 
 $nowday = date("Y-m-d (H:i)");

IF($mode == "30day")
{
$sql = "SELECT * FROM $table WHERE order_day BETWEEN '$day30' and '$nowday' order by order_day "; 
}

	else if($mode == "90day")
{
$sql = "SELECT * FROM $table WHERE order_day BETWEEN '$day90' and '$nowday' order by order_day "; 
}
	else if($mode == "180day")
{
$sql = "SELECT * FROM $table WHERE order_day BETWEEN '$day180' and '$nowday' order by order_day "; 
}
	else if($mode == "270day")
{
$sql = "SELECT * FROM $table WHERE order_day BETWEEN '$day270' and '$nowday' order by order_day "; 
}
	else if($mode == "365day")
{
$sql = "SELECT * FROM $table WHERE order_day BETWEEN '$day365' and '$nowday' order by order_day "; 
}

	else
	{
	$sql = "select * from peterpan_order order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // ��ü �� ��



?>

<a href ="admin_statistics.php?mode=30day"> 1����</a>

<a href ="admin_statistics.php?mode=90day"> 3����</a>

<a href ="admin_statistics.php?mode=180day"> 6����</a>

<a href ="admin_statistics.php?mode=270day"> 9����</a>

<a href ="admin_statistics.php?mode=365day"> 1����</a>


<?

	// ��ü ������ ��($total_page) ��� 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // ��������ȣ($page)�� 0 �� ��
		$page = 1;              // ������ ��ȣ�� 1�� �ʱ�ȭ
 
	// ǥ���� ������($page)�� ���� $start ���  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;



/*// 4. ��ü �ֹ� ���� �˾Ƴ���
$sql = "select count(*) as order_n from system_order where id='$id' ";
$total_count = sql_total($sql);


// 5. ������ ��� ���� �����
$paging_str = paging($page, $page_row, $page_scale, $total_count, "");

// 6. ���� ���� ����
$from_record = ($page - 1) * $page_row;

// 7. ���Ÿ�� ���ϱ�
$query = "select * from m__order where 1 limit ".$from_record.", ".$page_row;
$result = mysql_query($query, $connect);*/

?>
<br/>
<table style="width:1000px;height:50px;border:5px #CCCCCC solid;">
    <tr>
        <td align="center" valign="middle" style="font-zise:15px;font-weight:bold;">�Ǹų���</td>
    </tr>
</table>
<br/>
<form  name="board_form" method="post" action="admin_statistics.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">�� �� <?= $total_record ?> ���� �Ǹų����� �ֽ��ϴ�.  </div>
			<div id="list_search2"><img src="../img/select_search.gif"></div>
			<div id="list_search3"><input type="text" name="date1"></div>
			<div id="list_search4"><input type="text" name="date2"></div>
			<div id="list_search5"><input type="image" src="../img/list_search_button.GIF"></div>
		</div>
		</form>
<table style="width:1000px;height:50px;border:0px;">
<table cellspacing="1" style="width:1000px;height:50px;border:0px;background-color:#999999;">
    <tr>
        <td align="center" valign="middle" width="20%" style="height:30px;background-color:#CCCCCC;">�ֹ���ȣ</td>
        <td align="center" valign="middle" width="20%" style="height:30px;background-color:#CCCCCC;">�ֹ��� �̸�</td>
        <td align="center" valign="middle" width="40%" style="height:30px;background-color:#CCCCCC;">�ֹ��ݾ�</td>
        <td align="center" valign="middle" width="40%" style="height:30px;background-color:#CCCCCC;">�ֹ��Ͻ�</td>
    </tr>
<?
// 8.������ ����ȭ ���� üũ�� ���� ���� ����

$sql = "select * from  peterpan_oder where progress in ('�����Ϸ�')";
$sum = 0;



// 9.�����Ͱ� ���� ���� �ݺ��ؼ� ���� �� �پ� �б�
 for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // ������ ���ڵ�� ��ġ(������) �̵�  
      $row = mysql_fetch_array($result);       
      // �ϳ��� ���ڵ� ��������
	  
	  $num     = $row[num];

	  $c_name     = $row[c_name];
	  $order_total     = $row[product_price];
	  $sum += $row[product_price];
	  $progress     = $row[progress];
	  $order_day     = $row[order_day];



?>
    <tr>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?=$num?></td>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?=$c_name?></td>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><a href="./order_detail2.php?pro_id=<?=$c_name?>&page=<?=$page?>"><?=number_format($order_total)?>��</a></td>
        <td align="center" valign="middle" style="height:30px;background-color:#FFFFFF;"><?=$order_day?></td>
    </tr>
<?

  
}

// 11.�����Ͱ� �ϳ��� ������ 
if($i == 0){
?>
    <tr>
        <td align="center" valign="middle" colspan="4" style="height:50px;background-color:#FFFFFF;">�ֹ��� �ϳ��� �����ϴ�.</td>
    </tr>
<?
}
?>
    <tr>
        <td align="center" valign="middle" colspan="4" style="height:50px;background-color:#FFFFFF;">�� �� : <?=number_format($sum)?>��</td>
    </tr>
</table>
<br>

			<div id="page_button">
				<div id="page_num"> �� ���� &nbsp;&nbsp;&nbsp;&nbsp; 
<?
$mode = $_GET[mode];
if($mode=="list")
{
	 $date3 = $_GET[date1];
 $date4 = $_GET[date2];
}
else if($mode=="search")
{
 $date3 = $_POST[date1];
 $date4 = $_POST[date2];
}
$number--;
   // �Խ��� ��� �ϴܿ� ������ ��ũ ��ȣ ���
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // ���� ������ ��ȣ ��ũ ����
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='admin_statistics.php?table=$table&page=$i&mode=list&date1=$date3&date2=$date4'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;���� ��
				</div>
</div>