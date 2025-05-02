<h2>Create New Lot</h2>

<form method="POST" action="">
    <label>Site:</label>
    <input type="number" name="site_id" required><br>

    <label>Block:</label>
    <input type="number" name="block" required><br>

    <label>Lot:</label>
    <input type="number" name="lot" required><br>

    <label>Lot Area (sqm):</label>
    <input type="number" step="0.01" name="lot_area" required><br>

    <label>Price per sqm:</label>
    <input type="number" step="0.01" name="price_per_sqm" required><br>

    <label>Status:</label>
    <input type="text" name="status"><br>

    <label>Remarks:</label>
    <textarea name="remarks"></textarea><br>

    <label>Title:</label>
    <input type="text" name="title"><br>

    <label>Title Owner:</label>
    <input type="text" name="title_owner"><br>

    <label>Previous Owner:</label>
    <input type="text" name="previous_owner"><br>

    <button type="submit">Create Lot</button>
</form>
