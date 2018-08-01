<html>
    <head>
    <title>
        station report 
    </title>
    <link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>    
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <link rel='stylesheet' href='<?php echo base_url();?>css/data.css' type='text/css'>   
    <link rel='stylesheet' href='<?php echo base_url();?>css/nav.css' type='text/css'>   

</head>

<body>
    <div class='too'>
<h1>Station report(Grams)</h1>
<a href='<?php echo base_url('export/stationexport');?>' class='btn btn-primary' style='float:left;'>download</a>
<form method='post' action='<?php echo base_url();?>data/stationreport' class='date_form'>
<input type='date' name='date' >
<span class="text-danger"><?php echo form_error("date");?></span>
<input type='submit' name='station_submit'>
</form>
    </div>
            <table  class="table table-striped">
                <tr>
                <th>station</th>
	            <th>peices/grms(total)</th>
                </tr>
                <?php if($st):
                    foreach($st as $d):
                    ?>
                    <tr>
             
                <td><?php echo $d->station;?> </td>
                <td><?php echo $d->a;?> </td>

                    </tr>
                    <?php  endforeach;
             endif; ?>
            </table>
</body>
</html>
