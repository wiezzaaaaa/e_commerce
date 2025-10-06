<x-app-layout>
    <!-- We will use the full body layout for our custom dashboard, so we won't use the default header here -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight hidden">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- CUSTOM STYLES (REQUIRED FOR USER HUB LOOK) -->
    <style>
        /* Define custom colors */
        .bg-vyre-dark { background-color: #1A1A1A; }
        .text-vyre-light { color: #F5F5F5; }
        .bg-vyre-medium { background-color: #2A2A2A; }
        .text-vyre-gold { color: #C5A350; }
        .border-vyre-gold\/50 { border-color: rgba(197, 163, 80, 0.5); }
        .bg-vyre-red { background-color: #B91C1C; }
        .text-vyre-red { color: #B91C1C; }

        body { 
            font-family: 'Inter', sans-serif; 
            /* Ginawa itong PURE BLACK para mas lumabas ang sidebar at content area */
            background-color: #000000 !important; 
        }
        .nav-item {
            display: flex;
            align-items: center;
            padding: 0.75rem; 
            border-radius: 0.75rem; 
            color: #F5F5F5; 
            transition: all 0.2s;
        }
        /* Ensure the main content area has the correct dark background */
        .py-12 {
            padding: 0 !important;
            margin: 0;
            width: 100%;
            min-height: calc(100vh - 64px); /* Adjust height based on main layout */
        }
        /* Override Jetstream's default container padding for full layout */
        .max-w-7xl, .sm\:px-6, .lg\:px-8 {
            max-width: none !important;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        .shadow-xl { box-shadow: none !important; }
        .sm\:rounded-lg { border-radius: 0 !important; }

        /* Hide the default navigation links from x-app-layout so we can use the custom sidebar */
        .sm\:flex { display: none !important; }
        
        /* Utility Classes from custom HTML */
        .bg-vyre-gold\/40 { background-color: rgba(197, 163, 80, 0.4); }
        .hover\:bg-vyre-medium:hover { background-color: #2A2A2A; }
    </style>
    
    <!-- MAIN USER HUB CONTENT -->
    <div id="logged-in-container" class="flex min-h-screen">
        
        <!-- SIDEBAR -->
        <div class="w-64 bg-vyre-dark fixed h-full shadow-2xl p-6 flex flex-col border-r border-vyre-gold/50 z-20">
            
            <!-- Logo/Title -->
            <h1 class="text-2xl font-extrabold text-vyre-gold tracking-widest mb-6 border-b border-vyre-gold/30 pb-3">
                VYRE HUB
            </h1>
            
            <!-- Navigation Links (Main) -->
            <nav class="space-y-3 flex-grow" x-data="{ active: 'dashboard' }">
                <!-- 1. Dashboard (The default landing page) -->
                <a href="javascript:void(0)" @click="active = 'dashboard'" :class="{'bg-vyre-gold/40 font-semibold': active === 'dashboard', 'hover:bg-vyre-medium': active !== 'dashboard'}" class="nav-item">
                    <i data-lucide="layout-dashboard" class="w-5 h-5 text-vyre-light"></i>
                    <span>My Hub</span>
                </a>

                <!-- Core User Links -->
                <a href="javascript:void(0)" @click="active = 'orders'" :class="{'bg-vyre-gold/40 font-semibold': active === 'orders', 'hover:bg-vyre-medium': active !== 'orders'}" class="nav-item">
                    <i data-lucide="shopping-bag" class="w-5 h-5 text-vyre-light"></i>
                    <span>Order History</span>
                </a>
                <a href="javascript:void(0)" @click="active = 'wishlist'" :class="{'bg-vyre-gold/40 font-semibold': active === 'wishlist', 'hover:bg-vyre-medium': active !== 'wishlist'}" class="nav-item">
                    <i data-lucide="heart" class="w-5 h-5 text-vyre-light"></i>
                    <span>Saved Items</span>
                </a>
                <a href="javascript:void(0)" @click="active = 'addresses'" :class="{'bg-vyre-gold/40 font-semibold': active === 'addresses', 'hover:bg-vyre-medium': active !== 'addresses'}" class="nav-item">
                    <i data-lucide="map-pin" class="w-5 h-5 text-vyre-light"></i>
                    <span>Addresses</span>
                </a>
            </nav>

            <!-- ACCOUNT/PROFILE LINKS (Pushed to the bottom using mt-auto) -->
            <div class="mt-auto pt-6 border-t border-vyre-gold/30 space-y-3">
                
                <!-- 2. Profile Settings (Redirects to Jetstream Profile Page) -->
                <a href="{{ route('profile.show') }}" class="nav-item hover:bg-vyre-medium">
                    <i data-lucide="user" class="w-5 h-5 text-vyre-light"></i>
                    <span>Account Settings</span>
                </a>

                <!-- 3. Logout Button (Uses Jetstream Logout route) -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center space-x-3 p-3 rounded-xl bg-vyre-red text-vyre-light font-semibold hover:bg-vyre-red/80 transition duration-200">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- MAIN CONTENT AREA WRAPPER -->
        <div class="ml-64 w-full bg-vyre-medium">
            
            <!-- User Hub Header Bar -->
            <header class="bg-vyre-dark p-4 shadow-lg flex justify-between items-center sticky top-0 z-10 border-b border-vyre-gold/50">
                <!-- Page Title -->
                <h2 x-text="
                    active === 'dashboard' ? 'My Hub Overview' : 
                    active === 'orders' ? 'Order History' :
                    active === 'wishlist' ? 'Saved Items (Wishlist)' :
                    'Shipping Addresses'
                " class="text-xl font-bold text-vyre-light">My Hub Overview</h2>
                
                <!-- Link to Storefront (Simulation) -->
                <a href="/" class="text-vyre-gold hover:text-vyre-light transition duration-200" aria-label="Go to Storefront">
                    <i data-lucide="store" class="w-5 h-5"></i>
                </a>
            </header>

            <!-- Page Content -->
            <main class="p-6 md:p-8">
                
                <!-- --- IMPORTANT: WE NEED LUCIDE ICONS FOR THIS TO WORK --- -->
                <script src="https://unpkg.com/lucide@latest"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', () => {
                        lucide.createIcons();
                    });
                </script>
                
                <!-- THE NEW MAIN CONTENT BOX (The "Kahon" effect) -->
                <div class="bg-vyre-dark rounded-xl shadow-2xl p-6 md:p-8 border border-vyre-gold/20 min-h-[80vh]">
                    <h1 class="text-3xl font-extrabold text-vyre-light mb-8 border-b border-vyre-gold/30 pb-3">
                        Welcome back, {{ Auth::user()->name }}!
                    </h1>

                    <!-- 1. USER DASHBOARD OVERVIEW CONTENT (Default View) -->
                    <div x-show="active === 'dashboard'" x-transition:enter.duration.500ms>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                            <!-- Card 1: Orders in Progress -->
                            <div class="bg-vyre-medium p-6 rounded-2xl shadow-xl border border-vyre-gold/10">
                                <p class="text-vyre-gold text-sm uppercase font-bold flex items-center space-x-2">
                                    <i data-lucide="loader" class="w-4 h-4"></i> <span>Orders in Progress</span>
                                </p>
                                <p class="text-3xl font-black mt-2">2</p>
                                <p class="text-vyre-light/70 text-sm mt-1">See shipping updates.</p>
                            </div>
                            <!-- Card 2: Saved Items -->
                            <div class="bg-vyre-medium p-6 rounded-2xl shadow-xl border border-vyre-gold/10">
                                <p class="text-vyre-gold text-sm uppercase font-bold flex items-center space-x-2">
                                    <i data-lucide="heart" class="w-4 h-4"></i> <span>Items in Wishlist</span>
                                </p>
                                <p class="text-3xl font-black mt-2">7</p>
                                <p class="text-vyre-light/70 text-sm mt-1">Ready to checkout?</p>
                            </div>
                            <!-- Card 3: Total Orders -->
                            <div class="bg-vyre-medium p-6 rounded-2xl shadow-xl border border-vyre-gold/10">
                                <p class="text-vyre-gold text-sm uppercase font-bold flex items-center space-x-2">
                                    <i data-lucide="shopping-bag" class="w-4 h-4"></i> <span>Total Orders</span>
                                </p>
                                <p class="text-3xl font-black mt-2 text-vyre-gold">14</p>
                                <p class="text-vyre-light/70 text-sm mt-1">Thank you for your loyalty!</p>
                            </div>
                        </div>

                        <!-- Recent Orders Table Mockup (You can replace this with a Livewire table later) -->
                        <div class="bg-vyre-medium p-6 rounded-2xl shadow-xl border border-vyre-gold/10">
                            <h3 class="text-xl font-bold text-vyre-light mb-4">Recent Orders</h3>
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-vyre-dark">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-vyre-gold uppercase tracking-wider">Order ID</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-vyre-gold uppercase tracking-wider">Date</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-vyre-gold uppercase tracking-wider">Status</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-vyre-gold uppercase tracking-wider">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-vyre-dark/50">
                                        <tr class="hover:bg-vyre-dark/50 transition duration-150">
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">#VYRE1005</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm">Oct 5, 2025</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-green-400">Delivered</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm">P8,990.00</td>
                                        </tr>
                                        <tr class="hover:bg-vyre-dark/50 transition duration-150">
                                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">#VYRE1006</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm">Oct 8, 2025</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm text-yellow-400">Shipped</td>
                                            <td class="px-4 py-4 whitespace-nowrap text-sm">P12,490.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- 2. ORDER HISTORY CONTENT -->
                    <div x-show="active === 'orders'" x-transition:enter.duration.500ms style="display: none;">
                        <h1 class="text-3xl font-extrabold text-vyre-light mb-8">Order History</h1>
                        <div class="p-6 bg-vyre-medium rounded-xl border border-vyre-gold/10 text-vyre-light/70">
                            Dito lalabas ang listahan ng lahat ng iyong nakumpletong order.
                        </div>
                    </div>
                    
                    <!-- 3. SAVED ITEMS (WISHLIST) CONTENT -->
                    <div x-show="active === 'wishlist'" x-transition:enter.duration.500ms style="display: none;">
                        <h1 class="text-3xl font-extrabold text-vyre-light mb-8">Saved Items (Wishlist)</h1>
                        <div class="p-6 bg-vyre-medium rounded-xl border border-vyre-gold/10 text-vyre-light/70">
                            Maaari kang mag-browse ng mga sapatos na naka-save sa iyong wishlist.
                        </div>
                    </div>
                    
                    <!-- 4. SHIPPING ADDRESSES CONTENT -->
                    <div x-show="active === 'addresses'" x-transition:enter.duration.500ms style="display: none;">
                        <h1 class="text-3xl font-extrabold text-vyre-light mb-8">Shipping Addresses</h1>
                        <div class="p-6 bg-vyre-medium rounded-xl border border-vyre-gold/10 text-vyre-light/70">
                            I-manage ang iyong mga shipping at billing address.
                        </div>
                    </div>
                </div> 
                <!-- END OF MAIN CONTENT BOX -->
                
            </main>
        </div>
    </div>
</x-app-layout>
