<html>
	<head>
	<title>Station</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css">
	<script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/station.css">
    
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/nav.css">

     </head>
     <?php include_once('nav.php');?>
    <body>
    <?php $p=$this->session->userdata('ordernum');?>
    <h1 class="too">Order No: <?php echo $p;?></h1>
    <div class='container'>
    <div class='row'>
        <div class='col-md-6'>
        <form action='<?php echo base_url()?>station/insert' method='post'>
            <table>
                <tr>
                    <td><label>Quantity :</label></td>
                    <td><input type='number' name='quantity' placeholder='enter quantity in grams'></td>
                    <td><input type='submit' class='btn btn-info' value='save'></td>
                </tr>
            </table>
        </form>
        </div>
        <div class='col-md-3'>
        </div>
        <div class='col-md-3'>
            <p style='font-weight:bold;'>Quantity:<?php if($quan){
                foreach($quan as $q){ 
            echo $q->quan;    
                }
            }
            else{
                echo '0';
            }
                
                ?></p>
        </div>
    </div>
    </div>
    <?php if($key){
    foreach($key as $k){
       
        ?>
    
    <a href=" <?php echo base_url();?>orderdetails/index/<?php echo $k->station;?>">
    <div class="container container1" >
        <div class="row">
            <div class="col-md-6">
                <label>Station:</label>
                <span><?php echo $k->station; ?></span>
            </div>
            <div class="col-md-6 status" >
                <label>Progress:</label>
                <span>
                    <?php 
                    if($keystatus){
                    $flag=0;
                    foreach($keystatus as $s){
                        if($k->station == $s->station){
                            $flag=1;
                            break;
                        }
                    }
                    if($flag==1){
                        if($s->status==1){
                            echo "Completed";
                        }
                        elseif($s->status==0){
                            echo "Pending";
                        }
                    }
                    elseif($flag==0){
                        echo "Not Started";
                    }
                }else{
                    echo "Not Started";
                }
                   
                    ?>
                </span>
            </div>
        </div>
    </div>
    <a>
<?php }
?>
<a href="<?php echo base_url();?>barcode">
<div class="container container1" style="height:270px;margin-bottom:20px;" id="desc">
    <h3 style="font-weight:bold;text-align:center;"><u>Discription</u></h3>
    <?php foreach($quan as $d){?>
    <label>Type:</label><?php echo $d->type?><br>
    <label>Color:</label><?php echo $d->color?><br>
    <label>Length:</label><?php echo $d->length?><br>
    <label>Extenstion:</label><?php echo $d->extenstion?><br>
    <label>Size:</label><?php echo $d->size?>
</div></a>
<?php
}}
else{?>
    <div class="container">
    <p style="align:cnter;">NO STATIONS FOUND PLEASE INSERT THROUGH SETTINGS </p>
    </div>
<?php }
?>
    </body>
</html>