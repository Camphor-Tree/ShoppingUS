<!DOCTYPE html>
<?php  
   include './cart.php';?>
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
            <li><a href="./">主页</a></li>
            <li><a href="./about.php">联系我们</a></li>
			 <li><a href="./order.php">购物车<sup id="count"><?php  session_start();$cart = (new ShoppingCart); print_r($cart->getShoppingCartCount());?></sup></a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

	   <?php $cart = (new ShoppingCart);
         $shoppingCart=$cart->getShoppingCart(); 
		  $totalPrice=0; 
		  if(count($shoppingCart)>0)
		  {
		?>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-12">

		   <div class="row">
   <table class="table">
	   <caption><div style="color:#FF8000">
				<h2>购物车</h2>  
			  </div>
	   </caption>
	   <thead>
		  <tr>
			 <th>产品</th>
			 <th>规格</th>
			  <th>单价</th>
			 <th>数量</th>
			  <th>小结</th>
		  </tr>
	   </thead>
	   <tbody>
   
   <?php 
		  foreach($shoppingCart as $product){ ?>
      <tr class="success">
         <td><?php print_r($product['name']);?></td>
         <td><?php print_r($product['size']);?></td>
         <td><?php print_r($product['price']);?></td>
		  <td><?php print_r($product['count']);?></td>
		  <td><?php print_r($product['count']*$product['price']); $totalPrice+=$product['count']*$product['price']?></td>
      </tr>
	<?php } ?>
   </tbody>
</table>
		   </div>
		</div>
      <hr>
	  </div>
	  
  
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">姓名</label>
          <div class="controls">
            <input id="name" type="text" placeholder="您的名字" class="input-xlarge">
            <p class="help-block">Supporting help text</p>
          </div>
        </div><div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">联系方式</label>
          <div class="controls">
            <input id="contact" type="text" placeholder="手机/微信/QQ/email" class="input-xlarge">
            <p class="help-block">Supporting help text</p>
          </div>
        </div><div class="control-group">

          <!-- Textarea -->
          <label class="control-label">附加留言(可以说明一下规格尺寸之类的)</label>
          <div class="controls">
            <div class="textarea">
                  <textarea id="comment" type="" class=""> </textarea>
            </div>
          </div>
        </div>

       <div class="control-group">
          <label class="control-label"><h4>当前总价: <b style="color:#04B404"><?php print_r($totalPrice);?></b><h4></label>

          <!-- Button -->
          <div class="controls">
            <button id="submitt" class="btn btn-success">提交订单</button><button id="cancel" class="btn btn-danger">清除订单</button>
          </div>
        </div>
		<?php
		}else{
		?>
		<div  align="center" style="color:#FF8000;margin-left:auto;margin-right:auto;" class="col-xs-12">
            <h3>您的购物车目前为空!快去<a href="./">添加商品</a>吧！</h3>  
       </div>
	   </br>
	   </br>
		
<?php }?>
      <footer>
        <p>&copy; <b>www.logpie.com 2014</b></p>
      </footer>
	
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script>
	$("#submitt").click(function() {
	var name=$("#name").val();
	var contact=$("#contact").val();
	var comment=$("#comment").val();
    $.ajax({
		type: "POST",
		url: "./order_handler.php",
		data: {"name":name,"contact":contact,"comment":comment},
		cache: false,
		success: function(data)
			{
				alert(data);
				if(data!="姓名和联系方式不能为空!")
				location.reload();
			}

		});
	});
	$("#cancel").click(function() {
    $.ajax({
		type: "POST",
		url: "./clear_cart_handler.php",
		cache: false,
		success: function(data)
			{
				alert(data);
				location.reload();
			}
		}); 
	});
</script>

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
