<!DOCTYPE html>
<?php include './cart.php';?>
<html lang="zh-cmn-Hans">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Logpie</title>
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/offcanvas.css" rel="stylesheet">
  </head>

  <body style="font-family:微软雅黑">
    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">欢迎来到Logpie</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="./">主页</a></li>
            <li class="active"><a href="./about.html">联系我们</a></li>
			 <li><a href="./order.php">购物车<sup id="count"><?php  session_start();$cart = (new ShoppingCart); print_r($cart->getShoppingCartCount());?></sup></a></li>
			 <li><a href="./message.php">给我留言</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-12">
          <!--
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          -->
		  <div class="jumbotron">
      <br/>
			<h2>Logpie条款与细则</h2>
			<p style="font-size:14px">* Logpie 致力于美国诚信代购。 初期阶段，只采用熟人介绍的方式。如有代购需求,请联系联络人。</p>
      <br/>
			      <li style="font-size:18px"><b style="font-size:20px">关于商品。</b>本店所有代购商品均来自美国官网或专柜，绝无假货。</li>
			      <li style="font-size:18px"><b style="font-size:20px">关于价格。</b>本店商品单价已包含国际运费，国内运费需自理。如需保险，可单独购买，价格为保额的3%。购买额150美元以下不收额外关税。 如单件物品超出150美金，需额外收取10%的关税。</li>
			      <li style="font-size:18px"><b style="font-size:20px">关于订金。</b>本店为保证双方利益，采取先收50%订金、货到后再补齐余款的形式收费。若因货品库存原因缺货，订金全部退还。但如出于个人原因跑单，恕不退定金，敬请谅解。本店有对应的淘宝店，接受支付宝付款。<a href="http://item.taobao.com/item.htm?spm=a1z10.5.w4002-5486618496.11.UCZlu4&id=42667549639" target="_blank">淘宝链接请戳这里</a></li>
			      <li style="font-size:18px"><b style="font-size:20px">关于物流时间。</b>本店代购时长为1-7个工作日不等，国际物流需2-3周。如遇节假日有延误，还请谅解。</li>
			      <li style="font-size:18px"><b style="font-size:20px">关于售后。</b>本店不提供试穿服务，请各位用户参照网站尺码进行选择。如因尺寸不合适、色差、质地或主观原因，恕不能退货。</li>
            <li style="font-size:18px"><b style="font-size:20px">关于票据。</b>如有需要，本店提供电子版票据。</li>
            <li style="font-size:18px"><b style="font-size:20px">关于评价。</b>您的评价对本店非常重要，如有任何意见建议，欢迎留言。初期网站例举的商品不全，如有其它需要，如其他品牌的化妆品、小型电子产品、食品、保健品等，可联系Logpie官方微信。商品只限美国。</li>
			<br/>
      <br/>
			<h2>联系方式</h2>
			<br/>
        <p style="font-size:20px;">Logpie官方微信：logpiezxqy</p>
        <br/>
				<p style="font-size:20px">苏州地区联系人：乔虾米
					<li style="font-size:16px">Email:qiaomengying03@163.com</li>
					<li style="font-size:16px">QQ:278489810</li>
				</p>
        <p style="font-size:20px">新疆地区联系人：司女士
          <li style="font-size:16px">QQ:573841150</li>
        </p>
				<p style="font-size:20px">美国代购联系人：许小莫
					<li tyle="font-size:16px">Email:xujiahang11@gmail.com</li>
					<li tyle="font-size:16px">QQ:313541388</li>
				</p>
          </div>
      </div><!--/row-->

      <hr>
	  </div>
      <footer>
        <p>&copy; <b>www.logpie.com 2014</b></p>
      </footer>

    </div><!--/.container-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <script src="../js/offcanvas.js"></script>
  </body>
</html>
