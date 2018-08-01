<?php
                                    error_reporting(E_ERROR | E_PARSE);

                if($emp){
                    $count=count($emp);
                    $count=$count+1;
                    foreach($emp as $p):?>
                        <tr>
                            <?php
                            echo "<td rowspan=$count>".$p->worker."</td>";
                            ?>
                        </tr>
                        <?php
                        break;
                    endforeach;
                    foreach($emp as $k): 
                        error_reporting(E_ERROR | E_PARSE);
                        $result=$k->grams/($k->MinuteDiff/60);
                    ?>
                    <tr> 
                   
                        <td><?php echo $k->activity;?> </td>
                        <td><?php echo $k->MinuteDiff;?> </td>
                        <td><?php echo $k->grams;?> </td>
                        <td><?php echo $result;?> </td>
                    </tr>
                    
                    <?php  endforeach;}
                    else{
                           foreach($emp1 as $p):?>
                           <tr>
                               <?php
                               echo "<td>".$p->employee."</td>";
                               ?>
                         <td><?php echo '---';?> </td>
                        <td><?php echo '0';?> </td>
                        <td><?php echo '0';?> </td>
                        <td><?php echo '0';?> </td>
                           </tr>
                           <?php
                       endforeach;
                    }
         ?>