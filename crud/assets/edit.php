<?php include_once './header.php';?>
<?php  include_once './../env.php';

if( empty( $_GET['id'] ) ) {
    return;
  }
  
  
$connection_db = connection_db();
  $county_id = $_GET['id'];
  $sql      = "SELECT * FROM student where id = {$county_id}";
  $result   = $connection_db->query($sql);
  $students = $result->fetch_all( MYSQLI_ASSOC );
  
  if( empty( $students[0] ) ) {
    return;
  }
  
  $student = $students[0];

  
?>

<div class="container">
	<div class="row">
		<form method="post" target="updatedate.php">
			<div class="mb-3">
				<label class="form-label">Full Name <span style="color:red">*</span></label>
				<input type="text" name="full_name" value ="<?php echo $student['full_name'];?>"  class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Email address <span style="color:red">*</span></label>
				<input type="email" name="email"  value ="<?php echo $student['email'];?>"  class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Village (Optional)</label>
				<input type="village" name="village"  value ="<?php echo $student['village'];?>"  class="form-control">
			</div>
			<button type="submit" class="btn btn-primary" value="submit">Submit</button>
		</form>
	</div>
</div>

