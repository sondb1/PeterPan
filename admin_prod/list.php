<? 
	session_start(); 
	$id=$_SESSION['id'];
	$mode=$_GET[mode];
	$num=$_GET[num];
	$page=$_GET[page];
	$find=$_GET[find];
	$search=$_GET[search];
	$table = "peterpan_product";
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
	$scale=10;			// �� ȭ�鿡 ǥ�õǴ� �� ��
	
  if ($search)
	{
		

		$sql = "select * from peterpan_product where $find like '%$search%' order by num desc";

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
">��ǰ����</h2>
		<form  name="board_form" method="GET" action="list.php"> 
		<div id="list_search">
			<div id="list_search1">�� �� <?= $total_record ?> ���� ��ǰ�� �ֽ��ϴ�.  </div>
			<div id="list_search3">
				<select name="find">
                    <option value='category'>ī�װ�</option>
                    <option value='name'>��ǰ��</option>
                 
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="../img/sch.png"></div>
		</div>
		</form>
		<div class="clear"></div>

		<div id="list_top_titles">
			<ul>
				<li id="list_title1s">��ȣ</li>
				<li id="list_title2s">��ǰ����</li>
				<li id="list_title3s">��ǰ��</li>
				<li id="list_title4s">ī�װ�</li>
				<li id="list_title5s">����</li>
				<li id="list_title6s">����</li>
				<li id="list_title7s">����</li>
			
				<li id="list_title9s">�Ǹŷ�</li>
		
				<li id="list_title11s">��ȸ��</li>
						<li id="list_title10s">�����</li>

						<li id="list_title10s">���</li>
			</ul>		
		</div>

		<div id="list_contents">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // ������ ���ڵ�� ��ġ(������) �̵�  
      $row = mysql_fetch_array($result);       
      // �ϳ��� ���ڵ� ��������
	  
	  $item_num     = $row[num];
	  $item_pro_id     = $row[model];
	  $item_pro_name     = $row[name];
	  $item_pro_brand = $row[category];
	

	
	  $item_pro_content     = $row[count];
	  $item_pro_price     = $row[price];
	  $item_pro_count     = $row[sale];
	  $item_pro_point     = $row[point];
	  $item_pro_sale     = $row[pro_sale];

	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	    $encoding = "euc-kr";
		$charNumber = "20";
		$subject = $item_pro_name;
		$cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);
?>



			<div id="list_itemss">
			<div id="list_items2" style="margin-top:30px;margin-left:60px;">
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
				
			


			
			echo "<img src='$img_name' width='50'>"."<br><br>";
		?></div>
				
				<div id="list_items1"><?= $number ?></div>
			
				<div id="list_items4" style="margin-top:30px;"><a href="write_form.php?mode=modify&num=<?=$item_num?>&page=<?=$page?>&table=<?=$table?>"><?= $cutExec ?></a></div>
				
				<div id="list_items5"><?= $row[category] ?></div>
			
			
				<div id="list_items7"><?=  $row[count] ?></div>
				<div id="list_items8"><?= number_format($row[price]) ?></div>
				<div id="list_items9"><?=  $row[sale]?></div>
				<div id="list_items10"><?=  $row[product]?></div>
				<div id="list_items11"><?= $item_hit ?></div>
				<div id="list_items12"><?= $item_date ?></div>
				
				<div id="list_items13">
				<? 
						if($id=="admin")
				            echo "<a href='delete.php?num=$item_num?'>����</a>";
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
   // �Խ��� ��� �ϴܿ� ������ ��ũ ��ȣ ���
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
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;���� ��
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;
<? 
	if($id)
	{
?>
		<a href="write_form.php?table=<?=$table?>"><img src="../img/save.png"></a>
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
