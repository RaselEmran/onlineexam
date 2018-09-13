<?php
include_once('../classes/Admin.php');
$url =new Admin();
$id =$_GET["id"];
$sql ="DELETE FROM questions WHERE id ='$id'";
$delete = $admin->delete($sql);
if ($delete) {
		?>
<script type="text/javascript">
	window.location="index.php?public=showquestion.php";
	</script>

		<?php
}



?>