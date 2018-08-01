<html>
	<head>
	<title>Settings</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css">
	<script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/setting.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/orderdetails.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/nav.css">
	 </head>
	 <?php 

include_once("nav.php");
 ?> 
	<body>
	<h1 class="tittle">Settings</h1>
	
	<h4 class="sub_tittle">Welcome : <?php echo $this->session->userdata('userid')?></h4>
	<div class="container">
	<form method="post" action="<?php echo base_url();?>settings/changeuser">
	<div class="row">
				<div class="col-md-3">
				<label>Username</label>
				</div>
				<div class="col-md-3"> 
			<input type="text" placeholder="enter old username" name="olduser">
			<span class="text-danger"><?php echo form_error("olduser");?></span>
				</div>
				<div class="col-md-3">
				<input type="text" placeholder="enter new username" name="newuser">
				<span class="text-danger"><?php echo form_error("newuser");?></span>
				</div>
				<div class="col-md-3">
				<input type="submit" class="btn btn-primary zim" value="submit" name="userchange">
				</div>
		</div>
		</form>
		<hr>
		<form method="post" action="<?php echo base_url();?>settings/changepass">
		<div class="row">
				<div class="col-md-3">
				<label>Password</label>
				</div>
				<div class="col-md-3">
				<input type="password" placeholder="enter old pass" name="old_pass" >
				<span class="text-danger"><?php echo form_error("old_pass");?></span>
				</div>
				<div class="col-md-3">
				<input type="password" placeholder="enter new pass" name="new_pass">
				<span class="text-danger"><?php echo form_error("new_pass");?></span>
				</div>
				<div class="col-md-3">
				</div>	
		</div>
		<br>
		<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
				<input type="password" placeholder="Confirm pass" name="confirm_pass">
				<span class="text-danger"><?php echo form_error("confirm_pass");?></span>
				</div>
				<div class="col-md-3">
				<input type="submit" class="btn btn-primary zim" value="submit">
				</div>
		
		</div>
			</form>
		<hr>
		<form method="post" action="<?php echo base_url();?>settings/changeemail">
		<div class="row">
				<div class="col-md-3">
				<label>Email</label>
				</div>
				<div class="col-md-3">
			<input type="text" placeholder="enter old email" name="old_email">
			<span class="text-danger"><?php echo form_error("old_email");?></span>
				</div>
				<div class="col-md-3">
				<input type="text" placeholder="enter new email" name="new_email">
				<span class="text-danger"><?php echo form_error("new_email");?></span>
				</div>
				<div class="col-md-3">
				<input type="submit" class="btn btn-primary zim" value="submit">
				</div>
		</div>
		<?php 
				$g=$this->session->userdata('user_status');
				if($g==1):
		?>
		</form>
		<hr>
		<form method="post" action="<?php echo base_url();?>settings/delete">
		<div class="row">
				<div class="col-md-3">
				<label>Flush</label>
				</div>
				<div class="col-md-3">
			<input type="date" placeholder="enter start date" name="start_date">
			<span class="text-danger"><?php echo form_error("start_date");?></span>
				</div>
				<div class="col-md-3">
				<input type="date" placeholder="enter end date" name="end_date">
				<span class="text-danger"><?php echo form_error("end_date");?></span>
				</div>
				<div class="col-md-3">
				<input type="submit" class="btn btn-primary zim" value="flush">
				</div>
		</div>
		</form>
		<hr>
		<div class="row"> 
				<div class="col-md-3">
				<label>Add one more User</label>
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
				<button type="button" class="btn btn-info zim extract" >Add User</button>
				</div>
		</div>
		<br>

		<div id="demo">
		<form method="post" action="<?php echo base_url();?>settings/adduser">
		<table class="ado">
				<tr>
				<td>Username  :</td>
				<td> <input type="text" placeholder="enter username" name='add_user'>
				<span class="text-danger"><?php echo form_error("add_user");?></span></td>
				
				</tr>
				<tr>
				<td>Password :</td>
				<td> <input type="password" placeholder="enter password" name='add_pass'>
				<span class="text-danger"><?php echo form_error("add_pass");?></span></td>
				</tr>
				<tr>
				<td>Confirm Password : </td>
				<td> <input type="password" placeholder="Confirm password" name="add_cnf_pass">
				<span class="text-danger"><?php echo form_error("add_cnf_pass");?></span></td>
				</tr> 
				<tr>
				<td>Email : </td>
				<td> <input type="text" placeholder="enter email" name="add_email">
				<span class="text-danger"><?php echo form_error("add_email");?></span></td>
				</tr> 
				<tr>
				<td></td>
				<td>
				  <label class="radio-inline">
					<input type="radio" name="optradio" value="admin">admin	
				</label>
			
				<label class="radio-inline">
					<input type="radio" name="optradio" value="superviser">superviser
				</label>
				<span class="text-danger"><?php echo form_error("optradio");?></span>
				</td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info zim" value="submit"></td>
				</tr>
			</table>
			</form>
		</div>
		<hr>
		<div class="row">
				<div class="col-md-3">
				<label>Activity Management</label>
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
				<button type="button" class="btn btn-info zim extract1" >Manage</button>
				</div>
		</div>
		<br>

		<div id="demo1">
