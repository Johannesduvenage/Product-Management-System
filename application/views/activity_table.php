<?php
                                    error_reporting(E_ERROR | E_PARSE);

                if($act){
                    $count=count($act);
                    $count=$count+2;
                    foreach($act as $p):?>
                        <tr>
                            <?php
                            echo "<td rowspan=$count>".$p->activity."</td>";
                            ?>
                        </tr>
                        <?php
                        break;
                    endforeach;
                             $avg=0;
							$max=0;
							$min=9999999999;
                    foreach($act as $k):
                        error_reporting(E_ERROR | E_PARSE);
                        $result=$k->grams/($k->time/60);
                        $avg=$avg+$result;
								if($max < $result){
									$max=$result;
									
								}
								if($min > $result){
									$min=$result;
                                } 
                                
                    ?>
                 <tr>          
                   <td><?php echo $k->worker;?> </td>
                   <td><?php echo $result;?> </td>
                 </tr>
                    
                    <?php  endforeach;
                    $avg=$avg/($count-2);
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><?php echo $avg;?></td>
                        <td><?php echo $max;?></td>
                        <td><?php echo $min;?></td>
                    </tr>
             <?php   }
                    else{
                           foreach($act1 as $p):?>
                           <tr>
                               <?php
                               echo "<td>".$p->activity."</td>";
                               ?>
                         <td><?php echo '---';?> </td>
                        <td><?php echo '0';?> </td>
                        <td><?php echo '0';?> </td>
                        <td><?php echo '0';?> </td>
                        <td><?php echo '0';?> </td>
                           </tr>
                           <?php
                       endforeach;
                    }
         ?>