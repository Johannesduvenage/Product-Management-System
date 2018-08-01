<html>
    <head>
    <title>
        Activity Average
    </title>
    <link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>    
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <link rel='stylesheet' href='<?php echo base_url();?>css/data.css' type='text/css'>   
    <link rel='stylesheet' href='<?php echo base_url();?>css/nav.css' type='text/css'>   

</head>

<body>
    <div class='too'>
<h1>Activity Average</h1>
<a href='<?php echo base_url('export/activityexport');?>' class='btn btn-primary' style='float:left;'>download</a>
<form method='post' action='<?php echo base_url();?>data/act' class='date_form'>
<input type='date' name='date' >
<span class="text-danger"><?php echo form_error("date");?></span>
<input type='submit' name='act_submit'>
</form>
    </div>
            <table  class="table table-striped">
                <tr>
                <th>Activity</th>
				<th>workers</th>
				<th>per hour</th>
				<th>Avg</th>
				<th>Max</th>
				<th>Min</th>    

                </tr>
                
            

