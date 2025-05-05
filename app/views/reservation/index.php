<h2>Reservations</h2>

<a href="/reservation/create" class="btn btn-primary mb-3">+ New Reservation</a>

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Buyer</th>
            <th>Lot</th>
            <th>Down Payment</th>
            <th>Term</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($reservations) > 0): ?>
            <?php foreach ($reservations as $res): ?>
                <tr>
                    <td><?= $res->id ?></td>
                    <td><?= $res->buyer1_name ?><?= $res->buyer2_name ? ' & ' . $res->buyer2_name : '' ?></td>
                    <td>
                        Lot <?= $res->lot()->number ?? '' ?> - <?= $res->lot()->location ?? '' ?>
                    </td>
                    <td>₱<?= number_format($res->down_payment, 2) ?></td>
                    <td><?= $res->term_months ?> months</td>
                    <td><span class="badge bg-<?= getStatusColor($res->status) ?>"><?= ucfirst($res->status) ?></span></td>
                    <td>
                        <a href="/reservation/view/<?= $res->id ?>" class="btn btn-sm btn-info">View</a>
                        <a href="/reservation/edit/<?= $res->id ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/reservation/delete/<?= $res->id ?>" onclick="return confirm('Delete this reservation?')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">No reservations found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>