<? 
	session_start(); 
	$table = "peterpan_review";
	$mode = $_GET[mode];
	$page = $_GET[page];
	$id = $_SESSION['userid'];
	$name = $_SESSION['username'];

	$group_num = $_GET[group_num];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
	<meta charset="euc-kr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>�ı�Խ���</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
	<link href="../css/qna.css" rel="stylesheet" type="text/css" media="all">
</head>
<?
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

	include "../lib/dbconn.php";
	$scale=10;			// �� ȭ�鿡 ǥ�õǴ� �� ��

    if ($mode=="search" ||$mode=="list")
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

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by group_num desc, ord asc";
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
 <!-- ù��° ��� �޴� -->
    <? include "../menu/top_menu2.php"; ?>
 <!-- �ι��� ��� �޴� -->
    <? include "../menu/main_meun2.php"; ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-9 padding-right">
				<div class="features_items">      
					<h2 class="title text-center">�ı�Խ���</h2>
		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">�� �� <?= $total_record ?> ���� �Խù��� �ֽ��ϴ�.  </div>
			<div id="list_search2"></div>
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>����</option>
                    <option value='content'>����</option>
                    <option value='nick'>����</option>
                    <option value='name'>�̸�</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="../img/sch.png"></div>
		</div>
		</form>
		<div class="clear"></div>

			
		<div id="list_top_title">
			<ul>
				<li id="list_title1"><!--<img src="../img/list_title1.gif">-->��ȣ</li>
				<li id="list_title2"><!--<img src="../img/list_title2.gif">-->����</li>
				<li id="list_title3"><!--<img src="../img/list_title3.gif">-->�۾���</li>
				<li id="list_title4"><!--<img src="../img/list_title4.gif">-->�����</li>
				<li id="list_title5"><!--<img src="../img/list_title5.gif">-->��ȸ</li>
			</ul>		
		</div>

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      $row = mysql_fetch_array($result);       
	
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
	  $item_depth = $row[depth];

      $space = "";
      for ($j=0; $j<$item_depth; $j++)
          $space = "&nbsp;&nbsp;".$space;

?>
			<div id="list_item">
				<div id="list_item1"><?= $number ?></div>
				<div id="list_item2"><?=$space?><a href="../community/view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div>
				<div id="list_item3"><?= $item_name ?></div>
				<div id="list_item4"><?= $item_date ?></div>
				<div id="list_item5"><?= $item_hit ?></div>
			</div>
<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> �� ���� &nbsp;&nbsp;&nbsp;&nbsp; 
<?

if($mode=="")
{
	  for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // ���� ������ ��ȣ ��ũ ����
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i'> $i </a>";
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
		echo "<a href='list.php?table=$table&page=$i&mode=list&find=$find&search=$search2'> $i </a>";
		}      
   }
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;���� ��
				</div>
				<div >
					<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"        style="margin-left:650px;"></a>&nbsp;
<? 
	if($id)
	{
?>
		<a href="write_form.php?table=<?=$table?>"><img src="../img/wr.png"style="margin-left:0px;"></a>
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
