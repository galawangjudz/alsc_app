<h1>Users List</h1>
<a href="/users/create" class="btn btn-primary">Create New User</a>

<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['role_name'] ?></td>
                <td>
                    <a href="/users/edit/<?= $user['id'] ?>" class="btn btn-info btn-sm">Edit</a>
                    <a href="/users/delete/<?= $user['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
