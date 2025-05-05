<h2>Reservation Details</h2>

<a href="/reservation/index" class="btn btn-secondary mb-3">Back to List</a>

<div class="card p-3 mb-4">
    <h4>Buyer Information</h4>
    <p><strong>Buyer 1:</strong> <?= $reservation->buyer1_name ?> (<?= $reservation->buyer1_contact ?>)</p>
    <p><strong>Buyer 2:</strong> <?= $reservation->buyer2_name ?: '-' ?> (<?= $reservation->buyer2_contact ?: '-' ?>)</p>
    <p><strong>Address:</strong> <?= $reservation->address ?></p>
</div>

<div class="card p-3 mb-4">
    <h4>Property Information</h4>
    <p><strong>Lot:</strong> Lot <?= $reservation->lot()->number ?> - <?= $reservation->lot()->location ?></p>
    <p><strong>House:</strong> <?= $reservation->house() ? $reservation->house()->type . ' - ₱' . number_format($reservation->house()->price, 2) : 'None' ?></p>
    <p><strong>Fence Included:</strong> <?= $reservation->fence ? 'Yes' : 'No' ?></p>
</div>

<div class="card p-3 mb-4">
    <h4>Payment Information</h4>
    <p><strong>Down Payment:</strong> ₱<?= number_format($reservation->down_payment, 2) ?></p>
    <p><strong>Term:</strong> <?= $reservation->term_months ?> months</p>
    <p><strong>Estimated Monthly:</strong> ₱<?= number_format($reservation->down_payment / max($reservation->term_months, 1), 2) ?></p>
</div>

<div class="card p-3 mb-4">
    <h4>Agents</h4>
    <ul>
        <?php foreach ($reservation->agents() as $agent): ?>
            <li><?= $agent->name ?> (<?= $agent->email ?>)</li>
        <?php endforeach; ?>
    </ul>
</div>

<div class="card p-3 mb-4">
    <h4>Status</h4>
    <p><strong>Current Status:</strong> <?= ucfirst($reservation->status) ?></p>
</div>

<div class="text-end">
    <a href="/reservation/download/<?= $reservation->id ?>" class="btn btn-outline-primary">Download PDF</a>
</div>
