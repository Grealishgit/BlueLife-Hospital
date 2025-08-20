<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Patient Testimonials - BlueLife Hospital</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #1e40af 0%, #3730a3 50%, #581c87 100%);
        min-height: 100vh;
    }

    .testimonial-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .testimonial-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.35);
    }

    .testimonial-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6, #10b981);
    }

    .rating-stars {
        color: #fbbf24;
        font-size: 1.25rem;
    }

    .quote-icon {
        position: absolute;
        top: -10px;
        right: 20px;
        font-size: 4rem;
        color: rgba(59, 130, 246, 0.1);
        font-family: serif;
    }

    .video-testimonial {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        color: white;
    }

    .success-story {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .review-form {
        background: linear-gradient(135deg, #7c3aed, #a855f7);
        color: white;
    }

    .masonry-grid {
        columns: 3;
        column-gap: 2rem;
    }

    .masonry-item {
        break-inside: avoid;
        margin-bottom: 2rem;
    }

    .stats-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 15px;
        padding: 2rem;
        text-align: center;
        color: white;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: bold;
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .filter-btn {
        padding: 0.75rem 1.5rem;
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .filter-btn.active,
    .filter-btn:hover {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-color: transparent;
    }

    .before-after {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: white;
    }

    .patient-photo {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .video-play-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #3b82f6;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .video-play-btn:hover {
        background: white;
        transform: translate(-50%, -50%) scale(1.1);
    }

    @media (max-width: 768px) {
        .masonry-grid {
            columns: 1;
        }
    }

    @media (max-width: 1024px) and (min-width: 769px) {
        .masonry-grid {
            columns: 2;
        }
    }

    .form-input {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 8px;
        padding: 0.75rem;
        color: white;
        /* placeholder-color: rgba(255, 255, 255, 0.7); */
    }

    .form-input::placeholder {
        color: rgba(255, 255, 255, 0.7);
    }

    .form-input:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: rgba(255, 255, 255, 0.5);
        outline: none;
    }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="min-h-screen pt-20 pb-12">
        <div class="container mx-auto px-4">

            <!-- Hero Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-4"
                    style="font-family: 'Playfair Display', serif;">Patient Stories</h1>
                <p class="text-white/90 text-lg max-w-3xl mx-auto">
                    Real experiences from real patients who have received exceptional care at BlueLife Hospital.
                    Their stories inspire us to continue providing the highest quality healthcare.
                </p>
            </div>

            <!-- Statistics -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
                <div class="stats-card">
                    <div class="stat-number" data-target="4.9">0</div>
                    <p>Average Rating</p>
                </div>
                <div class="stats-card">
                    <div class="stat-number" data-target="15000">0</div>
                    <p>Happy Patients</p>
                </div>
                <div class="stats-card">
                    <div class="stat-number" data-target="98">0</div>
                    <p>% Satisfaction</p>
                </div>
                <div class="stats-card">
                    <div class="stat-number" data-target="2500">0</div>
                    <p>Reviews</p>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button class="filter-btn active" data-filter="all">All Stories</button>
                <button class="filter-btn" data-filter="cardiology">Cardiology</button>
                <button class="filter-btn" data-filter="neurology">Neurology</button>
                <button class="filter-btn" data-filter="pediatrics">Pediatrics</button>
                <button class="filter-btn" data-filter="orthopedics">Orthopedics</button>
                <button class="filter-btn" data-filter="emergency">Emergency Care</button>
                <button class="filter-btn" data-filter="surgery">Surgery</button>
            </div>

            <!-- Testimonials Grid -->
            <div class="masonry-grid" id="testimonialsGrid">

                <!-- Regular Testimonial -->
                <div class="masonry-item testimonial-card p-6" data-category="cardiology">
                    <div class="quote-icon">"</div>
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?w=150&h=150&fit=crop&crop=face"
                            alt="Sarah Johnson" class="patient-photo mr-4">
                        <div>
                            <h3 class="font-bold text-gray-800">Sarah Johnson</h3>
                            <p class="text-gray-600">Heart Surgery Patient</p>
                            <div class="rating-stars">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">
                        "The cardiac team at BlueLife Hospital saved my life. Dr. Chen and his team performed a complex
                        heart surgery with such precision and care. The nurses were angels, and the recovery process was
                        smooth thanks to their excellent post-operative care."
                    </p>
                    <div class="text-sm text-gray-500">
                        ✓ Verified Patient • Heart Surgery • August 2025
                    </div>
                </div>

                <!-- Video Testimonial -->
                <div class="masonry-item testimonial-card video-testimonial p-6" data-category="neurology">
                    <div class="relative mb-4">
                        <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=400&h=200&fit=crop"
                            alt="Video thumbnail" class="w-full h-48 object-cover rounded-lg">
                        <div class="video-play-btn" onclick="playVideo('video1')">▶</div>
                    </div>
                    <h3 class="font-bold text-xl mb-2">Michael's Recovery Story</h3>
                    <p class="text-white/90 mb-4">
                        Watch Michael share his incredible recovery journey after stroke treatment at our Neurology
                        Department.
                    </p>
                    <div class="rating-stars mb-2">★★★★★</div>
                    <div class="text-sm text-white/70">
                        Neurology Department • Stroke Recovery • 3 min video
                    </div>
                </div>

                <!-- Success Story -->
                <div class="masonry-item testimonial-card success-story p-6" data-category="pediatrics">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?w=150&h=150&fit=crop&crop=face"
                            alt="Lisa Martinez" class="patient-photo mr-4">
                        <div>
                            <h3 class="font-bold text-xl">Lisa Martinez</h3>
                            <p class="text-white/90">Mother of Emma (age 5)</p>
                            <div class="rating-stars">★★★★★</div>
                        </div>
                    </div>
                    <h4 class="font-bold text-lg mb-3">A Mother's Gratitude</h4>
                    <p class="text-white/90 mb-4">
                        "When Emma was diagnosed with a rare condition, we were devastated. The pediatric team at
                        BlueLife Hospital not only provided exceptional medical care but also emotional support for our
                        entire family. Today, Emma is a healthy, happy 5-year-old who loves to dance!"
                    </p>
                    <div class="text-sm text-white/70">
                        Pediatric Care Success • Rare Disease Treatment • Family-Centered Care
                    </div>
                </div>

                <!-- Before/After Story -->
                <div class="masonry-item testimonial-card before-after p-6" data-category="orthopedics">
                    <h3 class="font-bold text-xl mb-4">From Wheelchair to Marathon</h3>
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=150&fit=crop&crop=face"
                            alt="Robert Kim" class="patient-photo mr-4">
                        <div>
                            <h4 class="font-bold">Robert Kim</h4>
                            <p class="text-white/90">Orthopedic Patient</p>
                            <div class="rating-stars">★★★★★</div>
                        </div>
                    </div>
                    <div class="bg-white/20 rounded-lg p-4 mb-4">
                        <p class="font-semibold mb-2">Before:</p>
                        <p class="text-sm text-white/90">Severe back injury, unable to walk, chronic pain</p>
                        <p class="font-semibold mb-2 mt-3">After:</p>
                        <p class="text-sm text-white/90">Completed first marathon, pain-free, back to active lifestyle
                        </p>
                    </div>
                    <p class="text-white/90 mb-4">
                        "Dr. Williams and the orthopedic team gave me my life back. Their innovative spinal surgery
                        technique and comprehensive rehabilitation program helped me go from a wheelchair to running
                        marathons!"
                    </p>
                    <div class="text-sm text-white/70">
                        Spinal Surgery • 18-month recovery • Marathon finisher
                    </div>
                </div>

                <!-- Emergency Care Testimonial -->
                <div class="masonry-item testimonial-card p-6" data-category="emergency">
                    <div class="quote-icon">"</div>
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face"
                            alt="David Thompson" class="patient-photo mr-4">
                        <div>
                            <h3 class="font-bold text-gray-800">David Thompson</h3>
                            <p class="text-gray-600">Emergency Department</p>
                            <div class="rating-stars">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">
                        "I arrived at the emergency department with chest pain, and the staff immediately sprang into
                        action. Their quick response and professional care during my heart attack saved my life. I can't
                        thank them enough for their dedication and expertise."
                    </p>
                    <div class="text-sm text-gray-500">
                        ✓ Verified Patient • Emergency Care • Heart Attack Treatment
                    </div>
                </div>

                <!-- Surgery Success -->
                <div class="masonry-item testimonial-card p-6" data-category="surgery">
                    <div class="quote-icon">"</div>
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&h=150&fit=crop&crop=face"
                            alt="Maria Rodriguez" class="patient-photo mr-4">
                        <div>
                            <h3 class="font-bold text-gray-800">Maria Rodriguez</h3>
                            <p class="text-gray-600">Surgical Patient</p>
                            <div class="rating-stars">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">
                        "The robotic surgery I received was minimally invasive and incredibly precise. My recovery time
                        was much shorter than expected, and the surgical team explained every step of the process. The
                        technology and expertise at BlueLife Hospital is truly world-class."
                    </p>
                    <div class="text-sm text-gray-500">
                        ✓ Verified Patient • Robotic Surgery • Minimal Recovery Time
                    </div>
                </div>

                <!-- Family Care -->
                <div class="masonry-item testimonial-card p-6" data-category="pediatrics">
                    <div class="quote-icon">"</div>
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?w=150&h=150&fit=crop&crop=face"
                            alt="Jennifer Lee" class="patient-photo mr-4">
                        <div>
                            <h3 class="font-bold text-gray-800">Jennifer Lee</h3>
                            <p class="text-gray-600">Mother of Twin Boys</p>
                            <div class="rating-stars">★★★★★</div>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">
                        "Having premature twins was scary, but the NICU team at BlueLife Hospital provided exceptional
                        care for both my babies and emotional support for our family. The nurses became like family to
                        us during our 8-week stay. Both boys are now healthy toddlers!"
                    </p>
                    <div class="text-sm text-gray-500">
                        ✓ Verified Patient • NICU Care • Premature Twin Care
                    </div>
                </div>

                <!-- Cancer Survivor -->
                <div class="masonry-item testimonial-card success-story p-6" data-category="oncology">
                    <div class="flex items-center mb-4">
                        <img src="https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?w=150&h=150&fit=crop&crop=face"
                            alt="Patricia Adams" class="patient-photo mr-4">
                        <div>
                            <h3 class="font-bold text-xl">Patricia Adams</h3>
                            <p class="text-white/90">5-Year Cancer Survivor</p>
                            <div class="rating-stars">★★★★★</div>
                        </div>
                    </div>
                    <h4 class="font-bold text-lg mb-3">Fighting and Winning</h4>
                    <p class="text-white/90 mb-4">
                        "Five years ago, I was diagnosed with stage 3 breast cancer. The oncology team at BlueLife
                        Hospital created a comprehensive treatment plan that included surgery, chemotherapy, and
                        radiation. Their compassionate care and cutting-edge treatments helped me beat cancer
                        completely. I'm now cancer-free and living life to the fullest!"
                    </p>
                    <div class="text-sm text-white/70">
                        Oncology • 5-Year Survivor • Comprehensive Cancer Care
                    </div>
                </div>

            </div>

            <!-- Review Submission Form -->
            <div class="testimonial-card review-form p-8 mt-12">
                <h2 class="text-3xl font-bold mb-6 text-center">Share Your Experience</h2>
                <p class="text-center text-white/90 mb-8">
                    Help others by sharing your experience with BlueLife Hospital. Your feedback helps us continue to
                    improve our care.
                </p>

                <form id="reviewForm" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white mb-2">Your Name *</label>
                            <input type="text" name="name" required class="form-input w-full">
                        </div>
                        <div>
                            <label class="block text-white mb-2">Email Address *</label>
                            <input type="email" name="email" required class="form-input w-full">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white mb-2">Department/Service *</label>
                            <select name="department" required class="form-input w-full">
                                <option value="">Select Department</option>
                                <option value="cardiology">Cardiology</option>
                                <option value="neurology">Neurology</option>
                                <option value="pediatrics">Pediatrics</option>
                                <option value="orthopedics">Orthopedics</option>
                                <option value="emergency">Emergency Department</option>
                                <option value="surgery">Surgery</option>
                                <option value="general">General Medicine</option>
                                <option value="oncology">Oncology</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-white mb-2">Overall Rating *</label>
                            <div class="flex space-x-2 mt-2">
                                <span class="rating-star text-3xl cursor-pointer" data-rating="1">☆</span>
                                <span class="rating-star text-3xl cursor-pointer" data-rating="2">☆</span>
                                <span class="rating-star text-3xl cursor-pointer" data-rating="3">☆</span>
                                <span class="rating-star text-3xl cursor-pointer" data-rating="4">☆</span>
                                <span class="rating-star text-3xl cursor-pointer" data-rating="5">☆</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-white mb-2">Your Experience *</label>
                        <textarea name="experience" rows="4" required class="form-input w-full"
                            placeholder="Share your experience with us..."></textarea>
                    </div>

                    <div>
                        <label class="block text-white mb-2">What did you like most?</label>
                        <textarea name="positive" rows="2" class="form-input w-full"
                            placeholder="What stood out to you about your care?"></textarea>
                    </div>

                    <div>
                        <label class="block text-white mb-2">How can we improve?</label>
                        <textarea name="improvement" rows="2" class="form-input w-full"
                            placeholder="Any suggestions for improvement?"></textarea>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="publish" name="publish" class="mr-3">
                        <label for="publish" class="text-white">I consent to publishing this review on the BlueLife
                            Hospital website</label>
                    </div>

                    <div class="text-center">
                        <button type="submit"
                            class="px-8 py-3 bg-white text-purple-700 rounded-lg font-bold hover:bg-gray-100 transition-colors transform hover:scale-105">
                            Submit Review
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <!-- Video Modal -->
    <div id="videoModal" class="fixed inset-0 bg-black/80 flex items-center justify-center z-50 hidden">
        <div class="relative max-w-4xl mx-4">
            <button onclick="closeVideo()"
                class="absolute -top-12 right-0 text-white text-2xl hover:text-gray-300">✕</button>
            <div class="bg-black rounded-lg overflow-hidden">
                <video id="testimonialVideo" controls class="w-full h-auto max-h-[70vh]">
                    <source src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>

    <script>
    let selectedRating = 0;

    // Counter animation
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number');

        counters.forEach(counter => {
            const target = parseFloat(counter.getAttribute('data-target'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    if (target < 10) {
                        counter.textContent = current.toFixed(1);
                    } else {
                        counter.textContent = Math.floor(current).toLocaleString();
                    }
                    requestAnimationFrame(updateCounter);
                } else {
                    if (target < 10) {
                        counter.textContent = target.toFixed(1);
                    } else {
                        counter.textContent = target.toLocaleString();
                    }
                }
            };

            updateCounter();
        });
    }

    // Filter functionality
    function initializeFilters() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const testimonials = document.querySelectorAll('.masonry-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.getAttribute('data-filter');

                // Update active button
                filterBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                // Filter testimonials
                testimonials.forEach(testimonial => {
                    const category = testimonial.getAttribute('data-category');
                    if (filter === 'all' || category === filter) {
                        testimonial.style.display = 'block';
                    } else {
                        testimonial.style.display = 'none';
                    }
                });
            });
        });
    }

    // Rating system
    function initializeRating() {
        const stars = document.querySelectorAll('.rating-star');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                selectedRating = index + 1;
                updateStars();
            });

            star.addEventListener('mouseover', () => {
                highlightStars(index + 1);
            });
        });

        document.querySelector('.review-form').addEventListener('mouseleave', () => {
            updateStars();
        });
    }

    function highlightStars(rating) {
        const stars = document.querySelectorAll('.rating-star');
        stars.forEach((star, index) => {
            if (index < rating) {
                star.textContent = '★';
                star.style.color = '#fbbf24';
            } else {
                star.textContent = '☆';
                star.style.color = 'rgba(255, 255, 255, 0.5)';
            }
        });
    }

    function updateStars() {
        highlightStars(selectedRating);
    }

    // Video functionality
    function playVideo(videoId) {
        const modal = document.getElementById('videoModal');
        const video = document.getElementById('testimonialVideo');

        // In a real implementation, you would set the actual video source
        const videoSources = {
            'video1': 'https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4'
        };

        video.src = videoSources[videoId] || '';
        modal.classList.remove('hidden');
        video.play();
    }

    function closeVideo() {
        const modal = document.getElementById('videoModal');
        const video = document.getElementById('testimonialVideo');

        modal.classList.add('hidden');
        video.pause();
        video.currentTime = 0;
    }

    // Form submission
    function initializeForm() {
        const form = document.getElementById('reviewForm');

        form.addEventListener('submit', (e) => {
            e.preventDefault();

            if (selectedRating === 0) {
                alert('Please select a rating');
                return;
            }

            const formData = new FormData(form);
            formData.append('rating', selectedRating);

            // Simulate form submission
            alert('Thank you for your review! It will be reviewed and published within 24 hours.');
            form.reset();
            selectedRating = 0;
            updateStars();
        });
    }

    // Initialize page
    document.addEventListener('DOMContentLoaded', () => {
        animateCounters();
        initializeFilters();
        initializeRating();
        initializeForm();
    });

    // Close video when clicking outside
    document.getElementById('videoModal').addEventListener('click', (e) => {
        if (e.target === e.currentTarget) {
            closeVideo();
        }
    });
    </script>

    <?php include 'footer.php'; ?>
</body>

</html>