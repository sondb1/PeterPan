<html>
<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta charset="euc-kr">
	<title>Shop </title>
	<link href="../css/prod.css" rel="stylesheet" type="text/css" media="all and (min-width: 481px)">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

<script type="text/javascript">

</script>


</head>
<body>

	<? include "../menu/top_menu2.php"; ?>

 <!-- �ι��� ��� �޴� -->
    <? include "../menu/main_meun2.php"; ?>
	<?
	 
include "../lib/dbconn.php";
	$scale=12;			// �� ȭ�鿡 ǥ�õǴ� �� ��
	$id=$_SESSION['id'];
	$mode=$_GET[mode];
	$num=$_GET[num];
	$page=$_GET[page];
	$find=$_GET[find];
	$search=$_GET[search];
	$table = "peterpan_product";
	$_SESSION['num']=$item_num;
	$category= $_GET[category];

 if ($search)
	{
		

		$sql = "select * from peterpan_product where $find like '%$search%' order by num desc";

	}

	else if($category== C1)
	{
			$sql = "select * from peterpan_product where category = '�ǱԾ�' order by num desc";
	}
	else if($category== C2)
	{
		$sql = "select * from peterpan_product where category = 'Ŀ�����ǱԾ�' order by num desc";
	}
		else if($category== C3)
	{
		$sql = "select * from peterpan_product where category = '����ĳ����' order by num desc";
	}
		else if($category== C4)
	{
		$sql = "select * from peterpan_product where category = '�����' order by num desc";
	}
		else if($category== C5)
	{
		$sql = "select * from peterpan_product where category = '����' order by num desc";
	}
		else if($category== C6)
	{
		$sql = "select * from peterpan_product where category = 'RC' order by num desc";
	}
		else if($category== C7)
	{
		$sql = "select * from peterpan_product where category = '���' order by num desc";
	}
		else if($category== C8)
	{
		$sql = "select * from peterpan_product where category = '�������' order by num desc";
	}
		else if($category== C9)
	{
		$sql = "select * from peterpan_product where category = '����' order by num desc";
	}
		else if($category== C10)
	{
		$sql = "select * from peterpan_product where category = '��ȭ' order by num desc";
	}
			else if($category== C11)
	{
		$sql = "select * from peterpan_product where category = '�ִϸ��̼�' order by num desc";
	}
			else if($category== C12)
	{
		$sql = "select * from peterpan_product where category = '��Ÿ' order by num desc";
	}

	else
	{
		$sql = "select * from peterpan_product order by num desc";
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
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
<section>
	<div class="container" >
		<div class="row">
			<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="prod_list.php?category=C1">
											�ǱԾ�
										</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
									<a data-toggle="collapse" data-parent="#accordian" href="prod_list.php?category=C2">
											Ŀ�����ǱԾ�
										</a>
									</h4>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="prod_list.php?category=C3">
											����ĳ����
										</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="prod_list.php?category=C4">�����</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="prod_list.php?category=C5">����</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="prod_list.php?category=C6">RC</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="prod_list.php?category=C7">���</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="prod_list.php?category=C8">�������</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="prod_list.php?category=C9">����</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="prod_list.php?category=C10">��ȭ</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="prod_list.php?category=C11">�ִϸ��̼�</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="prod_list.php?category=C12">��Ÿ</a></h4>
								</div>
							</div>
						</div><!--/category-productsr-->
						</div></div>
			<div class="col-sm-9 padding-right">
				<div class="features_items">      
					<h2 class="title text-center">Kidult Items</h2>
						<form  name="board_form" method="GET" action="prod_list.php"> 
						<div id="list_search">
							<div id="list_search1">�� �� <?= $total_record ?> ���� ��ǰ�� �ֽ��ϴ�.  </div>
							<div id="list_search2"></div>
							<div id="list_search3">
								<select name="find">
									<option value='category'>ī�װ�</option>
									<option value='name'>��ǰ��</option>
								</select></div>
							<div id="list_search4"><input type="text" name="search"></div>
							<div id="list_search5"><input type="image" src="../img/sch.png"></div>
						</div>
						</form>
						

		<div id="list_content">
<?		
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
   {
      mysql_data_seek($result, $i);       
      // ������ ���ڵ�� ��ġ(������) �̵�  
      $row = mysql_fetch_array($result);       
      // �ϳ��� ���ڵ� ��������
	  
	  
	  $num     = $row[num];
	  $model     = $row[model];
	  $name     = $row[name];
	  $category = $row[category];
	
	  $item_manufacture     = $row[manufacture];
	  $item_pro_content     = $row[pro_content];
	  $price     = $row[price];
	  $item_pro_count     = $row[pro_count];
	  $item_pro_point     = $row[pro_point];
	  $item_pro_manufacture_day     = $row[pro_manufacture_day];  
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	  $encoding = "euc-kr";
	  $charNumber = "33";
	  $subject = $name;
	  $cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);
	
?>
<div id="list_item">
	<div id="list_item1">
			<?		 
		$image_name[0]   = $row[file_name_0];
		$image_copied[0] = $row[file_copied_0];
		$imageinfo = GetImageSize("../admin_prod/data/".$image_copied[0]);
		$image_width[0] = $imageinfo[0];
		$image_height[0] = $imageinfo[1];
		$image_type[0]  = $imageinfo[2];
		$img_name = $image_copied[0];
		$img_name = "../admin_prod/data/".$img_name;
		$img_width = $image_width[0];
				
			echo "<a href='view.php?table=$table&num=$num&page=$page'><?= $item_pro_name ?><img src='$img_name' width='120' height='100' >"."</a><br><br>";
		?>
	</div>
		<div id="list_item2"><a href="view.php?table=<?=$table?>&num=<?=$num?>&page=<?=$page?>"><?= $cutExec ?></a></div>
		<div id="list_item3"><?= number_format($price) ?>��</div>&nbsp;
		<div id="list_item4">��ȸ��<?= $item_hit ?></div>
		</div>


<?
   	   $number--;
   }
