<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VYRE ADMIN PANEL - Merged</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .nav-item {
            display: flex;
            align-items: center;
            space-x: 0.75rem; /* space-x-3 */
            padding: 0.75rem; /* p-3 */
            border-radius: 0.75rem; /* rounded-xl */
            color: #F5F5F5; /* text-vyre-light */
            transition: all 0.2s;
        }
        .hero-section {
            background-color: #1A1A1A; /* vyre-dark */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #F5F5F5;
            text-align: center;
            position: relative;
        }
        .hero-title {
            font-size: clamp(2.5rem, 8vw, 6rem); /* Responsive font size */
            font-weight: 900;
            color: #C5A350; /* vyre-gold */
            letter-spacing: -0.05em;
            line-height: 0.9;
            margin-top: 1rem;
        }
        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.5rem);
            color: rgba(245, 245, 245, 0.9);
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }
        .header-bg {
            background-color: #1A1A1A;
            border-bottom: 1px solid rgba(185, 28, 28, 0.3); /* vyre-red/30 */
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'vyre-dark': '#1A1A1A',
                        'vyre-gold': '#C5A350',
                        'vyre-light': '#F5F5F5',
                        'vyre-medium': '#2A2A2A',
                        'vyre-red': '#B91C1C', 
                    },
                }
            }
        }
        function showLoggedInView(pageId = 'dashboard') {
            document.getElementById('logged-in-container').style.display = 'flex';
            document.getElementById('logged-out-homepage').style.display = 'none';
            // Also shows the default page (Dashboard)
            showPage(pageId);
        }
        function showLoggedOutView() {
            document.getElementById('logged-in-container').style.display = 'none';
            document.getElementById('logged-out-homepage').style.display = 'block';
            document.title = 'VYRE FOOTWEAR - Rule Your Stride';
        }
        function showPage(pageId) {
            const adminContents = ['dashboard', 'profile', 'products', 'orders', 'users'];
            adminContents.forEach(id => {
                const element = document.getElementById(id + '-content');
                if (element) element.style.display = 'none';
            });
            const content = document.getElementById(pageId + '-content');
            if (content) {
                content.style.display = 'block';
            }
            const titleMap = {
                'dashboard': 'Dashboard Overview',
                'profile': 'Account & Security Settings',
                'products': 'Products & Inventory',
                'orders': 'Orders Management',
                'users': 'Customers & Staff'
            };
            document.getElementById('page-title').textContent = titleMap[pageId] || 'Admin Panel';
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.classList.remove('bg-vyre-red/40', 'font-semibold');
                item.classList.add('hover:bg-vyre-medium');
            });
            const activeLink = document.getElementById(pageId + '-link');
            if (activeLink) {
                 activeLink.classList.add('bg-vyre-red/40', 'font-semibold');
                 activeLink.classList.remove('hover:bg-vyre-medium');
            }
            document.querySelector('main')?.scrollTo({ top: 0, behavior: 'smooth' });
            document.title = 'VYRE ADMIN PANEL - ' + titleMap[pageId];
        }
        function simulateLogout() {
            showLoggedOutView(); 
        }
        function showSuccessMessage(containerId, message) {
            const container = document.getElementById(containerId);
            const messageElement = document.createElement('div');
            messageElement.id = 'success-alert';
            messageElement.className = 'p-4 mb-4 bg-green-500/20 text-green-300 rounded-xl flex items-center justify-between transition duration-300 ease-in-out';
            messageElement.innerHTML = `
                <span class="font-medium flex items-center space-x-2">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                    <span>${message}</span>
                </span>
                <button onclick="document.getElementById('success-alert').remove()" class="text-green-300 hover:text-green-100">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            `;
            document.getElementById('success-alert')?.remove();
            container.prepend(messageElement);
            lucide.createIcons(); s
            setTimeout(() => {
                document.getElementById('success-alert')?.remove();
            }, 4000);
        }
        document.addEventListener('DOMContentLoaded', () => {
            const profileForm = document.getElementById('profile-details-form');
            if (profileForm) {
                profileForm.addEventListener('submit', function(event) {
                    event.preventDefault(); 
                    showSuccessMessage('profile-details-card', 'Profile details updated successfully! (Simulated)');
                });
            }
            const passwordForm = document.getElementById('password-form');
            if (passwordForm) {
                passwordForm.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const newPass = document.getElementById('password').value;
                    const confirmPass = document.getElementById('password_confirmation').value;
                    if (newPass !== confirmPass) {
                         console.error('Error: New Password and Confirm Password do not match.');
                         return;
                    }
                    this.reset();
                    showSuccessMessage('password-update-card', 'Password updated successfully! (Simulated)');

                });
            }
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                if (!item.classList.contains('bg-vyre-red/40')) {
                    item.classList.add('hover:bg-vyre-medium');
                }
            });
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
            showLoggedInView(); 
        });
    </script>
