<html>
<head>
    <title>Create Order</title>
    <link rel='stylesheet' href='css/bootstrap.min.css' type='text/css'>
    <script src="js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="css/createstyle.css" type='text/css'>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/nav.css">
</head>  
<?php 

include_once("nav.php");
 ?>  
<body>
    <div class="container">
        <div class="total">
            <div class="create-title">
                <span class="create-title-1">
                    Create Order
                </span>
            </div>
            <form class="create-order" method="POST" action="">
                <div class="wrap-inputs form-group">
                    <span class="label-input">Order no:</span>
                    <input class="input form-control" type="text" name="ordernum" placeholder="Enter order number" require>
                </div>
                <div class="wrap-inputs form-group">
                    <label class="label-input">Items:</label>
                    <input class="input form-control" type="number" name="items" placeholder="Enter number of items" require>
                </div>
                <div class="wrap-inputs form-group">
                    <span class="label-input">Email:</span>
                    <input class="input form-control" type="email" name="email" placeholder="Enter Email-ID" require>
                </div>
                <div class=" from-group">
                    <button class="" name="submit">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
<script>
	    (function($){
    function htmlbodyHeightUpdate(){
        var height3 = $( window ).height()
		var height1 = $('.nav').height()+50
		height2 = $('.main').height()
		if(height2 > height3){
			$('html').height(Math.max(height1,height3,height2)+10);
			$('body').height(Math.max(height1,height3,height2)+10);
		}
		else
		{
			$('html').height(Math.max(height1,height3,height2));
			$('body').height(Math.max(height1,height3,height2));
		}
		
	}
	$(window).ready(function () {
		htmlbodyHeightUpdate()
		$( window ).resize(function() {
			htmlbodyHeightUpdate()
		});
		$( window ).scroll(function() {
			height2 = $('.main').height()
  			htmlbodyHeightUpdate()
		});
	});
    
    }(jQuery));
</script>