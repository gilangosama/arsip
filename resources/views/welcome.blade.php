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
    </style>
</head>
<body class="relative">
    <!-- Carousel/Header Section (positioned behind navbar) -->
    <div class="absolute inset-0 z-0">
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
            <button class="absolute left-4 top-1/2 -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-50 text-white p-3 rounded-full z-30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button class="absolute right-4 top-1/2 -translate-y-1/2 bg-black bg-opacity-30 hover:bg-opacity-50 text-white p-3 rounded-full z-30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>

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
                        <h1 class="text-2xl font-bold text-gray-800">DISPUSIP</h1>
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
                                    <a href="#" class="block px-6 py-2 text-sm text-gray-600 hover:text-primary-blue hover:bg-gray-50">Berita</a>
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
    <div class="container mx-auto px-4 relative z-10 bg-white">
        <div class="max-w-6xl mx-auto mt-16 mb-12 px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">BERITA TERKINI</h2>
                <div class="w-24 h-1 bg-primary-blue mx-auto rounded-full"></div>
            </div>
            
            <div class="relative">
                <!-- Carousel Navigation Buttons -->
                <button class="absolute left-0 top-1/2 -translate-y-1/2 bg-white rounded-full p-4 shadow-lg z-10 -ml-6 hover:bg-primary-blue hover:text-white transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Berita 1 -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="relative">
                            <div class="absolute top-4 left-4 bg-primary-blue text-white text-xs px-3 py-1 rounded-full font-medium tracking-wider">UMUM</div>
                            <img src="{{asset('img/berita1.jpg')}}" alt="Berita 1" class="w-full h-56 object-cover" onerror="this.src='https://source.unsplash.com/random/800x600/?meeting'">
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent h-20"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-3 line-clamp-2 hover:text-primary-blue transition-colors">
                                <a href="#">Lembaga Kearsipan Daerah Gelar Sosialisasi Akuisisi Arsip Statis dan Autentikasi Arsip Terjaga</a>
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">Bidang Pengelolaan, Layanan dan Pemanfaatan Arsip-Dinas perpustakaan dan Kearsipan Provinsi Maluku melaksanakan Sosialisasi Akuisisi Arsip Statis dan Autentikasi Arsip Terjaga kepada 11 OPD Lingkup Pemerintah Provinsi Maluku.</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="far fa-user mr-2"></i>
                                    <span>FREDERICK REUBEN</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="far fa-calendar mr-2"></i>
                                    <span>FEBRUARY 22, 2025</span>
                                </div>
                            </div>
                        </div>
        </div>

                    <!-- Berita 2 -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="relative">
                            <div class="absolute top-4 left-4 bg-primary-blue text-white text-xs px-3 py-1 rounded-full font-medium tracking-wider">DAERAHDINASUMUM</div>
                            <img src="{{asset('img/berita2.jpg')}}" alt="Berita 2" class="w-full h-56 object-cover" onerror="this.src='https://source.unsplash.com/random/800x600/?archive'">
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent h-20"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-3 line-clamp-2 hover:text-primary-blue transition-colors">
                                <a href="#">Dinas Perpustakaan dan Kearsipan Provinsi Maluku melakukan kegiatan alih media tahap dua di Negeri Passo</a>
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">Hari Jumat, 21 Juni 2024 - Dinas Perpustakaan dan Kearsipan Provinsi Maluku melakukan kegiatan alih media tahap dua di Negeri Passo. Dokumen yang berhasil dialihmedikan yakni Koleksi Pribadi Peninggalan Zaman</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="far fa-user mr-2"></i>
                                    <span>WBWRJ</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="far fa-calendar mr-2"></i>
                                    <span>JUNE 22, 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Berita 3 -->
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="relative">
                            <div class="absolute top-4 left-4 bg-primary-blue text-white text-xs px-3 py-1 rounded-full font-medium tracking-wider">DAERAHDINAS</div>
                            <img src="{{asset('img/berita3.jpg')}}" alt="Berita 3" class="w-full h-56 object-cover" onerror="this.src='https://source.unsplash.com/random/800x600/?government'">
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent h-20"></div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-3 line-clamp-2 hover:text-primary-blue transition-colors">
                                <a href="#">Pengawasan Kearsipan Internal di Lingkup Pemerintah Provinsi Maluku</a>
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">Hai #SahabatArsip, mimin mau kenalin Tim yang bertugas melaksanakan Pengawasan Kearsipan Internal di Lingkup Pemerintah Provinsi Maluku. Tim ini akan melaksanakan tugas dari tanggal 4 - 28 Juni 2024</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="far fa-user mr-2"></i>
                                    <span>WBWRJ</span>
                                </div>
                                <div class="flex items-center text-sm text-gray-500">
                                    <i class="far fa-calendar mr-2"></i>
                                    <span>JUNE 5, 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Next Button -->
                <button class="absolute right-0 top-1/2 -translate-y-1/2 bg-white rounded-full p-4 shadow-lg z-10 -mr-6 hover:bg-primary-blue hover:text-white transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>

            <!-- Tombol Baca Berita Lainnya -->
            <div class="text-center mt-12">
                <a href="{{ route('news.index') }}" class="inline-flex items-center px-8 py-3 bg-primary-blue text-white font-semibold rounded-full hover:bg-blue-700 transition-colors duration-300 transform hover:scale-105">
                    <span>Baca Berita Lainnya</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <script>
        // Simple carousel functionality
        document.addEventListener('DOMContentLoaded', function() {
            const items = document.querySelectorAll('.carousel-item');
            const nextBtn = document.querySelector('button:last-of-type');
            const prevBtn = document.querySelector('button:first-of-type');
            let currentIndex = 0;
            
            function showSlide(index) {
                items.forEach(item => {
                    item.classList.remove('opacity-100');
                    item.classList.add('opacity-0');
                });
                items[index].classList.remove('opacity-0');
                items[index].classList.add('opacity-100');
            }
            
            function nextSlide() {
                currentIndex = (currentIndex + 1) % items.length;
                showSlide(currentIndex);
            }
            
            function prevSlide() {
                currentIndex = (currentIndex - 1 + items.length) % items.length;
                showSlide(currentIndex);
            }
            
            // Auto slide every 5 seconds
            const interval = setInterval(nextSlide, 5000);
            
            // Event listeners for buttons
            nextBtn.addEventListener('click', function() {
                clearInterval(interval);
                nextSlide();
            });
            
            prevBtn.addEventListener('click', function() {
                clearInterval(interval);
                prevSlide();
            });
        });
    </script>

    <!-- Form Kritik dan Saran Section -->
    <div class="bg-gradient-to-b from-gray-50 to-gray-100 py-20">
        <div class="max-w-5xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Kritik dan Saran</h2>
                <p class="text-gray-600 text-lg">Kami sangat menghargai setiap masukan dari Anda untuk meningkatkan layanan kami</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-[1.02] transition-transform duration-300">
                <div class="md:flex">
                    <!-- Bagian Kiri - Informasi Kontak -->
                    <div class="bg-gradient-to-br from-primary-blue to-blue-800 text-white p-10 md:w-2/5 relative overflow-hidden">
                        <div class="relative z-10">
                            <h3 class="text-3xl font-bold mb-8">Hubungi Kami</h3>
                            
                            <div class="space-y-8">
                                <div class="flex items-start space-x-4">
                                    <div class="bg-white/10 p-3 rounded-full">
                                        <i class="fas fa-map-marker-alt text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-lg mb-1">Alamat</h4>
                                        <p class="text-white/80">Jl. Sultan Babullah No.1, Kota Ambon, Maluku 97128</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-4">
                                    <div class="bg-white/10 p-3 rounded-full">
                                        <i class="fas fa-envelope text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-lg mb-1">Email</h4>
                                        <p class="text-white/80">dispusip@malukuprov.go.id</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-4">
                                    <div class="bg-white/10 p-3 rounded-full">
                                        <i class="fas fa-phone text-xl"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-lg mb-1">Telepon</h4>
                                        <p class="text-white/80">+62 911 123456</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-12">
                                <h4 class="font-semibold text-lg mb-4">Ikuti Kami</h4>
                                <div class="flex space-x-4">
                                    <a href="#" class="bg-white/10 p-3 rounded-full hover:bg-white/20 transition-colors">
                                        <i class="fab fa-facebook-f text-xl"></i>
                                    </a>
                                    <a href="#" class="bg-white/10 p-3 rounded-full hover:bg-white/20 transition-colors">
                                        <i class="fab fa-instagram text-xl"></i>
                                    </a>
                                    <a href="#" class="bg-white/10 p-3 rounded-full hover:bg-white/20 transition-colors">
                                        <i class="fab fa-youtube text-xl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Background Pattern -->
                        <div class="absolute inset-0 opacity-10">
                            <div class="absolute -right-20 -bottom-20 w-64 h-64 rounded-full border-8 border-white/20"></div>
                            <div class="absolute -left-20 -top-20 w-64 h-64 rounded-full border-8 border-white/20"></div>
                        </div>
                    </div>
                    
                    <!-- Bagian Kanan - Form -->
                    <div class="p-10 md:w-3/5 bg-white">
                        <form id="kritikSaranForm" action="{{ route('kritik') }}" method="POST" class="space-y-6">
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
                            
                            <div class="form-group">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                                <input type="text" name="subject" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary-blue focus:border-transparent transition-all" placeholder="Masukkan subjek">
                            </div>
                            
                            <div class="form-group">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                                <textarea name="message" rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary-blue focus:border-transparent transition-all resize-none" placeholder="Tulis pesan Anda di sini..."></textarea>
                            </div>
                            
                            <button type="submit" class="w-full bg-primary-blue hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-300 transform hover:scale-[1.02]">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
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
</body>
</html>