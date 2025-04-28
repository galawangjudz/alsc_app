<h1>Edit User</h1>
<form action="/users/edit/<?= $user['id'] ?>" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="role_id" class="form-label">Role</label>
        <select class="form-select" id="role_id" name="role_id" required>
            <?php foreach ($roles as $role): ?>
                <option value="<?= $role['id'] ?>" <?= $role['id'] == $user['role_id'] ? 'selected' : '' ?>>
                    <?= $role['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update User</button>
</form>
