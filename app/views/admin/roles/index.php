

<div class="container mt-4">
    <h2>Roles</h2>
    <a href="<?= url('role/create') ?>" class="btn btn-primary mb-3">+ Add Role</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Role Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role): ?>
                <tr>
                    <td><?= $role->id ?></td>
                    <td><?= htmlspecialchars($role->name) ?></td>
                    <td>
                        <a href="<?= url('role/edit/'). $role->id ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= url('role/delete/') . $role->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this role?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