<p><span style='font-weight:bold;'>NOTE:</span>Before Adding/Deleting make sure to enter the activity under the station it will used in daily plan</p>

		<form method="post" action="<?php echo base_url();?>settings/activitychange">
		<table class="ado">
				<tr>
				<td>Activity :</td>
				<td>   
             <input type="text" list="list1" name="add_act" style="width:200px;" class='form-control' require placeholder='Enter Activity'/>
                    <datalist id="list1" type="text" class="form-control fip"   name='add_act' require>
                        <?php
                        foreach($activities as $row)
                        { 
                        echo '<option value="'.$row->activity.'" name="add_act">'.$row->activity.'</option>';
                        }
                        ?>
                    </datalist>
                                <span class="text-danger"><?php echo form_error("add_act");?></span>
                           </td>
				</tr> 
				<tr>
				<td>Station :</td>
				<td> 

             <input type="text" list="list21" name="add_sta1" style="width:200px;" class='form-control' placeholder='Enter Station'/>
                    <datalist id="list21" type="text" class="form-control fip"   name='add_sta1' require>
                        <?php
                        foreach($stations1 as $row)
                        { 
                        echo '<option value="'.$row->station.'" name="add_sta1">'.$row->station.'</option>';
                        }
                        ?>
                    </datalist>
                                <span class="text-danger"><?php echo form_error("add_sta1");?></span>
                           </td>
				</tr>
				<tr>
				<td></td>	
				<td>
				  <label class="radio-inline">
					<input type="radio" name="optradio1" value="add"> add	
				</label>
			
				<label class="radio-inline">
					<input type="radio" name="optradio1" value="delete"> delete
				</label>
				<span class="text-danger"><?php echo form_error("optradio1");?></span>
				</td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info zim" value="submit"></td>
				</tr>
			</table>
			</form>
		</div>
		<hr>
		<div class="row">
				<div class="col-md-3">
				<label>Station Management</label>
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
				<button type="button" class="btn btn-info zim extract2" >Manage</button>
				</div>
		</div>
		<br>

		<div id="demo2">
