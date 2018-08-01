<html>
<head>
    <title>Manage Order</title>
    <link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/createstyle.css" type='text/css'>
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/nav.css">
</head>  
<?php include_once("nav.php"); ?>  
<body>
    <div class="container">
        <div class="total">
            <div class="create-title">
                <span class="create-title-1">
                    Edit Order
                </span>
            </div>
            <?php
            foreach($order as $k){
                $worker=$k->worker;
                $weiin=$k->wei_in;
                $weiout=$k->wei_out;
                $lenin=$k->len_in;
                $lenout=$k->len_out;
                $grams=$k->grams;
                $datetime=$k->starttime; 
                $datetime1=$k->end_time;
                $splitTimeStamp = explode(" ",$datetime);
                $date = $splitTimeStamp[0];
                $time = $splitTimeStamp[1];
                $splitTimeStamp = explode(" ",$datetime1);
                $date1 = $splitTimeStamp[0];
                $time1 = $splitTimeStamp[1];
                if($time1=="00:00:00"){
                    $time1="HH:MM";
                }
            }
            ?>
            <form class="create-order" method="POST" action="">
            <div class="wrap-inputs form-group">
                    <label class="label-input">Start date:</label>
                    <input class="input form-control" type="date" name="start_date" value='<?php echo $date;?>' require>
                </div> <div class="wrap-inputs form-group">
                    <label class="label-input">Start time:</label>
                    <input class="input form-control" type="time" name="start_time" value='<?php echo $time;?>' require>
                </div>
                <div class="wrap-inputs form-group">
                    <span class="label-input">Employee:</span>
                    <input type="text" list="list" name="workername" value='<?php echo $worker;?>' style="width:67%;margin-left:25%;" class='form-control'/>
                    <datalist id="list" type="text" class="form-control fip"   name='workername' require>
                        <?php
                        foreach($employee as $row)
                        { 
                        echo '<option value="'.$row->employee.'" name="workername">'.$row->employee.'</option>';
                        }
                        ?>
                    </datalist>
                            <span class="text-danger"><?php echo form_error("workername");?></span>
                </div>
                <div class="wrap-inputs form-group">
                    <label class="label-input">Weight In:</label>
                    <input class="input form-control" type="number" name="weiin" value='<?php echo $weiin;?>' require>
                </div>
                <div class="wrap-inputs form-group">
                    <span class="label-input">Length In:</span>
                    <input class="input form-control" type="number" name="lenin" value='<?php echo $lenin;?>' require>
                </div>
                <div class="wrap-inputs form-group">
                    <span class="label-input">Weight Out:</span>
                    <input class="input form-control" type="number" name="weiout" value='<?php echo $weiout;?>' require>
                </div>
                <div class="wrap-inputs form-group">
                    <span class="label-input">Length Out:</span>
                    <input class="input form-control" type="number" name="lenout" value='<?php echo $lenout;?>' require>
                </div>
                <div class="wrap-inputs form-group">
                    <span class="label-input">Grams:</span>
                    <input class="input form-control" type="number" name="grams" value='<?php echo $grams;?>' require>
                </div>
                <div class="wrap-inputs form-group">
                    <label class="label-input">End date:</label>
                    <input class="input form-control" type="date" name="end_date" value='<?php echo $date1;?>' require>
                </div> <div class="wrap-inputs form-group">
                    <label class="label-input">End time:</label>
                    <input class="input form-control" type="time" name="end_time" value='<?php echo $time1;?>' require>
                </div>
                  <div class=" from-group">
                    <button class="" name="submit">
                        Edit
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