<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<html>
    <head>
        <title>Admin Form</title>
        <link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>    
        <link rel="stylesheet" href="<?php echo base_url();?>css/createstyle.css" type="text/css">
        <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/nav.css">	
    </head>
    <?php 

include_once("nav.php");
 ?>
    <body>
    <div class="container">
        <div class="total">
            <div class="create-title">
                <span class="create-title-1">
                     Order No
                </span>
            </div>
            <form class="create-order" method="POST" action="<?php echo base_url();?>order">
                <div class="wrap-inputs form-group" style="margin-bottom:6%">
                    <span class="label-input" style="margin-left:25%">ORDER NO:</span>
					<input type="text" list="list" name="ordernumber" style="width:200px;margin-left:50%" class='form-control'/>
                    <datalist id="list" type="text" class="form-control fip"   name='ordernumber' require>
                        <?php
                        foreach($ordernum as $row)
                        { 
                        echo '<option value="'.$row->ordernum.'" name="ordernumber">'.$row->ordernum.'</option>';
                        }
                        ?>
                    </datalist>
                </div>
                <div class=" from-group">
                    <button class="" name="submit">
                        Search
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
<script>
$(document).ready(function(){
	$('.fip').hide();
});</script>