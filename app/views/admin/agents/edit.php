<h1>Edit Agent</h1>

<form action="<?= url('adminagent/update/'.$agent->id) ?>" method="POST">
    <div class="form-group">
        <label for="c_code">Agent Code</label>
        <input type="text" name="c_code" id="c_code" class="form-control" value="<?= htmlspecialchars($agent->c_code) ?>" required>
    </div>
    <div class="form-group">
        <label for="c_last_name">Last Name</label>
        <input type="text" name="c_last_name" id="c_last_name" class="form-control" value="<?= htmlspecialchars($agent->c_last_name) ?>" required>
    </div>
    <div class="form-group">
        <label for="c_first_name">First Name</label>
        <input type="text" name="c_first_name" id="c_first_name" class="form-control" value="<?= htmlspecialchars($agent->c_first_name) ?>" required>
    </div>
    <div class="form-group">
        <label for="c_position">Position</label>
        <input type="text" name="c_position" id="c_position" class="form-control" value="<?= htmlspecialchars($agent->c_position) ?>">
    </div>
    <div class="form-group">
        <label for="c_rate">Rate</label>
        <input type="text" name="c_rate" id="c_rate" class="form-control" value="<?= htmlspecialchars($agent->c_rate) ?>">
    </div>
    <div class="form-group">
        <label for="c_withholding_tax">With Holding Tax</label>
        <input type="text" name="c_withholding_tax" id="c_withholding_tax" class="form-control" value="<?= htmlspecialchars($agent->c_withholding_tax) ?>">
    </div>
    <!-- Add other fields as necessary -->
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= url('adminagent/index') ?>" class="btn btn-secondary">Cancel</a>
</form>