<html>
<head>
<title>Edit</title>
<link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>  

<link rel="stylesheet" href="<?php echo base_url();?>css/edit.css" type="text/css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/nav.css">
<script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script> 
</head>
<?php 
error_reporting(E_ERROR | E_PARSE);
include_once("nav.php");
?>
<body>
    <div class="total" style='margin-top:50px;'>
            <div class="create-title" >
                <span class="create-title-1">
                    Edit Order <?php echo $this->session->userdata('ordernum');?>
                </span>
                <?php 
                foreach ($order as $k){
                    $worker=$k->worker;
                    $wei_in=$k->wei_in;
                    $len_in=$k->len_in;
                    $len_out=$k->len_out;
                    $wei_out=$k->wei_out;
                    $grams=$k->grams;
                    error_reporting(E_ERROR | E_PARSE);
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
            </div>
        <form action='<?php echo base_url();?>edit' method='post' style='padding-left:25%;'>
                            <div class="wrap-inputs form-group">
                                <span class="label-input" style='color:black;font'>Start date:</span>
                                <input class="input form-control" type="date" name="start_date" value='<?php echo $date;?>' require></div> 
                            <div class="wrap-inputs form-group">
                                <span class="label-input" style='color:black;font'>Start time:</span>
                                <input class="input form-control" type="time" name="start_time" value='<?php echo $time;?>' require>
                            </div>
                            <div class="wrap-inputs form-group">
                    <span class="label-input" style='color:black;font'>Employee:</span>
                    <input type="text" list="list" name="workername" value='<?php echo $worker;?>' style="width:33%;margin-left:25%;" class='form-control'/>
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
                                <span class="label-input" style='color:black;font'>Weight in:</span>
                                <input class="input form-control" type="number" name="weiin" value='<?php echo $wei_in;?>'>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input" style='color:black;font'>Weight out:</span>
                                <input class="input form-control" type="number" name="weiout" value='<?php echo $wei_out;?>'>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input" style='color:black;font'>Length in:</span>
                                <input class="input form-control" type="number" name="lenin" value='<?php echo $len_in;?>'>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input" style='color:black;font'>Lengthout:</span>
                                <input class="input form-control" type="number" name="lenout" value='<?php echo $len_out;?>'>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input" style='color:black;font'>Grams:</span>
                                <input class="input form-control" type="number" name="grams" value='<?php echo $grams;?>'>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input" style='color:black;font'>End date:</span>
                                <input class="input form-control" type="date" name="end_date" value='<?php echo $date1;?>' require>
                            </div> <div class="wrap-inputs form-group">
                                <span class="label-input" style='color:black;font'>End time:</span>
                                <input class="input form-control" type="time" name="end_time" value='<?php echo $time1;?>' require>
                            </div>
                            <div class=" from-group" style="padding-left:25%;">
                                <button class="btn inputform" name="submit">
                                    Save
                                </button>
                            </div>
        </form>
        <div>

</body>
</html>
<script>
$(document).ready(function(){
	$('.fip').hide();
});</script>