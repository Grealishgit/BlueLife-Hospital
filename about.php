<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>About Us - BlueLife Hospital</title>
</head>

<body>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Signika:wght@300..700&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
    </style>
    <style>
    body {
        font-family: 'Quicksand', sans-serif;
    }
    </style>
    <?php include 'app/Views/navbar.php'; ?>

    <div>
        <div class="text-center text-2xl mt-20 text-gray-500">
            <p>
                ABOUT <span class="text-blue-600 font-medium">US</span>
            </p>
        </div>

        <!-- About Section Card -->
        <div class="my-10">
            <div class="border rounded-lg shadow-lg p-6 mx-auto max-w-4xl">
                <p class="text-sm text-gray-600 mb-4">
                    Welcome to BlueLife, your trusted partner in managing your
                    healthcare needs conveniently and efficiently. At BlueLife, we
                    understand the challenges individuals face when it comes to scheduling
                    doctor appointments and managing their health records. BlueLife is committed to excellence in
                    healthcare technology. We continuously strive to enhance our platform, integrating the latest
                    advancements to improve user experience and deliver superior service. Whether you're booking your
                    first appointment or managing ongoing care, BlueLife is here to support you every step of the way.
                    <span
                        class="text-blue-600 font-semibold  hover:text-green-600  transition-all duration-300 cursor-pointer">We
                        offer health services in the following fields.</span>
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Sub Cards for Specialties -->
                    <div
                        class="border rounded-lg shadow-lg p-4  hover:bg-blue-500 hover:text-white transition-all duration-300 text-gray-600 cursor-pointer">
                        <b>General Physician</b>
                    </div>
                    <div
                        class="border rounded-lg shadow-lg p-4 hover:bg-green-600 hover:text-white transition-all duration-300 text-gray-600 cursor-pointer">
                        <b>Gynecologist</b>
                    </div>
                    <div
                        class="border rounded-lg shadow-lg p-4  hover:bg-red-600 hover:text-white transition-all duration-300 text-gray-600 cursor-pointer">
                        <b>Dermatologist</b>
                    </div>
                    <div
                        class="border rounded-lg shadow-lg p-4  hover:bg-blue-500 hover:text-white transition-all duration-300 text-gray-600 cursor-pointer">
                        <b>Pediatrician</b>
                    </div>
                    <div
                        class="border rounded-lg shadow-lg p-4  hover:bg-green-600 hover:text-white transition-all duration-300 text-gray-600 cursor-pointer">
                        <b>Neurologist</b>
                    </div>
                    <div
                        class="border rounded-lg shadow-lg p-4  hover:bg-red-600 hover:text-white transition-all duration-300 text-gray-600 cursor-pointer">
                        <b>Gastroenterologist</b>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-xl my-4 text-center">
            <p>WHY <span class="text-blue-700 font-semibold">CHOOSE US</span></p>
        </div>

        <div class="w-full p-4">
            <div class="flex flex-col  md:flex-row justify-center mb-20 gap-4">
                <!-- Efficiency Card -->
                <div
                    class="border px-10 md:px-16 py-8 sm:py-16 flex flex-col gap-5 text-[15px] hover:bg-blue-500 hover:text-white transition-all duration-300 text-gray-600 cursor-pointer w-full md:w-1/3 rounded-lg shadow-lg h-full">
                    <b>Efficiency</b>
                    <p>Streamlined appointment scheduling that fits into your busy lifestyle.</p>
                </div>

                <!-- Convenience Card -->
                <div
                    class="border px-10 md:px-16 py-8 sm:py-16 flex flex-col gap-5 text-[15px] hover:bg-green-600 hover:text-white transition-all duration-300 text-gray-600 cursor-pointer w-full md:w-1/3 rounded-lg shadow-lg h-full">
                    <b>Convenience</b>
                    <p>Access to a network of trusted healthcare professionals in your area.</p>
                </div>

                <!-- Personalization Card -->
                <div
                    class="border px-10 md:px-16 py-8 sm:py-16 flex flex-col gap-5 text-[15px] hover:bg-red-600 hover:text-white transition-all duration-300 text-gray-600 cursor-pointer w-full md:w-1/3 rounded-lg shadow-lg h-full">
                    <b>Personalization</b>
                    <p class="text-sm">Tailored recommendations and reminders to help you stay on top of your health.
                    </p>
                </div>
            </div>
        </div>
    </div>



</body>

</html>