?>
			<div id="page_button">
				<div id="page_num"> �� ���� &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // �Խ��� ��� �ϴܿ� ������ ��ũ ��ȣ ���

   if($mode == "")
   {
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // ���� ������ ��ȣ ��ũ ����
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='prod_list.php?table=$table&page=$i'> $i </a>";
		}      
   }

   }
   else
   {
if($mode=="prod_list")
{
$search2 = $_GET[search];
}
else if($mode=="search")
{
$search2 = $_POST[search];
}

   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // ���� ������ ��ȣ ��ũ ����
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='prod_list.php?table=$table&page=$i&mode=prod_list&find=$find&search=$search2'> $i </a>";
		}      
   }
}

?>			
			&nbsp;&nbsp;&nbsp;&nbsp;���� ��
				</div>
			</div> <!-- end of page_button -->		
        </div> <!-- end of list content -->
		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->

</div> <!-- end of wrap -->.
</div>
<footer id="footer"><!--Footer-->	
		<div class="footer-widget" style="margin-bottom:0px; margin-top:20px;">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>���� �����ŷ��� ���� ���� ������ ������</li>
								<li>���� ���θ����� ������ ���ž��� ����</li>
								<li>(�Һ������� ������ ����)�� �̿��Ͻ� �� �ֽ��ϴ�.</li>
								
							</ul>
							<h2>PETERPAN</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>[426-701] �Ȼ�� ��ϱ� �Ȼ��� 155 ������</li>
								<li>��ǥ��:����� ����ڵ�Ϲ�ȣ:211-11-01010</li>
								<li>�������� ��ȣ �� û�ҳ� ��ȣå����:�����</li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">�ǱԾ�</a></li>
								<li><a href="#">�����</a></li>
								<li><a href="#">���</a></li>
								<li><a href="#">����</a></li>
								<li><a href="#">�����</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">�̿���</a></li>
								<li><a href="#">Privecy ��å</a></li>
								<li><a href="#">ȯ����å</a></li>
								<li><a href="#">�����ý���</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>PRODUCT</h2>
							<ul class="nav nav-pills nav-stacked">
								<li>���� 9 : 00 ~ 18 : 00 / ���ɽð� 12 : 00 ~ 13 : 00</li>
								<li>�ָ� �� �������� 1:1�����ϱ⸦ �̿����ּ���.</li>
								<li>������ ���۵Ǹ� �ٷ� ó���ص帳�ϴ�.</li>
								<li><a href="#">zmfdls@peterpan.co.kr</a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row" style="margin-top:20px;">
					<p class="pull-left">Copyright �� 2016 PETERPAN Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a href="#">Themeum</a></span></p>
				</div>
			</div>
		</div>
	</footer><!--/Footer-->

</body>
</html>
