<?php
$current = basename($_SERVER['PHP_SELF']);
$tabs = [
    'index.php' => 'Home',
    'about.php' => 'About',
    'services.php' => 'Services',
    'contact.php' => 'Contact',
    'blog.php' => 'Blog'
];
?>

<nav
    class="bg-white fixed top-0 w-full text-white z-50 p-4 shadow-sm shadow-gray-600 flex items-center justify-between">
    <div class="flex items-center space-x-2">
        <a href="index.php" class="font-bold cursor-pointer text-blue-500 text-2xl">Blue<span
                class="text-black">Life</span></a>
    </div>

    <!-- Desktop Navigation -->
    <ul class="md:flex text-lg hidden space-x-6">
        <?php
        foreach ($tabs as $file => $label) {
            $isActive = $current === $file;
            echo '<li>';
            echo '<a href="' . $file . '" class="nav-tab ' . ($isActive ? 'active' : '') . '">' . $label . '</a>';
            echo '</li>';
        }
        ?>
    </ul>

    <!-- Desktop Login/Profile -->
    <div class="hidden md:flex items-center space-x-4">
        <a href="#" onclick="openModal()"
            class="text-blue-500 px-6 py-2 text-white rounded-md bg-blue-500 font-semibold hover:text-blue-200">Login</a>
        <a href="/profile.php">
            <img src="/storage/uploads/doctor1.png" alt=""
                class="w-8 h-8 border border-blue-500 cursor-pointer rounded-full object-cover">
        </a>
    </div>

    <!-- Mobile Menu Button -->
    <button id="mobileMenuBtn"
        class="md:hidden flex items-center justify-center w-10 h-10 rounded-lg hover:bg-gray-100 transition-colors">
        <div class="hamburger-menu">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </div>
    </button>
    <!-- Nav Progress Loader -->
    <div id="navProgressContainer"
        class="absolute left-0 bottom-0 h-[3px] w-full pointer-events-none opacity-0 transition-opacity duration-150">
        <div id="navProgressBar"
            class="h-full w-0 bg-gradient-to-r from-blue-500 to-indigo-500 shadow-[0_0_6px_rgba(59,130,246,0.6)]"></div>
    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div id="mobileMenuOverlay" class="fixed inset-0 bg-black/30 backdrop-blur-sm  z-100 hidden">
    <div id="mobileMenu"
        class="fixed top-0 right-0 h-full w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300 ease-in-out">
        <div class="p-6">
            <!-- Mobile Menu Header -->
            <div class="flex items-center justify-between mb-8">
                <span class="font-bold text-blue-500 text-xl">Blue<span class="text-black">Life</span></span>
                <button id="closeMobileMenu"
                    class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Navigation Links -->
            <ul class="space-y-4 mb-8">
                <?php
                foreach ($tabs as $file => $label) {
                    $isActive = $current === $file;
                    echo '<li>';
                    echo '<a href="' . $file . '" class="mobile-nav-link block py-3 px-4 rounded-lg transition-colors ' . ($isActive ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-gray-50') . '">' . $label . '</a>';
                    echo '</li>';
                }
                ?>
            </ul>

            <!-- Mobile Login/Profile Section -->
            <div class="border-t pt-6">
                <div class="space-y-4">
                    <a href="#" onclick="openModal()"
                        class="block w-full text-center bg-blue-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-600 transition-colors">
                        Login
                    </a>
                    <a href="/profile.php"
                        class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition-colors">
                        <img src="/storage/uploads/doctor1.png" alt=""
                            class="w-10 h-10 border border-blue-500 rounded-full object-cover">
                        <span class="text-gray-700 font-medium">Profile</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .nav-tab {
        position: relative;
        color: #3b82f6;
        font-weight: 600;
        padding: 0.5rem 1.2rem;
        z-index: 1;
    }

    .nav-tab.active {
        border-bottom: 4px solid #3b82f6;
        color: #496ee9ff;
    }

    .nav-tab::after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%) scaleX(0);
        width: 80%;
        height: 3px;
        background: linear-gradient(90deg, #3b82f6 0%, #6366f1 100%);
        transition: transform 0.4s cubic-bezier(.68, -0.55, .27, 1.55);
        z-index: 2;
    }

    .nav-tab:hover {
        color: #6366f1;
        box-shadow: 0 8px 24px rgba(59, 130, 246, 0.18);
        border-radius: 8px;
        background: linear-gradient(90deg, #e0e7ff 0%, #dbeafe 100%);
        animation: tabPulse 0.7s;
    }

    .nav-tab:hover::after {
        transform: translateX(-50%) scaleX(1);
    }

    /* Hamburger Menu Styles */
    .hamburger-menu {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 20px;
        height: 16px;
        cursor: pointer;
    }

    .hamburger-line {
        width: 100%;
        height: 2px;
        background-color: #3b82f6;
        border-radius: 1px;
        transition: all 0.3s ease;
    }

    /* Hamburger Animation */
    .hamburger-menu.active .hamburger-line:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .hamburger-menu.active .hamburger-line:nth-child(2) {
        opacity: 0;
    }

    .hamburger-menu.active .hamburger-line:nth-child(3) {
        transform: rotate(-45deg) translate(7px, -6px);
    }

    /* Mobile Menu Styles */
    .mobile-nav-link {
        font-weight: 500;
        font-size: 16px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .nav-tab {
            display: none;
        }
    }
</style>

<script>
    // Prevent duplicate initialization
    if (!window.mobileMenuInitialized) {
        window.mobileMenuInitialized = true;

        document.addEventListener('DOMContentLoaded', function() {

            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
            const mobileMenu = document.getElementById('mobileMenu');
            const closeMobileMenu = document.getElementById('closeMobileMenu');

            // // Check if all elements exist
            // if (!mobileMenuBtn || !mobileMenuOverlay || !mobileMenu || !closeMobileMenu) {
            //     console.error('Mobile menu elements missing:', {
            //         btn: !!mobileMenuBtn,
            //         overlay: !!mobileMenuOverlay,
            //         menu: !!mobileMenu,
            //         close: !!closeMobileMenu
            //     });
            //     return;
            // }

            // console.log('All mobile menu elements found successfully');
            const hamburgerMenu = mobileMenuBtn.querySelector('.hamburger-menu');

            // Open mobile menu using event delegation to avoid conflicts
            document.body.addEventListener('click', function(e) {
                // Check if click is on mobile menu button or its children
                if (e.target.closest('#mobileMenuBtn')) {
                    e.preventDefault();
                    e.stopPropagation();
                    //  console.log('Mobile menu button clicked via delegation - opening menu...');

                    // Show overlay
                    mobileMenuOverlay.classList.remove('hidden');

                    // Animate hamburger
                    const hamburgerMenuNew = document.querySelector('#mobileMenuBtn .hamburger-menu');
                    if (hamburgerMenuNew) {
                        hamburgerMenuNew.classList.add('active');
                        console.log('Hamburger animation activated');
                    }

                    // Trigger slide animation after overlay is shown
                    setTimeout(() => {
                        mobileMenu.classList.remove('translate-x-full');
                        mobileMenu.classList.add('translate-x-0');
                        console.log('Mobile menu slide animation triggered');
                    }, 10);

                    // Prevent body scroll
                    document.body.style.overflow = 'hidden';
                }
            });
            // Close mobile menu function
            function closeMobileMenuFunction() {
                // console.log('Closing mobile menu...');

                // Slide menu out
                mobileMenu.classList.remove('translate-x-0');
                mobileMenu.classList.add('translate-x-full');

                // Reset hamburger
                const hamburgerMenuNew = document.querySelector('#mobileMenuBtn .hamburger-menu');
                if (hamburgerMenuNew) {
                    hamburgerMenuNew.classList.remove('active');
                    // console.log('Hamburger animation deactivated');
                }

                // Hide overlay after animation completes
                setTimeout(() => {
                    mobileMenuOverlay.classList.add('hidden');
                    // console.log('Mobile menu overlay hidden');
                }, 300);

                // Restore body scroll
                document.body.style.overflow = '';
            }

            // Close mobile menu events
            closeMobileMenu.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                // console.log('Close button clicked');
                closeMobileMenuFunction();
            });

            // Close when clicking on overlay
            mobileMenuOverlay.addEventListener('click', function(e) {
                if (e.target === mobileMenuOverlay) {
                    // console.log('Overlay clicked - closing menu');
                    closeMobileMenuFunction();
                }
            });

            // Close menu when clicking on navigation links
            const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
            // console.log('Found mobile nav links:', mobileNavLinks.length);

            mobileNavLinks.forEach(link => {
                link.addEventListener('click', function() {
                    // console.log('Mobile nav link clicked');
                    closeMobileMenuFunction();
                });
            });

            // Close menu with escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !mobileMenuOverlay.classList.contains('hidden')) {
                    // console.log('Escape key pressed - closing menu');
                    closeMobileMenuFunction();
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768 && !mobileMenuOverlay.classList.contains('hidden')) {
                    // console.log('Window resized to desktop - closing menu');
                    closeMobileMenuFunction();
                }
            });

            // console.log('Mobile menu initialization complete');
        });
    }
