<h2>Users</h2>

<a href="<?= url('adminuser/create') ?>" class="btn btn-success mb-3">+ Add New User</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Role</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user->id) ?></td>
                <td><?= htmlspecialchars($user->employee_id) ?></td>
                <td><?= htmlspecialchars($user->name) ?></td>
                <td><?= htmlspecialchars($user->role_id) ?></td> <!-- You can join to roles table to show name -->
                <td><?= htmlspecialchars($user->is_active) ?></td>
                <td>
                <?php if (can('edit_user')): ?>
                    <a href="<?= url('adminuser/edit/'.$user->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                <?php endif; ?>

                <?php if (can('delete_user')): ?>
                    <a href="<?= url('adminuser/delete/'.$user->id) ?>" class="btn btn-sm btn-danger">Delete</a>
                <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>


    </tbody>
</table>
