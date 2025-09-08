<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Insurance & Billing - Sheywe Community Hospital</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%);
            min-height: 100vh;
        }

        .billing-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            transition: all 0.3s ease;
        }

        .billing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.35);
        }

        .insurance-logo {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #f8fafc, #e2e8f0);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1rem;
            border: 2px solid #e5e7eb;
        }

        .cost-estimator {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            border-radius: 15px;
            padding: 2rem;
        }

        .payment-method {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .payment-method:hover,
        .payment-method.selected {
            border-color: #3b82f6;
            background: rgba(59, 130, 246, 0.05);
        }

        .financial-assistance {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border-radius: 15px;
            padding: 2rem;
        }

        .bill-summary {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1.5rem;
            border-left: 4px solid #3b82f6;
        }

        .calculator-input {
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            padding: 0.75rem;
            margin-bottom: 1rem;
        }

        .insurance-tier {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1rem;
            border-left: 4px solid;
        }

        .tier-gold {
            border-left-color: #fbbf24;
            background: #fef3c7;
        }

        .tier-silver {
            border-left-color: #9ca3af;
            background: #f3f4f6;
        }

        .tier-bronze {
            border-left-color: #dc2626;
            background: #fee2e2;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="min-h-screen pt-20 pb-12">
        <div class="container mx-auto px-4">

            <!-- Hero Section -->
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">Insurance & Billing</h1>
                <p class="text-white/90 text-lg max-w-3xl mx-auto">
                    We accept most major insurance plans and offer flexible payment options to make healthcare
                    accessible and affordable.
                </p>
            </div>

            <!-- Accepted Insurance Providers -->
            <div class="billing-card p-8 mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Accepted Insurance Providers</h2>

                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    <div class="text-center">
                        <div class="insurance-logo">🛡️</div>
                        <h3 class="font-semibold text-gray-800">Blue Cross Blue Shield</h3>
                        <p class="text-gray-600 text-sm">All plans accepted</p>
                    </div>
                    <div class="text-center">
                        <div class="insurance-logo">⚡</div>
                        <h3 class="font-semibold text-gray-800">Aetna</h3>
                        <p class="text-gray-600 text-sm">All plans accepted</p>
                    </div>
                    <div class="text-center">
                        <div class="insurance-logo">🏥</div>
                        <h3 class="font-semibold text-gray-800">Cigna</h3>
                        <p class="text-gray-600 text-sm">All plans accepted</p>
                    </div>
                    <div class="text-center">
                        <div class="insurance-logo">🌟</div>
                        <h3 class="font-semibold text-gray-800">United Healthcare</h3>
                        <p class="text-gray-600 text-sm">All plans accepted</p>
                    </div>
                    <div class="text-center">
                        <div class="insurance-logo">🏛️</div>
                        <h3 class="font-semibold text-gray-800">Medicare</h3>
                        <p class="text-gray-600 text-sm">Parts A, B, C & D</p>
                    </div>
                    <div class="text-center">
                        <div class="insurance-logo">🤝</div>
                        <h3 class="font-semibold text-gray-800">Medicaid</h3>
                        <p class="text-gray-600 text-sm">All state plans</p>
                    </div>
                </div>

                <div class="mt-8 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <p class="text-blue-800 text-center">
                        <strong>Don't see your insurance?</strong> Contact our billing department at
                        <a href="tel:555-123-BILL" class="underline">(555) 123-BILL</a> to verify coverage.
                    </p>
                </div>
            </div>

            <!-- Cost Estimator & Payment Options -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">

                <!-- Cost Estimator -->
                <div class="cost-estimator">
                    <h2 class="text-2xl font-bold mb-6">Treatment Cost Estimator</h2>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-white/90 mb-2">Service Type</label>
                            <select id="serviceType" class="calculator-input w-full text-gray-800">
                                <option value="">Select a service</option>
                                <option value="consultation" data-cost="150">General Consultation</option>
                                <option value="specialist" data-cost="250">Specialist Consultation</option>
                                <option value="emergency" data-cost="500">Emergency Room Visit</option>
                                <option value="xray" data-cost="200">X-Ray</option>
                                <option value="mri" data-cost="1200">MRI Scan</option>
                                <option value="surgery-minor" data-cost="2500">Minor Surgery</option>
                                <option value="surgery-major" data-cost="15000">Major Surgery</option>
                                <option value="lab" data-cost="100">Laboratory Tests</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-white/90 mb-2">Insurance Type</label>
                            <select id="insuranceType" class="calculator-input w-full text-gray-800">
                                <option value="none">No Insurance</option>
                                <option value="basic" data-coverage="0.6">Basic Plan (60% coverage)</option>
                                <option value="standard" data-coverage="0.8">Standard Plan (80% coverage)</option>
                                <option value="premium" data-coverage="0.9">Premium Plan (90% coverage)</option>
                            </select>
                        </div>

                        <button onclick="calculateCost()"
                            class="w-full bg-white text-blue-600 font-bold py-3 px-6 rounded-lg hover:bg-gray-100 transition-colors">
                            Calculate Estimate
                        </button>

                        <div id="costResult" class="bg-white/20 rounded-lg p-4 hidden">
                            <div class="text-center">
                                <div class="text-2xl font-bold" id="totalCost">$0</div>
                                <div class="text-white/90">Estimated Total Cost</div>
                                <div class="mt-2">
                                    <div class="text-lg" id="yourCost">Your estimated cost: $0</div>
                                    <div class="text-sm text-white/80" id="insuranceCoverage">Insurance covers: $0</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Options -->
                <div class="billing-card p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Payment Options</h2>

                    <div class="space-y-4">
                        <div class="payment-method" onclick="selectPayment(this)">
                            <div class="flex items-center space-x-4">
                                <div class="text-2xl">💳</div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Credit/Debit Cards</h3>
                                    <p class="text-gray-600 text-sm">Visa, MasterCard, American Express, Discover</p>
                                </div>
                            </div>
                        </div>

                        <div class="payment-method" onclick="selectPayment(this)">
                            <div class="flex items-center space-x-4">
                                <div class="text-2xl">🏦</div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Bank Transfer</h3>
                                    <p class="text-gray-600 text-sm">Direct bank account transfer</p>
                                </div>
                            </div>
                        </div>

                        <div class="payment-method" onclick="selectPayment(this)">
                            <div class="flex items-center space-x-4">
                                <div class="text-2xl">💰</div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Cash</h3>
                                    <p class="text-gray-600 text-sm">Cash payments accepted at registration</p>
                                </div>
                            </div>
                        </div>

                        <div class="payment-method" onclick="selectPayment(this)">
                            <div class="flex items-center space-x-4">
                                <div class="text-2xl">📅</div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Payment Plans</h3>
                                    <p class="text-gray-600 text-sm">Interest-free payment plans available</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <button onclick="openPaymentPortal()"
                            class="px-8 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg font-medium hover:from-green-600 hover:to-green-700 transition-all transform hover:scale-105">
                            Make a Payment
                        </button>
                    </div>
                </div>
            </div>

            <!-- Financial Assistance -->
            <div class="financial-assistance mb-12">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                    <div>
                        <h2 class="text-3xl font-bold mb-6">Financial Assistance Programs</h2>
                        <p class="text-white/90 mb-6">
                            We believe everyone deserves quality healthcare. Our financial assistance programs can help
                            reduce or eliminate your medical bills based on your financial situation.
                        </p>

                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <span class="text-2xl">✅</span>
                                <span>Income-based payment reductions</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="text-2xl">✅</span>
                                <span>Free care for qualifying patients</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="text-2xl">✅</span>
                                <span>Interest-free payment plans</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <span class="text-2xl">✅</span>
                                <span>Charity care programs</span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button onclick="openFinancialAssistance()"
                                class="px-6 py-3 bg-white text-green-600 rounded-lg font-medium hover:bg-gray-100 transition-colors">
                                Apply for Financial Assistance
                            </button>
                        </div>
                    </div>

                    <div class="bg-white/20 rounded-lg p-6">
                        <h3 class="text-xl font-bold mb-4">Qualification Guidelines</h3>
                        <div class="space-y-3">
                            <div class="insurance-tier tier-gold">
                                <div class="font-semibold">100% Assistance</div>
                                <div class="text-sm">Household income ≤ 200% of Federal Poverty Level</div>
                            </div>
                            <div class="insurance-tier tier-silver">
                                <div class="font-semibold text-gray-800">75% Assistance</div>
                                <div class="text-sm text-gray-800">Household income 201-300% of Federal Poverty Level
                                </div>
                            </div>
                            <div class="insurance-tier tier-bronze">
                                <div class="font-semibold text-gray-800">50% Assistance</div>
                                <div class="text-sm text-gray-800">Household income 301-400% of Federal Poverty Level
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Billing Information -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- Bill Summary Example -->
                <div class="billing-card p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Understanding Your Bill</h2>

                    <div class="bill-summary mb-6">
                        <h3 class="font-semibold text-gray-800 mb-3">Sample Medical Bill</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span>Office Visit</span>
                                <span>$200.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Laboratory Tests</span>
                                <span>$150.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span>X-Ray</span>
                                <span>$100.00</span>
                            </div>
                            <hr class="my-2">
                            <div class="flex justify-between font-semibold">
                                <span>Subtotal</span>
                                <span>$450.00</span>
                            </div>
                            <div class="flex justify-between text-green-600">
                                <span>Insurance Payment</span>
                                <span>-$360.00</span>
                            </div>
                            <div class="flex justify-between font-bold text-lg">
                                <span>Your Responsibility</span>
                                <span>$90.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-3 text-sm text-gray-600">
                        <p>• Bills are sent 30 days after service</p>
                        <p>• Payment is due within 30 days of bill date</p>
                        <p>• Questions? Call our billing department</p>
                        <p>• Online bill pay available 24/7</p>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="billing-card p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Billing Support</h2>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="text-2xl">📞</div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Phone Support</h3>
                                <p class="text-gray-600">(555) 123-BILL</p>
                                <p class="text-gray-500 text-sm">Mon-Fri: 8:00 AM - 6:00 PM</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="text-2xl">💬</div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Live Chat</h3>
                                <p class="text-gray-600">Available on our website</p>
                                <p class="text-gray-500 text-sm">24/7 billing assistance</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="text-2xl">✉️</div>
                            <div>
                                <h3 class="font-semibold text-gray-800">Email Support</h3>
                                <p class="text-gray-600">billing@sheywecommunityhospital.com</p>
                                <p class="text-gray-500 text-sm">Response within 24 hours</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="text-2xl">🏢</div>
                            <div>
                                <h3 class="font-semibold text-gray-800">In-Person</h3>
                                <p class="text-gray-600">Billing Office, 1st Floor</p>
                                <p class="text-gray-500 text-sm">Mon-Fri: 8:00 AM - 5:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                        <h4 class="font-semibold text-blue-800 mb-2">Patient Rights</h4>
                        <p class="text-blue-700 text-sm">You have the right to receive a detailed explanation of
                            charges, request payment plans, and dispute billing errors.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Payment Portal Modal -->
    <div id="paymentModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl p-8 max-w-md mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Online Payment Portal</h3>
                <button onclick="closePaymentModal()" class="text-gray-500 hover:text-gray-700">✕</button>
            </div>
            <div class="space-y-4">
                <input type="text" placeholder="Account Number" class="w-full p-3 border border-gray-300 rounded-lg">
                <input type="text" placeholder="Last Name" class="w-full p-3 border border-gray-300 rounded-lg">
                <input type="text" placeholder="Date of Birth (MM/DD/YYYY)"
                    class="w-full p-3 border border-gray-300 rounded-lg">
                <button
                    class="w-full px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg font-medium hover:from-green-600 hover:to-green-700 transition-all">
                    Access My Account
                </button>
                <p class="text-gray-600 text-sm text-center">
                    Don't have your account number? <a href="#" class="text-blue-600 hover:underline">Find it here</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function calculateCost() {
            const serviceType = document.getElementById('serviceType');
            const insuranceType = document.getElementById('insuranceType');
            const resultDiv = document.getElementById('costResult');

            if (!serviceType.value) {
                alert('Please select a service type');
                return;
            }

            const baseCost = parseInt(serviceType.selectedOptions[0].dataset.cost);
            const coverage = insuranceType.value === 'none' ? 0 : parseFloat(insuranceType.selectedOptions[0].dataset
                .coverage || 0);

            const insurancePays = baseCost * coverage;
            const yourCost = baseCost - insurancePays;

            document.getElementById('totalCost').textContent = `$${baseCost.toLocaleString()}`;
            document.getElementById('yourCost').textContent = `Your estimated cost: $${yourCost.toLocaleString()}`;
            document.getElementById('insuranceCoverage').textContent =
                `Insurance covers: $${insurancePays.toLocaleString()}`;

            resultDiv.classList.remove('hidden');
        }

        function selectPayment(element) {
            document.querySelectorAll('.payment-method').forEach(el => el.classList.remove('selected'));
            element.classList.add('selected');
        }

        function openPaymentPortal() {
            document.getElementById('paymentModal').classList.remove('hidden');
        }

        function closePaymentModal() {
            document.getElementById('paymentModal').classList.add('hidden');
        }

        function openFinancialAssistance() {
            alert(
                'Financial Assistance Application\n\nYou will be redirected to our secure financial assistance application portal. Please have the following documents ready:\n\n• Recent tax returns\n• Pay stubs\n• Bank statements\n• Identification\n\nOur financial counselors are available to help you complete the application.'
            );
        }
    </script>

    <?php include 'footer.php'; ?>
</body>

</html>