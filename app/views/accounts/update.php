<link rel="stylesheet" href="/css/accounts.css">

<form action="/accounts/update" method="POST">
    <table>
        <tbody>
            <input type="hidden" name="id" value="<?= $data['row']->id; ?>">
            <tr>
                <td>
                    <input type="text" name="username" value="<?= $data["row"]->username ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="email" value="<?= $data["row"]->email ?>">
                </td>
            </tr>
            <tr>
                <!-- Select menu between admin and user -->
                <td>
                    <select name="role">
                        <option value="user" <?= $data["row"]->role == "user" ? "selected" : "" ?>>User</option>
                        <option value="admin" <?= $data["row"]->role == "admin" ? "selected" : "" ?>>Admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Bewerken">
                </td>
            </tr>
        </tbody>
    </table>
</form>