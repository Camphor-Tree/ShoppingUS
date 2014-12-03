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
			 <li class="active"><a href="./message.php">给我留言</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">
    <div class="control-group">
            <div class="row">
                <div class="span16">
                        <fieldset>
                            <legend style="color:#FE9A2E;"><h4><b>写下您的留言,帮助我们成长</b></h4></legend>
                            <div class="clearfix">
                                <label class="help-block">昵称</label>
                                <div class="input"><input id="name" placeholder="您的昵称" name="nickname" type="text" class="xlarge" style="width:200px;" value="<?php if(isset($_SESSION["name"])) echo $_SESSION["name"];?>"/></div>
                            </div>
                            <div class="clearfix">
                                <label for="textarea" class="help-block">内容</label>
                                <div class="input">
                                    <textarea id="content" name="content" class="xlarge" style="width:250px;height:100px" placeholder="写下您对网站的宝贵意见或购物评价 :)"></textarea>
                                    <span class="help-block">欢迎给logpie留言</span>
                                </div>
                            </div>
                            <div class="actions">
                                <button id="submit" class="btn btn-warning">提交留言</button>
                            </div>
                        </fieldset>
                </div>
            </div>
       <div class="control-group">
	   </br></br>
	   <legend style="color:#FE9A2E;"><h3><b>留言板</b></h3></legend>
	   <?php
	   	$file = './messages/messages.txt';
		//$messages = array();
		$messages =  json_decode(file_get_contents($file));
		date_default_timezone_set('Asia/Shanghai');
		if(count($messages)==0)
		{
		?>
		<p style="color:#424242;font-size:14pt">暂时还没有留言,赶紧做第一个留言的人吧！</p> <!-- 顯示留言內容 -->
		<?php
		}
		
		for($i=count($messages)-1;$i>=0;$i--)
		{
	   ?>
	        <blockquote>
				<div class="help-block" style="font-size:11pt"><?php echo ($i+1); ?>楼 <?php echo $messages[$i]->name ?>, <?php echo date('Y-m-d H:i:s', (int)$messages[$i]->timestamp); ?></div> <!-- 顯示暱稱以及輸出留言時間 -->
                <p style="color:#151515"><?php echo $messages[$i]->content?></p> <!-- 顯示留言內容 -->
            </blockquote>
	   <?php 
	   }
	   ?>
       </div>
	   </br>
	   </br>
      <footer>
        <p>&copy; <b>www.logpie.com 2014</b></p>
      </footer>
    </div>

    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script>
	$("#submit").click(function() {
	var name=$("#name").val();
	var content=$("#content").val();
    $.ajax({
		type: "POST",
		url: "./message_handler.php",
		data: {"name":name,"content":content},
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