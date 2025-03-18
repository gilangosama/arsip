<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arsip</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-blue': '#1e40af',
                        'primary-yellow': '#fde047',
                        'primary-teal': '#4dd0e1',
                    },
                    zIndex: {
                        '100': '100',
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .carousel-item {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 0.7s ease-in-out, z-index 0.7s step-end;
        }

        .carousel-item.active {
            opacity: 1;
            z-index: 1;
            transition: opacity 0.7s ease-in-out, z-index 0.7s step-start;
        }

        #prevSlide, #nextSlide {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #prevSlide:hover, #nextSlide:hover {
            background-color: rgba(0, 0, 0, 0.5);
            transform: translateY(-50%) scale(1.1);
        }

        @media (max-width: 768px) {
            #prevSlide, #nextSlide {
                display: none;
            }
        }
    </style>
</head>
<body class="relative">
    <!-- Carousel/Header Section (positioned behind navbar) -->
    {{-- <div class="absolute inset-0 z-0">
        <!-- Carousel -->
        <div id="carousel" class="relative h-screen w-full overflow-hidden">
            <!-- Carousel items with background image -->
            <div class="carousel-item absolute inset-0 opacity-100 transition-opacity duration-700">
                <img src="https://source.unsplash.com/random/1920x1080/?library" alt="Library" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white mt-32">
                        <h1 class="text-6xl font-bold text-shadow mb-2">Dinas Perpustakaan dan Kearsipan</h1>
                        <h2 class="text-4xl text-shadow">Provinsi Maluku</h2>
                    </div>
                </div>
            </div>
            <div class="carousel-item absolute inset-0 opacity-0 transition-opacity duration-700">
                <img src="https://source.unsplash.com/random/1920x1080/?books" alt="Books" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white mt-32">
                        <h1 class="text-6xl font-bold text-shadow mb-2">Koleksi Buku Terbaru</h1>
                        <h2 class="text-4xl text-shadow">Temukan Pengetahuan Baru</h2>
                    </div>
                </div>
            </div>
            <div class="carousel-item absolute inset-0 opacity-0 transition-opacity duration-700">
                <img src="https://source.unsplash.com/random/1920x1080/?archive" alt="Archive" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center text-white mt-32">
                        <h1 class="text-6xl font-bold text-shadow mb-2">Arsip Digital</h1>
                        <h2 class="text-4xl text-shadow">Melestarikan Sejarah Maluku</h2>
                    </div>
                </div>
            </div>
            
            <!-- Carousel controls -->
            <button id="prevSlide" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-50 text-white p-3 rounded-full z-30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button id="nextSlide" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-50 text-white p-3 rounded-full z-30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div> --}}

    <!-- Top Bar -->
    <div class="bg-gradient-to-r from-primary-blue to-blue-800 text-white py-2 relative z-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-between items-center">
                <div class="flex items-center space-x-6">
                    <div class="flex items-center text-white/90 hover:text-white transition-colors">
                        <i class="far fa-calendar-alt text-primary-yellow mr-2"></i> 
                        <span class="text-sm">27 February 2025</span>
                    </div>
                    <div class="flex items-center text-white/90 hover:text-white transition-colors">
                        <i class="far fa-envelope text-primary-yellow mr-2"></i> 
                        <span class="text-sm">dispusip@malukuprov.go.id</span>
                    </div>
            </div>
            <div class="flex space-x-4">
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition-all">
                        <i class="fab fa-facebook-f text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition-all">
                        <i class="fab fa-instagram text-sm"></i>
                    </a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition-all">
                        <i class="fab fa-youtube text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <div class="w-[90%] mx-auto relative z-40">
        <div class="bg-white rounded-b-[50px] shadow-lg">
            <!-- Logo Section -->
            {{-- <div class="flex justify-between items-center px-8 py-4"> --}}
                {{-- <div class="flex items-center space-x-4">
                    <img src="{{asset('img/logo-provmaluku.png')}}" alt="Logo" class="h-16 w-auto">
                    <div>
                        <h1 class="text-2xl font-zbold text-gray-800">DISPUSIP</h1>
                        <p class="text-sm text-gray-600">Dinas Perpustakaan dan Kearsipan Provinsi Maluku</p>
                    </div>
                </div> --}}
                <!-- Search Bar -->
                {{-- <div class="relative hidden md:block">
                    <input type="text" placeholder="Cari informasi..." class="w-64 px-4 py-2 rounded-full border border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary-blue/20 focus:border-primary-blue">
                    <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary-blue">
                        <i class="fas fa-search"></i>
                    </button>
                </div> --}}
            {{-- </div> --}}

            <!-- Navigation Menu -->
            <div class="border-t border-gray-100">
            <div class="flex flex-col">
                <!-- Main Navigation -->
                <div class="flex justify-center">
                        <ul class="flex flex-wrap items-center">
                        <li class="relative">
                                <a href="#" class="inline-flex items-center px-6 py-4 font-semibold text-sm uppercase bg-primary-blue text-white rounded-b-xl hover:bg-blue-700 transition-colors">
                                    <i class="fas fa-home mr-2"></i>
                                    BERANDA
                                </a>
                        </li>
                        <li class="relative group">
                                <a href="#" class="inline-flex items-center px-6 py-4 font-semibold text-sm uppercase text-gray-700 hover:text-primary-blue transition-colors">
                                    <i class="fas fa-users mr-2"></i>
                                PROFIL
                                    <i class="fas fa-chevron-down text-xs ml-2 group-hover:rotate-180 transition-transform duration-300"></i>
                                </a>
                                <div class="absolute hidden group-hover:block bg-white shadow-xl rounded-xl w-56 py-2 z-50 transform -translate-x-1/4 mt-1">
                                    <a href="#" class="block px-6 py-2 text-sm text-gray-600 hover:text-primary-blue hover:bg-gray-50">Visi & Misi</a>
                                    <a href="#" class="block px-6 py-2 text-sm text-gray-600 hover:text-primary-blue hover:bg-gray-50">Struktur Organisasi</a>
                                    <a href="#" class="block px-6 py-2 text-sm text-gray-600 hover:text-primary-blue hover:bg-gray-50">Tugas & Fungsi</a>
                            </div>
                        </li>
                        <li class="relative group">
                                <a href="#" class="inline-flex items-center px-6 py-4 font-semibold text-sm uppercase text-gray-700 hover:text-primary-blue transition-colors">
                                    <i class="fas fa-info-circle mr-2"></i>
                                INFORMASI
                                    <i class="fas fa-chevron-down text-xs ml-2 group-hover:rotate-180 transition-transform duration-300"></i>
                                </a>
                                <div class="absolute hidden group-hover:block bg-white shadow-xl rounded-xl w-56 py-2 z-50 transform -translate-x-1/4 mt-1">
                                    <a href="{{ route('news.index') }}" class="block px-6 py-2 text-sm text-gray-600 hover:text-primary-blue hover:bg-gray-50">Berita</a>
                                    <a href="#" class="block px-6 py-2 text-sm text-gray-600 hover:text-primary-blue hover:bg-gray-50">Pengumuman</a>
                                    <a href="#" class="block px-6 py-2 text-sm text-gray-600 hover:text-primary-blue hover:bg-gray-50">Agenda</a>
                            </div>
                        </li>
                        <li class="relative">
                                <a href="#" class="inline-flex items-center px-6 py-4 font-semibold text-sm uppercase text-gray-700 hover:text-primary-blue transition-colors">
                                    <i class="fas fa-book mr-2"></i>
                                    PERPUSTAKAAN
                                </a>
                        </li>
                        <li class="relative group">
                                <a href="#" class="inline-flex items-center px-6 py-4 font-semibold text-sm uppercase text-gray-700 hover:text-primary-blue transition-colors">
                                    <i class="fas fa-archive mr-2"></i>
                                KEARSIPAN
                                    <i class="fas fa-chevron-down text-xs ml-2 group-hover:rotate-180 transition-transform duration-300"></i>
                                </a>
                                <div class="absolute hidden group-hover:block bg-white shadow-xl rounded-xl w-56 py-2 z-50 transform -translate-x-1/4 mt-1">
                                    <a href="#" class="block px-6 py-2 text-sm text-gray-600 hover:text-primary-blue hover:bg-gray-50">Arsip Digital</a>
                                    <a href="#" class="block px-6 py-2 text-sm text-gray-600 hover:text-primary-blue hover:bg-gray-50">Layanan Arsip</a>
                            </div>
                        </li>
                        <li class="relative group">
                                <a href="#" class="inline-flex items-center px-6 py-4 font-semibold text-sm uppercase text-gray-700 hover:text-primary-blue transition-colors">
                                    <i class="fas fa-lightbulb mr-2"></i>
                                INOVASI
                                    <i class="fas fa-chevron-down text-xs ml-2 group-hover:rotate-180 transition-transform duration-300"></i>
                                </a>
                                <div class="absolute hidden group-hover:block bg-white shadow-xl rounded-xl w-56 py-2 z-50 transform -translate-x-1/4 mt-1">
                                    <a href="#" class="block px-6 py-2 text-sm text-gray-600 hover:text-primary-blue hover:bg-gray-50">Program Unggulan</a>
                                    <a href="#" class="block px-6 py-2 text-sm text-gray-600 hover:text-primary-blue hover:bg-gray-50">Layanan Digital</a>
                            </div>
                        </li>
                    </ul>
                </div>
                
                    <!-- Secondary Navigation -->
                    <div class="flex justify-center py-3 bg-gray-50 rounded-b-[50px]">
                        <a href="#" class="inline-flex items-center px-6 py-2 mx-2 font-semibold text-sm text-gray-700 hover:text-primary-blue transition-colors">
                            <i class="fas fa-book-open mr-2"></i>
                            NEW BOOK
                        </a>
                        <div class="w-px h-6 bg-gray-300 mx-4"></div>
                        <a href="#" class="inline-flex items-center px-6 py-2 mx-2 font-semibold text-sm text-gray-700 hover:text-primary-blue transition-colors">
                            <i class="fas fa-clinic-medical mr-2"></i>
                            KLINIK FRONT
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Spacer untuk mendorong konten ke bawah carousel -->
    <div class="h-screen"></div>

    <!-- Grid Menu Portal Section -->
    <div class="container mx-auto px-4 relative z-10 bg-white">
        <div class="max-w-6xl mx-auto mt-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800">LAYANAN KAMI</h2>
                <div class="w-24 h-1 bg-primary-blue mx-auto rounded-full mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Portal Provinsi Maluku -->
                <div class="group h-full">
                    <a href="#" class="block h-full">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 relative overflow-hidden h-full flex flex-col justify-between">
                            <!-- Background Pattern -->
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            
                            <div class="relative z-10">
                                <!-- Icon Container -->
                                <div class="mb-6 transform group-hover:scale-110 transition-transform duration-500">
                                    <div class="w-24 h-24 mx-auto bg-gradient-to-br from-primary-blue to-blue-600 rounded-2xl shadow-lg flex items-center justify-center p-4">
                                        <img src="{{asset('img/logo-provmaluku.png')}}" alt="Logo" class="w-full h-full object-contain">
                                    </div>
                                </div>
                                
                                <!-- Text Content -->
                    <div class="text-center">
                                    <h3 class="text-2xl font-bold text-gray-800 mb-2">PORTAL</h3>
                                    <p class="text-lg font-medium text-gray-600">PROVINSI MALUKU</p>
                                </div>
                                
                                <!-- Hover Effect Button -->
                                <div class="mt-6 opacity-0 group-hover:opacity-100 transition-all duration-500 transform group-hover:translate-y-0 translate-y-4">
                                    <button class="w-full bg-primary-blue text-white py-3 px-6 rounded-xl flex items-center justify-center space-x-2 hover:bg-blue-700 transition-colors">
                                        <span>Kunjungi Portal</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                    </div>
                </div>
            </a>
                </div>

            <!-- Media Center -->
                <div class="group h-full">
                    <a href="#" class="block h-full">
                        <div class="bg-primary-yellow rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 relative overflow-hidden h-full flex flex-col justify-between">
                            <!-- Background Pattern -->
                            <div class="absolute inset-0 bg-gradient-to-br from-yellow-200 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            
                            <div class="relative z-10">
                                <!-- Icon Container -->
                                <div class="mb-6 transform group-hover:scale-110 transition-transform duration-500">
                                    <div class="w-24 h-24 mx-auto bg-white rounded-2xl shadow-lg flex items-center justify-center p-4">
                                        <img src="{{asset('img/logo-provmaluku.png')}}" alt="Logo" class="w-full h-full object-contain">
                                    </div>
                                </div>
                                
                                <!-- Text Content -->
                    <div class="text-center">
                                    <h3 class="text-2xl font-bold text-gray-800 mb-2">MEDIACENTER</h3>
                                    <p class="text-lg font-medium text-gray-700">PROVINSI MALUKU</p>
                                </div>
                                
                                <!-- Hover Effect Button -->
                                <div class="mt-6 opacity-0 group-hover:opacity-100 transition-all duration-500 transform group-hover:translate-y-0 translate-y-4">
                                    <button class="w-full bg-white text-gray-800 py-3 px-6 rounded-xl flex items-center justify-center space-x-2 hover:bg-gray-50 transition-colors">
                                        <span>Kunjungi Media Center</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                    </div>
                </div>
            </a>
                </div>

            <!-- iMaluku -->
                <div class="group h-full">
                    <a href="#" class="block h-full">
                        <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 relative overflow-hidden h-full flex flex-col justify-between">
                            <!-- Background Pattern -->
                            <div class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            
                            <div class="relative z-10">
                                <!-- Icon Container -->
                                <div class="mb-6 transform group-hover:scale-110 transition-transform duration-500">
                                    <div class="w-24 h-24 mx-auto bg-gradient-to-br from-green-500 to-green-600 rounded-2xl shadow-lg flex items-center justify-center p-4">
                                        <img src="{{asset('img/logo-provmaluku.png')}}" alt="iMaluku" class="w-full h-full object-contain">
                                    </div>
                                </div>
                                
                                <!-- Text Content -->
                                <div class="text-center">
                                    <h3 class="text-2xl font-bold text-gray-800 mb-2">iMALUKU</h3>
                                    <p class="text-lg font-medium text-gray-600">SMART PROVINCE</p>
                                </div>
                                
                                <!-- Hover Effect Button -->
                                <div class="mt-6 opacity-0 group-hover:opacity-100 transition-all duration-500 transform group-hover:translate-y-0 translate-y-4">
                                    <button class="w-full bg-green-500 text-white py-3 px-6 rounded-xl flex items-center justify-center space-x-2 hover:bg-green-600 transition-colors">
                                        <span>Akses iMaluku</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Menambahkan spacer yang lebih kecil -->
    <div class="h-12 bg-white"></div>

    <!-- Berita Terkini Section -->
    <div class="container mx-auto px-4 py-16">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">BERITA TERKINI</h2>
            <div class="w-24 h-1 bg-primary-blue mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($published_news as $id => $item)
                <!-- Bungkus seluruh card dengan link -->
                <a href="{{ route('news.show', ['id' => $id]) }}" class="block group">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="relative h-48">
                            <img src="{{ Storage::url($item['image']) }}" 
                                 alt="{{ $item['title'] }}"
                                 class="w-full h-full object-cover"
                                 onerror="this.src='') }}'">
                            <div class="absolute top-4 left-4 bg-primary-blue text-white px-3 py-1 rounded-full text-sm">
                                {{ strtoupper($item['category']) }}
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $item['title'] }}</h3>
                            <p class="text-gray-600 mb-4">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item['content']), 100) }}
                            </p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y') }}
                                </span>
                                <!-- Tombol baca selengkapnya -->
                                <div class="inline-flex items-center text-primary-blue group-hover:underline">
                                    <span>Baca selengkapnya</span>
                                    <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach

            @if(count($published_news) == 0)
                <div class="col-span-3 text-center py-12">
                    <i class="fas fa-newspaper text-gray-300 text-5xl mb-4"></i>
                    <p class="text-gray-500">Belum ada berita terbaru</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Form Kritik dan Saran Section -->
    <div class="bg-gradient-to-b from-gray-50 to-gray-100 py-20">
        <div class="max-w-5xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Kritik dan Saran</h2>
                <p class="text-gray-600 text-lg">Kami sangat menghargai setiap masukan dari Anda untuk meningkatkan layanan kami</p>
            </div>

            <div class="relative max-w-2xl mx-auto p-8 bg-white rounded-2xl shadow-lg z-20">
                <!-- Header Form -->
                <div class="relative text-center mb-8 z-20">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Hubungi Kami</h2>
                    <p class="text-gray-600 text-sm">Kami sangat menghargai setiap masukan dari Anda</p>
                                </div>
                                
                <form id="contactForm" class="space-y-6 relative z-30">
                    <!-- Nama -->
                    <div class="group relative">
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2 relative z-20">
                            <i class="fas fa-user text-primary-blue mr-2"></i>Nama
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               class="w-full px-4 py-3 bg-gray-50 rounded-lg border border-gray-200 
                                      focus:border-primary-blue focus:ring-2 focus:ring-primary-blue/20 
                                      transition-all duration-300 outline-none
                                      hover:border-primary-blue/50
                                      relative z-20"
                               placeholder="Masukkan nama lengkap"
                               style="pointer-events: auto">
                    </div>
                    
                    <!-- Bagian Kanan - Form -->
                    <div class="p-10 md:w-3/5 bg-white">
                        <form id="kritikSaranForm" action="{{ route('kritik-saran.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="form-group">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                    <input type="text" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary-blue focus:border-transparent transition-all" placeholder="Masukkan nama lengkap">
                                </div>
                                <div class="form-group">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary-blue focus:border-transparent transition-all" placeholder="Masukkan email">
                                </div>
                            </div>
                            
                    <!-- Subjek -->
                    <div class="group relative">
                        <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2 relative z-20">
                            <i class="fas fa-heading text-primary-blue mr-2"></i>Subjek
                        </label>
                        <input type="text" 
                               id="subject" 
                               name="subject" 
                               class="w-full px-4 py-3 bg-gray-50 rounded-lg border border-gray-200 
                                      focus:border-primary-blue focus:ring-2 focus:ring-primary-blue/20 
                                      transition-all duration-300 outline-none
                                      hover:border-primary-blue/50
                                      relative z-20"
                               placeholder="Masukkan subjek pesan"
                               style="pointer-events: auto">
                            </div>
                            
                    <!-- Pesan -->
                    <div class="group relative">
                        <label for="message" class="block text-sm font-semibold text-gray-700 mb-2 relative z-20">
                            <i class="fas fa-message text-primary-blue mr-2"></i>Pesan
                        </label>
                        <textarea id="message" 
                                  name="message" 
                                  rows="4" 
                                  class="w-full px-4 py-3 bg-gray-50 rounded-lg border border-gray-200 
                                         focus:border-primary-blue focus:ring-2 focus:ring-primary-blue/20 
                                         transition-all duration-300 outline-none resize-none
                                         hover:border-primary-blue/50
                                         relative z-20"
                                  placeholder="Tulis pesan Anda di sini"
                                  style="pointer-events: auto"></textarea>
                            </div>
                            
                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-primary-blue text-white px-6 py-3.5 rounded-lg 
                                   font-semibold tracking-wide
                                   transform transition-all duration-300
                                   hover:bg-blue-700 hover:shadow-lg 
                                   active:scale-98 
                                   focus:ring-4 focus:ring-blue-200
                                   flex items-center justify-center space-x-2
                                   relative z-20"
                            style="pointer-events: auto">
                        <span>Kirim Pesan</span>
                        <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
            </div>
        </div>
    </div>

    <!-- Footer yang Dipercantik -->
    <footer class="bg-gradient-to-b from-gray-900 to-primary-blue text-white pt-20 pb-6 relative z-20">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">
                <!-- Logo dan Deskripsi -->
                <div class="md:col-span-4">
                    <div class="flex items-center mb-6">
                        <img src="{{asset('img/logo-provmaluku.png')}}" alt="Logo" class="h-16 w-auto mr-4">
                        <div>
                            <h3 class="text-2xl font-bold text-white">DISPUSIP</h3>
                            <p class="text-white/80">Provinsi Maluku</p>
                        </div>
                    </div>
                    <p class="text-white/70 leading-relaxed mb-8">
                        Dinas Perpustakaan dan Kearsipan Provinsi Maluku berkomitmen untuk melestarikan warisan budaya dan pengetahuan Maluku melalui layanan perpustakaan dan kearsipan yang modern.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-white/10 p-3 rounded-full hover:bg-white/20 transition-colors z-30 relative">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="bg-white/10 p-3 rounded-full hover:bg-white/20 transition-colors z-30 relative">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="bg-white/10 p-3 rounded-full hover:bg-white/20 transition-colors z-30 relative">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Link Cepat -->
                <div class="md:col-span-2 relative z-30">
                    <h4 class="text-lg font-semibold mb-6">Link Cepat</h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="#" class="text-white/70 hover:text-white transition-colors flex items-center group">
                                <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-white/70 hover:text-white transition-colors flex items-center group">
                                <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i>
                                <span>Profil</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-white/70 hover:text-white transition-colors flex items-center group">
                                <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i>
                                <span>Perpustakaan</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-white/70 hover:text-white transition-colors flex items-center group">
                                <i class="fas fa-chevron-right text-xs mr-2 group-hover:translate-x-1 transition-transform"></i>
                                <span>Kearsipan</span>
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Kontak -->
                <div class="md:col-span-3 relative z-30">
                    <h4 class="text-lg font-semibold mb-6">Kontak Kami</h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="https://maps.google.com/?q=Dinas+Perpustakaan+dan+Kearsipan+Provinsi+Maluku" target="_blank" class="flex items-start group hover:text-white">
                                <div class="bg-white/10 p-2 rounded-full mr-4 mt-1 group-hover:bg-white/20 transition-colors">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                                <span class="text-white/70 group-hover:text-white transition-colors">Jl. Sultan Babullah No.1, Kota Ambon, Maluku 97128</span>
                            </a>
                        </li>
                        <li>
                            <a href="tel:+62911123456" class="flex items-center group hover:text-white">
                                <div class="bg-white/10 p-2 rounded-full mr-4 group-hover:bg-white/20 transition-colors">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                                <span class="text-white/70 group-hover:text-white transition-colors">+62 911 123456</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:dispusip@malukuprov.go.id" class="flex items-center group hover:text-white">
                                <div class="bg-white/10 p-2 rounded-full mr-4 group-hover:bg-white/20 transition-colors">
                                <i class="fas fa-envelope"></i>
                            </div>
                                <span class="text-white/70 group-hover:text-white transition-colors">dispusip@malukuprov.go.id</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Google Maps -->
                <div class="md:col-span-3 relative z-30">
                    <h4 class="text-lg font-semibold mb-6">Lokasi Kami</h4>
                    <div class="rounded-xl overflow-hidden h-64 hover:shadow-lg transition-shadow">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.5026711387247!2d128.18077937497636!3d-3.7018099428621366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce85e2f2bc4c3%3A0x6457dc05fb6d2aa1!2sDinas%20Perpustakaan%20dan%20Kearsipan%20Provinsi%20Maluku!5e0!3m2!1sid!2sid!4v1709704251149!5m2!1sid!2sid" 
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="w-full h-full">
                        </iframe>
                    </div>
                </div>
            </div>
            
            <!-- Copyright -->
            <div class="border-t border-white/10 pt-8 text-center relative z-30">
                <p class="text-white/60">&copy; 2024 Dinas Perpustakaan dan Kearsipan Provinsi Maluku. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Tambahkan sebelum closing body tag -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#kritikSaranForm').on('submit', function(e) {
            e.preventDefault();
            
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert('Terima kasih! Pesan Anda telah terkirim.');
                    $('#kritikSaranForm')[0].reset();
                },
                error: function(xhr) {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            });
            });
        });
    </script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Cache gambar default
        const defaultImg = new Image();
        defaultImg.src = "";
        
        // Lazy loading untuk gambar
        const lazyImages = document.querySelectorAll("img.lazy");
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove("lazy");
                    observer.unobserve(img);
                }
            });
        });

        lazyImages.forEach(img => imageObserver.observe(img));
    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const carousel = document.getElementById('news-carousel');
        const items = carousel.getElementsByClassName('carousel-item');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        let currentSlide = 0;
        const totalSlides = Math.ceil(items.length / 3);

        // Fungsi untuk menampilkan slide
        function showSlide(index) {
            for(let i = 0; i < items.length; i++) {
                if(i >= index * 3 && i < (index * 3) + 3) {
                    items[i].classList.remove('hidden');
                } else {
                    items[i].classList.add('hidden');
                }
            };

            // Event listener untuk tombol next
            nextBtn.addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % totalSlides;
                showSlide(currentSlide);
            });

            // Event listener untuk tombol previous
            prevBtn.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(currentSlide);
            });

            // Auto slide setiap 5 detik
            setInterval(() => {
                currentSlide = (currentSlide + 1) % totalSlides;
                showSlide(currentSlide);
            }, 5000);

            // Tampilkan slide pertama
            showSlide(0);
        });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Script untuk carousel header
        const headerCarousel = document.getElementById('carousel');
        const slides = headerCarousel.getElementsByClassName('carousel-item');
        let currentIndex = 0;

        // Fungsi untuk menampilkan slide
        function showSlide(index) {
            // Sembunyikan semua slide
            for(let i = 0; i < slides.length; i++) {
                slides[i].style.opacity = '0';
                slides[i].style.zIndex = '0';
            }
            // Tampilkan slide yang aktif
            slides[index].style.opacity = '1';
            slides[index].style.zIndex = '1';
        }

        // Event listener untuk tombol previous
        const prevSlide = document.getElementById('prevSlide');
        prevSlide.addEventListener('click', function() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        });

        // Event listener untuk tombol next
        const nextSlide = document.getElementById('nextSlide');
        nextSlide.addEventListener('click', function() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        });

        // Auto slide setiap 5 detik
        setInterval(function() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }, 5000);

        // Tampilkan slide pertama
        showSlide(0);
        });
    </script>
</body>
</html>