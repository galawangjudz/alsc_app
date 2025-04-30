<div class="container mt-4">
    <h2>Edit Permission</h2>
    <form action="<?= url('permission/update/') . $permission->id ?>" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Permission Name</label>
            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($permission->name) ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description"><?= htmlspecialchars($permission->description) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= url('permission/') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>