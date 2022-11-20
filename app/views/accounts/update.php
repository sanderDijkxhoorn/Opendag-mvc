<form action="/accounts/update" method="POST">
    <table>
        <tbody>
            <tr>
                <td>
                    <input type="text" name="name" id="name" value="<?= $data["row"]->username ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="capitalCity" id="capitalCity" value="<?= $data["row"]->email ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="continent" id="continent" value="<?= $data["row"]->role ?>">
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