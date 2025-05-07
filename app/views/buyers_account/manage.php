<form method="post" action="<?= url('buyersaccount/save') ?>">
    <input type="hidden" name="id" value="<?= $account->account_no ?? '' ?>">

    <label>Buyer:</label>
    <select name="buyer_id">
        <?php foreach ($buyers as $buyer): ?>
            <option value="<?= $buyer->id ?>" <?= isset($account) && $account->buyer_id == $buyer->id ? 'selected' : '' ?>>
                <?= $buyer->name ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Lot:</label>
    <select name="lot_id">
        <?php foreach ($lots as $lot): ?>
            <option value="<?= $lot->id ?>" <?= isset($account) && $account->lot_id == $lot->id ? 'selected' : '' ?>>
                <?= $lot->location ?> - Block <?= $lot->block ?>, Lot <?= $lot->lot_number ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Total Contract Price:</label>
    <input type="number" name="total_contract_price" value="<?= $account->total_contract_price ?? '' ?>">

    <label>Payment Scheme:</label>
    <input type="text" name="payment_scheme" value="<?= $account->payment_scheme ?? '' ?>">

    <label>Remarks:</label>
    <textarea name="remarks"><?= $account->remarks ?? '' ?></textarea>

    <button type="submit">Save</button>
</form>
