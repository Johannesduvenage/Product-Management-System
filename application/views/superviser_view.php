<html>
<head>
<title>Form</title> 
<link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>  

<link rel="stylesheet" href="<?php echo base_url();?>css/orderdetails.css" type="text/css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/nav.css">
<script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script> 
</head>
<?php include_once("nav.php"); ?>
<body>
    <div class="center">
    <?php $p=$this->session->userdata('ordernum');?>
        <h1>Order No:<?php echo $p;?>(station:<?php echo $this->uri->segment(3);?>)</h1>
        <button class="create btn ">Add Values</button>
        <div id="form">
                <div class="row">
                        <div class="col-md-6 left">
                        <form action="<?php echo base_url();?>orderdetails/input" method="post"> 

                            <div class="wrap-inputs form-group">
                                <span class="label-input">Date:</span>
                                <input class="input form-control" type="date" name="date1">
                                <span class="text-danger"><?php echo form_error("date1");?></span>
                            </div>
                            <div class="wrap-inputs form-group">
                            <span class="label-input">Employee:</span>
                            <input type="text" list="list" name="workername" style="width:200px;margin-left:25%;" class='form-control'/>
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
                                <span class="label-input">Start-Time:</span>
                                <input class="input form-control" type="time" name="starttime">
                                <span class="text-danger"><?php echo form_error("starttime");?></span>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input">Activity:</span>
                                <input type="text" list="list1" name="activity" style="width:200px;margin-left:25%;" class='form-control'/>
                    <datalist id="list1" type="text" class="form-control fip"   name='activity' require>
                        <?php
                        foreach($activities as $row)
                        { 
                        echo '<option value="'.$row->activity.'" name="activity">'.$row->activity.'</option>';
                        }
                        ?>
                    </datalist>
                                <span class="text-danger"><?php echo form_error("activity");?></span>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input">Grams:</span>
                                <input class="input form-control" type="number" name="grams">
                                <span class="text-danger"><?php echo form_error("grams");?></span>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input">Length-In:</span>
                                <input class="input form-control" type="number" name="lengthin">
                                <span class="text-danger"><?php echo form_error("lengthin");?></span>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input">Weight-In:</span>
                                <input class="input form-control" type="number" name="weightin">
                                <span class="text-danger"><?php echo form_error("weightin");?></span>
                            </div>
                            <div class=" from-group">
                                <button class="btn inputform" name="intputsubmit">
                                    Create
                                </button>
                            </div>
                            </form>
                        </div>
                   
                    <div class="col-md-6 right">
                        <form action="<?php echo base_url();?>orderdetails/output" method="post">
                            <div class="wrap-inputs form-group">
                                <span class="label-input">Date:</span>
                                <input class="input form-control" type="date" name="date">
                                <span class="text-danger"><?php echo form_error("date");?></span>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input">End-Time:</span>
                                <input class="input form-control" type="time" name="endtime">
                                <span class="text-danger"><?php echo form_error("endtime");?></span>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input">Activity:</span>
                                <input type="text" list="list1" name="activity" style="width:200px;margin-left:25%;" class='form-control'/>
                    <datalist id="list1" type="text" class="form-control fip"   name='activity' require>
                        <?php
                        foreach($activities as $row)
                        { 
                        echo '<option value="'.$row->activity.'" name="activity">'.$row->activity.'</option>';
                        }
                        ?>
                    </datalist>
                                <span class="text-danger"><?php echo form_error("activity");?></span>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input">Employee:</span>
                                <input type="text" list="list" name="add_emp" style="width:200px;margin-left:25%;" class='form-control'/>
                    <datalist id="list" type="text" class="form-control fip"   name='add_emp' require>
                        <?php
                        foreach($employee as $row)
                        { 
                        echo '<option value="'.$row->employee.'" name="add_emp">'.$row->employee.'</option>';
                        }
                        ?>
                    </datalist>
                            <span class="text-danger"><?php echo form_error("add_emp");?></span>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input">Length-Out:</span>
                                <input class="input form-control" type="number" name="lengthout">
                                <span class="text-danger"><?php echo form_error("lengthout");?></span>
                            </div>
                            <div class="wrap-inputs form-group">
                                <span class="label-input">Weight-Out:</span>
                                <input class="input form-control" type="number" name="weightout">
                                <span class="text-danger"><?php echo form_error("weightout");?></span>
                            </div>
                            <div class=" from-group">
                                <button class="btn inputform" name="outputsubmit">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
        </div> 
    </div>

    <div class="start"></div>
    <?php if($details==NULL){?>
        <div class="container" style="text-align:center;">No Details Found on this order number</div>
<?php
    }else{
     foreach($details as $k):?>
    <a href=" <?php echo base_url();?>edit/index/<?php echo $k->id;?>">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <label>Activity:</label>
                <span><?php echo $k->activity; ?></span>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-6">
                        <label>Length-in:</label>
                        <span><?php echo $k->len_in; ?></span>
                    </div>
                    <div class="col-md-6">
                        <label>Length-out:</label>
                        <span><?php echo $k->len_out; ?></span>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Weight-in:</label>
                        <span><?php echo $k->wei_in; ?></span>
                    </div>
                    <div class="col-md-6">
                        <label>Weight-out:</label>
                        <span><?php echo $k->wei_out; ?></span>
                    </div>  
                </div>
            </div>
            <div class="col-md-3 status" >
                <button class="btn">Edit</button>
            </div>
        </div>
    </div>
    <a>
<?php endforeach;
}?>
   
<div class="container extract " style="background-color: #1ab188;text-align:center;font-weight:bold;">Station Completed</div>
  <div id='demo3'>
  <form method="post" action="<?php echo base_url();?>station/update">
		<table style="margin-left:40%;border:1px solid;margin-top:1%;margin-bottom:1%;">
				<tr>
				<td>Station :</td>
				<td>    
                            
                            <input type="text" list="list43" name="inputstatus" style="width:200px;" class='form-control' required/>
                    <datalist id="list43" type="text" class="form-control fip"   name='station' required>
                        <?php
                        foreach($sta as $row)
                        { 
                        echo '<option value="'.$row->station.'" name="inputstatus">'.$row->station.'</option>';
                        }
                        ?>
                    </datalist>
                            <span class="text-danger"><?php echo form_error("inputstatus");?></span>
                           </td>
				</tr>
				<tr>
				<td></td>	 
				<td>
				  <label class="radio-inline">
					<input type="radio" name="optradio" value="complete" > complete
				</label>
			
				<label class="radio-inline">
					<input type="radio" name="optradio" value="partial" > partial
				</label>
				<span class="text-danger"><?php echo form_error("optradio");?></span>
				</td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info " style='margin-bottom:1%'  value="submit"></td>
				</tr>
			</table>
            </form>
  </div>
   <a href="<?php echo base_url();?>station/reupdate"><div class="container" style="background-color: #ef8243;text-align:center;font-weight:bold;">Station Not Completed</div></a>
    <script>
$(document).ready(function(){
	$('#form').hide();
    $(".create").click(function(){
        $("#form").slideToggle();
    });
});
        </script>

</body>
</html>
    <script>
$(document).ready(function(){
	$('.fip').hide();
});
$(document).ready(function(){
	$('#demo3').hide();
    $(".extract").click(function(){
        $("#demo3").slideToggle();
    });
});
</script>