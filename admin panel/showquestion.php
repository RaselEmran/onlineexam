<?php
  include_once('../classes/Admin.php');
  $admin =new Admin();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	

 </head>
  <body>
<?php

 $query ="SELECT questions.*,category.name As category FROM questions INNER JOIN category ON questions.cat_id =category.id ";  
 $admin->qusDatails($query);


?>	
	           <div class="container">  
                <h3 align="center">UPloaded User Post</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr >  
                                    <td>Question</td>  
                                    <td>Option(1)</td>  
                                  <td>Option(2)</td> 
                                  <td>Option(3)</td> 
                                  <td>Option(4)</td> 
                                  <td>Category</td>   
                                      <td>Action</td> 

                               </tr>  
                          </thead>  
                          <?php  
                           foreach ($admin->show as $row) 
                          {  
                             ?>
                             <tr class="bg-warning">
                              <td><?php echo $row["question"]?></td>
                              <td><?php echo $row["ans1"] ?></td>
                              <td><?php echo $row["ans2"] ?></td>
                              <td><?php echo $row["ans3"] ?></td>
                              <td><?php echo $row["ans4"] ?></td>
                             <td><?php echo $row["category"] ?></td>
                              <td><a href="?public=updatequestion.php&id=<?php echo $row["id"]?>">Edit</a>|| <a href="?public=delete.php&id=<?php echo $row["id"]?>">Delete</a> </td>
                      </tr>
  <?php } ?>  
                     </table>  
                </div>  
           </div>  
	



	<script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script> 
</body>
</html>