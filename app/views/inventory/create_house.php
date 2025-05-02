<h2>Add House to Lot #<?= htmlspecialchars($lot_id) ?></h2>

<form method="POST" action="">
    <label>House Model:</label>
    <input type="text" name="model" required><br>

    <label>Floor Area (sqm):</label>
    <input type="number" step="0.01" name="floor_area" required><br>

    <label>Price per sqm:</label>
    <input type="number" step="0.01" name="price_per_sqm" required><br>

    <label>Status:</label>
    <input type="text" name="status"><br>

    <label>Unit Status:</label>
    <input type="text" name="unit_status"><br>

    <label>House Type:</label>
    <input type="text" name="house_type"><br>

    <label>Remarks:</label>
    <textarea name="remarks"></textarea><br>

    <button type="submit">Add House</button>
</form>
