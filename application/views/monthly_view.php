<html>
    <head>
    <title>
        Monthly plan
    </title>
    <link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>    
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <link rel='stylesheet' href='<?php echo base_url();?>css/data.css' type='text/css'>   
    <link rel='stylesheet' href='<?php echo base_url();?>css/nav.css' type='text/css'>   

</head>

<body>
    <div class='too'>
<h1>Monthly Report</h1>
<a href='<?php echo base_url('export/monthlyexport');?>' class='btn btn-primary' style='float:left;'>download</a>
<form method='post' action='<?php echo base_url();?>data/monthly' class='date_form'>
<input type='date' name='start_date' >
<span class="text-danger"><?php echo form_error("start_date");?></span>
<br>
<input type='date' name='end_date' >
<span class="text-danger"><?php echo form_error("end_date");?></span></br>
<input type='submit' name='monthly_submit'>
</form>
    </div>
            <table  class="table table-striped">
                <tr> 
                    <th>date</th>
                    <th>ordernum</th>
                    <th>start time</th>
                    <th>station</th>
                    <th>Activity</th>
                    <th>emp name</th>
                    <th>grams</th>
                    <th>weight in</th>
                    <th>length in</th>
                    <th>weight out</th>
                    <th>length out</th>
                    <th>end time</th>
                    <th>user</th>

                </tr>
                <?php if($monthly):
                    foreach($monthly as $d):
                    ?>
                    <tr>
                <td><?php echo $d->startdate;?> </td>
                <td><?php echo $d->ordernum;?> </td>
                <td><?php echo $d->starttime;?> </td>
                <td><?php echo $d->station;?> </td>
                <td><?php echo $d->activity;?> </td>
                <td><?php echo $d->worker;?> </td>
                <td><?php echo $d->grams;?> </td>
                <td><?php echo $d->wei_in;?> </td>
                <td><?php echo $d->len_in;?> </td>
                <td><?php echo $d->wei_out;?> </td>
                <td><?php echo $d->len_out;?> </td>
                <td><?php echo $d->end_time;?> </td>
                <td><?php echo $d->user;?> </td>
                    </tr>
                    <?php  endforeach;
             endif; ?>
            </table>
</body>
</html>
