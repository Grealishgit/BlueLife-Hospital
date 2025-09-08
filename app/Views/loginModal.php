<!-- Login/Signup Modal -->
<div id="loginModal"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 backdrop-blur-md bg-opacity-50 hidden">
    <div class="bg-white rounded-md shadow-lg w-full md:max-w-lg p-8 relative">
        <button onclick="closeModal()"
            class="absolute top-2 right-4 cursor-pointer text-2xl text-red-500 hover:text-red-700">&times;
        </button>

        <div class="flex items-center mb-3 justify-center">
            <p class="text-2xl font-bold"><span class="text-blue-500">Sheywe</span> Community Hospital</p>
        </div>

        <div class="flex justify-center mb-4">
            <button id="showLogin"
                class="px-4 py-2 cursor-pointer font-semibold text-blue-500 border-b-2 border-blue-500">Login</button>
            <button id="showSignup" class="px-4 py-2 cursor-pointer font-semibold text-gray-500">Sign Up</button>
        </div>

        <div id="loginForm">
            <h2 class="text-xl font-bold mb-2">Login</h2>
            <form id="loginFormElement">
                <div class="mb-3">
                    <label for="loginIdentifier" class="block text-sm font-medium text-gray-700 mb-1">Email or Phone
                        Number</label>
                    <input type="text" id="loginIdentifier" name="loginIdentifier"
                        placeholder="Enter email or phone number"
                        class="w-full px-3 py-2 border border-gray-400 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required>
                    <p id="identifierType" class="text-xs text-gray-500 mt-1">Enter your email address or phone number
                    </p>
                </div>
                <input type="password" id="loginPassword" name="password" placeholder="Your Password"
                    class="w-full mb-3 px-3 py-2 border border-gray-400 rounded focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
                <p class="mt-1 mb-2 text-center">Forgot your password?
                    <a href="#" class="text-blue-500 hover:text-blue-700">
                        Reset it
                    </a>
                </p>
                <button type="submit"
                    class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition-colors">
                    Login
                </button>
                <div>
                    <p class="mt-2 text-center">Don't have an account?
                        <a href="#" onclick="switchToSignup()" class="text-blue-500 hover:text-blue-700">
                            Sign Up
                        </a>
                    </p>
                </div>
            </form>
        </div>
        <div id="signupForm" class="hidden">
            <h2 class="text-xl font-bold mb-2">Sign Up</h2>
            <form>
                <div class="flex md:flex-row flex-col gap-2">
                    <input type="text" placeholder="First Name"
                        class="w-full mb-3 px-3 py-2 border border-gray-400 rounded" required>
                    <input type="text" placeholder="Last Name"
                        class="w-full mb-3 px-3 py-2 border border-gray-400 rounded" required>
                </div>

                <input type="number" placeholder="Phone Number"
                    class="w-full mb-3 px-3 py-2 border border-gray-400 rounded" required>
                <select name="gender" id="gender" class="w-full mb-3 px-3 py-2 border border-gray-400 rounded" required>
                    <option value="">Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <!-- DOB -->
                <input type="date" placeholder="Date of Birth"
                    class="w-full mb-3 px-3 py-2 border border-gray-400 rounded" required>
                <input type="email" placeholder="Your Email"
                    class="w-full mb-3 px-3 py-2 border border-gray-400 rounded" required>
                <input type="password" placeholder="Your Password"
                    class="w-full mb-3 px-3 py-2 border border-gray-400 rounded" required>
                <button type="submit"
                    class="w-full bg-blue-500 cursor-pointer text-white py-2 rounded hover:bg-blue-600">
                    Sign Up
                </button>
                <div class="mt-2 text-center">
                    <p>By signing up, you agree to our <a href="#" class="text-blue-500">Terms of Service</a> and <a
                            href="#" class="text-blue-500">Privacy Policy</a>.</p>
                    <p class="mt-2 text-center">Already have an account? <a href="#" id="showLogin"
                            class="text-blue-500">Login</a></p>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('loginModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('loginModal').classList.add('hidden');
    }

    function switchToSignup() {
        document.getElementById('signupForm').classList.remove('hidden');
        document.getElementById('loginForm').classList.add('hidden');
        document.getElementById('showSignup').classList.add('text-blue-500', 'border-b-2', 'border-blue-500');
        document.getElementById('showLogin').classList.remove('text-blue-500', 'border-b-2', 'border-blue-500');
    }

    function switchToLogin() {
        document.getElementById('loginForm').classList.remove('hidden');
        document.getElementById('signupForm').classList.add('hidden');
        document.getElementById('showLogin').classList.add('text-blue-500', 'border-b-2', 'border-blue-500');
        document.getElementById('showSignup').classList.remove('text-blue-500', 'border-b-2', 'border-blue-500');
    }

    // Email validation function
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Phone validation function
    function isValidPhone(phone) {
        const phoneRegex = /^[\+]?[\d\s\-\(\)]{10,}$/;
        return phoneRegex.test(phone);
    }

    // Real-time validation for login identifier
    document.getElementById('loginIdentifier').addEventListener('input', function() {
        const value = this.value.trim();
        const identifierType = document.getElementById('identifierType');

        if (value === '') {
            identifierType.textContent = 'Enter your email address or phone number';
            identifierType.className = 'text-xs text-gray-500 mt-1';
        } else if (isValidEmail(value)) {
            identifierType.textContent = '✓ Valid email address';
            identifierType.className = 'text-xs text-green-600 mt-1';
        } else if (isValidPhone(value)) {
            identifierType.textContent = '✓ Valid phone number';
            identifierType.className = 'text-xs text-green-600 mt-1';
        } else {
            identifierType.textContent = 'Please enter a valid email or phone number';
            identifierType.className = 'text-xs text-red-500 mt-1';
        }
    });

    // Handle login form submission
    document.getElementById('loginFormElement').addEventListener('submit', function(e) {
        e.preventDefault();

        const identifier = document.getElementById('loginIdentifier').value.trim();
        const password = document.getElementById('loginPassword').value;

        // Validate identifier
        if (!isValidEmail(identifier) && !isValidPhone(identifier)) {
            alert('Please enter a valid email address or phone number.');
            return;
        }

        if (password.length < 6) {
            alert('Password must be at least 6 characters long.');
            return;
        }

        // AJAX login
        fetch('app/auth.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams({
                    action: 'login',
                    identifier: identifier,
                    password: password
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert('Login successful!');
                    closeModal();
                    // Optionally reload or redirect
                } else {
                    alert(data.message);
                }
            })
            .catch(() => alert('Login failed.'));
    });

    // Handle signup form submission
    document.querySelector('#signupForm form').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = e.target;
        const data = {
            action: 'signup',
            first_name: form.querySelector('input[placeholder="First Name"]').value,
            last_name: form.querySelector('input[placeholder="Last Name"]').value,
            phone: form.querySelector('input[placeholder="Phone Number"]').value,
            gender: form.querySelector('select[name="gender"]').value,
            dob: form.querySelector('input[type="date"]').value,
            email: form.querySelector('input[type="email"]').value,
            password: form.querySelector('input[type="password"]').value
        };
        // Basic validation
        if (Object.values(data).some(v => v === '')) {
            alert('Please fill all fields.');
            return;
        }
        fetch('app/auth.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: new URLSearchParams(data)
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    alert('Signup successful! You can now login.');
                    switchToLogin();
                } else {
                    alert(data.message);
                }
            })
            .catch(() => alert('Signup failed.'));
    });

    // Tab switching functionality
    document.getElementById('showLogin').onclick = switchToLogin;
    document.getElementById('showSignup').onclick = switchToSignup;
</script>