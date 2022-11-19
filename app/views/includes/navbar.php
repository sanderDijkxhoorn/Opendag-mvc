<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">

    <!-- Styling for the footer and navbar -->
    <link rel="stylesheet" href="/css/nav-foot.css">

    <!-- Hamburger link for small screens -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <title><?= SITENAME; ?></title>
</head>

<body>
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
            <a href="<?= URLROOT ?>/homepages/about">Overige Informatie</a>
            <a href="<?= URLROOT ?>/overviews/index">Overview</a>
            <a href="<?= URLROOT ?>/homepages/archive">Projecten</a>
            <a href="<?= URLROOT ?>/comments/index">Comment</a>

            <?php
            // Start session
            session_start();

            // Check if the user id is set.
            if (isset($_SESSION['user_id'])) {
                // Require Registration so we can fetch the role.
                require_once APPROOT . '/models/Registration.php';

                // Create new instance of Registration
                $lala = new Registration();

                // Get the role
                $user = $lala->getRole();

                // Create role variable
                $role = $user->role;
            }

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