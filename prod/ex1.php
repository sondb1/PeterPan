<? 
	session_start(); 
	$id=$_SESSION['userid'];
	$mode=$_GET[mode];
	$num=$_GET[num];
	$page=$_GET[page];
	$find=$_POST[find];
	$brand=$_GET[pro_brand];
	$search=$_POST[search];
	$table = "system_product";
	$_SESSION['num']=$item_num;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/admin_pro.css" rel="stylesheet" type="text/css" media="all">
</head>
<?
	include "../lib/dbconn.php";
	$scale=12;			// �� ȭ�鿡 ǥ�õǴ� �� ��
	
	
 if($mode=="filter")
 {
	$sql = "select * from $table where pro_brand='$brand' order by num desc";
 }
    else if ($mode=="search")
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
		$sql = "select * from $table order by num desc";
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
<div id="wrap">
  <div id="header">
    <? include "../lib/top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">
	<? include "../lib/top_menu2.php"; ?>
  </div>  <!-- end of menu --> 

  <div id="content">
	<div id="col1">
		<div id="left_menu">
<?
			include "../lib/left_menu.php";
?>
		</div>
	</div>
	<div id="col2">        
		<div id="title">
			<img src="../img/product2.PNG">
		</div>

		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">�� �� <?= $total_record ?> ���� ��ǰ�� �ֽ��ϴ�.  </div>
			<div id="list_search2"><img src="../img/select_search.gif"></div>
			<div id="list_search3">
				<select name="find">
                    <option value='pro_category'>ī�װ�</option>
                    <option value='pro_brand'>�귣��</option>
                    <option value='pro_name'>��ǰ��</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="../img/list_search_button.GIF"></div>
		</div>
		</form>
		<div class="clear"></div>

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // ������ ���ڵ�� ��ġ(������) �̵�  
      $row = mysql_fetch_array($result);       
      // �ϳ��� ���ڵ� ��������
	  
	  $item_num     = $row[num];
	  $item_pro_id     = $row[pro_id];
	  $item_pro_name     = $row[pro_name];
	  $item_pro_brand = $row[pro_brand];
	  $item_pro_category = $row[pro_category];
	  /*$pro_category = explode("/", $row[pro_category]);
	  $item_user = $pro_category[0];
	  $item_f_category = $pro_category[1];

	  $item_s_category = $pro_category[2];*/
	  $item_manufacture     = $row[manufacture];
	  $item_pro_content     = $row[pro_content];
	  $item_pro_price     = $row[pro_price];
	  $item_pro_count     = $row[pro_count];
	  $item_pro_point     = $row[pro_point];
	  $item_pro_manufacture_day     = $row[pro_manufacture_day];  
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
?>



			<div id="list_item">
<div id="list_item1">
			<?
	$image_name[0]   = $row[file_name_0];
		$image_copied[0] = $row[file_copied_0];
		$imageinfo = GetImageSize("./data/".$image_copied[0]);
		$image_width[0] = $imageinfo[0];
			$image_height[0] = $imageinfo[1];
			$image_type[0]  = $imageinfo[2];
		$img_name = $image_copied[0];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[0];
				
			echo "<a href='view.php?table=$table&num=$item_num&page=$page'><?= $item_pro_name ?><img src='$img_name' width='100' >"."</a><br><br>";
		?></div>

				<div id="list_item4"><a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><?= $item_pro_name ?></a></div>
				<div id="list_item7"><?= $item_pro_price ?>��</div>&nbsp;
<br>
				<div id="list_item10">��ȸ��<?= $item_hit ?></div>
			</div>
<?
   	   $number--;
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
			echo "<a href='pro_list.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;���� ��
				</div>
				<div id="button">
					<a href="pro_list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;

				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
