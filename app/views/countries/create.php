<?= $data['title'] ?>

<form action="<?= URLROOT ?>/countries/create" method="POST">
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="name">Naam van het land</label>
                    <input type="text" name="name" id="name">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="capitalCity">Hoodstad van het land</label>
                    <input type="text" name="capitalCity" id="capitalCity">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="continent">Continent van het land</label>
                    <input type="text" name="continent" id="continent">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="population">Aantal inwoners</label>
                    <input type="number" name="population" id="population">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Aanmaken">
                </td>
            </tr>
        </tbody>
    </table>
</form>