</head>
<body class="bg-vyre-medium text-vyre-light min-h-screen">
    <!-- 1. LOGGED-OUT HOMEPAGE VIEW (Initially Hidden) -->
    <div id="logged-out-homepage" style="display:none;" class="w-full">
        <!-- HEADER (Logged Out View) -->
        <header class="fixed top-0 left-0 w-full header-bg p-4 flex justify-between items-center z-20 shadow-xl">
            <div class="flex items-center space-x-2">
                <i data-lucide="crown" class="w-6 h-6 text-vyre-gold"></i>
                <span class="text-xl font-extrabold text-vyre-light tracking-widest">VYRE FOOTWEAR</span>
            </div>
            <nav class="flex items-center space-x-6">
                <a href="javascript:void(0)" onclick="showLoggedInView()" class="text-vyre-gold hover:text-vyre-light transition duration-200 font-medium">
                    Log in
                </a>
                <a href="javascript:void(0)" class="px-4 py-2 bg-vyre-gold text-vyre-dark font-semibold rounded-lg hover:bg-vyre-gold/80 transition duration-200">
                    Register
                </a>
            </nav>
        </header>
        <!-- HERO SECTION -->
        <section class="hero-section">
            <div class="max-w-4xl px-4">
                <p class="hero-subtitle">UNCOMPROMISING LUXURY. UNMATCHED PERFORMANCE.</p>
                <h1 class="hero-title">Rule Your Stride.</h1>
                <p class="text-vyre-light/70 mt-4 mb-8 text-lg">
                    The **"Aura Collection"**. Crafted for the pinnacle of style.
                </p>
                
                <button class="px-8 py-4 border-2 border-vyre-gold text-vyre-gold font-semibold rounded-full tracking-widest hover:bg-vyre-gold hover:text-vyre-dark transition duration-300 shadow-lg">
                    EXPLORE THE COLLECTION
                </button>
            </div>
        </section>
        <!-- Placeholder Footer -->
        <footer class="bg-vyre-dark text-center text-vyre-light/50 p-4 border-t border-vyre-gold/10">
            VYRE FOOTWEAR © 2025. All rights reserved.
        </footer>
    </div>

    <!-- 2. LOGGED-IN ADMIN VIEW (Initially Visible) -->
    <div id="logged-in-container" class="flex" style="display:flex;">
        <!-- SIDEBAR -->
        <div class="w-64 bg-vyre-dark fixed h-full shadow-2xl p-6 hidden lg:flex flex-col border-r border-vyre-red/50">
            <!-- Logo/Title -->
            <h1 class="text-2xl font-extrabold text-vyre-red tracking-widest mb-6 border-b border-vyre-red/30 pb-3">
                VYRE CONTROL
            </h1>
            <!-- Navigation Links (Main) -->
            <nav class="space-y-3 flex-grow">
                <!-- 1. Dashboard (The default landing page) -->
                <a href="javascript:void(0)" id="dashboard-link" onclick="showPage('dashboard')" class="nav-item bg-vyre-red/40 font-semibold">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 text-vyre-gold"></i>
                    <span>Dashboard</span>
                </a>
                <!-- Core Admin Management Links -->
                <a href="javascript:void(0)" id="products-link" onclick="showPage('products')" class="nav-item hover:bg-vyre-medium">
                    <i data-lucide="package" class="w-5 h-5 text-vyre-gold"></i>
                    <span>Products & Inventory</span>
                </a>
                <a href="javascript:void(0)" id="orders-link" onclick="showPage('orders')" class="nav-item hover:bg-vyre-medium">
                    <i data-lucide="receipt" class="w-5 h-5 text-vyre-gold"></i>
                    <span>Orders</span>
                </a>
                <a href="javascript:void(0)" id="users-link" onclick="showPage('users')" class="nav-item hover:bg-vyre-medium">
                    <i data-lucide="users" class="w-5 h-5 text-vyre-gold"></i>
                    <span>Customers & Staff</span>
                </a>
            </nav>
            <!-- ACCOUNT/PROFILE LINKS (Pushed to the bottom using mt-auto) -->
            <div class="mt-auto pt-6 border-t border-vyre-red/30 space-y-3">
            
                <!-- 2. Profile Settings -->
                <a href="javascript:void(0)" id="profile-link" onclick="showPage('profile')" class="nav-item hover:bg-vyre-medium">
                    <i data-lucide="user" class="w-5 h-5 text-vyre-gold"></i>
                    <span>Profile Settings</span>
                </a>
                <!-- 3. Logout Button with JS View Switch -->
                <div>
                    <button type="button" onclick="simulateLogout()"
                            class="w-full flex items-center space-x-3 p-3 rounded-xl bg-vyre-red text-vyre-light font-semibold hover:bg-vyre-red/80 transition duration-200">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        <span>Logout</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT AREA -->
        <div class="lg:ml-64 w-full">
            <!-- Admin Header Bar -->
            <header class="bg-vyre-dark p-4 shadow-lg flex justify-between items-center sticky top-0 z-10 border-b border-vyre-red/50">
                <h2 id="page-title" class="text-xl font-bold text-vyre-light">Dashboard Overview</h2>
                <!-- Link to Storefront -->
                <button onclick="showLoggedOutView()" class="text-vyre-gold hover:text-vyre-light transition duration-200" aria-label="Go to Storefront">
                    <i data-lucide="store" class="w-5 h-5"></i>
                </button>
            </header>

            <!-- Page Content -->
            <main class="p-6 md:p-8">
                <!-- 1. DASHBOARD OVERVIEW CONTENT (Default View) -->
                <div id="dashboard-content">
                    <h1 class="text-3xl font-extrabold text-vyre-light mb-8 border-b border-vyre-red/30 pb-3">
                        Dashboard Quick Stats
                    </h1>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                        <div class="bg-vyre-dark p-6 rounded-2xl shadow-xl border border-vyre-gold/10">
                            <p class="text-vyre-gold text-sm uppercase font-bold">Total Sales</p>
                            <p class="text-3xl font-black mt-2">P1,250,000</p>
                        </div>
                        <div class="bg-vyre-dark p-6 rounded-2xl shadow-xl border border-vyre-gold/10">
                            <p class="text-vyre-gold text-sm uppercase font-bold">New Orders (Last 7 Days)</p>
                            <p class="text-3xl font-black mt-2">45</p>
                        </div>
                        <div class="bg-vyre-dark p-6 rounded-2xl shadow-xl border border-vyre-red/10">
                            <p class="text-vyre-red text-sm uppercase font-bold">Inventory Low</p>
                            <p class="text-3xl font-black mt-2">12 Items</p>
                        </div>
                    </div>
                </div>

                <!-- 2. PROFILE SETTINGS CONTENT (Initially Hidden) -->
                <div id="profile-content" style="display:none;">
                    <h1 class="text-3xl font-extrabold text-vyre-light mb-8 border-b border-vyre-gold/30 pb-3">
                        Account & Security
                    </h1>
                    <div class="space-y-10">
                        
                        <!-- Update Profile Information Card -->
                        <div id="profile-details-card" class="bg-vyre-dark p-6 md:p-8 rounded-2xl shadow-xl border border-vyre-gold/10">
                            <h3 class="text-2xl font-bold text-vyre-gold mb-3 flex items-center space-x-2">
                                <i data-lucide="user-circle" class="w-6 h-6"></i>
                                <span>Profile Details</span>
                            </h3>
                            <p class="text-vyre-light/80 mb-6">
                                Update your account's profile information and email address.
                            </p>

                            <!-- ID added for JS handler -->
                            <form id="profile-details-form" action="#" method="POST" class="space-y-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-vyre-light/70 mb-1">Name</label>
                                    <input type="text" id="name" name="name" value="Admin User" required
                                           class="w-full p-3 rounded-lg bg-vyre-medium border border-vyre-gold/30 focus:border-vyre-gold focus:ring-vyre-gold text-vyre-light transition duration-200">
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-vyre-light/70 mb-1">Email Address</label>
                                    <input type="email" id="email" name="email" value="admin@vyre.com" required
                                           class="w-full p-3 rounded-lg bg-vyre-medium border border-vyre-gold/30 focus:border-vyre-gold focus:ring-vyre-gold text-vyre-light transition duration-200">
                                </div>

                                <div class="pt-4">
                                    <button type="submit" class="w-full md:w-auto px-6 py-3 bg-vyre-gold text-vyre-dark font-semibold rounded-xl hover:bg-vyre-gold/90 transition duration-200 shadow-lg">
                                        Save Profile
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Update Password Card -->
                        <div id="password-update-card" class="bg-vyre-dark p-6 md:p-8 rounded-2xl shadow-xl border border-vyre-red/10">
                            <h3 class="text-2xl font-bold text-vyre-red mb-3 flex items-center space-x-2">
                                <i data-lucide="lock" class="w-6 h-6"></i>
                                <span>Update Password</span>
                            </h3>
                            <p class="text-vyre-light/80 mb-6">
                                Ensure your account is using a long, random password to stay secure.
                            </p>

                            <!-- ID added for JS handler -->
                            <form id="password-form" action="#" method="POST" class="space-y-6">
                                <div>
                                    <label for="current_password" class="block text-sm font-medium text-vyre-light/70 mb-1">Current Password</label>
                                    <input type="password" id="current_password" name="current_password" required
                                           class="w-full p-3 rounded-lg bg-vyre-medium border border-vyre-red/30 focus:border-vyre-red focus:ring-vyre-red text-vyre-light transition duration-200">
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-vyre-light/70 mb-1">New Password</label>
                                    <input type="password" id="password" name="password" required
                                           class="w-full p-3 rounded-lg bg-vyre-medium border border-vyre-red/30 focus:border-vyre-red focus:ring-vyre-red text-vyre-light transition duration-200">
                                </div>
                                
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-vyre-light/70 mb-1">Confirm New Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" required
                                           class="w-full p-3 rounded-lg bg-vyre-medium border border-vyre-red/30 focus:border-vyre-red focus:ring-vyre-red text-vyre-light transition duration-200">
                                </div>

                                <div class="pt-4">
                                    <button type="submit" class="w-full md:w-auto px-6 py-3 bg-vyre-red text-vyre-light font-semibold rounded-xl hover:bg-vyre-red/90 transition duration-200 shadow-lg">
                                        Update Password
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- Two-Factor Authentication Card (Mockup) -->
                        <div class="bg-vyre-dark p-6 md:p-8 rounded-2xl shadow-xl border border-vyre-gold/10">
                            <h3 class="text-2xl font-bold text-vyre-gold mb-3 flex items-center space-x-2">
                                <i data-lucide="shield-check" class="w-6 h-6"></i>
                                <span>Two-Factor Authentication (2FA)</span>
                            </h3>
                            <p class="text-vyre-light/80 mb-6">
                                Add an extra layer of security to your account using two-factor authentication.
                            </p>
                            <!-- Example 2FA Status -->
                            <div class="flex items-center justify-between p-4 bg-vyre-medium rounded-lg border border-vyre-gold/30">
                                <span class="font-medium text-green-400 flex items-center space-x-2">
                                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                                    <span>2FA is currently **Enabled**</span>
                                </span>
                                
                                <form action="#" method="POST">
                                    <button type="submit" class="text-vyre-red hover:text-vyre-red/80 font-medium transition duration-200">
                                        Disable
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>   
                <!-- Placeholder content for other pages (initially hidden) -->
                <div id="products-content" style="display:none;">
                    <h1 class="text-3xl font-extrabold text-vyre-light mb-8">Products & Inventory Page Content...</h1>
                    <div class="p-6 bg-vyre-dark rounded-xl">Product list table mockup...</div>
                </div>
                <div id="orders-content" style="display:none;">
                    <h1 class="text-3xl font-extrabold text-vyre-light mb-8">Orders Management Page Content...</h1>
                    <div class="p-6 bg-vyre-dark rounded-xl">Order history list mockup...</div>
                </div>
                <div id="users-content" style="display:none;">
                    <h1 class="text-3xl font-extrabold text-vyre-light mb-8">Customers & Staff Page Content...</h1>
                    <div class="p-6 bg-vyre-dark rounded-xl">User list table mockup...</div>
                </div>

            </main>
        </div>
    </div>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</body>
</html>
