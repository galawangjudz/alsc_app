<h3>Lot Inventory</h3>
<a href="<?= url('lot/create') ?>" class="btn btn-primary mb-3">Add Lot</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Block</th>
            <th>Lot</th>
            <th>Area</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lots as $lot): ?>
            <tr>
                <td><?= $lot->block_number ?></td>
                <td><?= $lot->lot_number ?></td>
                <td><?= $lot->area ?> sqm</td>
                <td><?= ucfirst($lot->status) ?></td>
                <td>
                    <a href="<?= url('house/create?lot_id=' . $lot->id) ?>" class="btn btn-sm btn-success">Add House</a>
                    <a href="<?= url('inventory/view?lot_id=' . $lot->id) ?>" class="btn btn-sm btn-secondary">View</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
