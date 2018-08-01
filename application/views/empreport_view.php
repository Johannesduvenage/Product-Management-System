<html>
    <head>
    <title>
        Employee Report
    </title>
    <link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>    
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <link rel='stylesheet' href='<?php echo base_url();?>css/data.css' type='text/css'>   
    <link rel='stylesheet' href='<?php echo base_url();?>css/nav.css' type='text/css'>   

</head>

<body>
    <div class='too'>
<h1>Employee Report</h1>
<a href='<?php echo base_url('export/empexport');?>' class='btn btn-primary' style='float:left;'>download</a>
<form method='post' action='<?php echo base_url();?>data/emp' class='date_form'>
<input type='date' name='start_date' >
<span class="text-danger"><?php echo form_error("start_date");?></span>
<br>
<input type='date' name='end_date' >
<span class="text-danger"><?php echo form_error("end_date");?></span></br>
<input type='submit' name='emp_submit'>
</form>
    </div>
            <table  class="table table-striped"> 
                <tr>
                    <th>worker</th>
                    <th>Activity</th> 
                    <th>Time</th>
                    <th>grams</th>
                    <th>perhour</th>
                </tr>
                
             