</script>
<script>
    // Lightweight page navigation progress (full reload friendly)
    (function() {
        const sameHost = (url) => {
            try {
                return new URL(url, window.location.href).host === window.location.host;
            } catch {
                return false;
            }
        };

        function initNavLoader() {
            const container = document.getElementById('navProgressContainer');
            const bar = document.getElementById('navProgressBar');
            if (!container || !bar) return;

            function reset() {
                bar.style.transition = 'none';
                bar.style.width = '0%';
                requestAnimationFrame(() => {
                    bar.style.transition = 'width .4s ease';
                });
                container.classList.remove('active');
                container.style.opacity = '0';
            }

            function start() {
                // If already animating, restart quickly
                reset();
                container.classList.add('active');
                container.style.opacity = '1';
                // staged progression to mimic loading
                requestAnimationFrame(() => {
                    bar.style.width = '55%';
                });
                setTimeout(() => {
                    bar.style.width = '72%';
                }, 400);
                setTimeout(() => {
                    bar.style.width = '84%';
                }, 1100);
                // Safety timeout to finish if navigation aborted
                setTimeout(() => {
                    if (document.visibilityState === 'visible') finish();
                }, 4000);
            }

            function finish() {
                bar.style.width = '100%';
                setTimeout(() => {
                    container.style.opacity = '0';
                }, 150);
                setTimeout(reset, 600);
            }

            // Start on internal link clicks (allow normal navigation)
            document.addEventListener('click', (e) => {
                const a = e.target.closest('a[href]');
                if (!a) return;
                const href = a.getAttribute('href');
                if (!href || href.startsWith('#') || href.startsWith('mailto:') || href.startsWith('tel:'))
                    return;
                if (a.hasAttribute('target') && a.getAttribute('target') !== '_self') return;
                if (!sameHost(href)) return; // external
                start();
            }, true); // capture early

            // Show loader if browser triggers unload (covers non-click navigations)
            window.addEventListener('beforeunload', () => {
                // Ensure bar visible at final moment
                try {
                    start();
                } catch {}
            });

            // On load complete, finish (for back/forward cache or fast clicks)
            window.addEventListener('load', () => {
                finish();
            });
            document.addEventListener('pageshow', (evt) => {
                if (evt.persisted) finish();
            });
        }
        if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', initNavLoader);
        else initNavLoader();
    })();
</script>