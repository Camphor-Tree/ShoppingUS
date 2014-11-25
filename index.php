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
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/offcanvas.css" rel="stylesheet">
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
            <li class="active"><a href="./">主页</a></li>
            <li><a href="./about.php">联系方式</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12">
          <div class="jumbotron">
            <h2>欢迎光临！</h2>
            <p>Logpie 致力于美国诚信代购。 初期阶段，只采用熟人介绍的方式。如有代购需求,请联系联络人。联络方式请点击上方联系方式。</p>
			      <li><b>关于物流。</b>本店采用西雅图华人快递，商品单价已包含国际运费。如需保险，可单独购买，价格为保额的3%。运送时间大约为2-3周。</li>
			      <li><b>关于关税。</b>购买额150美元以下不收额外关税。 如单件物品超出150美金，需额外收取10%的关税。</li>
			      <li><b>关于诚信。</b>本店通过联络人介绍, 信誉第一。本店代购全部来自美国官网专柜，绝无假货。</li>
			      <li><b>关于付款。</b>本店有对应的淘宝店，接受支付宝付款，或者线下交易联络人，诚信第一。</li>
			      <li><b>关于商品。</b>初期网站例举的商品不全，如有其它需要，如其他品牌的化妆品、小型电子产品、食品、保健品等，可联系代购人员。商品只限美国。</li>
          </div>
          <?php include './data/brand_list_reader.php'; $brand_array = getBrandArray();
			foreach($brand_array as $key => $category_brand_array)
			{
			?>
          <div style="color:#FF8000">
            </br>
            <h2> <?php print_r($key); ?></h2>  
          </div>
          <div class="row">
		     <?php foreach($category_brand_array as $brand) 
			 {
			 ?>
            <div class="col-xs-6 col-lg-3">
              <h3><?php if(!is_array($brand['name_cn'])) {print_r($brand['name_cn']);?>/<?php } print_r($brand['name_en'])?></h3>
              <img src="<?php print_r($brand['image'])?>" alt="<?php if(!is_array($brand['name_cn'])){print_r($brand['name_cn']);?>/<?php }print_r($brand['name_en'])?>" style="width:250px;height:200px;padding-bottom:15px;">
				  <div style="width:180px;word-break: break-all;">
				  <?php if(!is_array($brand['description']))print_r($brand['description']); ?>
			     </div>
				<div style="width:180px;word-break: break-all;">
			     <a class="btn btn-default" href="./brand.php?brand=<?php print_r($brand['name_en']);?>" role="button">查看详情 &raquo;</a>
			     </div>
				 
            </div>
			<?php } ?>
          </div>
		  <?php 
			}
		  ?>
      </div>
	  </div>
      <footer>
        <p>&copy; <b>www.logpie.com 2014</b></p>
      </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/offcanvas.js"></script>
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-57014520-1', 'auto');
  ga('send', 'pageview');
	</script>
  </body>
</html>
