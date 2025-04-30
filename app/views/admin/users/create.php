<h2>Add New User</h2>

<form action="<?= url('adminuser/store') ?>" method="POST" class="mb-4">
    <div class="mb-3">
        <label>Employee ID</label>
        <input type="text" name="employee_id" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Role</label>
        <select name="role_id" class="form-select" required>
            <?php foreach ($roles as $role): ?>
                <option value="<?= $role->id ?>"><?= htmlspecialchars($role->name) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <button class="btn btn-primary">Create</button>
    <a href="<?= url('adminuser/index') ?>" class="btn btn-secondary">Cancel</a>
</form>
