<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<?php
include_once('../connection/Connect.php');
include_once('../classes/Admin.php');
 $admin =new Admin();
$connect = new Connect();
$name_err = $title_err = $price_err = $file_err =$file_size="";
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
  if (empty($_POST["name"])) {
   $name_err ="mising name";
  }
  //if not empty then collect data...
    else
    {
       $name =$_POST["name"];
      //check this data is already in database or not...
      $select ="SELECT * FROM category WHERE name='$name' LIMIT 1";
    $result =$connect->conn->query($select);
    $final = $result->fetch_assoc();
    if($final)
    {
      //if this data is allredy store database..
      if($final['name']===$name)
      {
        $name_err="This Category Name is already exist";
      }
    }
    //if no error are occour...

    }
 if (empty($_POST["title"])) {
   $title_err="title missing";
 }
  else
  {
    $title =$_POST["title"];
  }
   if (empty($_POST["price"])) {
   $price_err="price missing";
 }
  else
  {
    $price =$_POST["price"];
  }
        if (empty($_FILES["file"] ["name"])) {
               $file_err ="Missing image";
            }
            else{
             $file = $_FILES["file"] ["name"];
            
             $tmp_name = $_FILES["file"] ["tmp_name"];
             $file_size = $_FILES["file"] ["size"];

             $fileExt = explode('.', $file);
             $filAcutalExt = strtolower(end($fileExt));
             $new_file = uniqid(). '.'.$filAcutalExt;
             $path = "uploads/" .$new_file;
             $allowed = array("jpg", "jpeg", "png", "gif");
             //extantion match...
                      if (!in_array($filAcutalExt, $allowed))
                         {
                       $file_err ="<div class='alert alert-danger'>
                            Only JPG PNG and GIF image uploaded
                         </div>";
                      }
                }
                if ($file_size>=1000000) {
                     $file_err ="<div class='alert alert-danger'>
                          File size lower than 1mb
                         </div>";
                }
      if ($name_err =="" && $title_err =="" && $price_err =="" && $file_err =="" ) {
        move_uploaded_file($tmp_name, $path);
        $admin->category_add($name,$title,$price,$path);
          
        }
      
}



?>	
	<div class="container">
		  <form action="" method="post" enctype="multipart/form-data">
           <div class="form-group">
            <input type="text" name="name" class="form-control" value="" placeholder="Category-name">
            <span><?php echo $name_err  ?></span>
          </div>
           <div class="form-group">
            <input type="text" name="title" class="form-control" value="" placeholder="Title-name">
             <span><?php echo $title_err  ?></span>
          </div>
           <div class="form-group">
            <input type="text" name="price" class="form-control" value="" placeholder="Enter-price">
             <span><?php echo $price_err  ?></span>
          </div>
          <div class="my-4 text-center">
            <input type="file" name="file" class="fileup">
             <span><?php echo $file_err  ?></span>
         </div>
         <input type="submit" name="submit" value="submit">
     </form>
	</div>
	
</body>
</html>