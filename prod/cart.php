<? 
	session_start(); 
	$id=$_SESSION['userid'];

	$num=$_GET[num];

?>

<!doctype html>
 <head>
  <meta charset="euc-kr">
  <title>��ٱ���</title>
<style>
#content #col2 {
	width:807px;
	height:2000px;
	min-height:558px;
	float:left;
	margin-left:15px;
	margin-top:55px;
/*	border:solid 1px #cccccc; */
}

#content #col2 #title{
	margin-top:30px;
	height:60px;
	margin-bottom:20px;
		border-bottom:solid 1px #BDBDBD;

}
#od {
	height:40px;
	padding:7px;  
	border-top:solid 3px #000000;
	
	background-color:#eeeeee;
	
	font-size:14px;
}

#od li {
	display:inline;
}

#od #od1 {
	width:100px;
	margin-left:15px;
}

#od #od2 {
	margin-left:130px;
}

#od #od3 {
	margin-left:140px;
}

#od #od4 {
	margin-left:40px;
}

#od #od5 {
	margin-left:40px;
}

#od #od6 {
	margin-left:40px;
}



#list_content {
	height:80px;
}
#odlist_item {
	height:30px;
	margin-top:2px;
	padding:40px; 

	
}

#odlist_item #odlist_item1{
	float:left;
	width:100px;
	margin-left:0px;
	text-align:center;
}

#odlist_item #odlist_item2{
	float:left;
	width:100px;
	margin-left:70px;
	text-align:center;
}

#odlist_item #odlist_item3{
	float:left;
	width:100px;
	margin-left:120px;
	text-align:center;
}

#odlist_item #odlist_item4{
	float:left;
	width:80px;
	margin-left:0px;
	text-align:center;
}

#odlist_item #odlist_item5{
	float:left;
	width:70px;
	margin-left:10px;
	text-align:center;
}

#odlist_item #odlist_item6{
	float:left;
	width:50px;
	margin-left:27px;
	text-align:center;
}
#con_odcharge {
	margin-top:10px;
	height:70px;
}
#odcharge {
	height:0px;
	margin-top:2px;
	padding:0px; 

	border-bottom:solid 1px #BDBDBD;
}

#odcharge #odcharge_item1{
    float: right;
    width: 230px;
    margin-left: -60px;
    padding-top: 45px;
    text-align: left;
}

#all_ord {
	margin-top:50px;
	height:215px;
	border-bottom:solid 3px #fe980f;
	border-top:solid 3px #fe980f;
	border-left:solid 3px #fe980f;
	border-right:solid 3px #fe980f;
}
#all_od {
	height:0px;
	margin-top:2px;
	padding:0px; 

	
}

#all_od #all_od1{
	
	width:500px;
	font-size:13px;

	padding-top:0px;
	
}
#all_od #all_od2{
	border-bottom:solid 1px #BDBDBD;
	width:250px;
	margin-left:520px;
	margin-top:-25px;
	text-align:left;
}
#all_od #all_od3{
	margin-top:20px;
	width:250px;
	margin-left:520px;
	border-bottom:solid 1px #BDBDBD;
	text-align:left;
}
#all_od #all_od4{
	margin-top:-65px;
	width:120px;
	margin-left:650px;
	text-align:right;
}
#all_od #all_od5{
	margin-top:22px;
	width:100px;
	margin-left:670px;
	text-align:right;
}

#all_od #all_od6{

	border-top:1px dashed #BDBDBD;
	margin-right:0px;
	margin-top:35px;
	padding-top:10px;
	text-align:center;
}

#all_od #all_od7{

	
	float:right;
	margin-right:170px;
	
	margin-top:-10px;
	padding-top:10px;
	text-align:center;
}

#all_od #all_od8{

	
	float:right;
	margin-right:-250px;
	margin-left:0px;
	font-size:20px;
	color:#FF0000;
	padding-top:10px;
	margin-top:-20px;
	text-align:center;
}
.big_button {
  clear:both;
  display:block;
  width:30%;
  margin:0 auto;
  padding-top:15px;
  padding-bottom:10px;
  color:#fff;
  font-size:1.2em;
  text-decoration: none;
  background:#FE980F;
  text-align:center;
  border-bottom: 3px solid #f06d06;
  border-radius: 2px;
}

</style>
 </head>
 <body>
