<?
session_start();
 $view_arr = explode(",",$_COOKIE['goods_view']); 
if( array_search($_GET['Code'], $view_arr) === false) 
{ 
    setcookie("goods_view", $_COOKIE['goods_view'].",".$_GET['Code'].",".$_GET['CatNo'],time() + 86400,"/"); 
} 
?> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/concert.css" rel="stylesheet" type="text/css" media="all">

	<?

	$num=$_GET[num];
include "../lib/dbconn.php";
	
			


	$sql = "select * from peterpan_product where num=$num";



	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);  
	
	$prodnum=$row[num];
	$_SESSION['num']=$prodnum;

	if($prodnum == null)
	{
		$_SESSION['num1']=$prodnum;
	}

		

      // �ϳ��� ���ڵ� ��������
	
	$item_num     = $row[num];
	$item_pro_id     = $row[model];
	$item_pro_name     = $row[name];
	/*$item_pro_brand = $row[pro_brand];*/
	$item_pro_category = $row[category];
	  /*$pro_category = explode("/", $row[pro_category]);
	  $item_user = $pro_category[0];
	  $item_f_category = $pro_category[1];

	  $item_s_category = $pro_category[2];*/
	/*$item_manufacture     = $row[manufacture];*/
	$item_pro_content     = $row[content];
	$item_pro_price     = $row[price];
	$item_pro_count     = $row[count];
	$item_pro_point     = $row[point];
/*	$item_pro_manufacture_day     = $row[pro_manufacture_day];  */
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];


	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}
	
	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("../admin_prod/data/".$image_copied[$i]);

			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update peterpan_product set hit=$new_hit where num=$num";   // �� ��ȸ�� ������Ŵ
	mysql_query($sql, $connect);
?>

	<? include "../menu/top_menu2.php"; ?>
<!-- �ι��� ��� �޴� -->
    <? include "../menu/main_meun2.php"; ?>

 

	<section>
		<div class="container">
<!--<?include "../lib/todayview.asp";?>-->
	<form  name="itemForm" method="post" action="cart_save.php" enctype="multipart/form-data"> 
	<input type="hidden" name="mode" value="">
	<input type="hidden" name="page" value="<?=$page?>">
	<input type="hidden" name="i_idx" value="<?=$item_pro_id?>">
<input type="hidden" name="num" value="<?=$num?>">
	<input type="hidden" name="price" value="<?=$item_pro_price?>">

 <div class="col-sm-9 padding-right"style="margin-left:100px;">
	<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product">

			<? $img_name = $image_copied[0];
			$img_name = "../admin_prod/data/".$img_name;
			$img_width = $image_width[0];?>
			<!-- <div style="margin-left:-200px;"> -->
			
			<?echo "<img src='$img_name'>"."<br><br>";
			?>
			</div>
			</div>


		<div class="col-sm-7" >
							<div class="product-information"style="
    padding-top: 30px;
    padding-bottom: 20px;
"><!--/product-information-->	
							<div id="intro1"><?= $number ?></div>
								<h2>��ǰ�� : <?= $item_pro_name ?></h2>
								<p>ī�װ� : <?= $item_pro_category ?></p>
								<span>
									<span><?= number_format($item_pro_price) ?>��</span>
								</span>
									<p>������ : <?= number_format($item_pro_point) ?></p>
									<p><label>���� ���� : </label>
									<input type="number" name="cart_count" onChange="caluate_item();" style="width:54px;" value="1">��</p>
       
	
									<p><label>�Ѱ��� : &nbsp;&nbsp;&nbsp;&nbsp;</label>
									<input type="text" name="cart_price" size="18"  style="width:104px;" value="<?=$item_pro_price?>" readOnly>��</p>
									<button type="button" class="btn btn-fefault cart" onClick="cart_save('cart');">
										
										��ٱ���
									</button>
									<button type="button" class="btn btn-fefault cart" onClick="cart_save('direct');">
									
										�ٷα��� 
									</button>
									<button type="button" class="btn btn-fefault cart" onClick="location.href='prod_list.php?table=<?=$table?>&page=<?=$page?>';">
										
										���
									</button>
							
								<p><b>�����:</b> <?= $item_date ?></p>
								<p><b>��ȸ��:</b> <?= $item_hit ?></p>
								<p><b>�귣��:</b> PETERPAN</p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->

		<div id="intro14"><?= $item_pro_content ?></div>
<?
	for ($i=1; $i<3; $i++)
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "../admin_prod/data/".$img_name;
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>

<!--onClick="cart_save('direct');"-->
		</form>
		<script>
// ���� �˻� �� �� ���� ����� �Լ�
function caluate_item()
{
    var f = document.itemForm;
    var cnt_obj = f.cart_count;    // ����

    if(cnt_obj.value == ""){
        alert("���ż����� �Է��� �ּ���.");
        return false;
    }

	else if(cnt_obj.value == "0"){
        alert("���ż����� ���������� �Է����ּ���.");
        return false;
    }
	
	
	
	else{
        // �������� �˻�
        for (var i = 0; i < cnt_obj.value.length; i++){

            if (cnt_obj.value.charAt(i) < '0' || cnt_obj.value.charAt(i) > '9'){ 
                alert("���ż����� ���������� �Է����ּ���.");
                return false;
            }
        }
    }

    // ������ ������ ���� �Ѱ����� ����
    var price = parseInt(f.price.value) * parseInt(cnt_obj.value);

    f.cart_price.value = price;

    return true;
}

// �Է��ʵ� �˻��Լ�
function cart_save(arg)
{
    // form �� f �� ����
    var f = document.itemForm;

    // �����˻� �� ��ٱ��ϴ������ �ٷα������� ���� mode �� ���� �� �����
    if(caluate_item()){
        f.mode.value = arg
        f.submit();
    }

}
</script>


		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->


				</div>
			</div>
		</div>
	</section>
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