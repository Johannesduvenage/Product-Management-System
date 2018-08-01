<div id="wrapper">
    <nav class="navbar navbar-inverse sidebar" role="navigation">
        <div class="container-fluid">
        <div class=" navbar-collapse" id="bs-sidebar-navbar-collapse-1">
            <ul class="nav navbar-tabs">
                    <li ><a href='<?php echo base_url();?>order' >Orders<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                    <?php if($this->session->userdata('user_status')==1){?>
                    <li><a href="<?php echo base_url();?>create">Create Order<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-envelope"></span></a></li>
                    <li><a href="<?php echo base_url();?>data/daily" target="_blank">Daily plan<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>

                    <li><a href="<?php echo base_url();?>data/dailyreport" target="_blank">Daily report<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-calendar"></span></a></li>
                    <li><a href="<?php echo base_url();?>data/monthly" target="_blank">Monthly plan<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-calendar"></span></a></li>
                    <li><a href="<?php echo base_url();?>data/workeractivity" target="_blank">Workers-Activity report<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>
                    <li><a href="<?php echo base_url();?>data/companyavgactivity" target="_blank">Company Avg-Activity report<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-calendar"></span></a></li>
                    <li><a href="<?php echo base_url();?>data/act" target="_blank">Activity Average<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>
                    <li><a href="<?php echo base_url();?>data/emp" target="_blank">Employee Report<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                    <li><a href="<?php echo base_url();?>data/stationreport" target="_blank">Station report<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>			
                    <li><a href="<?php echo base_url();?>barcode" target="_blank">Generate barcode<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>			
                    <li><a href="<?php echo base_url();?>data/order_p" target="_blank">Order plan<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>
                    <li><a href="<?php echo base_url();?>data/stationplan" target="_blank">Station pendings<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-file"></span></a></li>

					<?php }?>
                    <li><a href="<?php echo base_url();?>settings">profile<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                    <li><a href="<?php echo base_url()?>login/logout">Logout<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-log-out"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>