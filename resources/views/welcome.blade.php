<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VYRE FOOTWEAR - Rule Your Stride</title>
    <!-- Load Tailwind CSS CDN for consistency outside of a full Laravel setup. -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script> 
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap');
        body { font-family: 'Inter', sans-serif; }
        .headline-font { font-family: 'Playfair Display', serif; }
        .shadow-gold-glow { box-shadow: 0 0 15px rgba(197, 163, 80, 0.8); }
    </style>
    <script>
        // Custom Tailwind Configuration for VYRE colors
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'vyre-dark': '#1A1A1A',
                        'vyre-gold': '#C5A350',
                        'vyre-light': '#F5F5F5',
                        'vyre-medium': '#2A2A2A',
                    },
                }
            }
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-vyre-dark text-vyre-light min-h-screen">
    
    <!-- 👑 NAVBAR (Header) -->
    <nav class="bg-vyre-dark bg-opacity-95 backdrop-blur-sm fixed w-full top-0 z-50 transition-shadow duration-300 shadow-xl border-b border-vyre-gold/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <!-- Logo -->
                <a href="{{ url('/') }}" class="flex items-center space-x-2 text-xl md:text-2xl font-extrabold text-vyre-gold tracking-widest transition-transform duration-300 hover:scale-[1.02]">
                    <i data-lucide="crown" class="w-5 h-5 md:w-6 h-6 text-vyre-gold"></i>
                    <span>VYRE</span>
                    <span class="text-vyre-light text-xs md:text-sm font-light tracking-normal">FOOTWEAR</span>
                </a>

                    <!-- Auth Links (Jetstream/Breeze compatible) -->
                    @auth
                        <!-- If user is logged in, show Dashboard and Logout -->
                        <a href="{{ route('dashboard') }}" 
                           class="text-vyre-gold font-semibold px-4 py-2 rounded-full hover:bg-vyre-medium transition duration-300">
                            Dashboard
                        </a>
                        <!-- Logout form -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button type="submit"
                                class="bg-red-700 text-vyre-light font-semibold px-4 py-2 rounded-full shadow hover:bg-red-600 transition duration-200">
                                Log Out
                            </button>
                        </form>
                    @else
                        <!-- If user is NOT logged in, show Login and Register side-by-side -->
                        <div class="flex space-x-3">
                            <a href="{{ route('login') }}" 
                               class="text-vyre-light font-semibold px-4 py-2 rounded-full hover:bg-vyre-medium transition duration-300">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" 
                                   class="bg-vyre-gold text-vyre-dark font-semibold px-4 py-2 rounded-full shadow hover:opacity-90 hover:scale-[1.03] transform transition duration-300">
                                    Register
                                </a>
                            @endif
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- 🌟 HERO SECTION (Enhanced with dramatic background) -->
    <header class="relative w-full h-screen flex items-center justify-center pt-16 overflow-hidden">
             <!-- Dark Overlay for better text readability -->
             <div class="absolute inset-0 bg-vyre-dark opacity-50"></div> 
        </div>

        <!-- Text/Overlay & CTA -->
        <div class="relative z-10 text-center max-w-5xl mx-auto p-4 md:p-8">
            <p class="text-xl sm:text-2xl font-light text-vyre-light mb-4 drop-shadow-md tracking-widest uppercase">
                Uncompromising Luxury.
            </p>
            <!-- Headline: "Rule Your Stride." -->
            <h1 class="headline-font text-6xl sm:text-8xl lg:text-9xl font-black tracking-tighter text-vyre-gold mb-6 leading-none drop-shadow-lg">
                TIMELESS STEPS.
            </h1>
                EXPLORE THE COLLECTION
            </a>
        </div>
    </header>

    <!-- FEATURED CATEGORIES (Shop by Segment) -->
    <section class="py-20 bg-vyre-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-vyre-light mb-12 uppercase tracking-wider border-b-2 border-vyre-gold pb-2 inline-block mx-auto">
                Featured Shoes
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Featured Card 1: Black/Gold Style -->
                <div class="bg-vyre-medium border border-vyre-gold/30 rounded-xl shadow-lg p-6 text-center hover:shadow-gold-glow hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/400x250/1A1A1A/C5A350?text=Shoe+Model+1" alt="Premium Sneaker" class="w-full h-auto rounded-lg mb-4 object-cover" />
                    <p class="text-vyre-gold font-semibold text-xl">Premium Sneaker Model 1</p>
                    <a href="#" class="text-gray-400 mt-2 block hover:text-vyre-light transition duration-200 text-sm">View Details →</a>
                </div>
                
                <!-- Featured Card 2: Black/Gold Style -->
                <div class="bg-vyre-medium border border-vyre-gold/30 rounded-xl shadow-lg p-6 text-center hover:shadow-gold-glow hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/400x250/1A1A1A/C5A350?text=High+Top" alt="High-Top" class="w-full h-auto rounded-lg mb-4 object-cover" />
                    <p class="text-vyre-gold font-semibold text-xl">High-Top Performance</p>
                    <a href="#" class="text-gray-400 mt-2 block hover:text-vyre-light transition duration-200 text-sm">View Details →</a>
                </div>

                <!-- Featured Card 3: Black/Gold Style -->
                <div class="bg-vyre-medium border border-vyre-gold/30 rounded-xl shadow-lg p-6 text-center hover:shadow-gold-glow hover:scale-[1.02] transition duration-300">
                    <img src="https://placehold.co/400x250/1A1A1A/C5A350?text=Limited+Run" alt="Limited Edition" class="w-full h-auto rounded-lg mb-4 object-cover" />
                    <p class="text-vyre-gold font-semibold text-xl">Limited Edition Runner</p>
                    <a href="#" class="text-gray-400 mt-2 block hover:text-vyre-light transition duration-200 text-sm">View Details →</a>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="/shop" class="text-vyre-gold font-medium text-xl hover:text-vyre-light transition duration-200 flex items-center justify-center">
                    Browse All Collections 
                    <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                </a>
            </div>
        </div>
    </section>
    
    <!--FOOTER -->
    <footer class="bg-vyre-dark border-t border-vyre-gold/30 text-gray-400 py-10">
        <div class="max-w-7xl mx-auto text-center px-4">
            <div class="flex justify-center space-x-6 mb-6">
                <a href="#" class="text-vyre-gold hover:text-vyre-light transition duration-200" aria-label="Instagram"><i data-lucide="instagram" class="w-6 h-6"></i></a>
                <a href="#" class="text-vyre-gold hover:text-vyre-light transition duration-200" aria-label="Facebook"><i data-lucide="facebook" class="w-6 h-6"></i></a>
                <a href="#" class="text-vyre-gold hover:text-vyre-light transition duration-200" aria-label="Pinterest"><i data-lucide="pinterest" class="w-6 h-6"></i></a>
            </div>
            <p class="text-sm">© {{ date('2022') }} VYRE FOOTWEAR. All rights reserved. | Crafted for Royalty.</p>
        </div>
    </footer>
    
    <!-- Initialize Lucide Icons -->
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</body>
</html>