<?php include_once './header.php'; ?>
<?php

if (!empty($_REQUEST['full_name']) && !empty($_REQUEST['email'])) {

	function insert($full_name, $email, $village)
	{
		$insert_query = "INSERT INTO COUNTY (full_name, email, village) VALUES ('{$full_name}', '{$email}', '{$village}')";

		$connection_db = connection_db();

		$connection_db->query($insert_query);
	}

	$email = email_validation($_REQUEST['email']);
	$errors = array();

	/**
	 * Email validation
	 */

	if (false === $email) {
		$errors[] = "Please enter a valid email";
		exit;
	}

	/**
	 * Input sanitization
	 */
	$full_name = htmlentities($_REQUEST['full_name'], ENT_QUOTES, 'UTF-8');
	$village = isset($_REQUEST['village']) ? htmlentities($_REQUEST['village'], ENT_QUOTES, 'UTF-8') : '';

	/**
	 * Length Validation
	 */
	$checkuser = "select * from county where email = '$email'";
	$connection_db = connection_db();
	$results = $connection_db->query($checkuser);
	if ($results->num_rows != 0) {
		$errors[] = "This email is already exists";
	}
	// echo strlen($full_name);
	if (strlen($full_name) < 5 || strlen($full_name) > 10) {
		$errors[] = "full_name should be less than 5 characters or more than 10 characters";
	}
	if (strlen($email) < 15 || strlen($email) > 50) {
		$errors[] = "email should be less than 15 characters or more than 50 characters";
	}
	if (strlen($village) < 4 || strlen($village) > 255) {
		$errors[] = "village should be less than 4 characters or more than 255 character";
	}
	if (empty($errors)) {
		insert($full_name, $email, $village);
	} else {
		echo "<pre>";
		print_r($errors);
		echo "</pre>";
	}
}
?>

<div class="container">
	<div class="row">
		<form method="post" action="">
			<div class="mb-3">
				<label class="form-label">Full Name <span style="color:red">*</span></label>
				<input type="text" name="full_name" class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Email address <span style="color:red">*</span></label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Village (Optional)</label>
				<input type="village" name="village" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>

<?php include_once get_root_dir('/crud/footer.php'); ?>