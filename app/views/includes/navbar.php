<?php
require_once APPROOT . '/models/Navbar.php';

$lala = new Navbar();

$navbar_role = $lala->getRole();

$data = [
    'role' => $navbar_role->role
];
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
        <a href="/overige-info.php">Overige Informatie</a>
        <a href="/overview.php">Overview</a>
        <a href="/comments/">Comment</a>
        <a href="/archive.php">Projecten</a>

        <?php
        // Start the session
        session_start();

        if (isset($data)) {
            if ($data['role'] == 'admin') {
                // Show the admin links
                echo '<a href="/enquete-admin/read.php">Enquete read</a>';
                echo '<a href="/enquete-admin/create.php">Enquete create</a>';
                echo '<a href="/registratie/read.php"> Manage accounts</a>';
            }

            echo '<a href="/enquete-admin/make.php?id=1">Enquete</a>';
            echo '<a href="/logout.php">Logout</a>';
        } else {
            echo '<a href="/login.php">Login</a>';
            echo '<a href="/register.php">Register</a>';
        }
        ?>
    </div>
</div>