<?php
require_once APPROOT . '/models/Navbar.php';

$lala = new Navbar();

if (isset($_SESSION['user_id'])) {
    $user = $lala->getRole();
    $role = $navbar_role->role;
}

var_dump($role);
?>

<link rel="stylesheet" href="/css/nav-foot.css">

<div class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
        <div class="nav-title">
            <a href="/">
                <img src="https://www.mboutrecht.nl/wp-content/themes/mboutrecht/img/output/logo-new@2x.png" width="50em" height="30em" />
            </a>
        </div>
    </div>
    <div class="nav-btn">
        <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
        </label>
    </div>

    <div class="nav-links">
        <a href="<?= URLROOT ?>/informations/index">Overige Informatie</a>
        <a href="<?= URLROOT ?>/overviews/index">Overview</a>
        <a href="<?= URLROOT ?>/comments/index">Comment</a>
        <a href="<?= URLROOT ?>/archives/index">Projecten</a>

        <?php
        // Start the session
        session_start();

        if (isset($role)) {
            if ($role == 'admin') {
                // Show the admin links
                echo '<a href="' . URLROOT . '/enquetes/read">Enquete read</a>';
                echo '<a href="' . URLROOT . '/enquetes/create">Enquete create</a>';
                echo '<a href="' . URLROOT . '/accounts/read">Manage accounts</a>';
            }

            echo '<a href="' . URLROOT . '/enquetes/make/2">Enquete</a>';
            echo '<a href="' . URLROOT . '/registrations/logout">Logout</a>';
        } else {
            echo '<a href="' . URLROOT . '/registrations/login">Login</a>';
            echo '<a href="' . URLROOT . '/registrations/register">Register</a>';
        }
        ?>
    </div>
</div>