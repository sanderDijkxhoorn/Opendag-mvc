<link rel="stylesheet" href="/css/accounts.css">

<?php
// Show deleteStatus if exists as alert
if (isset($data['deleteStatus'])) {
  echo '<div class="alert alert-success" role="alert">' . $data['deleteStatus'] . '</div>';
}
?>

<a href="<?= URLROOT; ?>/registrations/register">Nieuw account aanmaken</a>

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