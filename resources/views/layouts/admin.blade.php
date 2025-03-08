<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - DISPUSIP Maluku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white">
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
        <main class="flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow">
                <div class="flex justify-between items-center px-6 py-4">
                    <h2 class="text-xl font-semibold text-gray-800">@yield('title')</h2>
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bell"></i>
                        </button>
                        <div class="relative">
                            <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                                <img src="https://ui-avatars.com/api/?name=Admin" alt="Admin" class="w-8 h-8 rounded-full">
                                <span>Admin</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-6">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html> 