<html>
    <head>
    <title>
        Daily report
    </title>
    <link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>    
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <link rel='stylesheet' href='<?php echo base_url();?>css/data.css' type='text/css'>   
    <link rel='stylesheet' href='<?php echo base_url();?>css/nav.css' type='text/css'>   

</head>

<body>
    <div class='too'>
<h1>Daily Report</h1>
<a href='<?php echo base_url('export/dailyreportexport');?>' class='btn btn-primary' style='float:left;'>download</a>
<form method='post' action='<?php echo base_url();?>data/dailyreport' class='date_form'>
<input type='date' name='dailyreport_date' >
<span class="text-danger"><?php echo form_error("dailyreport_date");?></span>
<input type='submit' name='dailyreport_submit'>
</form>
    </div>
            <table  class="table table-striped">
                <tr>
                    <th>activity</th>
                  
                    <th>grams</th>
                  
                    <th>wastage</th>

                </tr>
                <?php if($dailyreport){
                    foreach($dailyreport as $d){
                    ?>
                    <tr>
                <td><?php echo $d->activity;?> </td>
                <td><?php echo $d->g;?> </td>
                <?php $wastage=($d->i)-($d->o);?>
                <td><?php 
                if($wastage<0){
                    $wastage=0;
                }
                echo $wastage;?> </td>
                    </tr>
                    <?php  }
             } ?>
            </table>
</body>
</html>
