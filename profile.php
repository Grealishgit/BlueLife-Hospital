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
<style>
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Signika:wght@300..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

body {
    font-family: 'Quicksand', sans-serif;
}
</style>

<body>
    <?php include 'app/Views/navbar.php'; ?>
    <?php include 'components/toast.php'; ?>
    <div
        class="bg-gray-100 mt-15 flex w-full rounded-lg  shadow-lg shadow-blue-500 items-center p-2 min-h-screen justify-center">
        <div
            class="flex flex-col md:w-210 w-full md:flex-row hover:shadow-2xl cursor-pointer transition-shadow duration-300">
            <div class="flex-1 bg-white border-b-4 rounded-l-md border-blue-500 shadow-lg hidden md:block">
                <img src="/storage/uploads/bg1.jpg" alt="Profile UI" class="w-full h-full object-cover rounded-l-md" />
            </div>
            <div
                class="md:flex-1  bg-white rounded-r-md  border-t-4 border-blue-500  p-8 w-full flex flex-col justify-between">
                <div class="flex flex-col items-center mb-6">
                    <h1 class="text-xl font-bold text-center mb-2 text-blue-500">Hi👋
                        <?= htmlspecialchars($dbUser['first_name']) ?>, this is your Profile</h1>
                </div>
                <div class="space-y-4">
                    <div class="flex md:flex-row flex-col items-center gap-4 mb-4">
                        <div
                            class="w-25 h-25 md:w-16  md:h-14 flex items-center justify-center bg-blue-100 border border-blue-500 rounded-full text-blue-700 font-bold text-2xl">
                            <?= strtoupper(substr($dbUser['first_name'], 0, 1) . substr($dbUser['last_name'], 0, 1)) ?>
                        </div>
                        <div class="flex flex-col items-center rounded-md bg-sky-100 p-2 shadow-lg w-full">
                            <div class="text-xl font-semibold text-gray-800">
                                <?= htmlspecialchars($dbUser['first_name'] . ' ' . $dbUser['last_name']) ?></div>
                            <div class="text-gray-600 font-semibold">Email: <?= htmlspecialchars($dbUser['email']) ?>
                            </div>
                            <div class="text-gray-600 font-semibold">Phone: <?= htmlspecialchars($dbUser['phone']) ?>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1 bg-indigo-100 shadow-lg rounded-md">

                        <div class="flex items-center mt-7 w-full justify-center flex-row gap-4">
                            <div class="border-r border-gray-500 pr-4">
                                <div class="font-medium text-gray-700">Gender</div>
                                <div class="text-gray-900 font-bold capitalize">
                                    <?= htmlspecialchars($dbUser['gender']) ?>
                                </div>
                            </div>

                            <div>
                                <div class="font-medium text-gray-700">Date of Birth</div>
                                <div class="text-gray-900 font-bold"><?= htmlspecialchars($dbUser['dob']) ?></div>
                            </div>
                        </div>
                        <div class="mt-4 items-center mb-4 w-full text-center">
                            <div class="font-semibold text-gray-700">Your Current Age</div>
                            <div>
                                <p class="text-gray-900 font-semibold">
                                    <span class="text-red-300"><?= $age['years'] ?></span> years,
                                    <span class="text-red-300"><?= $age['months'] ?></span> months,
                                    <span class="text-red-300"><?= $age['days'] ?></span> days
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-row w-full gap-4 mt-6">
                        <button onclick="document.getElementById('editProfileModal').classList.remove('hidden')"
                            class="bg-blue-500 text-white py-2 w-full cursor-pointer rounded hover:bg-blue-600 font-semibold">Edit
                            Profile
                        </button>
                        <button onclick="document.getElementById('changePasswordModal').classList.remove('hidden')"
                            class="bg-gray-400 text-white  py-2 w-full cursor-pointer rounded hover:bg-gray-600 font-semibold">
                            Change Password</button>

                    </div>
                    <button class=" bg-red-600 text-white w-full py-2 cursor-pointer rounded hover:bg-red-500
                            font-semibold">
                        Delete Account</button>
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
            <form id="editProfileForm" method="POST">
                <input type="hidden" name="edit_profile" value="1" />
                <div class="flex gap-2 md:gap-4">
                    <div class="mb-3"><input type="text" name="first_name"
                            value="<?= htmlspecialchars($dbUser['first_name']) ?>"
                            class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="First Name" />
                    </div>
                    <div class="mb-3"><input type="text" name="last_name"
                            value="<?= htmlspecialchars($dbUser['last_name']) ?>"
                            class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="Last Name" />
                    </div>
                </div>
                <div class="flex gap-2 md:gap-4">
                    <div class="mb-3"><input type="text" name="phone" value="<?= htmlspecialchars($dbUser['phone']) ?>"
                            class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="Phone" />
                    </div>
                    <div class="mb-3">
                        <select name="gender" class="w-full px-3 py-2 border border-gray-400 rounded" required>
                            <option value="">Select Gender</option>
                            <option value="male" <?= $dbUser['gender'] === 'male' ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?= $dbUser['gender'] === 'female' ? 'selected' : '' ?>>Female
                            </option>
                            <option value="other" <?= $dbUser['gender'] === 'other' ? 'selected' : '' ?>>Other</option>
                        </select>
                    </div>
                </div>


                <div class="mb-3"><input type="date" name="dob" value="<?= htmlspecialchars($dbUser['dob']) ?>"
                        class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="Date of Birth" />
                </div>
                <div class="mb-3"><input type="password" name="edit_password"
                        class="w-full px-3 py-2 border border-gray-400 rounded" required
                        placeholder="Enter your password to save changes" /></div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white cursor-pointer py-2 rounded hover:bg-blue-600 font-semibold">
                    Save Changes
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
            <h2 class="text-2xl font-bold mb-4 text-red-700">Change Password</h2>
            <form id="changePasswordForm" method="POST">
                <input type="hidden" name="change_password" value="1" />
                <div class="mb-3"><input type="password" name="old_password"
                        class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="Old Password" />
                </div>
                <div class="mb-3"><input type="password" name="new_password"
                        class="w-full px-3 py-2 border border-gray-400 rounded" required placeholder="New Password" />
                </div>
                <button type="submit"
                    class="w-full bg-red-500 text-white py-2 rounded cursor-pointer hover:bg-red-600 font-semibold">Change
                    Password</button>
            </form>
        </div>
    </div>
    <?php include 'app/Views/footer.php'; ?>

    <script>
    // Handle Edit Profile Form
    document.getElementById('editProfileForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        formData.append('action', 'edit_profile');

        // Basic client-side validation
        const firstName = formData.get('first_name').trim();
        const lastName = formData.get('last_name').trim();
        const phone = formData.get('phone').trim();
        const gender = formData.get('gender');
        const dob = formData.get('dob');
        const password = formData.get('edit_password');

        if (!firstName || !lastName || !phone || !gender || !dob || !password) {
            showToast.error('All fields are required');
            return;
        }

        if (password.length < 6) {
            showToast.error('Password must be at least 6 characters long');
            return;
        }

        // Submit form
        fetch('app/profile-handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast.success(data.message);
                    document.getElementById('editProfileModal').classList.add('hidden');
                    // Refresh page after a short delay to show updated data
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    showToast.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast.error('An error occurred while updating profile');
            });
    });

    // Handle Change Password Form
    document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        formData.append('action', 'change_password');

        // Basic client-side validation
        const oldPassword = formData.get('old_password');
        const newPassword = formData.get('new_password');

        if (!oldPassword || !newPassword) {
            showToast.error('Both old and new passwords are required');
            return;
        }

        if (newPassword.length < 6) {
            showToast.error('New password must be at least 6 characters long');
            return;
        }

        if (oldPassword === newPassword) {
            showToast.warning('New password must be different from the old password');
            return;
        }

        // Submit form
        fetch('app/profile-handler.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showToast.success(data.message);
                    document.getElementById('changePasswordModal').classList.add('hidden');
                    // Clear form
                    this.reset();
                } else {
                    showToast.error(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast.error('An error occurred while changing password');
            });
    });

    // Modal close functionality with ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.getElementById('editProfileModal').classList.add('hidden');
            document.getElementById('changePasswordModal').classList.add('hidden');
        }
    });

    // Close modal when clicking outside
    document.getElementById('editProfileModal').addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });

    document.getElementById('changePasswordModal').addEventListener('click', function(e) {
        if (e.target === this) {
            this.classList.add('hidden');
        }
    });
    </script>
</body>

</html>