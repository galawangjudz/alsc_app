<h2>Users</h2>

<a href="/?url=adminuser/create" class="btn btn-success mb-3">+ Add New User</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user->id) ?></td>
                <td><?= htmlspecialchars($user->employee_id) ?></td>
                <td><?= htmlspecialchars($user->name) ?></td>
                <td><?= htmlspecialchars($user->role_id) ?></td> <!-- You can join to roles table to show name -->
                <td>
                    <a href="/?url=adminuser/edit/<?= $user->id ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="/?url=adminuser/delete/<?= $user->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" class="text-center">No users found.</td>
        </tr>
    <?php endif; ?>

    </tbody>
</table>
