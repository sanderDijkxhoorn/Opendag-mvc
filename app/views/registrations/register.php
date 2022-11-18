<link rel="stylesheet" href="/css/registration.css">

<?php
// If $data['error'] is set, show the error message
if (isset($data['error'])) {
    echo "<p class='error'>" . $data['error'] . "</p>";
} else if (isset($data['success'])) {
    echo "<p class='success'>" . $data['success'] . "</p>";
}
?>

<div class="header">
    <h2>Registreren</h2>
</div>

<form action="<?= URLROOT ?>/registrations/register" method="post">
    <div class="input-group">
        <label>Gebruikersnaam</label>
        <input type="text" name="username" required>
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>
    <div class="input-group">
        <label>Wachtwoord</label>
        <input type="password" name="password" required>
    </div>
    <div class="input-group">
        <label>Herhaal wachtwoord</label>
        <input type="password" name="password_confirm" required>
    </div>
    <div class="input-group">
        <button type="submit" class="btn">Register</button>
    </div>
    <p>
        Al een account? <a href="<?= URLROOT ?>/registrations/login">Log in!</a>
    </p>
</form>