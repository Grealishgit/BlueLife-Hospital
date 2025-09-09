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

// Handle profile edit
$editSuccess = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_profile'])) {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $password = $_POST['edit_password'] ?? '';
    // Verify password
    if (password_verify($password, $dbUser['password'])) {
        $stmt = $userModel->getPdo()->prepare("UPDATE users SET first_name=?, last_name=?, phone=?, gender=?, dob=? WHERE id=?");
        $stmt->execute([$first_name, $last_name, $phone, $gender, $dob, $dbUser['id']]);
        $editSuccess = true;
        // Refresh page
        header('Location: profile.php');
        exit;
    } else {
        $editSuccess = 'wrong';
    }
}
// Handle password change
$passSuccess = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    $old_password = $_POST['old_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    // Verify old password
    if (password_verify($old_password, $dbUser['password'])) {
        $stmt = $userModel->getPdo()->prepare("UPDATE users SET password=? WHERE id=?");
        $stmt->execute([password_hash($new_password, PASSWORD_DEFAULT), $dbUser['id']]);
        $passSuccess = true;
        // Refresh page
        header('Location: profile.php');
        exit;
    } else {
        $passSuccess = 'wrong';
    }
}
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
    <div
        class="bg-gray-100 flex w-full rounded-lg shadow-lg shadow-blue-500 items-center p-8 min-h-screen justify-center">
        <div class="flex flex-col max-w-3xl md:flex-row">
            <div class="flex-1 bg-white border-b-4 rounded-l-md border-blue-500 shadow-lg hidden md:block">
                <img src="/storage/uploads/bg1.jpg" alt="Profile UI" class="w-full h-full object-cover rounded-l-md" />
            </div>
            <div
                class="md:flex-1  bg-white rounded-r-md  border-t-4 border-blue-500  p-8 w-full flex flex-col justify-between">
                <div class="flex flex-col items-center mb-6">
                    <h1 class="text-4xl font-bold mb-2 text-blue-700">Your Profile</h1>
                </div>
                <div class="space-y-4">
                    <div class="flex md:flex-row flex-col items-center gap-4 mb-4">
                        <div
                            class="w-16 h-16 flex items-center justify-center bg-blue-100 border border-blue-500 rounded-full text-blue-700 font-bold text-2xl">
                            <?= strtoupper(substr($dbUser['first_name'], 0, 1) . substr($dbUser['last_name'], 0, 1)) ?>
                        </div>
                        <div>
                            <div class="text-xl font-semibold text-gray-800">
                                <?= htmlspecialchars($dbUser['first_name'] . ' ' . $dbUser['last_name']) ?></div>
                            <div class="text-gray-600 font-semibold">Email: <?= htmlspecialchars($dbUser['email']) ?>
                            </div>
                            <div class="text-gray-600 font-semibold">Phone: <?= htmlspecialchars($dbUser['phone']) ?>
                            </div>
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
                    <div class="mt-4 text-center">
                        <div class="font-medium text-gray-700">Your Current Age</div>
                        <div class="text-gray-900">
                            <?= $age['years'] ?> years, <?= $age['months'] ?> months, <?= $age['days'] ?> days
                        </div>
                    </div>
                    <div class="flex md:flex-row flex-col gap-4 mt-6">
                        <button onclick="document.getElementById('editProfileModal').classList.remove('hidden')"
                            class="bg-blue-500 text-white px-4 py-2 cursor-pointer rounded hover:bg-blue-600 font-semibold">Edit
                            Profile
                        </button>
                        <button onclick="document.getElementById('changePasswordModal').classList.remove('hidden')"
                            class="bg-red-400 text-white px-4 py-2 cursor-pointer rounded hover:bg-purple-600 font-semibold">
                            Change Password</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Edit Profile Modal -->
    <div id="editProfileModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 backdrop-blur-md bg-opacity-50 hidden">
        <div class="bg-white rounded-md shadow-lg w-full max-w-md p-8 relative">
            <button onclick="document.getElementById('editProfileModal').classList.add('hidden')"
                class="absolute top-2 right-4 cursor-pointer text-2xl text-red-500 hover:text-red-700">&times;</button>
            <h2 class="text-2xl font-bold mb-4 text-blue-700">Edit Profile</h2>
            <?php if ($editSuccess === 'wrong'): ?><div class="text-red-500 mb-2">Incorrect password!</div>
            <?php endif; ?>
            <form method="POST">
                <input type="hidden" name="edit_profile" value="1" />
                <div class="mb-3"><input type="text" name="first_name"
                        value="<?= htmlspecialchars($dbUser['first_name']) ?>"
                        class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="First Name" />
                </div>
                <div class="mb-3"><input type="text" name="last_name"
                        value="<?= htmlspecialchars($dbUser['last_name']) ?>"
                        class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="Last Name" />
                </div>
                <div class="mb-3"><input type="text" name="phone" value="<?= htmlspecialchars($dbUser['phone']) ?>"
                        class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="Phone" />
                </div>
                <div class="mb-3"><input type="text" name="gender" value="<?= htmlspecialchars($dbUser['gender']) ?>"
                        class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="Gender" />
                </div>
                <div class="mb-3"><input type="date" name="dob" value="<?= htmlspecialchars($dbUser['dob']) ?>"
                        class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="Date of Birth" />
                </div>
                <div class="mb-3"><input type="password" name="edit_password"
                        class="w-full px-3 py-2 border border-gray-400 rounded" required
                        placeholder="Enter your password to save changes" /></div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 font-semibold">Save Changes
                </button>
            </form>
        </div>
    </div>
    <!-- Change Password Modal -->
    <div id="changePasswordModal"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 backdrop-blur-md bg-opacity-50 hidden">
        <div class="bg-white rounded-md shadow-lg w-full max-w-md p-8 relative">
            <button onclick="document.getElementById('changePasswordModal').classList.add('hidden')"
                class="absolute top-2 right-4 cursor-pointer text-2xl text-red-500 hover:text-red-700">&times;</button>
            <h2 class="text-2xl font-bold mb-4 text-purple-700">Change Password</h2>
            <?php if ($passSuccess === 'wrong'): ?><div class="text-red-500 mb-2">Incorrect old password!</div>
            <?php endif; ?>
            <form method="POST">
                <input type="hidden" name="change_password" value="1" />
                <div class="mb-3"><input type="password" name="old_password"
                        class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="Old Password" />
                </div>
                <div class="mb-3"><input type="password" name="new_password"
                        class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="New Password" />
                </div>
                <button type="submit"
                    class="w-full bg-purple-500 text-white py-2 rounded hover:bg-purple-600 font-semibold">Change
                    Password</button>
            </form>
        </div>
    </div>
</body>

</html>