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
                <a href="<?= url('inventory/index') ?>" class="nav-link">Inventory</a>
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

            <!-- Logout Link -->
            <li class="nav-item">
                <a href="<?= url('auth/logout') ?>" class="nav-link text-danger">Logout</a>
            </li>
        </ul>
    </div>


    <!-- Main Content -->
    <div class="content w-100">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <span class="navbar-brand">Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?>!</span>
            </div>
        </nav>

        <!-- Page Content -->
        <?php echo $content; ?> <!-- This is where the page-specific content will be injected -->
    </div>
</div>

<!-- Footer -->
<footer>
    &copy; <?= date('Y') ?> Your Company Name. All rights reserved.
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
