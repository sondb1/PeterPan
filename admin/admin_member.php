<? 
	session_start(); 
	$id=$_SESSION['userid'];
	$mode=$_GET[mode];
	$num=$_GET[num];
	$regist_day=$_GET[regist_day];
	$page=$_GET[page];
	$find=$_POST[find];
	$search=$_POST[search];
	$table = "peterpan_member";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/admin_mem.css" rel="stylesheet" type="text/css" media="all">
</head>
<?
	include "../lib/dbconn.php";
	$scale=10;			// �� ȭ�鿡 ǥ�õǴ� �� ��

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('�˻��� �ܾ �Է��� �ּ���!');
			     location.href = 'admin_member.php'; 
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by regist_day desc";
	}
	else
	{
		$sql = "select * from $table order by regist_day desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // ��ü �� ��

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
?>
<body style="height:1200px;">
 <!-- ù��° ��� �޴� -->
    <? include "../menu/top_menu2.php"; ?>
<!-- �ι��� ��� �޴� -->
    <? include "../menu/main_meun2.php"; ?>
<!-- ������ ������ -->
	<? include "../menu/top_menu3.php"; ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items">      
					<h2 class="title text-center" style="
    margin-top: 20px;
">ȸ������</h2>
		<form  name="board_form" method="post" action="admin_member.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">�� �� <?= $total_record ?> ���� ȸ���� �����մϴ� </div>
			
			<div id="list_search3">
				<select name="find">
                    <option value='id'>id</option>
                    <option value='name'>name</option>
                    <option value='nick'>nick</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="../img/sch.png">
			</div>

			<div id="list_search6"><a href =admin_member.php?mode=ss><img src="../img/admin_sch.png"></a></div>
		</div>
		</form>
		<div class="clear"></div>

		<div id="list_top_title">
			<ul>
				&nbsp;&nbsp;<li id="list_title1">��ȣ</li>
				<li id="list_title2">���̵�</li>&nbsp;&nbsp;
				<li id="list_title3">�̸�</li>&nbsp;&nbsp;
				<li id="list_title5">����ó</li>&nbsp;&nbsp;&nbsp;&nbsp;
				<li id="list_title6">�̸���</li>&nbsp;&nbsp;&nbsp;&nbsp;
				<li id="list_title7">������</li>&nbsp;&nbsp;&nbsp;&nbsp;
				<li id="list_title8">����ó ���ŵ���</li>&nbsp;&nbsp;&nbsp;&nbsp; 
				<li id="list_title9">�̸��� ���ŵ���</li>&nbsp;&nbsp;
				<li id="list_title10">���</li>&nbsp;&nbsp;
					
			</ul>		
		</div>

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // ������ ���ڵ�� ��ġ(������) �̵�  
      $row = mysql_fetch_array($result);       
      // �ϳ��� ���ڵ� ��������
	 
	  $mem_num     = $row[num];
	  $mem_id     = $row[id];
	  $mem_pass     = $row[pass];
	  $mem_name = $row[name];
	  $mem_hp     = $row[hp];
	  $mem_email     = $row[email];
	  $mem_item_date     = $row[regist_day];
	  $mem_level     = $row[level];
	  $mem_item_date = substr($mem_item_date, 0, 10);  
	  $num=$row[id];

?>



			<div id="list_item">
				<div id="list_item1"> <?= $row[num] ?></div>
				<div id="list_item2">
				<a href =admin_member.php?mode=<?=$row[id]?>><?= $mem_id ?>
				</a></div>
				<div id="list_item3"><?= $mem_name ?></div>
				<div id="list_item4"><?= $mem_hp ?></div>
				<div id="list_item5"><?= $mem_email ?></div>
				<div id="list_item6"><?= $mem_item_date ?></div>
				
	
		
                	<div id="list_item7">
					
					<? 
					if($row[is_hp] == "y")
	   {
					echo "����";
	   
	   }
					else
	   {
		 echo "�̵���";

	   }
	   ?>
					</div>
						<div id="list_item8"><? 
					if($row[is_email] == "y")
	   {
					echo "����";
	   
	   }
					else
	   {
		 echo "�̵���";


	   }
	 
	   ?></div>

<div id="list_item9"><?
						if($id=="admin")
				            echo "<a href='delete.php?num=$mem_num'>����</a>";
					?></div>

			</div>
              

<?
	 
   	   $number--;
   }




 $sql = "select * from $table";
 $resulttt = mysql_query($sql, $connect);

?>
<?

if($mode == ss)
	{
		?>
<div id="hlist_top_title">
			<ul>
			&nbsp;&nbsp;<li id="hlist_title6">��ȣ</li>
				&nbsp;&nbsp;<li id="hlist_title1">���̵�</li>
				<li id="hlist_title3"><a href =admin_member.php?mode=bb>����Ʈ</a></li>&nbsp;&nbsp;
				<li id="hlist_title4"><a href =admin_member.php?mode=qq>���ŰǼ�</a></li>&nbsp;&nbsp;
				<li id="hlist_title5"><a href =admin_member.php?mode=zz>���Ű���</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
			
			</ul>		
	
		</div>
		<?
	}
		
$count =1;

while($rowww = mysql_fetch_array($resulttt))
{

if($mode == ss)
	{

?>
	<div id="hhlist_item">
	<div id="hhlist_item6"> <?= $rowww[num] ?></div>
     <div id="hhlist_item1"><?= $rowww[id] ?></div>
  <div id="hhlist_item3"><?=$rowww[point] ?></div>
    <div id="hhlist_item4"> <?= $rowww[order_count] ?></div>
  <div id="hhlist_item5"><?=  $rowww[order_price] ?></div>
</div>
<?

	}
 $count++;
}




 $sql = "select * from $table  where id =  '$mode'";
 $resultt = mysql_query($sql, $connect);


