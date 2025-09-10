<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Emergency Services - Sheywe Community Hospital</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

    body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        min-height: 100vh;
    }

    .emergency-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        transition: all 0.3s ease;
    }

    .emergency-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.35);
    }

    .pulse-animation {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    .emergency-number {
        background: linear-gradient(135deg, #dc2626, #991b1b);
        color: white;
        font-size: 1rem;
        font-weight: bold;
        padding: 1rem;
        border-radius: 8px;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .emergency-number:hover {
        background: linear-gradient(135deg, #991b1b, #7f1d1d);
        transform: scale(1.05);
    }

    .wait-time-good {
        color: #059669;
    }

    .wait-time-moderate {
        color: #d97706;
    }

    .wait-time-busy {
        color: #dc2626;
    }

    .first-aid-step {
        counter-increment: step-counter;
    }

    .first-aid-step::before {
        content: counter(step-counter);
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 1rem;
        flex-shrink: 0;
    }

    .first-aid-container {
        counter-reset: step-counter;
    }

    .alert-banner {
        background: linear-gradient(90deg, #fbbf24, #f59e0b);
        animation: slideIn 0.5s ease-out;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-100%);
        }

        to {
            transform: translateY(0);
        }
    }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <!-- Emergency Alert Banner -->
    <div class="alert-banner text-white text-center py-3 mt-16">
        <div class="container mx-auto px-4">
            <p class="font-medium">🚨 Emergency? Call 911 immediately • Our Emergency Department is open 24/7</p>
        </div>
    </div>

    <div class="min-h-screen pt-4 pb-12">
        <div class="container mx-auto px-4">

            <!-- Hero Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-6xl font-bold text-gray-500 mb-4">Emergency Services</h1>
                <p class="text-lg text-black font-semibold max-w-3xl mx-auto">
                    When every second counts, Sheywe Community Hospital's Emergency Department provides immediate,
                    life-saving care 24 hours a day, 7 days a week.
                </p>
            </div>

            <!-- Emergency Contact Numbers -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="emergency-card p-6 text-center pulse-animation">
                    <div class="text-4xl mb-4">🚨</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Life-Threatening Emergency</h3>
                    <div class="emergency-number mb-3">911</div>
                    <p class="text-gray-600">Call for immediate life-threatening situations</p>
                </div>

                <div class="emergency-card p-6 text-center">
                    <div class="text-4xl mb-4">🏥</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Emergency Department</h3>
                    <div class="emergency-number mb-3">(254) 123-EMRG</div>
                    <p class="text-gray-600">Direct line to our Emergency Department</p>
                </div>

                <div class="emergency-card p-6 text-center">
                    <div class="text-4xl mb-4">🚑</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Ambulance Service</h3>
                    <div class="emergency-number mb-3">(254) 123-AMBU</div>
                    <p class="text-gray-600">Non-emergency ambulance transport</p>
                </div>
            </div>

            <!-- Current Wait Times -->
            <div class="emergency-card p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Current Emergency Room Wait Times</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center p-4 border-r border-gray-200 last:border-r-0">
                        <div class="text-2xl mb-2">🟢</div>
                        <h3 class="font-semibold text-gray-800">Low Priority</h3>
                        <p class="wait-time-good text-2xl font-bold">15 min</p>
                        <p class="text-gray-600 text-sm">Non-urgent conditions</p>
                    </div>
                    <div class="text-center p-4 border-r border-gray-200 last:border-r-0">
                        <div class="text-2xl mb-2">🟡</div>
                        <h3 class="font-semibold text-gray-800">Moderate Priority</h3>
                        <p class="wait-time-moderate text-2xl font-bold">45 min</p>
                        <p class="text-gray-600 text-sm">Urgent but stable</p>
                    </div>
                    <div class="text-center p-4">
                        <div class="text-2xl mb-2">🔴</div>
                        <h3 class="font-semibold text-gray-800">High Priority</h3>
                        <p class="wait-time-busy text-2xl font-bold">Immediate</p>
                        <p class="text-gray-600 text-sm">Life-threatening</p>
                    </div>
                </div>
                <div class="text-center mt-6">
                    <p class="text-gray-600 text-sm">*Wait times are estimates and may vary based on severity of cases.
                        Critical patients are seen immediately.</p>
                </div>
            </div>

            <!-- What to Expect -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
                <div class="emergency-card p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">What to Expect in Our Emergency Department</h2>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <div
                                class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-blue-600 font-bold">1</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Triage Assessment</h3>
                                <p class="text-gray-600">Our nurses will quickly assess your condition and prioritize
                                    your care</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div
                                class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-blue-600 font-bold">2</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Registration</h3>
                                <p class="text-gray-600">Provide insurance information and medical history</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div
                                class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-blue-600 font-bold">3</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Medical Evaluation</h3>
                                <p class="text-gray-600">Comprehensive examination by our emergency physicians</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div
                                class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-blue-600 font-bold">4</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Treatment & Care</h3>
                                <p class="text-gray-600">Immediate treatment and ongoing monitoring</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div
                                class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                <span class="text-blue-600 font-bold">5</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Discharge or Admission</h3>
                                <p class="text-gray-600">Release with instructions or hospital admission if needed</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="emergency-card p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">When to Come to the Emergency Room</h2>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <span class="text-red-500">🔴</span>
                            <span class="text-gray-700">Chest pain or difficulty breathing</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-red-500">🔴</span>
                            <span class="text-gray-700">Severe bleeding or trauma</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-red-500">🔴</span>
                            <span class="text-gray-700">Signs of stroke (face drooping, arm weakness, speech
                                difficulty)</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-red-500">🔴</span>
                            <span class="text-gray-700">Severe allergic reactions</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-red-500">🔴</span>
                            <span class="text-gray-700">Poisoning or drug overdose</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-red-500">🔴</span>
                            <span class="text-gray-700">Severe burns</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-red-500">🔴</span>
                            <span class="text-gray-700">Loss of consciousness</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <span class="text-red-500">🔴</span>
                            <span class="text-gray-700">Severe abdominal pain</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ambulance Services -->
            <div class="emergency-card p-8 mb-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Ambulance Services</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Emergency Ambulance (911)</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li>✓ Advanced Life Support (ALS)</li>
                            <li>✓ Basic Life Support (BLS)</li>
                            <li>✓ Paramedic teams</li>
                            <li>✓ Critical care transport</li>
                            <li>✓ 24/7 availability</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Non-Emergency Transport</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li>✓ Scheduled medical appointments</li>
                            <li>✓ Hospital transfers</li>
                            <li>✓ Dialysis transport</li>
                            <li>✓ Wheelchair accessible</li>
                            <li>✓ Insurance accepted</li>
                        </ul>
                        <div class="mt-4">
                            <button
                                class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-lg font-medium hover:from-blue-600 hover:to-purple-700 transition-all">
                                Schedule Transport
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- First Aid Tips -->
            <div class="emergency-card p-8">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Basic First Aid Guidelines</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">For Bleeding</h3>
                        <div class="space-y-3 first-aid-container">
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Apply direct pressure with a clean cloth</span>
                            </div>
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Elevate the injured area above the heart if possible</span>
                            </div>
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Do not remove objects embedded in wounds</span>
                            </div>
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Call 911 for severe bleeding</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">For Burns</h3>
                        <div class="space-y-3 first-aid-container">
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Cool the burn with cool (not cold) water</span>
                            </div>
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Remove jewelry before swelling occurs</span>
                            </div>
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Cover with a sterile bandage</span>
                            </div>
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Do not use ice or break blisters</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">For Choking</h3>
                        <div class="space-y-3 first-aid-container">
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Encourage coughing if person is conscious</span>
                            </div>
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Give 5 back blows between shoulder blades</span>
                            </div>
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Perform abdominal thrusts (Heimlich maneuver)</span>
                            </div>
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Call 911 if obstruction doesn't clear</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">For Unconsciousness</h3>
                        <div class="space-y-3 first-aid-container">
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Check for responsiveness and breathing</span>
                            </div>
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Call 911 immediately</span>
                            </div>
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Place in recovery position if breathing</span>
                            </div>
                            <div class="flex items-start first-aid-step">
                                <span class="text-gray-700">Begin CPR if no pulse or breathing</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <p class="text-yellow-800 font-medium">⚠️ Important: These are basic guidelines only. Always call
                        911 for serious emergencies and seek professional medical training for proper first aid
                        techniques.</p>
                </div>
            </div>

        </div>
    </div>

    <!-- Emergency Preparedness Modal -->
    <div id="preparednessModal"
        class="fixed inset-0 bg-black/50  backdrop-blur-lg flex items-center justify-center z-50 hidden   ">

        <div class="bg-white rounded-md p-8 max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Emergency Preparedness Kit</h3>
                <button onclick="closePreparednessModal()"
                    class="text-gray-500 cursor-pointer hover:text-gray-700">✕</button>
            </div>
            <div class="space-y-4">
                <h4 class="font-semibold text-gray-800">Essential Items for Your Emergency Kit:</h4>
                <div class="grid grid-cols-2 gap-4">
                    <ul class="space-y-2 text-gray-700">
                        <li>✓ First aid supplies</li>
                        <li>✓ Prescription medications</li>
                        <li>✓ Emergency contact list</li>
                        <li>✓ Flashlight and batteries</li>
                        <li>✓ Water (1 gallon per person per day)</li>
                    </ul>
                    <ul class="space-y-2 text-gray-700">
                        <li>✓ Non-perishable food (3-day supply)</li>
                        <li>✓ Battery-powered radio</li>
                        <li>✓ Emergency blankets</li>
                        <li>✓ Cash in small bills</li>
                        <li>✓ Important documents (copies)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Update wait times periodically (simulation)
    function updateWaitTimes() {
        const times = [{
                selector: '.wait-time-good',
                min: 10,
                max: 25
            },
            {
                selector: '.wait-time-moderate',
                min: 30,
                max: 60
            },
            {
                selector: '.wait-time-busy',
                min: 0,
                max: 5
            }
        ];

        times.forEach((time, index) => {
            const element = document.querySelector(time.selector);
            if (index === 2) { // High priority always immediate
                element.textContent = 'Immediate';
            } else {
                const randomTime = Math.floor(Math.random() * (time.max - time.min + 1)) + time.min;
                element.textContent = randomTime + ' min';
            }
        });
    }

    // Update wait times every 2 minutes
    setInterval(updateWaitTimes, 120000);

    // Emergency preparedness modal
    function openPreparednessModal() {
        document.getElementById('preparednessModal').classList.remove('hidden');
    }

    function closePreparednessModal() {
        document.getElementById('preparednessModal').classList.add('hidden');
    }

    // Add emergency preparedness button
    document.addEventListener('DOMContentLoaded', () => {
        const preparednessBtn = document.createElement('button');
        preparednessBtn.textContent = 'Emergency Preparedness Tips';
        preparednessBtn.className =
            'fixed bottom-2 md:right-22 right-2 px-4 py-2 bg-red-600 text-white cursor-pointer rounded-full shadow-lg hover:bg-red-700 transition-colors z-40';
        preparednessBtn.onclick = openPreparednessModal;
        document.body.appendChild(preparednessBtn);
    });
    </script>

</body>

</html>