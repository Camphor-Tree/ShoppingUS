
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Logpie</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/offcanvas.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57014520-1', 'auto');
  ga('send', 'pageview');
	</script>
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
          <a class="navbar-brand" href="#">欢迎来到Logpie</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">主页</a></li>
            <li><a href="./about.html">联系方式</a></li>
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
            <h2>欢迎光临！</h2>
            <p>Logpie 致力于美国诚信代购。 现初期阶段,只采用熟人介绍的方式。如有代购需求,请当面联系联络人。联络方式请点击上方联系方式。</p>
			      <li><b>关于物流。</b>本店采用西雅图同舟华人快递。根据重量，价格在20~50刀左右。可以购买保险,价格为保额的3%。时间大约为2~3周。</li>
			      <li><b>关于关税。</b>购买额150美元以下不收关税。 如超过，物流公司会收取10%左右的关税。</li>
			      <li><b>关于诚信。</b>本店完全通过联络人介绍, 美国代购人员是联络人的多年朋友，信誉第一。</li>
			      <li><b>关于付款。</b>我们有对应的淘宝店。可以支付宝付款，或者线下交易联络人，谢绝还价。</li>
			      <li><b>关于商品。</b>本网站例举的商品不全，如有其它需要，如各品牌的化妆品、护肤品、小型电子产品、食品、保健品等，可联系代购人员。商品只限美国。</li>
          </div>
          <?php
            include './data/brand_product_reader.php';
            $product_array = getProductsBrandArray();
            $current_brand=$_GET["brand"];
            $brand_product_array  = $product_array[$current_brand];
          ?>
		  
          <div style="color:#FF8000">
            <br/>
            <h2> <?php print_r($current_brand); ?></h2>  
          </div>
          <div class="row">
		     <?php foreach($brand_product_array as $product) 
			 {
			 ?>
            <div class="col-xs-6 col-lg-3">
              <h3><?php print_r($product['name'])?></h3>
              <img src="<?php print_r($product['image'])?>" alt="<?php print_r($product['name'])?>" style="width:180px;height:180px;padding-bottom:10px;">
				  <div style="width:180px;word-break: break-all;">
				  <!--Description-->
				  <?php if(!is_array($product['description']))print_r($product['description']); ?>
			     </div>
				<div style="width:180px;word-break: break-all;">
				  价格: <?php print_r($product['price']); ?> <?php if(!is_array($product['unit']))print_r($product['unit']);?>
         
			     <a class="btn btn-default" href="#" role="button">查看详情 &raquo;</a>
			     </div>
				 
            </div>
			<?php } ?>
          </div>

      </div>

      <hr>
	  </div>
      <footer>
        <p>&copy; <b>www.logpie.com 2014</b></p>
      </footer>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="js/offcanvas.js"></script>
  </body>
</html>
