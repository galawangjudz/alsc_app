<h2>Edit User</h2>

<form action="<?= url('adminuser/update/' . $user->id) ?>" method="POST" class="mb-4">
    <div class="mb-3">
        <label>Employee ID</label>
        <input type="text" name="employee_id" class="form-control" value="<?= htmlspecialchars($user->employee_id) ?>" required>
    </div>
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user->name) ?>" required>
    </div>
    <div class="mb-3">
        <label>New Password (leave blank to keep current)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
    <label>Role</label>
        <select name="role_id" class="form-select" required>
            <?php foreach ($roles as $role): ?>
                <option value="<?= $role->id ?>" <?= $user->role_id == $role->id ? 'selected' : '' ?>>
                    <?= htmlspecialchars($role->name) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <input type="text" name="is_active" class="form-control" value="<?= htmlspecialchars($user->is_active) ?>" required>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="<?= url('adminuser/user_list')?>" class="btn btn-secondary">Cancel</a>
</form>
