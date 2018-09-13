<?php

session_start();
include_once('../connection/Connect.php');
class Admin
{
	public $db;
	public $cat;
	public $show;
	public $upshow;
	public $msg;
	public $delete;
	function __construct()
	{
		$this->db = new Connect();

	}
	public function AddQuestion($question,$op1,$op2,$op3,$op4,$ans,$select)
	{
		$question =htmlentities($question);
		$op1 = htmlentities($op1);
		$op2 =htmlentities($op2);
		$op3 =htmlentities($op3);
		$op4 =htmlentities($op4);
		$ans =htmlentities($ans);
		$select =htmlentities($select);
		$array =array($op1,$op2,$op3,$op4);
		$answer =array_search($ans, $array);
		if ($question =="" || $op1 =="" || $op2 =="" || $op3 =="" || $op4 =="" || $answer =="" || $select =="") {
			 echo "<span style='padding:7px;color:red;background-color:#eee'><h6>Fields must be fillup!!.</h6></span>";
			exit();
		}
		else{
			$query ="INSERT INTO questions(question,ans1,ans2,ans3,ans4,ans,cat_id) VALUES('$question','$op1','$op2','$op3','$op4','$answer','$select')";
				$insertrow=$this->db->conn->query($query);
          	if ($insertrow) {
					echo "<span style='padding:7px;color:green; background-color:black'> <h6>Data Inserted successfully</h6></span>";
					exit();
				}
}
		
	}
	public function cat_shows()
	{
		$query =$this->db->conn->query("SELECT * FROM category");
		while($row =$query->fetch_array(MYSQLI_ASSOC))
		 {
			$this->cat[]=$row;

		}
		return $this->cat;

	}
	public function category_add($name,$title,$price,$path)
	{
		$query ="INSERT INTO category(name,title,price,path) VALUES('$name','$title','$price','$path')";
				$insertrow=$this->db->conn->query($query);
	}
	public function qusDatails($sql)
	{
       $query =$this->db->conn->query($sql);
       while($row =$query->fetch_array(MYSQLI_ASSOC))
		 {
			$this->show[]=$row;

		}
		return $this->show;

	}
	public function updateShow($id)
	{
     $query =$this->db->conn->query("SELECT * FROM questions WHERE id='$id'");
		while($row =$query->fetch_array(MYSQLI_ASSOC))
		 {
			$this->upshow[]=$row;

		}
		return $this->upshow;

	}
		public function UpdateQuestion($hidden,$question,$op1,$op2,$op3,$op4,$ans,$select)
	{
		$question =htmlentities($question);
		$op1 = htmlentities($op1);
		$op2 =htmlentities($op2);
		$op3 =htmlentities($op3);
		$op4 =htmlentities($op4);
		$ans =htmlentities($ans);
		$select =htmlentities($select);
		$array =array($op1,$op2,$op3,$op4);
		$answer =array_search($ans, $array);
			if ($question =="" || $op1 =="" || $op2 =="" || $op3 =="" || $op4 =="" || $answer =="" || $select =="") {
			 $this->msg= "<span style='padding:7px;color:red;background-color:#eee'><h6>Fields must be fillup!!.</h6></span>";
			 return  $this->msg;
			exit();
		}
		else{
				$query = "UPDATE questions SET question='$question', ans1='$op1', ans2='$op2', ans3='$op3', ans4='$op4', ans='$answer', cat_id='$select' WHERE id='$hidden'";
				$insertrow=$this->db->conn->query($query);
          	if ($insertrow) {
					 $this->msg = "<span style='padding:7px;color:green; background-color:black'> <h6>Data Inserted successfully</h6></span>";
					 return  $this->msg;
					exit();
				}
	
		
      }


}
public function delete($sql)
{
	$deleterow=$this->db->conn->query($sql);
	if ($deleterow) {
		 return true;

	}
	else
	{
		return false;
	}

}	
public function adminLogin($username,$password)
{
	$select ="SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = $this->db->conn->query($select);
	$admindata = $result->fetch_assoc();
	$row_count = $result->num_rows;
	if ($row_count ==1) {
		$_SESSION["username"] = $username;
		return true;
	}
	else{
		return false;
	}
}

	public function url($url)
	{
		//this the header location method...
		header("location:".$url);
	}	
	

}

?>