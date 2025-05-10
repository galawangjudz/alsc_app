<h2 class="mb-4">Reservation Payment</h2>

<div class="mb-3">
    <p><strong>Reservation No:</strong> <?= $reservation->reservation_no ?? 'Pending' ?></p>
    <p><strong>Reservation Fee:</strong> PHP <?= number_format($reservation->reservation_fee, 2) ?></p>
    <p><strong>Total Paid:</strong> PHP <?= number_format($paid, 2) ?></p>
    <p><strong>Remaining Balance:</strong> PHP <?= number_format($balance, 2) ?></p>
</div>

<hr>

<form method="POST" action="<?= url('reservation/payment_save') ?>" class="row g-3">
    <input type="hidden" name="reservation_id" value="<?= $reservation->id ?>">

    <div class="col-md-6">
        <label class="form-label">Reference No. (OR#, CAR#, etc.)</label>
        <input type="text" name="reference_no" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Payment Date</label>
        <input type="date" name="payment_date" value="<?= date('Y-m-d') ?>" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Amount</label>
        <input type="number" name="amount" step="0.01" max="<?= $balance ?>" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Payment Mode</label>
        <select name="payment_mode" class="form-select">
            <option value="cash">Cash</option>
            <option value="bank_transfer">Bank Transfer</option>
            <option value="gcash">GCash</option>
        </select>
    </div>

    <div class="col-12">
        <label class="form-label">Bank Details</label>
        <textarea name="bank_details" class="form-control" placeholder="Optional (e.g., bank name, txn ID)"></textarea>
    </div>

    <div class="col-12">
        <label class="form-label">Remarks</label>
        <textarea name="remarks" class="form-control" placeholder="e.g., From prior account, AV ref, etc."></textarea>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Submit Payment</button>
    </div>
</form>
