<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - DISPUSIP Maluku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#1e40af',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white fixed h-full">
            <div class="p-4">
                <div class="flex items-center space-x-2">
                    <img src="{{asset('img/logo-provmaluku.png')}}" alt="Logo" class="w-8 h-8">
                    <span class="text-lg font-bold">DISPUSIP Admin</span>
                </div>
            </div>
            <nav class="mt-8">
                {{-- <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-tachometer-alt w-6"></i>
                    <span>Dashboard</span>
                </a> --}}
                <a href="/admin/news" class="flex items-center px-4 py-3 bg-gray-700 text-white">
                    <i class="fas fa-newspaper w-6"></i>
                    <span>Berita</span>
                </a>
                <a href=" {{ route('admin.feedback') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-comments w-6"></i>
                    <span>Kritik & Saran</span>
                </a>
                {{-- <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-users w-6"></i>
                    <span>Users</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-300 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-cog w-6"></i>
                    <span>Settings</span>
                </a> --}}
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Navbar -->
            <nav class="bg-white shadow-md px-6 py-3 flex justify-between items-center sticky top-0 z-10">
                <h1 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
                
                <!-- Right Side Nav Items -->
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    {{-- <button class="p-2 hover:bg-gray-100 rounded-full relative">
                        <i class="fas fa-bell text-gray-600"></i>
                        <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">
                            3
                        </span>
                    </button> --}}

                    <!-- User Menu -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-3 hover:bg-gray-100 rounded-lg p-2">
                            {{-- <img src="{{ asset('img/default-avatar.png') }}" alt="Profile" class="w-8 h-8 rounded-full"> --}}
                            <span class="text-gray-700">Admin</span>
                            <i class="fas fa-chevron-down text-gray-500 text-sm"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" 
                             @click.away="open = false"
                             class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                            {{-- <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i>Profile
                            </a> --}}
                            {{-- <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </a> --}}
                            <hr class="my-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Alpine.js -->
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html> 