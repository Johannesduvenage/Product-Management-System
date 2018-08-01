<html>
    <head>
    <title>
    Workers Activity Report
    </title>
    <link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>    
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <link rel='stylesheet' href='<?php echo base_url();?>css/data.css' type='text/css'>   
    <link rel='stylesheet' href='<?php echo base_url();?>css/nav.css' type='text/css'>   

</head>

<body>
    <div class='too'>
<h1>Workers Activity Report</h1>
<a href='<?php echo base_url('export/workeractivityexport');?>' class='btn btn-primary' style='float:left;'>download</a>

    </div>
            <table  class="table table-striped">
                <tr>
                <th>Date</th>
				<th>Name</th>
				<th>Activity</th>
				<th>Grams</th>
				<th>Wastage</th>
				<th>Time</th>
				<th>per hour</th>

                </tr>
                <?php if($hello):
                    foreach($hello as $h):
                        $wastage=($h->wei_in)-($h->wei_out);
                        error_reporting(E_ERROR | E_PARSE);
                        $time=$h->grams/($h->MinuteDiff/60);
                    ?>
                
                    <tr>
                <td><?php echo $h->startdate;?> </td>
                <td><?php echo $h->worker;?> </td>
                <td><?php echo $h->activity;?> </td>
                <td><?php echo $h->grams;?> </td>
                <td><?php echo $wastage;?></td>
                <td><?php echo $h->MinuteDiff;?></td>
                <td><?php echo $time;?></td>

              
                    </tr>
                    <?php  endforeach;
             endif; ?>
            </table>
</body>
</html>
