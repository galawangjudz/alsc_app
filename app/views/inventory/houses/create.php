<div class="card">
    <div class="card-header bg-primary text-white">
        Add House
    </div>
    <div class="card-body">
        <form method="POST" action="<?= url('houses/store') ?>">
            <?php if ($lot): ?>
                <input type="hidden" name="lot_id" value="<?= $lot->id ?>">
                <div class="mb-3">
                    <label class="form-label">Lot</label>
                    <input type="text" class="form-control" value="Block <?= $lot->block_number ?> - Lot <?= $lot->lot_number ?>" readonly>
                </div>
            <?php else: ?>
                <div class="mb-3">
                    <label for="lot_id" class="form-label">Select Lot</label>
                    <select name="lot_id" id="lot_id" class="form-select">
                        <?php foreach (Lot::all() as $lot): ?>
                            <option value="<?= $lot->id ?>">Block <?= $lot->block_number ?> - Lot <?= $lot->lot_number ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" name="model" id="model" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="floor_area" class="form-label">Floor Area (sqm)</label>
                <input type="number" name="floor_area" id="floor_area" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price (₱)</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="available">Available</option>
                    <option value="reserved">Reserved</option>
                    <option value="sold">Sold</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Save House</button>
            <a href="<?= url('lots/index') ?>" class="btn btn-secondary">Back to Lots</a>
        </form>
    </div>
</div>
