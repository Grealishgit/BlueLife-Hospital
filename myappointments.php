<?php
require_once __DIR__ . '/config/database.php';
// If you have a User session, you can use it to get user_id
// For demo, we'll use a static user_id
$user_id = 1;

// Fetch appointments for the user
$db = (new Database())->connect();
$sql = "SELECT * FROM appointments WHERE user_id = ? ORDER BY appointment_date DESC";
$stmt = $db->prepare($sql);
$stmt->execute([$user_id]);
$appointments = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Appointments - BlueLife Hospital</title>
    <link rel="stylesheet" href="assets/css/spa-navigation.css">
    <style>
    .appt-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 2rem;
    }

    .appt-table th,
    .appt-table td {
        border: 1px solid #e5e7eb;
        padding: 0.75rem;
        text-align: left;
    }

    .appt-table th {
        background: #3b82f6;
        color: #fff;
    }

    .appt-table tr:nth-child(even) {
        background: #f3f4f6;
    }

    .nav-links {
        margin: 1rem 0;
    }

    .nav-links a {
        margin-right: 1rem;
        color: #3b82f6;
        font-weight: 500;
        text-decoration: none;
    }

    .nav-links a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <?php include 'app/Views/navbar.php'; ?>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4 text-blue-600">My Appointments</h1>
        <div class="nav-links">
            <a href="profile.php">My Profile</a>
            <a href="appointment.php">Book Appointment</a>
            <a href="index.php">Home</a>
        </div>
        <?php if ($appointments && count($appointments) > 0): ?>
        <table class="appt-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Doctor</th>
                    <th>Department</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appt): ?>
                <tr>
                    <td><?= htmlspecialchars($appt['appointment_date']) ?></td>
                    <td><?= htmlspecialchars($appt['appointment_time']) ?></td>
                    <td><?= htmlspecialchars($appt['doctor_name']) ?></td>
                    <td><?= htmlspecialchars($appt['department']) ?></td>
                    <td><?= htmlspecialchars($appt['status']) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>You have no appointments yet. <a href="appointment.php" class="text-blue-500">Book one now</a>.</p>
        <?php endif; ?>
    </div>
</body>

</html>