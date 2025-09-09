<?php
session_start();
require_once 'config/database.php';
require_once 'app/models/User.php';

$user = $_SESSION['user'] ?? null;
if (!$user) {
    header('Location: index.php');
    exit;
}

// Fetch user info from DB
$userModel = new User();
$dbUser = $userModel->findByIdentifier($user['email']);

function getAgeDetails($dob)
{
    $dobDate = new DateTime($dob);
    $now = new DateTime();
    $diff = $now->diff($dobDate);
    return [
        'years' => $diff->y,
        'months' => $diff->m,
        'days' => $diff->d
    ];
}
$age = getAgeDetails($dbUser['dob']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Profile - Sheywe Community Hospital</title>
</head>

<body>
    <?php include 'app/Views/navbar.php'; ?>
    <div class="mt-20 flex w-full items-center min-h-screen justify-center">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-lg w-full">
            <h1 class="text-4xl font-bold mb-4 text-blue-700">Your Profile</h1>
            <div class="space-y-4">
                <div class="flex items-center gap-4 mb-4">
                    <div
                        class="w-16 h-16 flex items-center justify-center bg-blue-100 border border-blue-500 rounded-full text-blue-700 font-bold text-2xl">
                        <?= strtoupper(substr($dbUser['first_name'], 0, 1) . substr($dbUser['last_name'], 0, 1)) ?>
                    </div>
                    <div>
                        <div class="text-xl font-semibold text-gray-800">
                            <?= htmlspecialchars($dbUser['first_name'] . ' ' . $dbUser['last_name']) ?></div>
                        <div class="text-gray-600">Email: <?= htmlspecialchars($dbUser['email']) ?></div>
                        <div class="text-gray-600">Phone: <?= htmlspecialchars($dbUser['phone']) ?></div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <div class="font-medium text-gray-700">Gender</div>
                        <div class="text-gray-900"><?= htmlspecialchars($dbUser['gender']) ?></div>
                    </div>
                    <div>
                        <div class="font-medium text-gray-700">Date of Birth</div>
                        <div class="text-gray-900"><?= htmlspecialchars($dbUser['dob']) ?></div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="font-medium text-gray-700">Age</div>
                    <div class="text-gray-900">
                        <?= $age['years'] ?> years, <?= $age['months'] ?> months, <?= $age['days'] ?> days
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>