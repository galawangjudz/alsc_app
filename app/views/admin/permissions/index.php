<div class="container mt-4">
    <h2>Permissions List</h2>
    <a href="<?= url('permission/create') ?>" class="btn btn-primary mb-3">Add Permission</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permissions as $permission): ?>
                <tr>
                    <td><?= $permission->id ?></td>
                    <td><?= htmlspecialchars($permission->name) ?></td>
                    <td><?= htmlspecialchars($permission->description) ?></td>
                    <td>
                        <a href="<?= url('permission/edit/') . $permission->id ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/<?= url('permission/delete/') . $permission->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>