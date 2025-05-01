<!-- /app/views/layouts/main.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Admin Dashboard' ?></title>
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
                <a href="<?= BASE_URL ?>/dashboard/index" class="nav-link">Home</a>
            </li>
            <li class="nav-item mb-2">
                <a href="<?= BASE_URL ?>/adminuser/user_list" class="nav-link">Manage Users</a>
            </li>
            <li class="nav-item mb-2">
                <a href="<?= BASE_URL ?>/permission/index" class="nav-link">Permissions</a>
            </li>
            <li class="nav-item mb-2">
                <a href="<?= BASE_URL ?>/role/index" class="nav-link">Roles</a>
            </li>
            <li class="nav-item mb-2">
                <a href="<?= BASE_URL ?>/logs/index" class="nav-link">Activity Logs</a>
            </li>
            <li class="nav-item">
                <a href="<?= BASE_URL ?>/auth/logout" class="nav-link text-danger">Logout</a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content w-100">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <span class="navbar-brand">Welcome, <?= htmlspecialchars($user['name']); ?>!</span>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container-fluid">
            <?= $content; // The dynamic content will be injected here ?>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    &copy; <?= date('Y') ?> Your Company Name. All rights reserved.
</footer>

</body>
</html>
