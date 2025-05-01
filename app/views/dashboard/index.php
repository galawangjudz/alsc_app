<div class="container-fluid">
    <div class="row">
        <!-- KPI Cards -->
        <div class="col-md-6 col-xl-4">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <h3 class="card-text"><?= $totalUsers ?></h3>
                </div>
            </div>
        </div>

        <!-- Recent Activity Logs -->
        <div class="col-md-6 col-xl-8">
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
                                <li class="list-group-item">
                                    <?= htmlspecialchars($log['description']) ?> 
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
