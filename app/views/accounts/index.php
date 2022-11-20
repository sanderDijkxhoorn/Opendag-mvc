<link rel="stylesheet" href="/css/accounts.css">

<?php
// Show deleteStatus if exists as alert
if (isset($data['deleteStatus'])) {
  echo "<p class='success'>" . $data['deleteStatus'] . "</p>";
}

// If $data['error'] is set, show the error message
if (isset($data['error'])) {
  echo "<p class='error'>" . $data['error'] . "</p>";
} else if (isset($data['success'])) {
  echo "<p class='success'>" . $data['success'] . "</p>";
}
?>

<table id="read">
  <thead>
    <th>Id</th>
    <th>Username</th>
    <th>Email</th>
    <th>Role</th>
    <th>update</th>
    <th>delete</th>
  </thead>
  <tbody>
    <?php
    // Make the data available in the view
    $rows = '';
    foreach ($data['accounts'] as $value) {
      echo "
      <tr>
        <td>" . htmlentities($value->id, ENT_QUOTES, 'ISO-8859-1') . "</td>
        <td>" . htmlentities($value->username, ENT_QUOTES, 'ISO-8859-1') . "</td>
        <td>" . htmlentities($value->email, ENT_QUOTES, 'ISO-8859-1') . "</td>
        <td>" . htmlentities($value->role, ENT_QUOTES, 'ISO-8859-1') . "</td>
        <td><a href='" . URLROOT . "/accounts/update/$value->id'><button class='button'>update</button></a></td>
        <td><a href='" . URLROOT . "/accounts/delete/$value->id'><button class='button'>delete</button></a></td>
      </tr>";
    }
    ?>
  </tbody>
</table>