 <td> <button style="" onclick="changeStatus(<?php echo $row['id'];?>,<?php echo $row['status']?>)"><?php if($row['status']==1){echo 'Active';} else {echo 'Deactive';}?> </button></td> 