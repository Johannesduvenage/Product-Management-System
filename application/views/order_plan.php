<html>
    <head>
    <title>
        Order plan
    </title>
    <link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>    
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <link rel='stylesheet' href='<?php echo base_url();?>css/data.css' type='text/css'>   
    <link rel='stylesheet' href='<?php echo base_url();?>css/nav.css' type='text/css'>   

</head>

<body>
    <div class='too'>
<h1>order Plan</h1>
<a href='<?php echo base_url('export/orderplanexport');?>' class='btn btn-primary' style='float:left;'>download</a>
<form method='post' action='<?php echo base_url();?>data/order_p' class='date_form'>
<input type="text" list="list" name="ordernumber" style="width:200px;" class='form-control'/>
                    <datalist id="list" type="text" class="form-control fip"   name='ordernumber' require>
                        <?php
                        foreach($order1 as $row)
                        { 
                        echo '<option value="'.$row->ordernum.'" name="ordernumber">'.$row->ordernum.'</option>';
                        }
                        ?>
                    </datalist>
<span class="text-danger"><?php echo form_error('ordernum');?></span>
<input type='submit' name='order_submit'>
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
                <?php if($order2):
                    foreach($order2 as $d):
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
<script>
$(document).ready(function(){
	$('.fip').hide();
});</script>