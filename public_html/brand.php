
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
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/offcanvas.css" rel="stylesheet">

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
          <a class="navbar-brand" href="./">欢迎来到Logpie</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="./">主页</a></li>
            <li><a href="./about.php">联系我们</a></li>
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
          <?php
            include './brand_product_reader.php';
            include './brand_list_reader.php';
            $product_array = getProductsBrandArray();
            $current_brand = $_GET["brand"];
           
			 if(array_key_exists ( $current_brand , $product_array ))
			 {
			  $brand_product_array  = $product_array[$current_brand];
        $brand_info = getBrandByName($current_brand);
          ?>
		  
          <div style="color:#FF8000;font-family:黑体;">
            <br/>
            <b style="font-size:22px;"> <?php print_r($current_brand); 
                if(!empty($brand_info['name_cn']))
                {
                  print_r("/".$brand_info["name_cn"]);
                }
                  if(!empty($brand_info["saledate"]))
                  { ?> <img src="./image/onsale_large.png"></b>
            <b style="color:#DF0101;font-size:18px;"> &nbsp;<?php   
                  print_r($brand_info["saledate"]);
                  } 
                 ?>
            </b>
          </div>
          <div class="row">
		     <?php foreach($brand_product_array as $product) 
			 {
			 ?>
            <div  style="color:#424242;" class="col-xs-6 col-lg-3">
              <h3><?php print_r($product['name'])?></h3>
              <img src="<?php print_r($product['image'])?>" alt="<?php print_r($product['name'])?>" style="width:180px;height:180px;padding-bottom:10px;">
				<div style="color:#585858;width:180px;word-break: break-all;">
				<!--Description-->
				<?php if(!is_array($product['description']))print_r($product['description']); ?>
				</div>
				</br>
				<div style="width:180px; word-break: break-all;">
				规格:&nbsp; <?php if(!is_array($product['size']))print_r($product['size']); ?>
				</div>
				<div style="width:180px; word-break: break-all;">
				本店价格:&nbsp; <b style="color:#045FB4;"><?php if(!is_array($product['price']))
								{
									print_r($product['price']);
									?>
							</b> <?php if(!is_array($product['unit']))
											print_r($product['unit']);
								} else {
									print_r("暂无价格");
								} ?>
				</div>
				<div style="width:180px; word-break: break-all;">
				折扣价:&nbsp; <?php if(!is_array($product['saleprice']))
								{ ?> <b style="color:#DF0101;"> <?php
									print_r($product['saleprice']);
									?> </b> <?php if(!is_array($product['unit']))
														print_r($product['unit']);
								} else {?> <b>暂无折扣，敬请关注</b> <?php } ?>
				</div>
            </div>
			<?php } ?>
			<h3>&nbsp;&nbsp;</h3>
			<img src="./image/want_more.jpg" alt="想要更多？" style="width:250px;height:250px;">
          </div>
		  <?php } else {?>
		    <div style="color:#FF8000">
            <br/>
            <h2> 暂无该品牌商品</h2>  
          </div>
		  <?php } ?>

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
    <script src="./bootstrap/js/bootstrap.min.js"></script>

    <script src="./js/offcanvas.js"></script>
  </body>
</html>