<p><span style='font-weight:bold;'>NOTE:</span>After Adding Station Please Add all the activities under the stataion</p>

		<form method="post" action="<?php echo base_url();?>settings/stationchange">
		<table class="ado">
				<tr>
				<td>Station :</td>
				<td> 
             <input type="text" list="list20" name="add_sta" style="width:200px;" class='form-control'/>
                    <datalist id="list20" type="text" class="form-control fip"   name='add_sta' require>
                        <?php
                        foreach($stations1 as $row)
                        { 
                        echo '<option value="'.$row->station.'" name="add_sta">'.$row->station.'</option>';
                        }
                        ?>
                    </datalist>
                                <span class="text-danger"><?php echo form_error("add_sta");?></span>
                           </td>
				</tr>
				<tr>
				<td></td>	
				<td>
				  <label class="radio-inline">
					<input type="radio" name="optradio2" value="add"> add	
				</label>
			
				<label class="radio-inline">
					<input type="radio" name="optradio2" value="delete"> delete
				</label>
				<span class="text-danger"><?php echo form_error("optradio2");?></span>
				</td>
				</tr> 
				<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info zim" value="submit"></td>
				</tr>
			</table>
			</form>
		</div>
		<hr>
		<div class="row">
				<div class="col-md-3">
				<label>Employee Management</label>
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
				<button type="button" class="btn btn-info zim extract3" >Manage</button>
				</div>
		</div>
		

		<div id="demo3">
		<form method="post" action="<?php echo base_url();?>settings/employeechange">
		<table class="ado"> 
				<tr>
				<td>Employee :</td>
				<td>    
                            
                            <input type="text" list="list" name="add_emp" style="width:200px;" class='form-control'/>
                    <datalist id="list" type="text" class="form-control fip"   name='add_emp' require>
                        <?php
                        foreach($employee as $row)
                        { 
                        echo '<option value="'.$row->employee.'" name="add_emp">'.$row->employee.'</option>';
                        }
                        ?>
                    </datalist>
                            <span class="text-danger"><?php echo form_error("add_emp");?></span>
                           </td>
				</tr>
				<tr>
				<td></td>	
				<td>
				  <label class="radio-inline">
					<input type="radio" name="optradio3" value="add"> add	
				</label>
			
				<label class="radio-inline">
					<input type="radio" name="optradio3" value="delete"> delete
				</label>
				<span class="text-danger"><?php echo form_error("optradio3");?></span>
				</td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info zim" value="submit"></td>
				</tr>
			</table>
			</form>
		</div>
				<?php endif;?>
				<hr>
		<div class="row">
				<div class="col-md-3">
				<label>Order Item Management</label>
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-3">
				<button type="button" class="btn btn-info zim extract4" >Manage</button>
				</div>
		</div>
		<div id="demo4">
		<form method="post" action="<?php echo base_url();?>settings/deleteorder">
		<table class="ado">
				<tr>
				<td>ordernum :</td>
				<td> 
             <input type="text" list="list35" name="delorder" style="width:200px;" class='form-control'/>
                    <datalist id="list35" type="text" class="form-control fip"   name='delorder' require>
                        <?php
                        foreach($order as $row)
                        { 
                        echo '<option value="'.$row->ordernum.'" name="delorder">'.$row->ordernum.'</option>';
                        }
                        ?>
                    </datalist>
                                <span class="text-danger"><?php echo form_error("delorder");?></span>
                           </td>
				</tr>
				<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info zim" value="delete"></td>
				</tr>
			</table>
			</form>
		</div>
	</div>
	</body>
	
	<script type="text/javascript">
$(document).ready(function(){
	$('#demo').hide();
    $(".extract").click(function(){
        $("#demo").slideToggle();	
    });
});
$(document).ready(function(){
	$('#demo1').hide();
    $(".extract1").click(function(){
        $("#demo1").slideToggle();
    });
});
$(document).ready(function(){
	$('#demo2').hide();
    $(".extract2").click(function(){
        $("#demo2").slideToggle();
    });
});
$(document).ready(function(){
	$('#demo3').hide();
    $(".extract3").click(function(){
        $("#demo3").slideToggle();
    });
});
$(document).ready(function(){
	$('#demo4').hide();
    $(".extract4").click(function(){
        $("#demo4").slideToggle();
    });
});
</script>

</html>
<script>
$(document).ready(function(){
	$('.fip').hide();
});</script>