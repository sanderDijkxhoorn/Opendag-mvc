<link rel="stylesheet" href="/css/comment.css">

<?php
// If $data['error'] is set, show the error message
if (isset($data['error'])) {
    echo "<p class='error'>" . $data['error'] . "</p>";
} else if (isset($data['success'])) {
    echo "<p class='success'>" . $data['success'] . "</p>";
}
?>

<div class="wrapper">
    <form method="POST" class="form">
        <div class="row">
            <div class="input-group">
                <label for="name">Naam en Achternaam:</label>
                <input type="text" name="name" id="name" placeholder="Type je naam" required>
            </div>
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Type je email" required>
            </div>
        </div>
        <div class="input-group textarea">
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" placeholder="Type je comment" required></textarea>
        </div>
        <div class="input-group">
            <button class="btn">Plaats comment</button>
        </div>
    </form>
    <div class="prev-comments">
        <?= $data['comments'] ?>
    </div>
</div>