while($roww = mysql_fetch_array($resultt))
{
	$aa = $roww[id];









if($aa == $mode)
{
?>

<div id="llist_top_title">
			<ul>
			<li id="llist_title1">���̵�</li>&nbsp;&nbsp;
				&nbsp;&nbsp;<li id="llist_title6">�̸�</li>
				
				<li id="llist_title3">����Ʈ</li>&nbsp;&nbsp;
				<li id="llist_title4">���ŰǼ�</li>&nbsp;&nbsp;
				<li id="llist_title5">���Ű���</li>&nbsp;&nbsp;&nbsp;&nbsp;
			
			</ul>		
		</div>
<div id="llist_item">
<div id="llist_item1"> <?= $roww[id] ?></div>
 <div id="llist_item6"> <?= $roww[name] ?></div>
	   <div id="llist_item3"> <?= $roww[point] ?></div>
	   <div id="llist_item4"> <?= $roww[order_count] ?></div>
	   <div id="llist_item5"> <?= $roww[order_price] ?></div>
	   </div>
<?
}
}
?>
<?
	 $sql = "select * from $table  order by point DESC  ";
	  $resulta = mysql_query($sql, $connect);


if($mode == bb)
	{
		?>
<div id="hlist_top_title">
			<ul>
			&nbsp;&nbsp;<li id="hlist_title6">��ȣ</li>
				&nbsp;&nbsp;<li id="hlist_title1">���̵�</li>
				<li id="hlist_title3"><a href =admin_member.php?mode=bb>����Ʈ</a></li>&nbsp;&nbsp;
				<li id="hlist_title4"><a href =admin_member.php?mode=qq>���ŰǼ�</a></li>&nbsp;&nbsp;
				<li id="hlist_title5"><a href =admin_member.php?mode=zz>���Ű���</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
			
			</ul>		
	
		</div>
		<?
	}
		
$count =1;

while($rowa = mysql_fetch_array($resulta))
{

if($mode == bb)
	{

?>
	<div id="hhlist_item">
	<div id="hhlist_item6"> <?= $rowa[num] ?></div>
     <div id="hhlist_item1"><?= $rowa[id] ?></div>
  <div id="hhlist_item3"><?=$rowa[point] ?></div>
    <div id="hhlist_item4"> <?= $rowa[order_count] ?></div>
  <div id="hhlist_item5"><?=  number_format($rowa[order_price] ) ?></div>
</div>
<?

	}
 $count++;
}

	 $sql = "select * from $table  order by order_count DESC  ";
	  $resultaa = mysql_query($sql, $connect);


if($mode == qq)
	{
		?>
<div id="hlist_top_title">
			<ul>
			&nbsp;&nbsp;<li id="hlist_title6">��ȣ</li>
				&nbsp;&nbsp;<li id="hlist_title1">���̵�</li>
				<li id="hlist_title3"><a href =admin_member.php?mode=bb>����Ʈ</a></li>&nbsp;&nbsp;
				<li id="hlist_title4"><a href =admin_member.php?mode=qq>���ŰǼ�</a></li>&nbsp;&nbsp;
				<li id="hlist_title5"><a href =admin_member.php?mode=zz>���Ű���</a></a></li>&nbsp;&nbsp;&nbsp;&nbsp;
			
			</ul>		
	
		</div>
		<?
	}
		
$count =1;

while($rowaa = mysql_fetch_array($resultaa))
{

if($mode == qq)
	{

?>
	<div id="hhlist_item">
	<div id="hhlist_item6"> <?= $rowaa[num] ?></div>
     <div id="hhlist_item1"><?= $rowaa[id] ?></div>
  <div id="hhlist_item3"><?=$rowaa[point] ?></div>
    <div id="hhlist_item4"> <?= $rowaa[order_count] ?></div>
  <div id="hhlist_item5"><?=  number_format($rowaa[order_price] ) ?></div>
</div>
<?

	}
 $count++;
}

	 $sql = "select * from $table  order by order_price DESC  ";
	  $resultaaa = mysql_query($sql, $connect);


if($mode == zz)
	{
		?>
<div id="hlist_top_title">
			<ul>
			&nbsp;&nbsp;<li id="hlist_title6">��ȣ</li>
				&nbsp;&nbsp;<li id="hlist_title1">���̵�</li>
				<li id="hlist_title3"><a href =admin_member.php?mode=bb>����Ʈ</a></li>&nbsp;&nbsp;
				<li id="hlist_title4"><a href =admin_member.php?mode=qq>���ŰǼ�</a></li>&nbsp;&nbsp;
				<li id="hlist_title5"><a href =admin_member.php?mode=zz>���Ű���</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
			
			</ul>		
	
		</div>
		<?
	}
		
$count =1;

while($rowaaa = mysql_fetch_array($resultaaa))
{

if($mode == zz)
	{

?>
	<div id="hhlist_item">
	<div id="hhlist_item6"> <?= $rowaaa[num] ?></div>
     <div id="hhlist_item1"><?= $rowaaa[id] ?></div>
  <div id="hhlist_item3"><?=$rowaaa[point] ?></div>
    <div id="hhlist_item4"> <?= $rowaaa[order_count] ?></div>
  <div id="hhlist_item5"><?=  number_format($rowaaa[order_price] ) ?></div>
</div>
<?

	}
 $count++;
}


?>
			<div id="page_button">
				<div id="page_num"> �� ���� &nbsp;&nbsp;&nbsp;&nbsp; 
<?

   // �Խ��� ��� �ϴܿ� ������ ��ũ ��ȣ ���
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // ���� ������ ��ȣ ��ũ ����
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='admin_member.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;���� ��
				</div>
				<div id="button">
					<a href="admin_member.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;

				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
