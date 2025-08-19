<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Health Resources - BlueLife Hospital</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #7c3aed 0%, #a855f7 50%, #c084fc 100%);
            min-height: 100vh;
        }

        .resource-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transition: all 0.3s ease;
        }

        .resource-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.35);
        }

        .calculator-card {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            border-radius: 20px;
            padding: 2rem;
        }

        .calculator-input {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            padding: 0.75rem;
            margin-bottom: 1rem;
            color: #374151;
        }

        .result-display {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            margin-top: 1rem;
        }

        .symptom-checker {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
        }

        .form-download {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
        }

        .health-education {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            color: white;
        }

        .tool-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 1rem;
        }

        .download-item {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 0.5rem;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .download-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(5px);
        }

        .symptom-button {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            margin: 0.25rem;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .symptom-button:hover,
        .symptom-button.selected {
            background: rgba(255, 255, 255, 0.3);
            transform: scale(1.05);
        }

        .bmi-category {
            padding: 1rem;
            border-radius: 8px;
            margin: 0.5rem 0;
            text-align: center;
            font-weight: bold;
        }

        .bmi-underweight {
            background: #dbeafe;
            color: #1e40af;
        }

        .bmi-normal {
            background: #dcfce7;
            color: #166534;
        }

        .bmi-overweight {
            background: #fef3c7;
            color: #92400e;
        }

        .bmi-obese {
            background: #fee2e2;
            color: #991b1b;
        }

        .medication-reminder {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 1rem;
            border-left: 4px solid rgba(255, 255, 255, 0.5);
        }

        .tab-button {
            padding: 1rem 2rem;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 0.75rem;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .tab-button.active {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border-color: transparent;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="min-h-screen pt-20 pb-12">
        <div class="container mx-auto px-4">

            <!-- Hero Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">Health Resources</h1>
                <p class="text-white/90 text-lg max-w-3xl mx-auto">
                    Comprehensive health tools, calculators, and educational resources to help you manage your wellness journey.
                </p>
            </div>

            <!-- Resource Navigation -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button class="tab-button active" data-tab="calculators">Health Calculators</button>
                <button class="tab-button" data-tab="forms">Forms & Checklists</button>
                <button class="tab-button" data-tab="education">Health Education</button>
                <button class="tab-button" data-tab="symptom-checker">Symptom Checker</button>
                <button class="tab-button" data-tab="medication">Medication Tools</button>
            </div>

            <!-- Health Calculators Tab -->
            <div class="tab-content active" id="calculators">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <!-- BMI Calculator -->
                    <div class="calculator-card">
                        <div class="tool-icon">⚖️</div>
                        <h3 class="text-2xl font-bold mb-4 text-center">BMI Calculator</h3>
                        <div class="space-y-3">
                            <input type="number" id="height" placeholder="Height (inches)" class="calculator-input w-full">
                            <input type="number" id="weight" placeholder="Weight (lbs)" class="calculator-input w-full">
                            <button onclick="calculateBMI()" class="w-full bg-white text-blue-600 font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors">
                                Calculate BMI
                            </button>
                            <div id="bmiResult" class="result-display hidden">
                                <div class="text-2xl font-bold" id="bmiValue">--</div>
                                <div id="bmiCategory">BMI Category</div>
                            </div>
                        </div>
                    </div>

                    <!-- Calorie Calculator -->
                    <div class="calculator-card">
                        <div class="tool-icon">🔥</div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Daily Calorie Needs</h3>
                        <div class="space-y-3">
                            <input type="number" id="age" placeholder="Age" class="calculator-input w-full">
                            <select id="gender" class="calculator-input w-full">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <input type="number" id="calWeight" placeholder="Weight (lbs)" class="calculator-input w-full">
                            <input type="number" id="calHeight" placeholder="Height (inches)" class="calculator-input w-full">
                            <select id="activity" class="calculator-input w-full">
                                <option value="">Activity Level</option>
                                <option value="1.2">Sedentary</option>
                                <option value="1.375">Light Activity</option>
                                <option value="1.55">Moderate Activity</option>
                                <option value="1.725">Very Active</option>
                                <option value="1.9">Extremely Active</option>
                            </select>
                            <button onclick="calculateCalories()" class="w-full bg-white text-blue-600 font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors">
                                Calculate Calories
                            </button>
                            <div id="calorieResult" class="result-display hidden">
                                <div class="text-2xl font-bold" id="calorieValue">--</div>
                                <div>Calories per day</div>
                            </div>
                        </div>
                    </div>

                    <!-- Water Intake Calculator -->
                    <div class="calculator-card">
                        <div class="tool-icon">💧</div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Water Intake Calculator</h3>
                        <div class="space-y-3">
                            <input type="number" id="waterWeight" placeholder="Weight (lbs)" class="calculator-input w-full">
                            <select id="exerciseLevel" class="calculator-input w-full">
                                <option value="0">No Exercise</option>
                                <option value="12">Light Exercise (30 min)</option>
                                <option value="24">Moderate Exercise (1 hour)</option>
                                <option value="36">Intense Exercise (1.5+ hours)</option>
                            </select>
                            <button onclick="calculateWater()" class="w-full bg-white text-blue-600 font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors">
                                Calculate Water Needs
                            </button>
                            <div id="waterResult" class="result-display hidden">
                                <div class="text-2xl font-bold" id="waterValue">--</div>
                                <div>Ounces of water per day</div>
                            </div>
                        </div>
                    </div>

                    <!-- Heart Rate Calculator -->
                    <div class="calculator-card">
                        <div class="tool-icon">❤️</div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Target Heart Rate</h3>
                        <div class="space-y-3">
                            <input type="number" id="heartAge" placeholder="Age" class="calculator-input w-full">
                            <button onclick="calculateHeartRate()" class="w-full bg-white text-blue-600 font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors">
                                Calculate Target Heart Rate
                            </button>
                            <div id="heartRateResult" class="result-display hidden">
                                <div class="space-y-2">
                                    <div>
                                        <div class="font-bold">Maximum HR:</div>
                                        <div class="text-xl" id="maxHR">--</div>
                                    </div>
                                    <div>
                                        <div class="font-bold">Target Zone (50-85%):</div>
                                        <div class="text-xl" id="targetHR">--</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pregnancy Due Date Calculator -->
                    <div class="calculator-card">
                        <div class="tool-icon">👶</div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Pregnancy Due Date</h3>
                        <div class="space-y-3">
                            <input type="date" id="lastPeriod" class="calculator-input w-full">
                            <button onclick="calculateDueDate()" class="w-full bg-white text-blue-600 font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors">
                                Calculate Due Date
                            </button>
                            <div id="dueDateResult" class="result-display hidden">
                                <div class="text-lg font-bold" id="dueDate">--</div>
                                <div id="weeksPregnant">--</div>
                            </div>
                        </div>
                    </div>

                    <!-- Blood Pressure Tracker -->
                    <div class="calculator-card">
                        <div class="tool-icon">🩺</div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Blood Pressure Checker</h3>
                        <div class="space-y-3">
                            <input type="number" id="systolic" placeholder="Systolic (top number)" class="calculator-input w-full">
                            <input type="number" id="diastolic" placeholder="Diastolic (bottom number)" class="calculator-input w-full">
                            <button onclick="checkBloodPressure()" class="w-full bg-white text-blue-600 font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors">
                                Check Blood Pressure
                            </button>
                            <div id="bpResult" class="result-display hidden">
                                <div class="text-xl font-bold" id="bpCategory">--</div>
                                <div id="bpAdvice">--</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Forms & Checklists Tab -->
            <div class="tab-content" id="forms">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <div class="resource-card form-download p-8">
                        <div class="tool-icon">📋</div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Pre-Visit Forms</h3>
                        <div class="space-y-3">
                            <div class="download-item" onclick="downloadForm('new-patient')">
                                <div class="flex items-center justify-between">
                                    <span>📄 New Patient Registration</span>
                                    <span>📥</span>
                                </div>
                            </div>
                            <div class="download-item" onclick="downloadForm('medical-history')">
                                <div class="flex items-center justify-between">
                                    <span>📋 Medical History Form</span>
                                    <span>📥</span>
                                </div>
                            </div>
                            <div class="download-item" onclick="downloadForm('insurance')">
                                <div class="flex items-center justify-between">
                                    <span>🏥 Insurance Verification</span>
                                    <span>📥</span>
                                </div>
                            </div>
                            <div class="download-item" onclick="downloadForm('consent')">
                                <div class="flex items-center justify-between">
                                    <span>✍️ Consent Forms</span>
                                    <span>📥</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="resource-card form-download p-8">
                        <div class="tool-icon">✅</div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Pre-Visit Checklists</h3>
                        <div class="space-y-3">
                            <div class="download-item" onclick="downloadForm('surgery-checklist')">
                                <div class="flex items-center justify-between">
                                    <span>🏥 Surgery Preparation</span>
                                    <span>📥</span>
                                </div>
                            </div>
                            <div class="download-item" onclick="downloadForm('lab-checklist')">
                                <div class="flex items-center justify-between">
                                    <span>🧪 Lab Test Preparation</span>
                                    <span>📥</span>
                                </div>
                            </div>
                            <div class="download-item" onclick="downloadForm('imaging-checklist')">
                                <div class="flex items-center justify-between">
                                    <span>📸 Imaging Study Prep</span>
                                    <span>📥</span>
                                </div>
                            </div>
                            <div class="download-item" onclick="downloadForm('emergency-checklist')">
                                <div class="flex items-center justify-between">
                                    <span>🚨 Emergency Preparedness</span>
                                    <span>📥</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="resource-card form-download p-8">
                        <div class="tool-icon">📊</div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Health Tracking Forms</h3>
                        <div class="space-y-3">
                            <div class="download-item" onclick="downloadForm('medication-log')">
                                <div class="flex items-center justify-between">
                                    <span>💊 Medication Log</span>
                                    <span>📥</span>
                                </div>
                            </div>
                            <div class="download-item" onclick="downloadForm('symptom-diary')">
                                <div class="flex items-center justify-between">
                                    <span>📔 Symptom Diary</span>
                                    <span>📥</span>
                                </div>
                            </div>
                            <div class="download-item" onclick="downloadForm('blood-pressure-log')">
                                <div class="flex items-center justify-between">
                                    <span>📈 Blood Pressure Log</span>
                                    <span>📥</span>
                                </div>
                            </div>
                            <div class="download-item" onclick="downloadForm('glucose-log')">
                                <div class="flex items-center justify-between">
                                    <span>🩸 Blood Glucose Log</span>
                                    <span>📥</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Health Education Tab -->
            <div class="tab-content" id="education">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <div class="resource-card health-education p-8">
                        <div class="tool-icon">❤️</div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Heart Health</h3>
                        <div class="space-y-3">
                            <div class="download-item" onclick="openEducationalContent('heart-diet')">
                                <span>🥗 Heart-Healthy Diet Guide</span>
                            </div>
                            <div class="download-item" onclick="openEducationalContent('exercise-heart')">
                                <span>🏃‍♂️ Exercise for Heart Health</span>
                            </div>
                            <div class="download-item" onclick="openEducationalContent('cholesterol')">
                                <span>📊 Understanding Cholesterol</span>
                            </div>
                            <div class="download-item" onclick="openEducationalContent('blood-pressure')">
                                <span>🩺 Managing Blood Pressure</span>
                            </div>
                        </div>
                    </div>

                    <div class="resource-card health-education p-8">
                        <div class="tool-icon">🧠</div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Mental Health</h3>
                        <div class="space-y-3">
                            <div class="download-item" onclick="openEducationalContent('stress-management')">
                                <span>😌 Stress Management Techniques</span>
                            </div>
                            <div class="download-item" onclick="openEducationalContent('sleep-hygiene')">
                                <span>😴 Sleep Hygiene Guide</span>
                            </div>
                            <div class="download-item" onclick="openEducationalContent('anxiety-help')">
                                <span>🧘‍♀️ Managing Anxiety</span>
                            </div>
                            <div class="download-item" onclick="openEducationalContent('depression-support')">
                                <span>🤝 Depression Support Resources</span>
                            </div>
                        </div>
                    </div>

                    <div class="resource-card health-education p-8">
                        <div class="tool-icon">🍎</div>
                        <h3 class="text-2xl font-bold mb-4 text-center">Nutrition & Wellness</h3>
                        <div class="space-y-3">
                            <div class="download-item" onclick="openEducationalContent('balanced-diet')">
                                <span>🥙 Balanced Diet Principles</span>
                            </div>
                            <div class="download-item" onclick="openEducationalContent('weight-management')">
                                <span>⚖️ Healthy Weight Management</span>
                            </div>
                            <div class="download-item" onclick="openEducationalContent('diabetes-diet')">
                                <span>🍎 Diabetes-Friendly Eating</span>
                            </div>
                            <div class="download-item" onclick="openEducationalContent('supplements')">
                                <span>💊 Vitamin & Supplement Guide</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Symptom Checker Tab -->
            <div class="tab-content" id="symptom-checker">
                <div class="resource-card symptom-checker p-8">
                    <div class="tool-icon">🔍</div>
                    <h2 class="text-3xl font-bold mb-6 text-center">Symptom Checker</h2>
                    <p class="text-center mb-6 text-white/90">
                        Select your symptoms below. This tool is for informational purposes only and does not replace professional medical advice.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-xl font-bold mb-4">Common Symptoms</h3>
                            <div class="grid grid-cols-2 gap-2">
                                <button class="symptom-button" onclick="toggleSymptom(this, 'fever')">🤒 Fever</button>
                                <button class="symptom-button" onclick="toggleSymptom(this, 'headache')">🤕 Headache</button>
                                <button class="symptom-button" onclick="toggleSymptom(this, 'cough')">😷 Cough</button>
                                <button class="symptom-button" onclick="toggleSymptom(this, 'fatigue')">😴 Fatigue</button>
                                <button class="symptom-button" onclick="toggleSymptom(this, 'nausea')">🤢 Nausea</button>
                                <button class="symptom-button" onclick="toggleSymptom(this, 'dizziness')">💫 Dizziness</button>
                                <button class="symptom-button" onclick="toggleSymptom(this, 'chest-pain')">💔 Chest Pain</button>
                                <button class="symptom-button" onclick="toggleSymptom(this, 'shortness-breath')">🫁 Shortness of Breath</button>
                                <button class="symptom-button" onclick="toggleSymptom(this, 'stomach-pain')">🤕 Stomach Pain</button>
                                <button class="symptom-button" onclick="toggleSymptom(this, 'rash')">🔴 Rash</button>
                                <button class="symptom-button" onclick="toggleSymptom(this, 'sore-throat')">😣 Sore Throat</button>
                                <button class="symptom-button" onclick="toggleSymptom(this, 'muscle-pain')">💪 Muscle Pain</button>
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xl font-bold mb-4">Selected Symptoms</h3>
                            <div id="selectedSymptoms" class="mb-4 min-h-[100px] bg-white/10 rounded-lg p-4">
                                <p class="text-white/70">No symptoms selected</p>
                            </div>

                            <button onclick="analyzeSymptoms()" class="w-full bg-white text-green-600 font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors mb-4">
                                Analyze Symptoms
                            </button>

                            <div id="symptomResults" class="result-display hidden">
                                <div id="symptomAnalysis"></div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 p-4 bg-red-100/20 border border-red-300/30 rounded-lg">
                        <p class="text-red-100 text-sm">
                            ⚠️ <strong>Important:</strong> This symptom checker is for informational purposes only.
                            If you're experiencing a medical emergency, call 911 immediately.
                            Always consult with a healthcare professional for proper diagnosis and treatment.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Medication Tools Tab -->
            <div class="tab-content" id="medication">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <div class="resource-card p-8">
                        <div class="tool-icon text-blue-600">💊</div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Medication Reminder Tool</h2>

                        <div class="space-y-4">
                            <input type="text" id="medName" placeholder="Medication Name" class="w-full p-3 border border-gray-300 rounded-lg">
                            <input type="text" id="medDosage" placeholder="Dosage (e.g., 10mg)" class="w-full p-3 border border-gray-300 rounded-lg">
                            <select id="medFrequency" class="w-full p-3 border border-gray-300 rounded-lg">
                                <option value="">Select Frequency</option>
                                <option value="once">Once daily</option>
                                <option value="twice">Twice daily</option>
                                <option value="three">Three times daily</option>
                                <option value="four">Four times daily</option>
                                <option value="weekly">Weekly</option>
                                <option value="asneeded">As needed</option>
                            </select>
                            <input type="time" id="medTime" class="w-full p-3 border border-gray-300 rounded-lg">
                            <button onclick="addMedication()" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white font-bold py-3 px-6 rounded-lg hover:from-blue-600 hover:to-purple-700 transition-all">
                                Add Medication
                            </button>
                        </div>

                        <div class="mt-6">
                            <h3 class="font-bold text-gray-800 mb-3">My Medications</h3>
                            <div id="medicationList" class="space-y-2">
                                <p class="text-gray-600">No medications added yet</p>
                            </div>
                        </div>
                    </div>

                    <div class="resource-card p-8">
                        <div class="tool-icon text-green-600">🔍</div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Drug Interaction Checker</h2>

                        <div class="space-y-4">
                            <input type="text" id="drug1" placeholder="First medication" class="w-full p-3 border border-gray-300 rounded-lg">
                            <input type="text" id="drug2" placeholder="Second medication" class="w-full p-3 border border-gray-300 rounded-lg">
                            <button onclick="checkInteraction()" class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white font-bold py-3 px-6 rounded-lg hover:from-green-600 hover:to-green-700 transition-all">
                                Check Interaction
                            </button>

                            <div id="interactionResult" class="hidden mt-4 p-4 border rounded-lg">
                                <div id="interactionContent"></div>
                            </div>
                        </div>

                        <div class="mt-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <p class="text-yellow-800 text-sm">
                                ⚠️ This tool provides general information only. Always consult your pharmacist or doctor about drug interactions.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        let selectedSymptoms = [];
        let medications = [];

        // Tab functionality
        function initializeTabs() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const targetTab = button.getAttribute('data-tab');

                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active'));

                    button.classList.add('active');
                    document.getElementById(targetTab).classList.add('active');
                });
            });
        }

        // BMI Calculator
        function calculateBMI() {
            const height = parseFloat(document.getElementById('height').value);
            const weight = parseFloat(document.getElementById('weight').value);

            if (!height || !weight) {
                alert('Please enter both height and weight');
                return;
            }

            const bmi = (weight * 703) / (height * height);
            const bmiValue = bmi.toFixed(1);

            let category = '';
            let categoryClass = '';

            if (bmi < 18.5) {
                category = 'Underweight';
                categoryClass = 'bmi-underweight';
            } else if (bmi < 25) {
                category = 'Normal weight';
                categoryClass = 'bmi-normal';
            } else if (bmi < 30) {
                category = 'Overweight';
                categoryClass = 'bmi-overweight';
            } else {
                category = 'Obese';
                categoryClass = 'bmi-obese';
            }

            document.getElementById('bmiValue').textContent = bmiValue;
            document.getElementById('bmiCategory').textContent = category;
            document.getElementById('bmiCategory').className = `bmi-category ${categoryClass}`;
            document.getElementById('bmiResult').classList.remove('hidden');
        }

        // Calorie Calculator
        function calculateCalories() {
            const age = parseFloat(document.getElementById('age').value);
            const gender = document.getElementById('gender').value;
            const weight = parseFloat(document.getElementById('calWeight').value);
            const height = parseFloat(document.getElementById('calHeight').value);
            const activity = parseFloat(document.getElementById('activity').value);

            if (!age || !gender || !weight || !height || !activity) {
                alert('Please fill in all fields');
                return;
            }

            // Convert to metric
            const weightKg = weight * 0.453592;
            const heightCm = height * 2.54;

            // Calculate BMR using Mifflin-St Jeor Equation
            let bmr;
            if (gender === 'male') {
                bmr = 10 * weightKg + 6.25 * heightCm - 5 * age + 5;
            } else {
                bmr = 10 * weightKg + 6.25 * heightCm - 5 * age - 161;
            }

            const totalCalories = Math.round(bmr * activity);

            document.getElementById('calorieValue').textContent = totalCalories.toLocaleString();
            document.getElementById('calorieResult').classList.remove('hidden');
        }

        // Water Calculator
        function calculateWater() {
            const weight = parseFloat(document.getElementById('waterWeight').value);
            const exercise = parseFloat(document.getElementById('exerciseLevel').value);

            if (!weight) {
                alert('Please enter your weight');
                return;
            }

            const baseWater = weight * 0.5; // Basic formula: 0.5 oz per pound
            const totalWater = Math.round(baseWater + exercise);

            document.getElementById('waterValue').textContent = totalWater;
            document.getElementById('waterResult').classList.remove('hidden');
        }

        // Heart Rate Calculator
        function calculateHeartRate() {
            const age = parseFloat(document.getElementById('heartAge').value);

            if (!age) {
                alert('Please enter your age');
                return;
            }

            const maxHR = 220 - age;
            const targetLow = Math.round(maxHR * 0.5);
            const targetHigh = Math.round(maxHR * 0.85);

            document.getElementById('maxHR').textContent = maxHR + ' bpm';
            document.getElementById('targetHR').textContent = `${targetLow} - ${targetHigh} bpm`;
            document.getElementById('heartRateResult').classList.remove('hidden');
        }

        // Due Date Calculator
        function calculateDueDate() {
            const lastPeriod = new Date(document.getElementById('lastPeriod').value);

            if (!lastPeriod || isNaN(lastPeriod)) {
                alert('Please enter the first day of your last menstrual period');
                return;
            }

            const dueDate = new Date(lastPeriod);
            dueDate.setDate(dueDate.getDate() + 280); // 40 weeks

            const today = new Date();
            const timeDiff = today - lastPeriod;
            const daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
            const weeks = Math.floor(daysDiff / 7);
            const days = daysDiff % 7;

            document.getElementById('dueDate').textContent = dueDate.toLocaleDateString();
            document.getElementById('weeksPregnant').textContent = `${weeks} weeks and ${days} days pregnant`;
            document.getElementById('dueDateResult').classList.remove('hidden');
        }

        // Blood Pressure Checker
        function checkBloodPressure() {
            const systolic = parseFloat(document.getElementById('systolic').value);
            const diastolic = parseFloat(document.getElementById('diastolic').value);

            if (!systolic || !diastolic) {
                alert('Please enter both systolic and diastolic values');
                return;
            }

            let category = '';
            let advice = '';
            let color = '';

            if (systolic < 120 && diastolic < 80) {
                category = 'Normal';
                advice = 'Maintain a healthy lifestyle';
                color = 'text-green-600';
            } else if (systolic < 130 && diastolic < 80) {
                category = 'Elevated';
                advice = 'Consider lifestyle changes';
                color = 'text-yellow-600';
            } else if (systolic < 140 || diastolic < 90) {
                category = 'High Blood Pressure Stage 1';
                advice = 'Consult with your doctor';
                color = 'text-orange-600';
            } else if (systolic < 180 || diastolic < 120) {
                category = 'High Blood Pressure Stage 2';
                advice = 'See your doctor soon';
                color = 'text-red-600';
            } else {
                category = 'Hypertensive Crisis';
                advice = 'Seek immediate medical attention';
                color = 'text-red-800';
            }

            document.getElementById('bpCategory').textContent = category;
            document.getElementById('bpCategory').className = `text-xl font-bold ${color}`;
            document.getElementById('bpAdvice').textContent = advice;
            document.getElementById('bpResult').classList.remove('hidden');
        }

        // Symptom Checker
        function toggleSymptom(button, symptom) {
            button.classList.toggle('selected');

            if (selectedSymptoms.includes(symptom)) {
                selectedSymptoms = selectedSymptoms.filter(s => s !== symptom);
            } else {
                selectedSymptoms.push(symptom);
            }

            updateSelectedSymptoms();
        }

        function updateSelectedSymptoms() {
            const container = document.getElementById('selectedSymptoms');
            if (selectedSymptoms.length === 0) {
                container.innerHTML = '<p class="text-white/70">No symptoms selected</p>';
            } else {
                container.innerHTML = selectedSymptoms.map(symptom =>
                    `<span class="inline-block bg-white/20 rounded-full px-3 py-1 text-sm mr-2 mb-2">${symptom.replace('-', ' ')}</span>`
                ).join('');
            }
        }

        function analyzeSymptoms() {
            if (selectedSymptoms.length === 0) {
                alert('Please select at least one symptom');
                return;
            }

            let analysis = '';
            let urgency = '';

            // Simple symptom analysis logic
            const emergencySymptoms = ['chest-pain', 'shortness-breath'];
            const seriousSymptoms = ['fever', 'severe-headache'];

            if (selectedSymptoms.some(s => emergencySymptoms.includes(s))) {
                analysis = 'Your symptoms may indicate a serious condition that requires immediate medical attention.';
                urgency = 'HIGH PRIORITY - Consider seeking emergency care immediately.';
            } else if (selectedSymptoms.some(s => seriousSymptoms.includes(s))) {
                analysis = 'Your symptoms should be evaluated by a healthcare professional.';
                urgency = 'MODERATE PRIORITY - Schedule an appointment with your doctor.';
            } else {
                analysis = 'Your symptoms may be related to minor conditions, but monitoring is recommended.';
                urgency = 'LOW PRIORITY - Monitor symptoms and consult if they worsen.';
            }

            document.getElementById('symptomAnalysis').innerHTML = `
                <div class="text-left">
                    <h4 class="font-bold mb-2">Analysis Results:</h4>
                    <p class="mb-4">${analysis}</p>
                    <div class="p-3 bg-white/20 rounded-lg">
                        <strong>Recommendation:</strong> ${urgency}
                    </div>
                </div>
            `;

            document.getElementById('symptomResults').classList.remove('hidden');
        }

        // Medication Tools
        function addMedication() {
            const name = document.getElementById('medName').value;
            const dosage = document.getElementById('medDosage').value;
            const frequency = document.getElementById('medFrequency').value;
            const time = document.getElementById('medTime').value;

            if (!name || !dosage || !frequency) {
                alert('Please fill in all required fields');
                return;
            }

            medications.push({
                name,
                dosage,
                frequency,
                time
            });
            updateMedicationList();

            // Clear form
            document.getElementById('medName').value = '';
            document.getElementById('medDosage').value = '';
            document.getElementById('medFrequency').value = '';
            document.getElementById('medTime').value = '';
        }

        function updateMedicationList() {
            const container = document.getElementById('medicationList');

            if (medications.length === 0) {
                container.innerHTML = '<p class="text-gray-600">No medications added yet</p>';
            } else {
                container.innerHTML = medications.map((med, index) => `
                    <div class="medication-reminder">
                        <div class="flex justify-between items-start">
                            <div>
                                <strong>${med.name}</strong> - ${med.dosage}<br>
                                <small class="text-gray-600">${med.frequency}${med.time ? ` at ${med.time}` : ''}</small>
                            </div>
                            <button onclick="removeMedication(${index})" class="text-red-500 hover:text-red-700">✕</button>
                        </div>
                    </div>
                `).join('');
            }
        }

        function removeMedication(index) {
            medications.splice(index, 1);
            updateMedicationList();
        }

        function checkInteraction() {
            const drug1 = document.getElementById('drug1').value;
            const drug2 = document.getElementById('drug2').value;

            if (!drug1 || !drug2) {
                alert('Please enter both medications');
                return;
            }

            // Simulated interaction check
            const result = document.getElementById('interactionResult');
            const content = document.getElementById('interactionContent');

            content.innerHTML = `
                <h4 class="font-bold mb-2">Interaction Check: ${drug1} + ${drug2}</h4>
                <div class="p-3 bg-green-50 border border-green-200 rounded">
                    <p class="text-green-800">No known major interactions found.</p>
                    <p class="text-green-700 text-sm mt-2">However, always consult your pharmacist or doctor for personalized advice.</p>
                </div>
            `;

            result.classList.remove('hidden');
        }

        // Form downloads
        function downloadForm(formType) {
            const forms = {
                'new-patient': 'New Patient Registration Form',
                'medical-history': 'Medical History Form',
                'insurance': 'Insurance Verification Form',
                'consent': 'Consent Forms Package',
                'surgery-checklist': 'Surgery Preparation Checklist',
                'lab-checklist': 'Laboratory Test Preparation',
                'imaging-checklist': 'Imaging Study Preparation',
                'emergency-checklist': 'Emergency Preparedness Checklist',
                'medication-log': 'Medication Tracking Log',
                'symptom-diary': 'Symptom Diary Template',
                'blood-pressure-log': 'Blood Pressure Tracking Log',
                'glucose-log': 'Blood Glucose Monitoring Log'
            };

            alert(`Downloading: ${forms[formType]}\n\nThis would typically download a PDF form. For demo purposes, this is a placeholder.`);
        }

        // Educational content
        function openEducationalContent(topic) {
            const topics = {
                'heart-diet': 'Heart-Healthy Diet Guide',
                'exercise-heart': 'Exercise for Heart Health',
                'stress-management': 'Stress Management Techniques',
                'sleep-hygiene': 'Sleep Hygiene Guide'
            };

            alert(`Opening: ${topics[topic] || topic}\n\nThis would typically open an educational article or PDF. For demo purposes, this is a placeholder.`);
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', () => {
            initializeTabs();
        });
    </script>

    <?php include 'footer.php'; ?>
</body>

</html>