<link rel="stylesheet" type="text/css" href="/css/educations.css">

<div id="details">
    <?php
    // Show a message a message that the user has been registered
    if (isset($data['success'])) {
        // Show the success message
        echo "<p class='success'>" . $data['success'] . "</p>";
    }

    // If de opleiding niet is gevonden dan wij tonen error went die is niet gevonden als leeg is $data['education'] dan tonen we error
    if (empty($data['educations'])) {
        echo "<p class='error'>Opleiding niet gevonden</p>";
    } else {
        // Mooie border dingen
        echo "<div class='mooieborder'>";

        // Als de opleiding is gevonden dan tonen we de opleiding
        echo "<h1>" . $data['educations']->naam . "</h1>";

        // Toon foto van de opleiding doe de fotototjuh in the src tag
        echo "<img class='mooiedetailfoto' src='" . htmlentities($data['educations']->fototjuh, ENT_QUOTES, 'ISO-8859-1') . "' alt='Foto van de opleiding'>";

        // Open die border dingen
        echo "<div class='mooiedetaildinge'>";

        // Split die mooie bescrhijving op in mooie stukjes zodat het makkelijk te lezen is
        $beschrijving = explode("\n", $data['educations']->beschrijving);

        // Loop door de stukjes heen en zet ze in een p tag
        foreach ($beschrijving as $value) {
            echo "<p>" . htmlentities($value, ENT_QUOTES, 'ISO-8859-1') . "</p>";
        }

        // Sluit die border dingen
        echo "</div>";

        // Open die border dingen
        echo "<div class='mooiedetaildinge'>";

        echo "<p>Opleidings duur: " . $data['educations']->duur . "</p>";
        echo "<p>Opleidings niveau: " . $data['educations']->niffo . "</p>";

        // Als isBOL is 1 dan tonen we ja als isBOL is 0 dan tonen we nee
        if ($data['educations']->isBOL == 1) {
            echo "<p>Het is een BOL opleiding</p>";
        } else {
            echo "<p>Het is een BBL opleiding</p>";
        }

        // Sluit die border dingen
        echo "</div>";

        echo '<div id="details">';

        // Mooie aanmeld button
        echo "<a href='" . URLROOT . "/educations/aanmelden/" . $data['educations']->Id . "' class='button'>Aanmelden</a>";

        echo '</div>';

        // Sluit die border dingen
        echo "</div>";
    }

    ?>
</div>