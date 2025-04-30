

<div class="container mt-4">
    <h2>Create Permission</h2>
    <form action="<?= url('permission/store') ?>" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Permission Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description (optional)</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="<?= url('permission/') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
