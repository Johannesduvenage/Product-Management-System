<html>
<head>
<title>Barcode gen</title>
    <link rel='stylesheet' href='css/bootstrap.min.css' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/nav.css">
<script src="<?php echo base_url();?>js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-barcode.js"></script> 
    <link rel='stylesheet' href='<?php echo base_url();?>css/createstyle.css' type='text/css'>
<script>
function generate(){
    var order = document.getElementById('codevalue').value;
    var data= $("#updateform").serialize();
    var type=document.getElementById('type').value;
    $("#bcTarget2").barcode(order, "code39",{barWidth:5, barHeight:60});
    if(type){
        $.ajax({
            url:"<?php echo base_url();?>barcode/insert",
            type:"POST",
            data:data,
            async:true,
            dataType:'json',
        });
    }

}
function PrintElem()
{
    var prtContent = document.getElementById("bcTarget2");
    var WinPrint = window.open('', '', 'left=30,top=30,width=800,height=900,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}

</script>
<style>
 
</style>
</head>
<?php include_once("nav.php"); ?>

<body>
    <?php error_reporting(E_ERROR | E_PARSE);?>
<div class="container">
        <div class="total">
		<div class="create-title">
                <span class="create-title-1">
                    Generate Barcode
                </span>
                
            </div>
            <?php
            foreach($details as $d){
                $order=$d->ordernum;
                $type=$d->type;
                $color=$d->color;
                $extenstion=$d->extenstion;
                $size=$d->size;
                $length=$d->length;
            }
            ?>
            <form method="POST" action="<?php echo base_url();?>barcode" id="updateform">
                <div class="wrap-inputs form-group">    
                    <span class="label-input">OrderNo:</span>
                    <input type="text" list="list" name="ordernum" style="width:400px;margin-left:25%;" class='form-control' id="codevalue" value="<?php echo $order;?>"/>
                    <datalist id="list" type="text" class="form-control fip"   name='add_sta' require style="display:none">
                        <?php
                        foreach($ordnum as $row)
                        { 
                        echo '<option value="'.$row->ordernum.'" name="ordernum">'.$row->ordernum.'</option>';
                        }
                        ?>
                    </datalist>                
                </div>
                <div class="wrap-inputs form-group">
                    <span class="label-input">Type:</span>
                    <input class="input form-control" type="text" id="type" name="type" placeholder="Enter type" value="<?php echo $type;?>" >
                </div>
                <div class="wrap-inputs form-group">
                    <span class="label-input">Color:</span>
                    <input class="input form-control" type="text" id="color" name="color" placeholder="Enter color" value="<?php echo $color;?>" >
                </div>
                <div class="wrap-inputs form-group">
                    <span class="label-input">Length:</span>
                    <input class="input form-control" type="number" id="length" name="length" placeholder="Enter length" value="<?php echo $length;?>" >
                </div>
                <div class="wrap-inputs form-group">
                    <span class="label-input">Extenstion:</span>
                    <input class="input form-control" type="text" id="extenstion" name="extenstion" placeholder="Enter Extenstion" value="<?php echo $extenstion;?>" >
                </div>
                <div class="wrap-inputs form-group">
                    <span class="label-input">Plug Size:</span>
                    <input class="input form-control" type="number" id="size" name="size" placeholder="Enter size" value="<?php echo $size;?>" >
                </div>
                
                <div class="wrap-inputs form-group">
                    <div id="bcTarget2" style="width:30%;height:20%;padding:30px;margin-left:160px;margin-top:30px;"></div> 
                </div>
                <input type="submit" class="btn btn-success" name="submitform" value="Get Details" style="float:left;margin-left:25%;margin-right:20px;">
               </form>
                <div style="width:270px;margin-left:240px;">
                <div class=" from-group">
                    <input type="button"  class="btn btn-success" name="submit" onclick="generate()" value="Save/Generate" style="float:left">
                </div>
                <div class=" from-group">
                    <input type="button" class="btn btn-success" name="submit" onclick="PrintElem()" value="Print" style="float:right">
                        
                </div>
                </div>
</div>
</div>
</body>
</html>