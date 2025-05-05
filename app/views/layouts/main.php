<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALSC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .sidebar {
            min-width: 250px;
            background: #343a40;
            min-height: 100vh;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            background: #495057;
            display: block;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        footer {
            background: #f8f9fa;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="d-flex flex-column">

    <!-- Top Horizontal Navbar (with Notifications, User Info, and Logout) -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand" href="<?= url('dashboard/index') ?>">ALSC</a>

        <div class="ms-auto d-flex align-items-center">
            <!-- Notifications -->
            <?php 
            $notifications = Notification::unread(current_user_id());
            $unreadCount = count($notifications); // Get the unread notification count
            ?>
            <div class="nav-item dropdown me-3">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                    🔔 Notifications
                    <?php if ($unreadCount > 0): ?>
                        <span class="badge bg-danger" id="unreadCount"><?= $unreadCount ?></span> <!-- Show unread count -->
                    <?php endif; ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" id="notificationList" aria-labelledby="navbarDropdown" aria-expanded="false">
                    <?php if ($unreadCount === 0): ?>
                        <li><span class="dropdown-item">No new notifications</span></li>
                    <?php else: ?>
                        <?php foreach ($notifications as $note): ?>
                            <li data-id="<?= $note->id ?>">
                                <a href="#" class="dropdown-item mark-as-read">
                                    <?= htmlspecialchars($note->message) ?><br>
                                    <small class="text-muted"><?= date('Y-m-d H:i', strtotime($note->created_at)) ?></small>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- User Info (Name - Employee ID) -->
            <span class="text-white me-3">
                <?= htmlspecialchars($_SESSION['user']['name']) ?> - <?= htmlspecialchars($_SESSION['user']['employee_id']) ?>
            </span>

            <!-- Logout Button -->
            <a href="<?= url('auth/logout') ?>" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </nav>


    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h4>Dashboard</h4>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="<?= url('dashboard/index') ?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= url('reservation/index') ?>" class="nav-link">Reservation</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= url('inventory/index') ?>" class="nav-link">Inventory</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= url('adminagent/index') ?>" class="nav-link">Agent List</a>
                </li>
                <!-- Dropdown for Users, Permissions, and Roles (only if user has the permission) -->
                <?php if (can('manage_users') || can('manage_permissions') || can('manage_roles')): ?>
                    <li class="nav-item dropdown mb-2">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear-fill"></i> Settings
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <?php if (can('manage_users')): ?>
                                <li><a class="dropdown-item text-white" href="<?= url('adminuser/user_list') ?>"><i class="bi bi-person-fill"></i> Manage Users</a></li>
                            <?php endif; ?>
                            <?php if (can('manage_permissions')): ?>
                                <li><a class="dropdown-item text-white" href="<?= url('permission/index') ?>"><i class="bi bi-key-fill"></i> Permissions</a></li>
                            <?php endif; ?>
                            <?php if (can('manage_roles')): ?>
                                <li><a class="dropdown-item text-white" href="<?= url('role/index') ?>"><i class="bi bi-person-lock"></i> Roles</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- Link for Activity Logs (only if user has permission) -->
                <?php if (can('view_logs')): ?>
                    <li class="nav-item mb-2">
                        <a href="<?= url('logs/index') ?>" class="nav-link">Activity Logs</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content w-100">
            <!-- Page Content -->
            <?php echo $content; ?>
        </div>
    </div>

</div>

<!-- Footer -->
<footer>
    &copy; <?= date('Y') ?> Your Company Name. All rights reserved.
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // When a notification is clicked, mark it as read and update the notification list
        $('.mark-as-read').click(function(e) {
            e.preventDefault();
            var notificationId = $(this).closest('li').data('id');
            var $this = $(this); // Save the reference to the clicked element
            
            $.ajax({
                url: '<?= url('notif/markAsRead') ?>', // The URL that handles the request
                method: 'POST',
                data: { id: notificationId },
                success: function(response) {
                    var data = JSON.parse(response); // Parse the JSON response

                    if (data.status === 'success') {
                        // Remove the notification from the list
                        $('#notification-' + notificationId).remove();

                        // Update the unread count in the badge
                        var unreadCount = parseInt($('#unreadCount').text(), 10);
                        if (unreadCount > 1) {
                            $('#unreadCount').text(unreadCount - 1);
                        } else {
                            $('#unreadCount').remove(); // Remove the badge if there are no more unread notifications
                        }
                    } else {
                        alert('Failed to mark notification as read');
                    }
                },
                error: function() {
                    alert('Error occurred while marking the notification as read');
                }
            });
        });
    });
</script>

</body>
</html>
