<link rel="stylesheet" href="/css/accounts.css">

<?php
// Show deleteStatus if exists as alert
if (isset($data['deleteStatus'])) {
  echo '<div class="alert alert-success" role="alert">' . $data['deleteStatus'] . '</div>';
}

// If $data['error'] is set, show the error message
if (isset($data['error'])) {
  echo "<p class='error'>" . $data['error'] . "</p>";
} else if (isset($data['success'])) {
  echo "<p class='success'>" . $data['success'] . "</p>";
}
?>

<table>
  <thead>
    <th>Username</th>
    <th>Email</th>
    <th>Role</th>
    <th>update</th>
    <th>delete</th>
  </thead>
  <tbody>
    <?= $data['accounts'] ?>
  </tbody>
</table>