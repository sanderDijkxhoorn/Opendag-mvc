<!-- Styling -->
<link rel="stylesheet" href="/css/accounts.css">

<!-- Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <th>Gebruikersnaam</th>
    <th>Email</th>
    <th>Rol</th>
    <th>Acties</th>
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
        <td>
            <div class='dropdown'>
              <button class='dropbtn'><i class='fa fa-bolt'></i> Acties</button>
              <div class='dropdown-content'>
                <a href='" . URLROOT . "/accounts/update/$value->id'>Update</a>
                <a href='" . URLROOT . "/accounts/delete/$value->id'>Verwijder</a>
              </div>
            </div></td>
      </tr>";
    }
    ?>
  </tbody>
</table>