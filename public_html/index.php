<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<?php  
   include './cart.php';
   include './brand_list_reader.php';?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Logpie</title>
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/offcanvas.css" rel="stylesheet">
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
            <li><a href="./about.php">联系我们</a></li>
			<li><a href="./order.php">购物车<sup id="count"><?php  session_start();$cart = (new ShoppingCart); print_r($cart->getShoppingCartCount());?></sup></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
		<img src="./image/Logo.png" class="img-responsive center-block">
		<div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-12">
          <?php  $brand_array = getBrandArray();
			foreach($brand_array as $key => $category_brand_array)
			{
			?>
          <div>
				</br>
				<div style="color:#0B3861;font-size:22px;font-family:黑体;"> <?php print_r($key); ?></div>
				<hr class="style-hr">
				<style>
				hr.style-hr 
				{ border: 0; height: 1px; 
				background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
				background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
				background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
				background-image:      -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); 
				}</style>
          </div>
          <div class="row">
		     <?php foreach($category_brand_array as $brand) 
			 {
			 ?>
           <div class="col-xs-6 col-lg-3">
              <h3> <?php if(!is_array($brand['name_cn'])) 
							{ 
								print_r($brand['name_cn']);?>/<?php 	} print_r($brand['name_en']); 
							if(!is_array($brand['saledate'])) 
							{ ?>&nbsp;<img src="./image/onsale.jpg"><?php
							} ?>
			  </h3>
              <img src="<?php print_r($brand['image'])?>" alt="<?php if(!is_array($brand['name_cn'])){print_r($brand['name_cn']);?>/<?php }print_r($brand['name_en'])?>" style="width:180px;height:144px;padding-bottom:15px;">
				  <div style="width:180px;word-break: break-all;">
				  <?php if(!is_array($brand['description']))print_r($brand['description']); ?>
			     </div>
				<div style="width:180px;word-break: break-all;">
			     <a class="btn btn-default" href="./brand.php?brand=<?php print_r($brand['name_en']);?>" role="button">查看详情 &raquo;</a>
			     </div>
				 
           </div>
			<?php } ?>
          </div>
			</br>
			</br>
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
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./js/offcanvas.js"></script>
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
