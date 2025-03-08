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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-primary-blue to-blue-800 text-white py-2">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl font-bold mb-4 text-black">Berita Terkini</h1>
                <p class="text-lg text-black/80">Informasi terbaru seputar Dinas Perpustakaan dan Kearsipan Provinsi Maluku</p>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-6">
            <div class="max-w-4xl mx-auto flex flex-wrap items-center justify-between gap-4">
                <!-- Search Bar -->
                <div class="flex-1 min-w-[300px]">
                    <div class="relative">
                        <input type="text" placeholder="Cari berita..." class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                        <button class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-primary-blue">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <!-- Filters -->
                <div class="flex gap-4">
                    <select class="px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary-blue focus:border-transparent">
                        <option value="">Semua Kategori</option>
                        <option value="umum">Umum</option>
                        <option value="daerah">Daerah</option>
                        <option value="dinas">Dinas</option>
                    </select>
                    <select class="px-4 py-2 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary-blue focus:border-transparent">
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
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <div class="relative">
                        <img src="https://source.unsplash.com/random/800x600/?meeting" alt="Berita 1" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs px-3 py-1 rounded-full">UMUM</div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-3">
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
                    </div>
                </div>

                <!-- News Card 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
                    <div class="relative">
                        <img src="https://source.unsplash.com/random/800x600/?library" alt="Berita 2" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs px-3 py-1 rounded-full">DAERAH</div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-3">
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
                    </div>
                </div>

                <!-- Tambahkan card berita lainnya di sini -->
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <nav class="flex items-center space-x-2">
                    <a href="#" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 text-gray-500">Previous</a>
                    <a href="#" class="px-4 py-2 bg-primary-blue text-white rounded-lg">1</a>
                    <a href="#" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 text-gray-500">2</a>
                    <a href="#" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 text-gray-500">3</a>
                    <span class="px-4 py-2 text-gray-500">...</span>
                    <a href="#" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 text-gray-500">10</a>
                    <a href="#" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 text-gray-500">Next</a>
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
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <!-- Footer content -->
        </div>
    </footer>
</body>
</html> 