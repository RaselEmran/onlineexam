<?php
//session strat
session_start();
//link databse....
include_once('connection/Connect.php');
//create class....
class User 
{ 
	//define vaiable....
	public $db;
	public $cat;
	public $msg;
	public $qus;
	public $right_ans;
	//this variable is use countshow method
	public $count;
	//create construct function and create object to connect class.....
	function __construct()
	{
		$this->db = new Connect();
	}
//userRegistraion method.....to paramiter $username,$email,$password...
	public function userRegistraion($username,$email,$password)
	{
		//validate paramiter value.......
		$username =mysqli_real_escape_string($this->db->conn, $username);
		$email =mysqli_real_escape_string($this->db->conn, $email);
		$password =mysqli_real_escape_string($this->db->conn, $password);
		if ($username =="" || $email =="" || $password =="") {
			//if field empty....this registration using ajax...
			echo "<span style='padding:7px;color:red;background-color:black'> Field must not be empty.</span>";
			exit();
		}
		else if(filter_var($email, FILTER_VALIDATE_EMAIL)===false)
		{
			//email validation.....
         echo "<span style='padding:7px;color:red;background-color:black'> invalid Email Address.</span>";
			exit();
		}
		else{
			//if username or email is already exit....
			$check ="SELECT * FROM regi WHERE username='$username' OR email='$email' LIMIT 1";
			$chkresult =$this->db->conn->query($check);
			$user = $chkresult->fetch_assoc();
			 if ($user) { // if user exists
        if ($user['username'] === $username) {
        echo "<span style='padding:7px;color:red;background-color:black'> Username is already exit!.</span>";
        exit();
    }

    if ($user['email'] === $email) {//if email exists..
    echo "<span class style='padding:7px;color:red;background-color:black'> Email Address is already Exit!.</span>";
    exit();
    }
    exit();
  }
			else
			{
				//if no error then inserted....
				$query ="INSERT INTO regi(username,email,password) VALUES('$username','$email','$password')";
				$insertrow=$this->db->conn->query($query);
				if ($insertrow) {
					echo "<span style='padding:7px;color:green; background-color:black'> Registration successfully</span>";
					exit();
				}
			}
		}
	}
	//create siginin method to paramiter $username,$password.....
	public function signin($username,$password)
	{
		//match database......
		$sql ="SELECT * FROM regi WHERE username='$username' OR email ='$username' AND password ='$password'";
		$result =$this->db->conn->query($sql);
		$userdata =$result->fetch_assoc();
		$count_row =$result->num_rows;
		//if num of row exit....
		if ($count_row ==1) {
			//store user id in session...
			$_SESSION['userid'] =$userdata['id'];
			return true;
		}
		else{
			return false;
		}
	}
	//create cat_show method have no paramiter....
	public function cat_shows()
	{
		//query......
		$query =$this->db->conn->query("SELECT * FROM category");
		while($row =$query->fetch_array(MYSQLI_ASSOC))
		 {
		 	//the $row array value store in cat array whis define...
			$this->cat[]=$row;

		}
		//return cat array....
		return $this->cat;

	}
	//create qus_show mehod to paramiter $qus....
	public function qus_show($qus)
	{
		$query =$this->db->conn->query("SELECT * FROM questions WHERE cat_id ='$qus'");
		//if no row...then return msg...
		if (mysqli_num_rows($query)<1) {
		 return	$this->msg = "No question";
		}

		while($row =$query->fetch_array(MYSQLI_ASSOC))
		 {
		 	//the $row array value store in qus array whis define...
			$this->qus[]=$row;

		}
		//return qus array....
		return $this->qus;
	}
	//create answer metod to have parameter $data which send answe.php answer($_POST);
	public function answer($data)
	{
		$ans = implode("", $data);
		//define......
		$right =0;
		$wrong =0;
		$no_answer =0;
		//query.......
		$query = $this->db->conn->query("SELECT id,ans FROM questions WHERE cat_id='".$_SESSION['cat']."'");
		while ($qust=$query->fetch_array(MYSQLI_ASSOC)) {
			//$qust['ans'] is actually under while loop $qus... and $_POST[$qust['id']] is accually catshow.php page name input...
			//if database ans to click option value match..then right...

			if ($qust['ans']==$_POST[$qust['id']]) {
				$right++;
				//increment $right..
			}
			//if $_POST[$qust['id']] actually catshow.php page name input...match no_attemt which is catshow.php page defult option then no answer..
			elseif ($_POST[$qust['id']]=="no_attempt") {
				$no_answer++;
				//increment...
			}
			else
			{
				//if this two condition is false..then answer is wrong......
				$wrong++;
			}
		}
		//store value to array....
    $array =array();
    $array['right'] =$right;
    $array['wrong'] =$wrong;
    $array['no_answer'] =$no_answer;
    return $array;


		//echo "Right".$right."</br>";
		//echo "Wrong".$wrong."</br>";
		//echo "No Answer".$no_answer."</br>";

	}
	public function right_ans($category_id)
	{
		//this method call in write answer page
		$query =$this->db->conn->query("SELECT * FROM questions WHERE cat_id='$category_id'");
		while($row =$query->fetch_array(MYSQLI_ASSOC))
		 {
		 	//this array vaiable righit_ans to store in $row vaiable....
			$this->right_ans[]=$row;

		}
		return $this->right_ans;

	}
	//in this mehod to call counter section
	public function showCount($sql)
	{

		$result =$this->db->conn->query($sql);
        $userdata =$result->fetch_assoc();
        $count_row =$result->num_rows;
        //store $count_row value in $this->count variable
       $this->count =$count_row;
       return $this->count;

	}
	public function url($url)
	{
		//this the header location method...
		header("location:".$url);
	}
}

?>