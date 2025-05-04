<h2>Lot & House Inventory</h2>

<!-- Search Form -->
<form method="GET" action="<?= url('inventory/index') ?>" class="mb-3">
    <input type="text" name="q" placeholder="Search by lot, block, site, status..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>" class="form-control" />
</form>

<!-- Create Button -->
<a href="<?= url('inventory/manage') ?>" class="btn btn-primary mb-3">+ Create New Inventory</a>

<!-- Inventory Table -->
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Site</th>
            <th>Block</th>
            <th>Lot</th>
            <th>Area (sqm)</th>
            <th>Status</th>
            <th>House</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($inventory)): ?>
            <?php
            // Create a mapping of c_code to c_acronym
            $projectAcronyms = [];
            foreach ($projects as $project) {
                $projectAcronyms[$project->c_code] = $project->c_acronym;
            }
            ?>
            <?php foreach ($inventory as $item): ?>
                <tr>
                    <td><?= $projectAcronyms[$item->site_id] ?? $item->site_id ?></td>
                    <td><?= $item->block ?></td>
                    <td><?= $item->lot ?></td>
                    <td><?= $item->lot_area ?></td>
                    <td><?= $item->status ?></td>
                    <td><?= $item->house_model ?? '—' ?></td>
                    <td>
                        <a href="<?= url('inventory/manage/' . $item->id) ?>" class="btn btn-sm btn-info">View</a>
                        <a href="<?= url('inventory/manage/' . $item->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= url('inventory/delete_lot/' . $item->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this lot?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="7">No inventory records found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>
