   <?session_start(); 
   $id=$_SESSION['userid'];
   $table = "peterpan_order";
   $mode=$_GET[mode];
   $search=$_POST[search];
   $find=$_POST[find];
   $bureum=$_GET[bureum];
   include "../lib/dbconn.php";
   ?>
 

	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">


<?$userdate = $_GET[userdate];
$search = $_GET[search];?>

<? $today1 = date("Y-m-d"); ?>
	<?$today2 = date('Y-m-d', strtotime($userdate.'-0 day'));  ?>
	<?$today3 = date('Y-m-d', strtotime($search.' -0 day'));  ?>


<?$userdate1 = date('Y-m-d', strtotime($userdate.'-0 day'));  ?>
	<?$search1 = date('Y-m-d', strtotime($search.' -0 day'));  ?>
<?	include "../lib/dbconn.php";
	$scale=10;			// �� ȭ�鿡 ǥ�õǴ� �� ��

 

?>

<head>
<meta charset="euc-kr">
</head>
<body>
<!-- ù��° ��� �޴� -->
    <? include "../menu/top_menu2.php"; ?>
 <!-- �ι��� ��� �޴� -->
    <? include "../menu/main_meun2.php"; ?>
<title>�ֹ���ǰ����</title>
<section>
	<div class="container" >


<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb" style="margin-bottom: 50px;">
				  <li><a href="#">Home</a></li>
				  <li class="active">�ֹ���ǰ����</li>
				</ol>
			</div>

<table>
<tr>
<td ><form id="frm" action="finishorder.php?mode=days">
    <div style="margin-top:15px;">��¥ �Է�&nbsp;:&nbsp;&nbsp;
	<input type="date" id="userdate" name="userdate" value="<?=$today2?>">&nbsp;&nbsp;&nbsp;&nbsp;~&nbsp;&nbsp;</div>

</td>
<td>
    <div>
	<input type="date" id="search" name="search" value="<?=$today3?>">
   <input type="submit" value="����"></div>
</form>
</td>
</tr>
</table>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
						<td class="daya" align="center" width="200">��¥</td>
							<td class="imgg" align="" width="200"><div style="margin-left:10%;">����</div></td>
							<td class="description"><div style="margin-left:-310%;">��ǰ��</div></td>
							<td class="pricee" align="center"><div style="margin-left:-220%;">�ǸŰ���</div></td>
							<td class="quantity" align="center"><div style="margin-left:-180%;">����</div></td>
							<td class="total1" align="center"><div style="margin-left:-300%;">�ֹ��ݾ�</div></td>
							<td class="total2" align="center"><div style="margin-left:-180%;">�ֹ�ó������</div></td>
							<td class="total3" ><div style="margin-left:-170%;">���</div></td>
							<td></td>
						</tr>
					</thead>
					

<?
	if($userdate){
	$sql = "SELECT * FROM $table where id = '$id' and order_day>='$userdate1'  and order_day <='$search1' order by num DESC";


		}
		
		else{
     $sql = "SELECT * FROM $table where id = '$id'  order by num DESC " ;

		}
	 $result = mysql_query($sql, $connect);

	 while($roww = mysql_fetch_array($result))
	 {
			
			$pro_name = $roww[product_name];
			$pro_price = $roww[product_price];
			$pro_count = $roww[product_count];
			$pro_progress = $roww[progress];
			$pro_name = $roww[product_name];
					$dayy	=	$roww[order_day];
                     $dayy = date('Y-m-d');
					$dayyy = date('Y-m-d',strtotime($dayy.' +0 day'));
				
			$sql = "select * from peterpan_product where num  = '$pro_name'";
			$resultt = mysql_query($sql, $connect);

			$rowa = mysql_fetch_array($resultt); 

				$encoding = "euc-kr";
			$charNumber = "25";
			$subject = $rowa[name];
			$cutExec = mb_strimwidth($subject, 0, $charNumber, "...", $encoding);


?>
			<tbody>
						<tr>
						
						<td class="cart_product" >
						<div style="margin-top:20%;">
								<h4><?=$roww[order_day]?>
							</div>
							</td>
							
							
							<td class="cart_product">
							<div style="margin-left:80%;margin-top:-40%">
								<a href="../prod/view.php?num=<?=$rowa[num]?>"><img src=../admin_prod/data/<?=$rowa[file_copied_0]?> width="100"></a>
							</div>
							</td>
							
							
							<td class="cart_description">
							<div style="padding-left:35%;">
								<h4><a href="../prod/view.php?num=<?=$rowa[num]?>"><?=$cutExec ?>
							</a></h4>
							</div>
							</td>
							
							<td class="cart_price">
							<div style="margin-top:35%">
								<p><?=number_format($rowa[price])?></p>
							</div>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<div class="cart_quantity_button">
								<div style="margin-top:25%;margin-left:30%">
								<p>	<?= $pro_count ?>�� </p>
								</div>
								</div>
								</div>
							</td>
							<td class="cart_total">
							<div style="margin-top:15%">
								<p class="cart_total_price"><?=number_format($pro_price )?>��</p>
							</div>



							</td>
							<td class="cart_price">
							<div style="margin-top:15%">
								<p><?=$roww[progress]?></p>
								<?if($roww[progress] == "�����")
								
								
		 {?>



<script type="text/javascript">

<!--
function popupOpen(){
	 var idx = "<?php echo $idx?>";
	var popUrl = "order_info.php?num=<?echo($roww[num]);?>)";	//�˾�â�� ��µ� ������ URL
	var popOption = "width=370, height=360, resizable=no, scrollbars=no, status=no;";    //�˾�â �ɼ�(optoin)
		window.open(popUrl,"",popOption);
	}
//-->
</script>
			<p><a href="javascript:popupOpen();">�������</a></p>

	 <?}?>
		

<script type="text/javascript">


function check_div(){
	var popUrl =  "order_info.php?num=<?=$roww[bureum]?>";	//�˾�â�� ��µ� ������ URL
	var popOption = "width=370, height=360, resizable=no, scrollbars=no, status=no;";    //�˾�â �ɼ�(optoin)
		window.open(popUrl,"",popOption);
	}

</script>

							</div>
							</td>
					<td class="cart_delete" >
							<div style="margin-left:20%">
							<?if($roww[progress] == "�ԱݿϷ�" || $roww[progress] == "�Աݴ��")
		 {?>
						<a class="cart_quantity_delete" href="delete.php?num=<?=$roww[num]?>"><i class="fa fa-times">�ֹ����</i></a>
			 <?}
			 else
			 {?>

			 <?}?>
							</div>
							</td>
						</tr>

					</tbody>
									
					
					<?
				 }
?>

			

		</table>



			</div>
		</div>
	</section> 
	</div>
	</section>
	<footer id="footer" style="margin-top:80px;"><!--Footer-->	
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