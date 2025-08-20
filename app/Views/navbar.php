<nav class="bg-white fixed top-0 w-full text-white z-100 p-4 shadow-sm shadow-gray-600 flex items-center justify-between"
    style="font-family: 'Inter', sans-serif;">
    <div class="flex items-center space-x-2">
        <span class="font-bold cursor-pointer  text-blue-500 text-2xl">Blue<span class="text-black">Life</span> </span>
    </div>
    <ul class="md:flex text-lg hidden space-x-6">
        <?php
        $current = basename($_SERVER['PHP_SELF']);
        $tabs = [
            'index.php' => 'Home',
            'about.php' => 'About',
            'services.php' => 'Services',
            'contact.php' => 'Contact',
            'blog.php' => 'Blog'
        ];
        foreach ($tabs as $file => $label) {
            $isActive = $current === $file;
            echo '<li>';
            echo '<a href="' . $file . '" class="nav-tab ' . ($isActive ? 'active' : '') . '">' . $label . '</a>';
            echo '</li>';
        }
        ?>
    </ul>
    <div class="flex items-center space-x-4">
        <a href="#" onclick="openModal()"
            class="text-blue-500 px-6 py-2 text-white rounded-md bg-blue-500 font-semibold hover:text-blue-200">Login</a>
        <a href="/profile.php">
            <img src="/storage/uploads/doctor1.png" alt=""
                class="w-8 h-8 border border-blue-500 cursor-pointer rounded-full object-cover">
        </a>
    </div>
</nav>
<style>
.nav-tab {
    position: relative;
    color: #3b82f6;
    font-weight: 600;
    padding: 0.5rem 1.2rem;
    /* border-radius: 0.35rem;
    transition: color 0.2s, box-shadow 0.3s, border 0.3s;
    background: rgba(255, 255, 255, 0.1); */
    z-index: 1;
}

.nav-tab.active {
    border-bottom: 4px solid #3b82f6;
    /* box-shadow: 0 4px 16px rgba(59, 130, 246, 0.15);
    background: linear-gradient(90deg, #e0e7ff 0%, #f3f4f6 100%); */
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
    /* border-radius: 2px; */
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

/* @keyframes tabPulse {
    0% {
        box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.18);
    }

    25% {
        box-shadow: 0 0 0 0 rgba(161, 185, 224, 0.18);
    }

    70% {
        box-shadow: 0 0 0 10px rgba(59, 130, 246, 0.08);
    }

    100% {
        box-shadow: 0 8px 24px rgba(59, 130, 246, 0.18);
    }
} */
</style>