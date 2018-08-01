<html>
<head>
    <title>Forget</title>
    <link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/createstyle.css" type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/nav.css">
</head>  

<body>
    <div class="container">
        <div class="total">
            <div class="create-title">
                <span class="create-title-1">
                    Forget Password
                </span>
            </div>
            <form class="create-order" method="POST" action="<?php echo base_url();?>/login/forget">
                <div class="wrap-inputs form-group">
                    <span class="label-input">user id:</span>
                    <input class="input form-control" type="text" name="id" placeholder="Enter Username" require>
                    <span class="text-danger"><?php echo form_error("id");?></span>
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