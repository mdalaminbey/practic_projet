<?php include_once './header.php'; ?>

<?php

$sql = "SELECT * FROM county";
$conn = connection_db();
$result = $conn->query($sql);
$students = $result->fetch_all(MYSQLI_ASSOC);

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">full_name</th>
      <th scope="col">email</th>
      <th scope="col">village</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($students as $row): ?>
      <tr>
        <!-- <th scope="row">1</th> -->
        <td>
          <?php echo $row['id'] ?>
        </td>
        <td>
          <?php echo $row['full_name'] ?>
        </td>
        <td>
          <?php echo $row['email'] ?>
        </td>
        <td>
          <?php echo $row['village'] ?>
        </td>
        <td>
          <a href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
          <a href='delete-inline.php'>Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>

  </tbody>
</table>

<?php include_once get_root_dir('/crud/footer.php'); ?>