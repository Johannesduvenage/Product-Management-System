<?php
                                    error_reporting(E_ERROR | E_PARSE);

                if($sta){
                    $count=count($sta);
                    $count=$count+1;
                    foreach($sta as $p):?>
                        <tr>
                            <?php
                            echo "<td rowspan=$count>".$p->station."</td>";
                            ?>
                        </tr>
                        <?php
                        break;
                    endforeach;
                    foreach($sta as $k): 
                        error_reporting(E_ERROR | E_PARSE);
                    ?>
                    <tr> 
                    <td><?php echo $k->ordernum;?> </td>
                    <td><?php echo $k->activity;?> </td>
                        <td><?php echo $k->worker;?> </td>
                        <td><?php echo $k->grams;?> </td>
                        <td><?php echo $k->starttime;?> </td>
                        <td><?php echo $k->user;?> </td>
                    </tr>
                    <?php  endforeach;}
                else{
                           foreach($sta1 as $p):?>
                           <tr>
                               <?php
                               echo "<td>".$p->station."</td>";
                               ?>
                         <td><?php echo '---';?> </td>
                         <td><?php echo '---';?> </td>
                         <td><?php echo '---';?> </td>
                         <td><?php echo '---';?> </td>
                         <td><?php echo '---';?> </td>
                           </tr>
                           <?php
                       endforeach;
                    }
         ?>