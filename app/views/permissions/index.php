<h1>Permissions List</h1>
<a href="/permissions/create" class="btn btn-primary">Create New Permission</a>

<table class="table table-striped mt-3">
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
                <td><?= $permission['id'] ?></td>
                <td><?= $permission['name'] ?></td>
                <td><?= $permission['description'] ?></td>
                <td>
                    <a href="/permissions/assign/<?= $permission['id'] ?>" class="btn btn-info btn-sm">Assign to Role</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
