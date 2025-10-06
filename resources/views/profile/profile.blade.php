@extends('layouts.admin_dashboard')

@section('page_title', 'Admin Profile Settings')

@section('content')

    <h1 class="text-3xl font-extrabold text-vyre-light mb-8 border-b border-vyre-gold/30 pb-3">
        Account & Security
    </h1>

    <div class="space-y-10">
        
        <!-- 1. Update Profile Information Card -->
        <div class="bg-vyre-dark p-6 md:p-8 rounded-2xl shadow-xl border border-vyre-gold/10">
            <h2 class="text-2xl font-bold text-vyre-gold mb-3 flex items-center space-x-2">
                <i data-lucide="user-circle" class="w-6 h-6"></i>
                <span>Profile Details</span>
            </h2>
            <p class="text-vyre-light/80 mb-6">
                Update your account's profile information and email address.
            </p>

            <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-vyre-light/70 mb-1">Name</label>
                    <input type="text" id="name" name="name" value="{{ Auth::user()->name ?? 'Admin User' }}" required
                           class="w-full p-3 rounded-lg bg-vyre-medium border border-vyre-gold/30 focus:border-vyre-gold focus:ring-vyre-gold text-vyre-light transition duration-200">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-vyre-light/70 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email ?? 'admin@vyre.com' }}" required
                           class="w-full p-3 rounded-lg bg-vyre-medium border border-vyre-gold/30 focus:border-vyre-gold focus:ring-vyre-gold text-vyre-light transition duration-200">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full md:w-auto px-6 py-3 bg-vyre-gold text-vyre-dark font-semibold rounded-xl hover:bg-vyre-gold/90 transition duration-200 shadow-lg">
                        Save Profile
                    </button>
                </div>
            </form>
        </div>

        <!-- 2. Update Password Card -->
        <div class="bg-vyre-dark p-6 md:p-8 rounded-2xl shadow-xl border border-vyre-red/10">
            <h2 class="text-2xl font-bold text-vyre-red mb-3 flex items-center space-x-2">
                <i data-lucide="lock" class="w-6 h-6"></i>
                <span>Update Password</span>
            </h2>
            <p class="text-vyre-light/80 mb-6">
                Ensure your account is using a long, random password to stay secure.
            </p>

            <form action="{{ route('admin.password.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

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

        <!-- 3. Two-Factor Authentication Card (Mockup) -->
        <div class="bg-vyre-dark p-6 md:p-8 rounded-2xl shadow-xl border border-vyre-gold/10">
            <h2 class="text-2xl font-bold text-vyre-gold mb-3 flex items-center space-x-2">
                <i data-lucide="shield-check" class="w-6 h-6"></i>
                <span>Two-Factor Authentication (2FA)</span>
            </h2>
            <p class="text-vyre-light/80 mb-6">
                Add an extra layer of security to your account using two-factor authentication.
            </p>

            <!-- Example 2FA Status -->
            <div class="flex items-center justify-between p-4 bg-vyre-medium rounded-lg border border-vyre-gold/30">
                <span class="font-medium text-green-400 flex items-center space-x-2">
                    <i data-lucide="check-circle" class="w-5 h-5"></i>
                    <span>2FA is currently **Enabled**</span>
                </span>
                
                <form action="{{ route('two-factor.disable') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-vyre-red hover:text-vyre-red/80 font-medium transition duration-200">
                        Disable
                    </button>
                </form>
            </div>
            
        </div>

    </div>
    <script>
        // Re-initialize Lucide Icons for the injected content
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
@endsection
