<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];

if ($user['role'] === 'admin') {
    // Admin view
    $stmt = $pdo->query("SELECT * FROM users");
    $users = $stmt->fetchAll();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $user['role'] === 'admin') {
    // Edit or Delete user logic can be implemented here
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .dashboard-header {
            margin-bottom: 20px;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        .card {
            margin-bottom: 20px;
        }
        .table thead th {
            background-color: #007bff;
            color: white;
        }
        .carousel-inner img {
            height: 400px; /* Set height for carousel images */
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="dashboard-header">
            <h2>Dashboard</h2>
            <p>Welcome, <?php echo htmlspecialchars($user['name']); ?>!</p>
        </div>

        <?php if ($user['role'] === 'admin'): ?>
            <div class="card">
                <div class="card-body">
                    <h3>Data Pengguna</h3>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Institusi</th>
                                <th>Negara</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $u): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($u['id']); ?></td>
                                <td><?php echo htmlspecialchars($u['name']); ?></td>
                                <td><?php echo htmlspecialchars($u['email']); ?></td>
                                <td><?php echo htmlspecialchars($u['role']); ?></td>
                                <td><?php echo htmlspecialchars($u['institusi']); ?></td>
                                <td><?php echo htmlspecialchars($u['negara']); ?></td>
                                <td><?php echo htmlspecialchars($u['alamat']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div class="card">
                <div class="card-body">
                    <h3>Seminar</h3>
                    <div id="seminarCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="1.jpg" class="d-block w-100" alt="Gambar Seminar 1">
                            </div>
                            <div class="carousel-item">
                                <img src="2.jpg" class="d-block w-100" alt="Gambar Seminar 2">
                            </div>
                            <div class="carousel-item">
                                <img src="3.jpeg" class="d-block w-100" alt="Gambar Seminar 3">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#seminarCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#seminarCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <a href="register_seminar.php" class="btn btn-primary mt-3">Daftar Seminar</a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
