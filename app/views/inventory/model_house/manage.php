<h2> Create New Lot Inventory </h2>

<form method="POST" action="<?= url('inventory/save_model_house') ?>">
    <input type="hidden" name="id" value="<?= $model_house->id ?? '' ?>">


    <label>Code:</label>
    <input type="text" name="c_code" value="<?= $model_hose->c_code ?? '' ?>" required><br>

    <label>Acronym:</label>
    <input type="text" name="c_acronym" value="<?= $model_house->c_acronym ?? '' ?>" required><br>

    <label>House Model:</label>
    <input type="text" name="c_model" value="<?= $model_house->c_model ?? '' ?>" required><br>

    <button type="submit"><?= isset($model_house) ? 'Update Lot' : 'Create Lot' ?></button>
</form>
