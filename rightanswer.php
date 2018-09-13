<?php
require_once('classes/User.php'); 
include_once('pages/head.php');
//create object....
$ans= new User();
//pass $_POST["cat"] which is send anser.php page....
$ans->right_ans($_POST["cate"]);
//echo $_POST["cate"];
//print_r($ans->right_ans);


?>
<div class="container">
	  <div class="row justify-content-center">
    <div class="col-10">
    	<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Question</th>
      <th scope="col">Option(0)</th>
      <th scope="col">Option(1)</th>
      <th scope="col">Option(2)</th>
      <th scope="col">Option(3)</th>
      <th scope="col" class="table-warning">Answer Number </th>
      
    </tr>
  </thead>
      <?php
foreach ($ans->right_ans as  $value) {




	?>

  <tbody>
    <tr>
      <th scope="row"><?php echo $value["question"] ?></th>
      <td><?php echo $value["ans1"] ?></td>
      <td><?php echo $value["ans2"] ?></td>
      <td><?php echo $value["ans3"] ?></td>
      <td><?php echo $value["ans4"] ?></td>
      <td class="table-warning"><?php echo $value["ans"] ?></td>
      
    </tr>

  </tbody>


	<?php
	
}
?>
</table>
<?php
?>
    </div>
   
  </div>
</div>

