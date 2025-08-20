<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Blog - BlueLife Hospital</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(45deg, #0f172a 0%, #1e293b 50%, #334155 100%);
        min-height: 100vh;
        position: relative;
    }

    body::before {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image:
            radial-gradient(circle at 20% 20%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(139, 92, 246, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 40% 60%, rgba(16, 185, 129, 0.1) 0%, transparent 50%);
        pointer-events: none;
        z-index: -1;
    }

    .hero-gradient {
        background: linear-gradient(135deg, #1e40af 0%, #7c3aed 50%, #059669 100%);
        position: relative;
        overflow: hidden;
    }

    .hero-gradient::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: repeating-linear-gradient(45deg,
                transparent,
                transparent 2px,
                rgba(255, 255, 255, 0.03) 2px,
                rgba(255, 255, 255, 0.03) 4px);
        animation: movePattern 20s linear infinite;
    }

    @keyframes movePattern {
        0% {
            transform: translate(-50%, -50%) rotate(0deg);
        }

        100% {
            transform: translate(-50%, -50%) rotate(360deg);
        }
    }

    .magazine-layout {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .featured-main {
        grid-column: span 8;
        background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .featured-main:hover {
        transform: translateY(-8px) rotateX(2deg);
        box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.35);
    }

    .featured-sidebar {
        grid-column: span 4;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .sidebar-card {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .sidebar-card:hover {
        background: rgba(255, 255, 255, 0.12);
        transform: translateX(8px);
        border-color: rgba(59, 130, 246, 0.3);
    }

    .blog-masonry {
        columns: 3;
        column-gap: 2rem;
        margin-top: 3rem;
    }

    .masonry-item {
        break-inside: avoid;
        margin-bottom: 2rem;
        background: rgba(255, 255, 255, 0.95);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.4s ease;
        cursor: pointer;
    }

    .masonry-item:hover {
        transform: scale(1.02) rotate(0.5deg);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .floating-tabs {
        position: sticky;
        top: 100px;
        z-index: 50;
        display: flex;
        justify-content: center;
        margin-bottom: 2rem;
    }

    .tab-container {
        background: rgba(15, 23, 42, 0.8);
        backdrop-filter: blur(20px);
        border-radius: 50px;
        padding: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .tab-btn {
        padding: 12px 24px;
        border-radius: 50px;
        color: rgba(255, 255, 255, 0.7);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .tab-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .tab-btn:hover::before {
        left: 100%;
    }

    .tab-btn.active {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
    }

    .geometric-accent {
        position: absolute;
        width: 100px;
        height: 100px;
        background: linear-gradient(45deg, #3b82f6, #8b5cf6);
        clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        opacity: 0.1;
    }

    .text-gradient {
        background: linear-gradient(135deg, #010610ff, #e1448aff, #45685dff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .reading-time {
        background: linear-gradient(135deg, #f59e0b, #ef4444);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .magazine-layout {
            grid-template-columns: 1fr;
        }

        .featured-main,
        .featured-sidebar {
            grid-column: span 1;
        }

        .blog-masonry {
            columns: 1;
        }
    }

    @media (max-width: 1024px) and (min-width: 769px) {
        .blog-masonry {
            columns: 2;
        }
    }
    </style>
</head>

<body>
    <?php include 'app/Views/navbar.php'; ?>

    <!-- Hero Section with Unique Design -->
    <section class="hero-gradient pt-24 pb-16 relative">
        <div class="container mx-auto px-4">
            <div class="text-center relative z-10">
                <h1 class="text-6xl md:text-8xl font-bold text-white mb-6"
                    style="font-family: 'Playfair Display', serif;">
                    Health<span class="text-gradient"> Insights</span>
                </h1>
                <p class="text-xl text-white/80 max-w-2xl mx-auto mb-8">
                    Discover the latest in medical research, wellness tips, and healthcare innovations from our expert
                    team.
                </p>
                <div class="geometric-accent top-10 left-10"></div>
                <div class="geometric-accent bottom-10 right-10 rotate-180"></div>
            </div>
        </div>
    </section>

    <!-- Floating Navigation Tabs -->
    <div class="floating-tabs mt-5">
        <div class="tab-container grid grid-cols-2 md:grid-cols-5 max-sm:rounded-8 ma-sm text-sm">
            <button class="tab-btn active cursor-pointer" data-category="all">All Stories</button>
            <button class="tab-btn cursor-pointer" data-category="health-tips">Wellness</button>
            <button class="tab-btn cursor-pointer" data-category="medical-news">Research</button>
            <button class="tab-btn cursor-pointer" data-category="nutrition">Nutrition</button>
            <button class="tab-btn cursor-pointer" data-category="technology">Innovation</button>
        </div>
    </div>

    <!-- Magazine-Style Featured Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="magazine-layout" id="featuredSection">
                <!-- Dynamic content will be loaded here -->
            </div>
        </div>
    </section>

    <!-- Masonry Blog Grid -->
    <section class="pb-16">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-white mb-12" style="font-family: 'Playfair Display', serif;">
                Latest <span class="text-gradient">Articles</span>
            </h2>
            <div class="blog-masonry" id="blogMasonry">
                <!-- Masonry items will be generated here -->
            </div>
        </div>
    </section>

    <?php include 'app/Views/footer.php'; ?>

    <script>
    // Enhanced blog posts data with varied content lengths
    const blogPosts = [{
            id: 1,
            title: "The Future of Personalized Medicine",
            excerpt: "How genetic testing and AI are revolutionizing treatment plans for individual patients, creating a new era of precision healthcare.",
            content: "Personalized medicine represents a paradigm shift in healthcare...",
            category: "medical-news",
            categoryDisplay: "Medical Research",
            author: "Dr. Sarah Johnson",
            date: "2025-08-15",
            readTime: "8 min read",
            image: "/storage/uploads/bg1.jpg",
            featured: true,
            height: "tall"
        },
        {
            id: 2,
            title: "Heart Health: 5 Simple Daily Habits",
            excerpt: "Small changes that make a big difference in cardiovascular wellness.",
            content: "Your heart works tirelessly every day...",
            category: "health-tips",
            categoryDisplay: "Wellness Tips",
            author: "Dr. Michael Chen",
            date: "2025-08-12",
            readTime: "4 min read",
            image: "/storage/uploads/bg1.jpg",
            featured: true,
            height: "medium"
        },
        {
            id: 3,
            title: "Mental Wellness in the Digital Age",
            excerpt: "Navigating mental health challenges in our hyper-connected world and finding balance.",
            content: "The digital revolution has transformed our lives...",
            category: "health-tips",
            categoryDisplay: "Mental Health",
            author: "Dr. Robert Kumar",
            date: "2025-08-10",
            readTime: "6 min read",
            image: "/storage/uploads/bg1.jpg",
            featured: true,
            height: "short"
        },
        {
            id: 4,
            title: "Superfoods: Science vs. Marketing",
            excerpt: "Separating fact from fiction in the world of nutritional claims.",
            content: "The term 'superfood' has become ubiquitous...",
            category: "nutrition",
            categoryDisplay: "Nutrition Science",
            author: "Dr. Emily Rodriguez",
            date: "2025-08-08",
            readTime: "5 min read",
            image: "/storage/uploads/bg1.jpg",
            featured: false,
            height: "medium"
        },
        {
            id: 5,
            title: "AI in Medical Diagnosis: A New Frontier",
            excerpt: "Exploring how artificial intelligence is enhancing diagnostic accuracy and speed.",
            content: "Artificial intelligence is transforming medical diagnosis...",
            category: "technology",
            categoryDisplay: "Medical Technology",
            author: "Dr. James Wilson",
            date: "2025-08-05",
            readTime: "10 min read",
            image: "/storage/uploads/bg1.jpg",
            featured: false,
            height: "tall"
        },
        {
            id: 6,
            title: "Sleep Quality and Immune Function",
            excerpt: "The critical connection between rest and your body's defense system.",
            content: "Sleep is not just about feeling rested...",
            category: "health-tips",
            categoryDisplay: "Sleep Health",
            author: "Dr. Lisa Thompson",
            date: "2025-08-03",
            readTime: "3 min read",
            image: "/storage/uploads/bg1.jpg",
            featured: false,
            height: "short"
        }
    ];

    let filteredPosts = [...blogPosts];

    // Create featured magazine layout
    function createFeaturedLayout() {
        const featured = blogPosts.filter(post => post.featured);
        const main = featured[0];
        const sidebar = featured.slice(1);

        return `
                <div class="featured-main">
                    <div class="relative">
                        <img src="${main.image}" alt="${main.title}" class="w-full h-80 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <span class="px-3 py-1 bg-blue-500 rounded-full text-sm font-medium">${main.categoryDisplay}</span>
                        </div>
                    </div>
                    <div class="p-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4" style="font-family: 'Playfair Display', serif;">${main.title}</h2>
                        <p class="text-gray-600 text-lg mb-6 leading-relaxed">${main.excerpt}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <span class="text-gray-500">By ${main.author}</span>
                                <span class="reading-time">${main.readTime}</span>
                            </div>
                            <button onclick="openBlogPost(${main.id})" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-full hover:from-blue-600 hover:to-purple-700 transition-all transform hover:scale-105">
                                Read Article
                            </button>
                        </div>
                    </div>
                </div>
                <div class="featured-sidebar">
                    ${sidebar.map(post => `
                        <div class="sidebar-card" onclick="openBlogPost(${post.id})">
                            <div class="flex space-x-4">
                                <img src="${post.image}" alt="${post.title}" class="w-20 h-20 object-cover rounded-md flex-shrink-0">
                                <div class="flex-1">
                                    <h3 class="text-white font-semibold mb-2 line-clamp-2">${post.title}</h3>
                                    <p class="text-white/70 text-sm mb-2 line-clamp-2">${post.excerpt}</p>
                                    <div class="flex items-center justify-between text-xs">
                                        <span class="text-white/60">${post.author}</span>
                                        <span class="text-blue-400">${post.readTime}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `).join('')}
                </div>
            `;
    }

    // Create masonry item
    function createMasonryItem(post) {
        const heights = {
            short: 'h-64',
            medium: 'h-80',
            tall: 'h-96'
        };

        return `
                <div class="masonry-item" onclick="openBlogPost(${post.id})">
                    <img src="${post.image}" alt="${post.title}" class="w-full ${heights[post.height] || 'h-48'} object-cover">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="px-3 py-1 bg-gradient-to-r from-blue-100 to-purple-100 text-blue-700 rounded-md text-xs font-medium">
                                ${post.categoryDisplay}
                            </span>
                            <span class="text-gray-400 text-xs">${formatDate(post.date)}</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3" style="font-family: 'Playfair Display', serif;">
                            ${post.title}
                        </h3>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">${post.excerpt}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 text-xs">By ${post.author}</span>
                            <span class="reading-time text-xs">${post.readTime}</span>
                        </div>
                    </div>
                </div>
            `;
    }

    // Format date
    function formatDate(dateString) {
        const options = {
            month: 'short',
            day: 'numeric'
        };
        return new Date(dateString).toLocaleDateString(undefined, options);
    }

    // Filter posts
    function filterPosts(category) {
        if (category === 'all') {
            filteredPosts = [...blogPosts];
        } else {
            filteredPosts = blogPosts.filter(post => post.category === category);
        }
        renderMasonry();
    }

    // Render masonry grid
    function renderMasonry() {
        const masonry = document.getElementById('blogMasonry');
        const nonFeatured = filteredPosts.filter(post => !post.featured);
        masonry.innerHTML = nonFeatured.map(createMasonryItem).join('');
    }

    // Initialize page
    function initializePage() {
        // Render featured section
        document.getElementById('featuredSection').innerHTML = createFeaturedLayout();

        // Render masonry
        renderMasonry();

        // Add tab event listeners
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                filterPosts(btn.dataset.category);
            });
        });
    }

    // Open blog post
    function openBlogPost(postId) {
        const post = blogPosts.find(p => p.id === postId);
        alert(
            `Opening: "${post.title}"\n\nCategory: ${post.categoryDisplay}\nAuthor: ${post.author}\n\nThis would navigate to the full article page.`
        );
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', initializePage);
    </script>
</body>

</html>