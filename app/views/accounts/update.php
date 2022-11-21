<link rel="stylesheet" href="/css/accounts.css">

<div class="header">
    <h2>Update gebruiker</h2>
</div>

<form action="/accounts/update" method="POST">
    <div class="input-group">
        <input type="hidden" name="id" value="<?= $data['row']->id; ?>">
    </div>
    <div class="input-group">
        <label>Gebruikersnaam</label>
        <input type="text" name="username" value="<?= $data["row"]->username ?>">
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="text" name="email" value="<?= $data["row"]->email ?>">
    </div>
    <div class="input-group">
        <label>Rollen</label>
        <select name="role">
            <option value="user" <?= $data["row"]->role == "user" ? "selected" : "" ?>>User</option>
            <option value="admin" <?= $data["row"]->role == "admin" ? "selected" : "" ?>>Admin</option>
        </select>
    </div>
    <div class="input-group">
        <button type="submit" class="btn">Bewerken</button>
    </div>
</form>