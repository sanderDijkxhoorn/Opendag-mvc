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
    <h2>Inloggen</h2>
</div>

<form action="<?= URLROOT ?>/registrations/login" method="POST">
    <div class="input-group">
        <label>Gebruikersnaam</label>
        <input type="text" name="username" required>
    </div>
    <div class="input-group">
        <label>Wachtwoord</label>
        <input type="password" name="password" required>
    </div>
    <div class="input-group">
        <button type="submit" class="btn">Login</button>
    </div>
    <p>
        Nog geen account? <a href="<?= URLROOT ?>/registrations/register">Meld je aan!</a>
    </p>
</form>