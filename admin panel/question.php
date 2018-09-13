
<?php
  include_once('../classes/Admin.php');
  $admin =new Admin();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		
	</title>
</head>
<body>
  <div class="container">
       <form action="" method="post">
       <div class="form-group">
        <label for="">Question</label>
        <input type="text" name="question" id="question" class="form-control">
      </div>
        <div class="form-group">
        <label for="">Option 1</label>
        <input type="text" name="op1" id="op1" class="form-control">
      </div>
        <div class="form-group">
        <label for="">Option 2</label>
        <input type="text" name="op2" id="op2" class="form-control">
      </div>
        <div class="form-group">
        <label for="">Option 3</label>
        <input type="text" name="op3" id="op3" class="form-control">
      </div>
        <div class="form-group">
        <label for="">Option 4</label>
        <input type="text" name="op4" id="op4" class="form-control">
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
     <span class="my-4" id="state"></span>
     </div>



<script>
	$(function(){
  //for user Registraion
  $("#add").click(function(){
    var question = $("#question").val();
    var op1 = $("#op1").val();
    var op2 = $("#op2").val();
    var op3 = $("#op3").val();
    var op4 = $("#op4").val();
    var ans = $("#ans").val();
    var select = $("#select").val();
    var dataString = 'question='+question+'&op1='+op1+'&op2='+op2+'&op3='+op3+'&op4='+op4+'&ans='+ans+'&select='+select;
   $.ajax({    
    type : 'POST',
    url  : 'addquestion.php',
    data : dataString,
   success :  function(data){
    $("#state").html(data);
   }
    });
   return false;
  });
});
</script>	
</body>
</html>