<!-- Login/Signup Modal -->
<div id="loginModal"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 backdrop-blur-md bg-opacity-50 hidden">
    <div class="bg-white rounded-md shadow-lg w-full md:max-w-lg p-8 relative">
        <button onclick="closeModal()"
            class="absolute top-2 right-4 cursor-pointer text-2xl text-red-500 hover:text-red-700">&times;
        </button>

        <div class="flex items-center mb-3 justify-center">
            <p class="text-2xl font-bold"><span class="text-blue-500">Blue</span>Life Hospital</p>
        </div>

        <div class="flex justify-center mb-4">
            <button id="showLogin"
                class="px-4 py-2 cursor-pointer font-semibold text-blue-500 border-b-2 border-blue-500">Login</button>
            <button id="showSignup" class="px-4 py-2 cursor-pointer font-semibold text-gray-500">Sign Up</button>
        </div>

        <div id="loginForm">
            <h2 class="text-xl font-bold mb-2">Login</h2>
            <form>
                <input type="email" placeholder="Your Email"
                    class="w-full mb-3 px-3 py-2 border border-gray-400 rounded" required>
                <input type="password" placeholder="Your Password"
                    class="w-full mb-3 px-3 py-2 border border-gray-400 rounded" required>
                <p class="mt-1 mb-2 text-center">Forgot your password?
                    <a href="#$_ENV" class="text-blue-500">
                        Reset it
                    </a>
                </p>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
                    Login
                </button>
                <div>

                    <p class="mt-2 text-center">Don't have an account?
                        <a href="#$_ENV" class="text-blue-500">
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
    document.getElementById('showLogin').onclick = function() {
        document.getElementById('loginForm').classList.remove('hidden');
        document.getElementById('signupForm').classList.add('hidden');
        this.classList.add('text-blue-500', 'border-b-2', 'border-blue-500');
        document.getElementById('showSignup').classList.remove('text-blue-500', 'border-b-2', 'border-blue-500');
    };
    document.getElementById('showSignup').onclick = function() {
        document.getElementById('signupForm').classList.remove('hidden');
        document.getElementById('loginForm').classList.add('hidden');
        this.classList.add('text-blue-500', 'border-b-2', 'border-blue-500');
        document.getElementById('showLogin').classList.remove('text-blue-500', 'border-b-2', 'border-blue-500');
    };
</script>