<h2>House Model List</h2>
<!-- Create Button -->
<a href="<?= url('inventory/model_house_manage') ?>" class="btn btn-primary mb-3">+ Create New House Model</a>

<!-- Inventory Table -->
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Code</th>
            <th>Acronym</th>
            <th>Model</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($model_houses)): ?>
          
            <?php foreach ($model_houses as $model_house): ?>
                <tr>
                    <td><?= $model_house->c_code ?></td>
                    <td><?= $model_house->c_acronym ?></td>
                    <td><?= $model_house->c_model ?></td>
                    <td>
                        <a href="<?= url('inventory/model_house_delete/' . $model_house->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this lot?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No Model House records found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
