<head>
<meta charset="euc-kr">
<link href="css/main.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
</head>
<style>

#myshopMain {
    margin: 40px 0 0 -40px;
    border-top: 0px solid #333;
    border-bottom: 0px solid #333;
}
strong, b {
    font-weight: bold;
}
#myshopMain .shopMain {
    background: url(../img/bg_myshop1.gif) no-repeat center 25px;
    width: 270px;
    float: left;
    margin: 0 0 40px 40px;
}
#myshopMain .shopMain.order {
    background-image: url(../img/bg_myshop1.gif);
}
#myshopMain .shopMain.profile {
    background-image: url(../img/bg_myshop2.gif);
}
#myshopMain .shopMain.wishlist {
    background-image: url(../img/bg_myshop3.gif);
}
#myshopMain .shopMain.mileage {
    background-image: url(../img/bg_myshop4.gif);
}
#myshopMain .shopMain.coupon {
    background-image: url(../img/bg_myshop5.gif);
}
#myshopMain .shopMain.address {
    background-image: url(../img/bg_myshop6.gif);
}
#myshopMain .shopMain.deposits {
    background-image: url(../img/bg_myshop7.gif);
}
#myshopMain .shopMain.board {
    background-image: url(../img/bg_myshop8.gif);
}
#myshopMain .shopMain h3 a {
    text-decoration: none;
    color: #969696;
    font-family: arial;
    font-size: 12px;
    border: 1px solid #dcdcdc;
    display: block;
    padding: 70px 0 0 0;
    height: 110px;
    text-align: center;
    letter-spacing: 0.5px;
}
a {
    text-decoration: none;
    color: #000;
}
.displaynone {
    display: none;
}
.displaynone {
    display: none !important;
}
#wrap{
	position: relative; 
	width: 1200px; 
	margin: 30px auto 0; 
	padding: 0 50px;
}
.xans-myshop-bankbook ul {
    display: table;
    width: 100%;
    min-width: 756px;
    font-size: 10px;
    line-height: 0;
}
.xans-myshop-benefit {
    margin: 0 0 20px;
}
.xans-myshop-benefit .infoWrap {
    overflow: hidden;
    padding: 10px 10px 10px 90px;
    border: 1px solid #d9d9d9;
    color: #353535;
}
.xans-myshop-benefit .myThumb {
    float: left;
    margin: 0 0 0 -80px;
}
.xans-myshop-benefit .myInfo {
    padding: 8px 0 8px 20px;
    border-left: 1px solid #e8e8e8;
}
.xans-myshop-bankbook {
    overflow: hidden;
    padding: 15px 0 15px 10px;
    border: 1px solid #e8e8e8;
    background: #fff;
}
.xans-myshop-bankbook li {
    display: inline-block;
    position: relative;
    overflow: hidden;
    width: 50%;
    margin: 1px 0 2px;
    font-size: 12px;
    color: #353535;
    line-height: 24px;
    vertical-align: top;
    background: url(../img/ico_myshop.gif) no-repeat 40px 9px;
}
li {
    list-style: none;
}
.xans-myshop-bankbook li .title {
    float: left;
    width: 30%;
    padding: 0 0 0 49px;
    font-weight: normal;
    font-size: 11px;
}
.xans-myshop-bankbook li .use {
    color: #000;
}
.xans-myshop-bankbook li .data {
    float: right;
    width: 35%;
    padding: 0 72px 0 0;
    text-align: right;
    font-size: 12px;
}
#container {
    width: 1200px;
    margin: 0 auto;
}
</style>
<? session_start(); 
$table = "peterpan_order";
$id = $_SESSION['userid'];
$name = $_SESSION['username'];

include "../lib/dbconn.php";

?>
<!-- ù��° ��� �޴� -->
    <? include "../menu/top_menu2.php"; ?>
 <!-- �ι��� ��� �޴� -->
    <? include "../menu/main_meun2.php"; ?>
	<section>
	<div class="container" >

        <div id="contents">
            
<div class="xans-element- xans-layout xans-layout-logincheck ">
</div>
<div class="xans-element- xans-myshop xans-myshop-benefit">
<div class="infoWrap">

        <p class="myThumb">
			</p>
        <div class="myInfo">
            <p class="">���� ���θ��� �̿��� �ּż� �����մϴ�. <strong class="name"><span><!--�̸�---------------------></span></strong><?=$name?> ��</p>
        </div>
     </div>
</div>

<?
	$sql = "select * from peterpan_member where id='$id'";
	$result = mysql_query($sql, $connect);
    $row = mysql_fetch_array($result);   

	$t_price = $row[order_price];
	$t_point = $row[point];
	$t_address = $row[address];
?>

<div class="xans-element- xans-myshop xans-myshop-bankbook" >
<ul>
<li>
            <strong class="title">
	<!--��������Ʈ-->ID</strong>
            <strong class="data use">&nbsp;<!--��밡������Ʈ--------------------><?=$id?></strong>
          
        </li>
        <li>
            <strong class="title">������Ʈ</strong>
            <strong class="data"> <!--������Ʈ-------------> <?=$t_point?></strong>
        </li>
        <li>
            <strong class="title">�ּ�<!--���������Ʈ---------------></strong>
            <strong class="data" style="width:380px;"><!--���������Ʈ---------------><?=$t_address?></strong>
        </li>
        <li>
            <strong class="title">���ֹ���</strong>
            <strong class="data"><!--���ֹ���----------------><?=number_format($t_price)?>&nbsp;��</strong>
        </li>
    </ul>
</div>

	<div id="myshopMain" class="xans-element- xans-myshop xans-myshop-main "><div class="shopMain order">
        <h3><a href="../prod/cart.php"><strong>��ٱ���</strong></a></h3>      
    </div>

	<div class="shopMain profile">
        <h3><a href="../member/member_form_modify.php"><strong>��������</strong></a></h3>        
    </div>

	<div class="shopMain mileage">
        <h3><a href="../order/finishorder.php"><strong>�ֹ�/���</strong></a></h3>
    </div>

	<div class="shopMain address">
        <h3><a href="mypage_delform.php"><strong>ȸ��Ż��</strong></a></h3>
    </div>

	<div class="shopMain board">
        <h3><a href="mypage_bod.php"><strong>�������ۺ���</strong></a></h3>
    </div>
</div>
      
</section>
<footer id="footer" style="margin-top:150px;"><!--Footer-->	
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
