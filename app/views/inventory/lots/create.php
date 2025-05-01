<div class="card">
    <div class="card-header bg-primary text-white">Create Lot</div>
    <div class="card-body">
        <form method="POST" action="<?= url('lot/store') ?>">
            <div class="mb-3">
                <label class="form-label">Block Number</label>
                <input type="text" name="block_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Lot Number</label>
                <input type="text" name="lot_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Area (sqm)</label>
                <input type="number" name="area" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="available">Available</option>
                    <option value="reserved">Reserved</option>
                    <option value="sold">Sold</option>
                </select>
            </div>
            <button class="btn btn-success">Save Lot</button>
        </form>
    </div>
</div>
