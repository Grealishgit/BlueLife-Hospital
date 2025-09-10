<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION['user']) || !isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sheywe Community Hospital</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Signika:wght@300..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
    </style>

    <!-- Custom CSS for additional styling -->
    <style>
    body {
        font-family: 'Quicksand', sans-serif;
    }

    .sidebar-transition {
        transition: transform 0.3s ease-in-out;
    }

    .sidebar-collapsed {
        transform: translateX(-100%);
    }

    .content-expanded {
        margin-left: 0;
    }

    .content-normal {
        margin-left: 16rem;
    }

    @media (max-width: 768px) {
        .content-normal {
            margin-left: 0;
        }
    }
    </style>
</head>

<body>

    <?php
    // Include the admin navbar
    include 'app/Views/adminNavbar.php';
    ?>

    <!-- Main Content Area -->
    <div class="content-normal pt-16 min-h-screen bg-gray-100 relative z-10">
        <div id="dynamic-content" class="p-6">
            <!-- Dashboard content will be loaded here by default -->
            <?php include 'app/admin/dashboard-content.php'; ?>
        </div>
    </div>

    <script>
    // Dynamic content loading function
    function loadContent(page) {
        const contentContainer = document.getElementById('dynamic-content');

        // Show loading state
        contentContainer.innerHTML = `
            <div class="flex items-center justify-center h-64">
                <div class="text-center">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div>
                    <p class="mt-4 text-gray-600">Loading...</p>
                </div>
            </div>
        `;

        // Fetch the content
        fetch(`app/admin/load-content.php?page=${page}`)
            .then(response => response.text())
            .then(data => {
                contentContainer.innerHTML = data;
            })
            .catch(error => {
                contentContainer.innerHTML = `
                    <div class="flex items-center justify-center h-64">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-red-600 font-medium">Error loading content</p>
                            <p class="text-gray-500 text-sm mt-1">Please try again</p>
                        </div>
                    </div>
                `;
            });
    }

    // Adjust content margin based on sidebar state
    function adjustContentMargin() {
        const sidebar = document.getElementById('sidebar');
        const content = document.querySelector('.content-normal');

        if (window.innerWidth >= 768) {
            if (sidebar.classList.contains('sidebar-collapsed')) {
                content.classList.remove('content-normal');
                content.classList.add('content-expanded');
            } else {
                content.classList.remove('content-expanded');
                content.classList.add('content-normal');
            }
        }
    }

    // Listen for sidebar toggle
    document.getElementById('sidebarToggle').addEventListener('click', () => {
        setTimeout(adjustContentMargin, 300); // Wait for transition
    });

    // Add event listeners to sidebar links after navbar is loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Wait for navbar to be fully loaded
        setTimeout(() => {
            const sidebarLinks = document.querySelectorAll('#sidebar nav a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active class from all links
                    sidebarLinks.forEach(l => {
                        l.classList.remove('bg-blue-600', 'text-white',
                            'shadow-lg');
                        l.classList.add('hover:bg-gray-700');
                    });

                    // Add active class to clicked link
                    this.classList.add('bg-blue-600', 'text-white', 'shadow-lg');
                    this.classList.remove('hover:bg-gray-700');

                    // Get page name from link text
                    const pageName = this.textContent.trim().toLowerCase();
                    loadContent(pageName);
                });
            });
        }, 500);
    });
    </script>

</body>

</html>

<script>
// Adjust content margin based on sidebar state
function adjustContentMargin() {
    const sidebar = document.getElementById('sidebar');
    const content = document.querySelector('.content-normal');

    if (window.innerWidth >= 768) {
        if (sidebar.classList.contains('sidebar-collapsed')) {
            content.classList.remove('content-normal');
            content.classList.add('content-expanded');
        } else {
            content.classList.remove('content-expanded');
            content.classList.add('content-normal');
        }
    }
}

// Listen for sidebar toggle
document.getElementById('sidebarToggle').addEventListener('click', () => {
    setTimeout(adjustContentMargin, 300); // Wait for transition
});
</script>

</body>

</html>