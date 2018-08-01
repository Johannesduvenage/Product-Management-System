<html>
    <head>
    <title>
        Station pendings
    </title>
    <link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>    
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <link rel='stylesheet' href='<?php echo base_url();?>css/data.css' type='text/css'>   
    <link rel='stylesheet' href='<?php echo base_url();?>css/nav.css' type='text/css'>   

</head>

<body>
    <div class='too'>
<h1>Stations Pending</h1>
<a href='<?php echo base_url('export/stationplanexport');?>' class='btn btn-primary' style='float:left;'>download</a>
<form method='post' action='<?php echo base_url();?>data/stationplan' class='date_form'>
<input type='date' name='station_date' >
<span class="text-danger"><?php echo form_error("station_date");?></span>
<input type='submit' name='station_submit'>
</form>
    </div>
            <table  class="table table-striped">
                <tr>
                <th>Station</th>
                    <th>Ordernum</th>
                    <th>Activity</th>
                    <th>Emp name</th>
                    <th>Start time</th>
                    <th>User</th>
                </tr>
                <?php ?>
            </table>
</body>
</html>