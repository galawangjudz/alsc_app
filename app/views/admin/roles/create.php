
<div class="container mt-4">
    <h2>Create Role</h2>

    <form action="<?= url('role/store') ?>" method="POST">
        <div class="mb-3">
            <label>Role Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Assign Permissions</label>
            <?php foreach ($permissions as $permission): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="permissions[]" value="<?= $permission->id ?>">
                    <label class="form-check-label"><?= htmlspecialchars($permission->name) ?></label>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="<?= url('role/index') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>