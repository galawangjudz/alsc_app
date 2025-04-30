
<div class="container mt-4">
    <h2>Edit Role: <?= htmlspecialchars($role->name) ?></h2>

    <form action="<?= url('role/update/') . $role->id ?>" method="POST">
        <div class="mb-3">
            <label>Role Name</label>
            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($role->name) ?>" required>
        </div>

        <div class="mb-3">
            <label>Permissions</label>
            <?php foreach ($permissions as $permission): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="<?= $permission->id ?>"
                        <?= in_array($permission->id, $assigned) ? 'checked' : '' ?>>
                    <label class="form-check-label"><?= htmlspecialchars($permission->name) ?></label>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= url('role/index') ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
