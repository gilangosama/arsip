<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - DISPUSIP Maluku</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Back Button -->
    <div class="fixed top-6 left-6 z-50">
        <a href="/" class="flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 group">
            <i class="fas fa-arrow-left text-primary-blue group-hover:-translate-x-1 transition-transform"></i>
            <span class="font-medium text-gray-700">Kembali</span>
        </a>
    </div>

    <!-- Header Section -->
    <div class="bg-gradient-to-r from-primary-blue to-blue-800 text-white py-16 relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="absolute inset-0 bg-[url('https://source.unsplash.com/random/1920x1080/?library')] bg-cover bg-center opacity-10"></div>
        <div class="container mx-auto px-4 relative">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl font-bold mb-4">Berita Terkini</h1>
                <p class="text-xl text-white/90">Informasi terbaru seputar Dinas Perpustakaan dan Kearsipan Provinsi Maluku</p>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white shadow-lg rounded-2xl -mt-8 relative z-10 mx-4 md:mx-auto max-w-4xl">
        <div class="p-6">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <!-- Search Bar -->
                <div class="flex-1 min-w-[300px]">
                    <div class="relative">
                        <input type="text" placeholder="Cari berita..." 
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary-blue/20 focus:border-primary-blue pl-12">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
                <!-- Filters -->
                <div class="flex gap-4">
                    <select class="px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary-blue/20 focus:border-primary-blue cursor-pointer">
                        <option value="">Semua Kategori</option>
                        <option value="umum">Umum</option>
                        <option value="daerah">Daerah</option>
                        <option value="dinas">Dinas</option>
                    </select>
                    <select class="px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary-blue/20 focus:border-primary-blue cursor-pointer">
                        <option value="">Urutkan</option>
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- News Grid Section -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- News Card 1 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://source.unsplash.com/random/800x600/?meeting" alt="Berita 1" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4 bg-primary-blue text-white text-xs px-4 py-1.5 rounded-full font-medium tracking-wider">UMUM</div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-3 line-clamp-2">
                            <a href="#" class="hover:text-primary-blue transition-colors">Lembaga Kearsipan Daerah Gelar Sosialisasi Akuisisi Arsip</a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">Bidang Pengelolaan, Layanan dan Pemanfaatan Arsip-Dinas perpustakaan dan Kearsipan Provinsi Maluku melaksanakan Sosialisasi Akuisisi Arsip Statis...</p>
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center">
                                <i class="far fa-user mr-2"></i>
                                <span>FREDERICK REUBEN</span>
                            </div>
                            <div class="flex items-center">
                                <i class="far fa-calendar mr-2"></i>
                                <span>22 FEB 2025</span>
                            </div>
                        </div>
                        <a href="#" class="mt-4 inline-flex items-center text-primary-blue hover:underline">
                            Baca selengkapnya
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- News Card 2 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="relative">
                        <img src="https://source.unsplash.com/random/800x600/?library" alt="Berita 2" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4 bg-primary-blue text-white text-xs px-4 py-1.5 rounded-full font-medium tracking-wider">DAERAH</div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-3 line-clamp-2">
                            <a href="#" class="hover:text-primary-blue transition-colors">Kegiatan Alih Media Tahap Dua di Negeri Passo</a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">Dinas Perpustakaan dan Kearsipan Provinsi Maluku melakukan kegiatan alih media tahap dua di Negeri Passo. Dokumen yang berhasil dialihmedikan...</p>
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center">
                                <i class="far fa-user mr-2"></i>
                                <span>WBWRJ</span>
                            </div>
                            <div class="flex items-center">
                                <i class="far fa-calendar mr-2"></i>
                                <span>21 JUN 2024</span>
                            </div>
                        </div>
                        <a href="#" class="mt-4 inline-flex items-center text-primary-blue hover:underline">
                            Baca selengkapnya
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>

                <!-- Tambahkan card berita lainnya di sini -->
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <nav class="inline-flex rounded-xl shadow-lg bg-white p-2">
                    <a href="#" class="px-4 py-2 rounded-lg hover:bg-gray-50 text-gray-500 flex items-center gap-2">
                        <i class="fas fa-chevron-left text-sm"></i>
                        <span>Previous</span>
                    </a>
                    <a href="#" class="px-4 py-2 bg-primary-blue text-white rounded-lg">1</a>
                    <a href="#" class="px-4 py-2 hover:bg-gray-50 text-gray-500 rounded-lg">2</a>
                    <a href="#" class="px-4 py-2 hover:bg-gray-50 text-gray-500 rounded-lg">3</a>
                    <span class="px-4 py-2 text-gray-500">...</span>
                    <a href="#" class="px-4 py-2 hover:bg-gray-50 text-gray-500 rounded-lg">10</a>
                    <a href="#" class="px-4 py-2 rounded-lg hover:bg-gray-50 text-gray-500 flex items-center gap-2">
                        <span>Next</span>
                        <i class="fas fa-chevron-right text-sm"></i>
                    </a>
                </nav>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    {{-- <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">Berlangganan Newsletter</h2>
                <p class="text-gray-600 mb-8">Dapatkan informasi terbaru langsung di email Anda</p>
                <form class="flex gap-4">
                    <input type="email" placeholder="Masukkan email Anda" class="flex-1 px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                    <button type="submit" class="px-6 py-3 bg-primary-blue text-white rounded-lg hover:bg-blue-700 transition-colors">
                        Berlangganan
                    </button>
                </form>
            </div>
        </div>
    </div> --}}

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-gray-900 to-primary-blue text-white py-12">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <p class="text-white/60">&copy; 2024 Dinas Perpustakaan dan Kearsipan Provinsi Maluku. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html> 