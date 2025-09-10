<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 919.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
        </path>
    </svg>
    <span>Patients</span>
    </a>
    </li>t="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
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
    <!-- Top Navbar -->
    <nav class="bg-blue-500 text-white md:p-5 p-2 fixed top-0 left-0 right-0 z-50 shadow-lg">

        <div class="flex items-center justify-between">
            <!-- Left section with toggle and hospital name -->
            <div class="flex items-center space-x-4">
                <button id="sidebarToggle" class="text-white hover:bg-blue-700 p-2 rounded-lg md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <a href="index.php" class="md:text-xl text-md cursor-pointer flex font-bold">Sheywe <span
                        class="md:block hidden">
                        Admin</span>
                </a>
            </div>

            <div class="text-sm md:block hidden">
                <span id="currentDateTime" class="font-medium text-xl"></span>
            </div>

            <!-- Right section with date/time and user info -->
            <div class="flex items-center space-x-4">

                <?php if (isset($_SESSION['user'])): ?>
                <div class="flex items-center space-x-2">

                    <div class="flex items-center space-x-2">
                        <p class="md:text-xl text-md  font-medium"> Hello👋,Admin
                        </p>
                        <p class="text-lg font-semibold ml-1 md:block hidden">
                            <?php echo htmlspecialchars($_SESSION['user']['first_name']); ?>
                        </p>
                    </div>

                </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed left-0 top-14 h-full md:w-64 w-50 bg-gray-800 text-white sidebar-transition z-40 md:translate-x-0">
        <div class="flex flex-col h-full">
            <!-- Navigation Menu -->
            <nav class="flex-1 px-4 py-6">
                <ul class="space-y-2">
                    <li>
                        <a href="#" data-page="dashboard"
                            class="nav-link flex items-center space-x-3 p-2 rounded-md hover:bg-gray-700 transition-colors  text-white shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 5a2 2 0 012-2h4a2 2 0 012 2v6H8V5z"></path>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-page="appointments"
                            class="nav-link flex items-center space-x-3 p-2 rounded-md hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>Appointments</span>
                        </a>
                    </li>
                    <li>
                        <a href="admin-patients.php"
                            class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            <span>Patients</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-page="doctors"
                            class="nav-link flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>Doctors</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-page="consultations"
                            class="nav-link flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            <span>Consultations</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-page="messages"
                            class="nav-link flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                            <span>Messages</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Bottom section with logout -->
            <div class="p-3 absolute bottom-12 border-t w-full border-gray-700">
                <button onclick="logoutAdmin()"
                    class="flex items-center space-x-3 p-2 w-full rounded-lg hover:bg-red-600 transition-colors text-red-400 hover:text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <span class="text-white">Logout</span>
                </button>
            </div>
        </div>
    </aside>

    <!-- Overlay for mobile -->
    <div id="sidebarOverlay" class="fixed inset-0  hidden md:hidden"></div>

    <script>
    // Update date and time
    function updateDateTime() {
        const now = new Date();
        const options = {
            day: 'numeric',
            month: 'short',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true
        };

        let formatted = now.toLocaleDateString('en-GB', options);

        // Format to match "10th Sep,2025 04:19:23 PM"
        const day = now.getDate();
        const suffix = getDaySuffix(day);
        formatted = formatted.replace(/^\d+/, day + suffix);
        formatted = formatted.replace(' at ', ' ');

        document.getElementById('currentDateTime').textContent = formatted;
    }

    function getDaySuffix(day) {
        if (day >= 11 && day <= 13) return 'th';
        switch (day % 10) {
            case 1:
                return 'st';
            case 2:
                return 'nd';
            case 3:
                return 'rd';
            default:
                return 'th';
        }
    }

    // Sidebar toggle functionality
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function toggleSidebar() {
        sidebar.classList.toggle('sidebar-collapsed');
        sidebarOverlay.classList.toggle('hidden');
    }

    sidebarToggle.addEventListener('click', toggleSidebar);
    sidebarOverlay.addEventListener('click', toggleSidebar);

    // Close sidebar when clicking on a link (mobile)
    document.querySelectorAll('#sidebar a').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const page = link.getAttribute('data-page');
            if (page && typeof loadContent === 'function') {
                loadContent(page);
                setActiveNavItem(page);
            }

            if (window.innerWidth < 768) {
                toggleSidebar();
            }
        });
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            sidebar.classList.remove('sidebar-collapsed');
            sidebarOverlay.classList.add('hidden');
        }
    });

    // Logout function
    function logoutAdmin() {
        if (confirm('Are you sure you want to logout?')) {
            fetch('app/auth.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'action=logout'
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = 'index.php';
                    }
                });
        }
    }

    // Initialize
    updateDateTime();
    setInterval(updateDateTime, 1000); // Update every second

    // Set active nav item based on page
    function setActiveNavItem(activePage = 'dashboard') {
        // Remove active classes from all nav items
        document.querySelectorAll('#sidebar .nav-link').forEach(link => {
            link.classList.remove('bg-blue-600', 'text-white', 'shadow-lg');
            link.classList.add('hover:bg-gray-700');
        });

        // Add active classes to matching nav item
        document.querySelectorAll('#sidebar .nav-link').forEach(link => {
            const page = link.getAttribute('data-page');
            if (page === activePage) {
                link.classList.add('bg-blue-600', 'text-white', 'shadow-lg');
                link.classList.remove('hover:bg-gray-700');
            }
        });
    }

    // Initialize
    updateDateTime();
    setInterval(updateDateTime, 1000); // Update every second
    setActiveNavItem('dashboard'); // Set dashboard as active by default

    // Make setActiveNavItem globally available for the SPA
    window.setActiveNavItem = setActiveNavItem;
    </script>
</body>

</html>