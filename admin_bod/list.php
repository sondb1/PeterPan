<? 
	session_start(); 

			$page= $_GET[page];
			$page= $_GET[page];
	$id = $_SESSION['userid'];
	$table=$_GET[table];
	


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/admin_bod.css" rel="stylesheet" type="text/css" media="all">
</head>
<?
	include "../lib/dbconn.php";
	$scale=10;			// �� ȭ�鿡 ǥ�õǴ� �� ��

$mode = $_GET[mode];
if($mode=="list")
{
 $search = $_GET[search];
 $find=$_GET[find];
}
else if($mode=="search")
{
 $search = $_POST[search];
 $find=$_POST[find];
}

    if ($mode=="search" || $mode=="list")
	{
		if(!$search)  
		{
			echo("
				<script>
				 window.alert('�˻��� �ܾ �Է��� �ּ���!');
			     history.go(-1);
				</script>
			");
			exit;
		}
	
$sql = "select * from peterpan_review where  $find like '%$search%' order by num desc";

	}
	else if($mode== "board1"){
		$sql = "SELECT * FROM peterpan_review order by num desc";
		$table = "peterpan_review";
		$tablesa = "community";
	}
	else if($mode== "board2"){
		$sql = "SELECT * FROM peterpan_QNA order by num desc";
			$table = "peterpan_QNA";
			$tablesa = "QnA";
	}
	else if($mode== "board3"){
		$sql = "SELECT * FROM peterpan_FAQ order by num desc";
			$table = "peterpan_FAQ";
			$tablesa = "FAQ";
	}
		else if($mode== "board4"){
		$sql = "SELECT * FROM peterpan_plan order by num desc";
			$table = "peterpan_plan";
			$tablesa = "plan";
	}
			else if($mode== "board5"){
		$sql = "SELECT * FROM peterpan_notice order by num desc";
			$table = "peterpan_notice";
			$tablesa = "notice";
	}

		else
	{
		$sql = "select * from peterpan_review order by num desc";
		$tablesa = "community";
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
<body>
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
					<h2 class="title text-center"style="
    margin-top: 20px;
">�Խ��ǰ���</h2>
		<form  name="board_form" method="post" action="list.php?&mode=search"> 
		<div id="list_search">
			<div id="list_search1">�� �� <?= $total_record ?> ���� �Խñ۰� �ֽ��ϴ�.  </div>
			<div id="list_search2"></div>
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>����</option>
                    <option value='content'>����</option>
                    <option value='nick'>�۾���</option>
                
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image"  src="../img/sch.png"></div>
		</div>
		</form>
		</div>
		<a class="btnn" href ="list.php?mode=board4" >Ű��Ʈ ��� </a> &nbsp;
				<a class="btnn" href ="list.php?mode=board5" >�������� </a> &nbsp;
		<a class="btnn" href ="list.php?mode=board1" >�ı� �Խ��� </a>
		&nbsp; 
		<a class="btnn" href ="list.php?mode=board2" >QnA </a>
		&nbsp; 
		<a class="btnn" href ="list.php?mode=board3" >FaQ </a>
		&nbsp; 
		<!--<a href ="list.php?mode=board4">��ǰ�� qna  </a>-->




		<div class="clear"></div>

		<div id="list_top_qatitle">
			<ul>
				<li id="list_qatitle1">��ȣ</li>
				<li id="list_qatitle2">����</li>
				<li id="list_qatitle3">�۾���</li>
				<li id="list_qatitle4">�����</li>
				<li id="list_qatitle5">����</li>

			</ul>		
		</div>

		<div id="list_content">
<?		
$mode=$_GET[mode];
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // ������ ���ڵ�� ��ġ(������) �̵�  
      $row = mysql_fetch_array($result);       
      // �ϳ��� ���ڵ� ��������
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10); 

	  if($mode== "board7")
	   {
		  $item_subject    = str_replace(" ", "&nbsp;", $row[content]);
	   }
	  else{
		$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	  }
	  	 $encoding = "euc-kr";
		$charNumber = "60";
		$subject = $item_subject;
		$cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);
?>
			<div id="list_qitem">
				<div id="list_qa1"><?= $number ?></div>

				<div id="list_qa2"><a href="../<?=$tablesa?>/view.php?table=<?=$_GET[table]?>&num=<?=$item_num?>&page=<?=$page?>"><?= $cutExec ?></a></div>
				<div id="list_qa3"><?= $item_name ?></div>
				<div id="list_qa4"><?= $item_date ?></div>
				<?
				if($mode=="board7")
				{
					?>
				<div id="list_qa5">
			
				<?}
				else
				{
?>
<div id="list_qa6" style="	margin-left:710px;">
<?
				}
				$sql = "select * from peterpan_QNA_ripple where parent='$row[parent]'";
	    $ripple_result = mysql_query($sql);
		$row_bb = mysql_fetch_array($ripple_result);
				
		if($mode=="board2")
	   {
					
				if($row_bb[id] != null )
	   { echo"�亯�Ϸ�";}
				else
	   {echo"�亯���"; }
	   }

	   
	   else
	   {
	   }
	   ?>

	   	
				</div>
				
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> �� ���� &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   $mode = $_GET[mode];
$search = $_GET[search];
if($mode=="" || $mode=="board1" || $mode=="board2" || $mode=="board3" || $mode=="board4"|| $mode=="board5")
{
	  for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // ���� ������ ��ȣ ��ũ ����
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i&mode=$mode'> $i </a>";
		}      
   }
}
else
{
if($mode=="list")
{
$search2 = $_GET[search];
}
else if($mode=="search")
{
$search2 = $_POST[search];
}

   // �Խ��� ��� �ϴܿ� ������ ��ũ ��ȣ ���
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // ���� ������ ��ȣ ��ũ ����
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			if($mode=="board1")
			{
			$search2 = $_GET[search];
			echo "<a href='list.php?table=$table&page=$i&mode=board1&find=$find&search=$search2'> $i </a>";
			}
			else if($mode=="board2")
			{
			$search2 = $_GET[search];
			echo "<a href='list.php?table=$table&page=$i&mode=board2&find=$find&search=$search2'> $i </a>";
			}
			else if($mode=="board3")
			{
			$search2 = $_GET[search];
			echo "<a href='list.php?table=$table&page=$i&mode=board3&find=$find&search=$search2'> $i </a>";
			}
			/*else if($mode=="board4")
			{
			$search2 = $_GET[search];
			echo "<a href='list.php?table=$table&page=$i&mode=board4&find=$find&search=$search2'> $i </a>";
			}
			else
			{
			echo "<a href='list.php?table=$table&page=$i&mode=list&find=$find&search=$search2'> $i </a>";
			}*/
		}      
   }
}
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;���� ��
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/wr.png"></a>&nbsp;
<? 
	if($id)
	{
?>
		<a href="write_form.php?table=<?=$table?>"><img src="../img/list.png"></a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