<!-- ù��° ��� �޴� -->
    <? include "../menu/top_menu2.php"; ?>
 <!-- �ι��� ��� �޴� -->
    <? include "../menu/main_meun2.php"; ?>



	<!--	<div class="clear">�ֹ�������</div>
		<div id="allod_infor">
		<div id="od_infor" >
				<div id="od_infor1">�̸�</div>
				<div id="od_infor2">�载��</div>
				<div id="od_infor3">�̸���</div>
				<div id="od_infor4">�̸����� ��ǲ�ڽ��� ������</div>
				<div id="od_infor5">����ó</div>
				<div id="od_infor6">����ó�� ��ǲ�ڽ��� ������</div>
		</div>
		</div>

		<div class="clear">���������</div>
		<div id="allod_infor">
		<div id="od_infor" >
				<div id="od_infor1">�̸�</div>
				<div id="od_infor2">�载��</div>
				<div id="od_infor3">����ó1</div>
				<div id="od_infor4">����ó�� ��ǲ�ڽ��� ������</div>
				<div id="od_infor5">����ó2</div>
				<div id="od_infor6">����ó�� ��ǲ�ڽ��� ������</div>
				<div id="od_infor7">�ּ�</div>
				<div id="od_infor8">�ּҸ� ��ǲ�ڽ��� ������</div>
				<div id="od_infor9">���ּ�</div>
				<div id="od_infor10">���ּҸ� ��ǲ�ڽ��� ������</div>
				<div id="od_infor11">�ֹ��޼���</div>
				<div id="od_infor12">�޼����� ��ǲ�ڽ��� ������</div>
		</div>
		</div>
		<br>

		<br>
		<br>
		<div class="clear">�������Ա��ڸ�</div>
		<div id="allod_infor">
		<div id="od_infor" >
				<div id="od_infor1">�̸�</div>
				<div id="od_infor2">�̸��������ǲ�ڽ�</div>
		</div>
		</div>
	
		<div class="clear">����Ʈ���</div>
		<div id="allod_infor">
		<div id="od_infor" >
				<div id="od_infor99">��ǲ�ڽ�</div>
				<div id="od_infor98">����ư</div>
		</div>
		</div>-->
		
		

	<?	include "../lib/dbconn.php";

	  

	$sql = "select * from  peterpan_cart where id='$id'";
	$result = mysql_query($sql, $connect);
	?>


	


	</div>
 </div>
</body>
</html>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="../main.php">Home</a></li>
				  <li class="active">��ٱ���</li>
				</ol>
			</div>
			<div class="table-responsive cart_info" style="
    margin-bottom: 20px;
">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">����</td>
							<td class="description">��ǰ��</td>
							<td class="price">�ǸŰ���</td>
							<td class="quantity">����</td>
							<td class="total">�ֹ��ݾ�</td>
							<td class="total">����Ʈ</td>
							<td class="total">���</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?
						 while($row = mysql_fetch_array($result))

{
		$sql = "select * from peterpan_product where model='$row[pro_id]'";
	$resultt = mysql_query($sql, $connect);

    $roww = mysql_fetch_array($resultt); 

	
?>
						<tr>

							<td class="cart_product" style="margin-left:0px;">
								<a href="../prod/view.php?num=<?=$roww[num]?>"><img src=../admin_prod/data/<?=$roww[file_copied_0]?> width="100"></a>
							</td>
							<td class="cart_description">
								<h4><a href="../prod/view.php?num=<?=$roww[num]?>"><?=$row[pro_id]?></a></h4>
							</td>
							<td class="cart_price">
								<p><?=number_format($roww[price])?>��</p>
							</td>
							<td class="cart_price">
								<div class="cart_quantity_button">
							
								<p>	<?=$row[cart_count]?>�� </p>
								
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?=number_format($row[cart_count] * $roww[price]) ?>��</p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?=number_format($roww[point]*$row[cart_count] )?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="delete.php?num=<?=$row[num]?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>

												<?
}
		?>

					</tbody>
				</table>

						<div id="con_odcharge">
			<div id="odcharge"> <? $sql = "select sum(cart_price) as total from  peterpan_cart where id = '$id'";
		$resulttt = mysql_query($sql, $connect);
		$rowww = mysql_fetch_array($resulttt);
		$totalcount = $rowww['total'] +1; 


			 $total_record = mysql_num_rows($result);
			?>
				<div id="odcharge_item1">   
				
				<?if  ($rowww['total'] >= "70000")
				{?>
					��ۺ� �����Դϴ�
				<?}
				
				else
				
				{?>
��ۺ� <?=number_format($total_record *2500)?>��
				<?}?>
				
				
				<Br>
				*7�����̻�� ��ۺ�� �����Դϴ�.</div>
			</div>
		</div>

	
		<div id="all_ord" style="
			margin-top: 20px;
			padding-top: 30px;">
			<div id="all_od">
				<div id="all_od1"><h3>���ֹ��ݾ�</h3></div>
				<div id="all_od2" style="margin-left: 450px;">��ǰ�ѱݾ�</div>
				<div id="all_od3" style="margin-left: 450px;">��ۺ�</div>
				<div id="all_od4" style="margin-left: 550px;"><?=number_format($rowww['total'])?>��</div>
				<div id="all_od5" style="margin-left: 570px;"><?if  ($rowww['total'] >= "70000")
				{?>
					����
				<? $total_record_o = 0;}
				
				else
				
				{
					
					 $total_record_o = $total_record *2500?>

 <?=

 number_format($total_record_o)?>��
				<?}?>
				</div>
				<div id="all_od6"></div>
				<div id="all_od7"><h4>���� �����ݾ�</h4></div>
				<div id="all_od8"><h3><?=number_format($rowww['total'] +$total_record_o)?> ��</h3></div>
			</div>
		</div>

			</div>


			
			<a class="big_button" id="" href="../order/order_ck.php?orderclick=<?=$rowww['total']?>">�ֹ� �ϱ�</a>
			<br>
			<a class="big_button" id="" href="../prod/prod_list.php">��Ӽ����ϱ�</a>
			
		</div>
	</section> <!--/#cart_items-->

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
