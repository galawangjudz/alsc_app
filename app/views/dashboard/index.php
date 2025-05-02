<div class="container-fluid">
    <div class="row">
        <!-- KPI CARDS -->
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h6 class="card-title">Total Users</h6>
                    <h3><?= $totalUsers ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h6 class="card-title">Total Lots</h6>
                    <h3><?= $totalLots ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h6 class="card-title">Houses</h6>
                    <h3><?= $totalHouses ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h6 class="card-title">Fences</h6>
                    <h3><?= $totalFences ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="card shadow-sm mb-4">
                <div class="card-body text-center">
                    <h6 class="card-title">Additional Costs</h6>
                    <h3><?= $totalAddCosts ?></h3>
                </div>
            </div>
        </div>

        <!-- CLASSIFIED LOT SUMMARY -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Lot Classification</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Total</th>
                                <th>With House</th>
                                <th>With Fence</th>
                                <th>With Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Available</td>
                                <td><?= $classifiedLots['Available']['total'] ?></td>
                                <td><?= $classifiedLots['Available']['withHouse'] ?></td>
                                <td><?= $classifiedLots['Available']['withFence'] ?></td>
                                <td><?= $classifiedLots['Available']['withAddCost'] ?></td>
                            </tr>
                            <tr>
                                <td>Sold</td>
                                <td><?= $classifiedLots['Sold']['total'] ?></td>
                                <td><?= $classifiedLots['Sold']['withHouse'] ?></td>
                                <td><?= $classifiedLots['Sold']['withFence'] ?></td>
                                <td><?= $classifiedLots['Sold']['withAddCost'] ?></td>
                            </tr>
                            <tr>
                                <td>On Hold</td>
                                <td><?= $classifiedLots['On Hold']['total'] ?></td>
                                <td><?= $classifiedLots['On Hold']['withHouse'] ?></td>
                                <td><?= $classifiedLots['On Hold']['withFence'] ?></td>
                                <td><?= $classifiedLots['On Hold']['withAddCost'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- RECENT ACTIVITY -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Recent Activity</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <?php if (empty($activityLogs)): ?>
                            <li class="list-group-item">No recent activity found.</li>
                        <?php else: ?>
                            <?php foreach ($activityLogs as $log): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span><?= htmlspecialchars($log['description']) ?></span>
                                    <small class="text-muted"><?= date('Y-m-d H:i', strtotime($log['created_at'])) ?></small>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
