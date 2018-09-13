<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Question</title>
</head>
<body>
<?php
include_once('../classes/Admin.php');
$id =$_GET["id"];

$admin->updateShow($id);
foreach ($admin->upshow as $value) {
	
}

$ad =new Admin();
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
    	$hidden = $_POST["hidden"];
    	$question = $_POST["question"];
    	$op1    = $_POST["op1"];
    	$op2 = $_POST["op2"];
    	$op3 = $_POST["op3"];
    	$op4 = $_POST["op4"];
    	$ans = $_POST["ans"];
    	$select = $_POST["select"];
    	$userregi = $ad->UpdateQuestion($hidden,$question,$op1,$op2,$op3,$op4,$ans,$select);
    }

?>	


	<div class="container">
       <form action="" method="post">
       <div class="form-group">
       	<input type="hidden" name="hidden" value="<?php echo $id ?>">
        <label for="">Question</label>
        <input type="text" name="question" id="question" class="form-control" value="<?php echo $value['question'];?>">
      </div>
        <div class="form-group">
        <label for="">Option 1</label>
        <input type="text" name="op1" id="op1" class="form-control" value="<?php echo $value['ans1'];?>">
      </div>
        <div class="form-group">
        <label for="">Option 2</label>
        <input type="text" name="op2" id="op2" class="form-control" value="<?php echo $value['ans2'];?>">
      </div>
        <div class="form-group">
        <label for="">Option 3</label>
        <input type="text" name="op3" id="op3" class="form-control" value="<?php echo $value['ans3'];?>">
      </div>
        <div class="form-group">
        <label for="">Option 4</label>
        <input type="text" name="op4" id="op4" class="form-control" value="<?php echo $value['ans4'];?>">
      </div>
        <div class="form-group ">
        <label for="">Answer</label>
        <input type="text" name="ans" id="ans" class="form-control">
      </div>
      <div class="form-group ">
      <select name="select" id="select" class="form-control">
        <option value="0">Select Category</option>
        <?php
        //admin page is already create $admin object of Admin class..so we no create object again
        $admin->cat_shows();
        foreach ($admin->cat as $value) {
          ?>
           <option value="<?php echo $value['id'] ?>"><?php echo $value["name"] ?></option>

          <?php
        }
        ?>
        
        
      </select>
      </div>
      <input type="submit" name="submit" id="add" value="Put question" class="btn btn-primary btn-lg btn-block">

     </form>
     <span class="my-4" id="state"><?php echo $ad->msg; ?></span>
     </div>
</body>
</html>