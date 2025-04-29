<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h1>Welcome, <?= htmlspecialchars($user['name']) ?>!</h1>
    <p>Role: <strong><?= htmlspecialchars($user['role']) ?></strong></p>

    <a href="/logout" class="btn btn-danger mt-3">Logout</a>
</body>
</html>
