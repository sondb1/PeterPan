<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http:www.w3.orf/TR/html/loose.dtd">
<html lang="en">
<head>
    <meta charset="euc-kr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<title>������</title>
	<link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/font-awesome.min.css" rel="stylesheet">
    <link href="./css/prettyPhoto.css" rel="stylesheet">
    <link href="./css/price-range.css" rel="stylesheet">
    <link href="./css/animate.css" rel="stylesheet">
	<link href="./css/main.css" rel="stylesheet">
	<link href="./css/responsive.css" rel="stylesheet">
	<link href="./css/common.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>

	<? include "./menu/top_menu1.php"; ?>

	<? include "./menu/main_meun1.php"; ?>

	<? include "./menu/slider.php"; ?>
	
		<? include "best.php"; ?>
<br><br><br><br>
		<? include "sale.php"; ?>
	
<div class=" container">.
	<style>
/* ���ٴϴ� �޴� (Floating Menu) */
#floatdiv {
    position:fixed; _position:absolute; _z-index:-1;
    width:160px; /* ������ ����*/
    overflow:hidden;
    right:45%;
    top:24%; /* �̹��� ���� ���� */
    background-color: transparent;
    margin-right: -730px; /* �¿��� ���� ���� */
    padding:0;
}#floatdiv ul  { list-style: none; }
#floatdiv li  { margin-bottom: 2px; text-align: center; }
#floatdiv a   { color: #5D5D5D; border: 0; text-decoration: none; display: block; }
#floatdiv a:hover, #floatdiv .menu  { background-color: #5D5D5D; color: #fff; }
#floatdiv .menu, #floatdiv .last    { margin-bottom: 0px; }
</style>
<!--
<div id="todayview">
<? include "./lib/todayview1.asp"; ?>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
<!--
    function fnGetTodayGoods(page)
    {
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "/productProc.asp",
            data: { mode : "TODAYGOODS" , page : page },
            success: function(toDayGoods){
                $("#historybanner").html(toDayGoods);
            }
            ,error: function(){ 
                 
            }
        });   
    }
//
</script>
<? include "./lib/todayview2.asp"; ?>
</div>

<div id="floatdiv">

<ul>
<a>�ֱٺ���ǰ</a>
<a href='./prod/cart.php' target=''><img src='./img/cart.png' /></a>
<a href='#' target=''><img src='./img/mypage.png' /></a>
<a href='#' target=''><img src='./img/delivery.png' /></a>

</ul>
</div>-->


		<? include "notice.php"; ?>
</div>	

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
								<li><a href="http://zmfdls.dothome.co.kr/peterpan/prod/prod_list.php?category=C1">�ǱԾ�</a></li>
								<li><a href="http://zmfdls.dothome.co.kr/peterpan/prod/prod_list.php?category=C4">�����</a></li>
								<li><a href="http://zmfdls.dothome.co.kr/peterpan/prod/prod_list.php?category=C7">���</a></li>
								<li><a href="http://zmfdls.dothome.co.kr/peterpan/prod/prod_list.php?category=C9">����</a></li>
								<li><a href="http://zmfdls.dothome.co.kr/peterpan/prod/prod_list.php?category=C5">�����</a></li>
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
