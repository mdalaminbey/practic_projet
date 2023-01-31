<?php include_once './header.php';


if (empty($_GET['id'])) {
	exit;
}


$connection_db = connection_db();
$county_id = $_GET['id'];
$sql = "SELECT * FROM county WHERE id = '{$county_id}'";
$result = $connection_db->query($sql);
$students = $result->fetch_all(MYSQLI_ASSOC);

if (empty($students[0])) {
	return;
}

$student = $students[0];

session_start();

?>

<div class="container">
	<div class="row">
		<form method="post" action="<?php echo get_root_url('crud/update.php') ?>">

			<?php if (isset($_SESSION['success'])): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $_SESSION['success'];
					unset($_SESSION['success']);
					?>
				</div>
			<?php endif; ?>

			<?php if (isset($_SESSION['errors'])): ?>
				<div class="alert alert-danger" role="alert">
					<ul>
						<?php
							foreach ($_SESSION['errors'] as $error) {
								echo "<li>" . $error . "</li>";
							}
							unset($_SESSION['errors']);
						?>
					</ul>
				</div>
			<?php endif; ?>


			<input type="hidden" name="id" value="<?php echo $student['id'] ?>">
			<div class="mb-3">
				<label class="form-label">Full Name <span style="color:red">*</span></label>
				<input type="text" name="full_name"
					value="<?php echo isset($student['full_name']) ? $student['full_name'] : ''; ?>"
					class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Email address <span style="color:red">*</span></label>
				<input type="email" name="email"
					value="<?php echo isset($student['email']) ? $student['email'] : ''; ?>" class="form-control">
			</div>
			<div class="mb-3">
				<label class="form-label">Village (Optional)</label>
				<input type="village" name="village"
					value="<?php echo isset($student['village']) ? $student['village'] : ''; ?>" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary" value="submit">Submit</button>
		</form>
	</div>
</div>