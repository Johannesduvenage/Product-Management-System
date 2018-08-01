<html>
    <head>
    <title>
        Daily plan
    </title>
    <link rel='stylesheet' href='<?php echo base_url();?>css/bootstrap.min.css' type='text/css'>    
    <script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/jquery.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='<?php echo base_url();?>css/data.css' type='text/css'>   
    <link rel='stylesheet' href='<?php echo base_url();?>css/nav.css' type='text/css'>   
    <style>
        input[type=text]{
            width:100%;
        }
        input[type=number]{
            width:100%;
        }
        select{
            width:110%;
        }
    </style>
</head>

<body>
    <div class='too'>
<h1>Daily Plan</h1>
<a href='<?php echo base_url('export/dailyplanexport');?>' class='btn btn-primary' style='float:left;'>download</a>
    </div >
<div  style="border:2px solid black;margin-left:2px;margin-right:2px;">
    <div class="row">
        <div class="col-md-1 enter" >Station</div>
        <div class="col-md-1 enter" >Order</div>
        <div class="col-md-1 enter" >Activity</div>
        <div class="col-md-2 enter" >Wroker Name</div>
        <div class="col-md-1 enter" >time</div>
        <div class="col-md-1 enter" >Quantity</div>
        <div class="col-md-2 enter" >Start Date</div>
        <div class="col-md-2 enter" >Start Time</div>
        <div class="col-md-1 enter" ></div>
    </div>
    <form action='<?php echo base_url();?>data/insert' method='post'>
    <div class='row'>
   
        <div class="col-md-1 enter" >
                <select id='station'  name='station'>
                <option value=''>select station</option>
                <?php
                foreach($hello as $h){?>
                    <option value='<?php echo $h->station;?>'><?php echo $h->station;?> </option>
            <?php  }?>
                </select>
        </div>
        <div class="col-md-1" >
                    <select id='ordernumber' name='order'>
                     <option>select ordernum </option></select>
        </div>
        <div class="col-md-1 enter" >
            <select id='activity' name='activity'> 
                    <option>select activity</option>
            </select>
        </div>
            <div class="col-md-2 enter" >
                <select name='worker'>
                <option>select worker</option>
                <?php foreach($worker as $work){?>
                <option value='<?php echo $work->employee;?>'><?php echo $work->employee;?></option>
                <?php }?>
                </select>
            </div>
            <div class="col-md-1 enter" ><input type="number" name='tmrqd' placeholder='In min'></div>
            <div class="col-md-1 enter" ><input type="number" name='weiin'></div>
            <div class="col-md-2 enter" ><input type="date" name='date'></div>
            <div class="col-md-2 enter" ><input type="time" name='time'></div>
            <div class="col-md-1 enter" id="save" ><input type="submit" value='save'></div>
         
  </div>   </form>
  </div>
                    <?php  error_reporting(E_ERROR | E_PARSE);
                    foreach($daily as $d){?>
                        <div class="row">
        <div class="col-md-1 enter" ><?php echo $d->station;?></div>
        <div class="col-md-1 enter" ><?php echo $d->ordernum;?></div>
        <div class="col-md-1 enter" ><?php echo $d->activity;?></div>
        <div class="col-md-2 enter" ><?php echo $d->worker;?></div>
        <div class="col-md-1 enter" ><?php echo $d->timerqrd;?></div>
        <div class="col-md-1 enter" ><?php echo $d->wei_in;?></div>
        <div class="col-md-2 enter" ><?php echo $d->startdate;?></div>
        <div class="col-md-2 enter" ><?php echo $d->starttime;?></div>
        <div class="col-md-1 enter" ><a href='<?php echo base_url();?>edit/index/<?php echo $d->id;?>'>edit</a></div>
    </div>
                <?php    }?>
      
</body>
<script>
    $(document).ready(function(){
        $('#station').on('change',function(){
            var state=$(this).val();
           if(state){
               $.ajax({
                url:"<?php echo base_url()?>data/selectorder",
                    type:"POST",
                    data:{'state':state},
                    success:function(data){ 
                        $('#ordernumber').html(data);
                    },
                    error:function(){
                        alert('error occured....!');
                    }
                }); 
            }else{
                $('#ordernumber').html('<option>select ordernum</option>');
            }
        });
    }); 
</script>
<script>
    $(document).ready(function(){
        $('#station').on('change',function(){
            var state1=$(this).val();
            if(state1){
                $.ajax({
                    url:"<?php echo base_url();?>data/selectactivity",
                    type:"POST",
                    data:{'state1':state1},
                    success:function(data){
                        $('#activity').html(data);
                    },
                    error:function(data){
                        alert('error occured...!');
                    },
                });
            }else{
                $('#activity').html('<option>select activity</option>');
            }
        });
    });
</script>
</html>
