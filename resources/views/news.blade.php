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

        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Back Button -->
    <div class="fixed top-6 left-6 z-50">
        <a href="/"
            class="flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 group">
            <i class="fas fa-arrow-left text-primary-blue group-hover:-translate-x-1 transition-transform"></i>
            <span class="font-medium text-gray-700">Kembali</span>
        </a>
    </div>

    <!-- Header Section -->
    <div class="bg-gradient-to-r from-primary-blue to-blue-800 text-white py-16 relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div
            class="absolute inset-0 bg-[url('https://source.unsplash.com/random/1920x1080/?library')] bg-cover bg-center opacity-10">
        </div>
        <div class="container mx-auto px-4 relative">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-5xl font-bold mb-4">Berita Terkini</h1>
                <p class="text-xl text-white/90">Informasi terbaru seputar Dinas Perpustakaan dan Kearsipan Provinsi
                    Maluku</p>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white shadow-lg rounded-2xl -mt-8 relative z-10 mx-4 md:mx-auto max-w-4xl">
        <div class="p-6">
            <form method="GET" action="{{ route('news.filter') }}"
                class="flex flex-wrap items-center justify-between gap-4">
                <!-- Search Bar -->
                <div class="flex-1 min-w-[300px]">
                    <div class="relative">
                        <input type="text" name="search" placeholder="Cari berita..."
                            value="{{ request('search') }}"
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary-blue/20 focus:border-primary-blue pl-12">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
                <!-- Filters -->
                <div class="flex gap-4">
                    <select name="category"
                        class="px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary-blue/20 focus:border-primary-blue cursor-pointer">
                        <option value="">Semua Kategori</option>
                        <option value="umum" {{ request('category') == 'umum' ? 'selected' : '' }}>Umum</option>
                        <option value="daerah" {{ request('category') == 'daerah' ? 'selected' : '' }}>Daerah</option>
                        <option value="dinas" {{ request('category') == 'dinas' ? 'selected' : '' }}>Dinas</option>
                    </select>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- News Grid Section -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($news as $id => $item)
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                        <div class="relative">
                            <img src="{{ Storage::url($item['image']) }}" alt="Berita"
                                class="w-full h-48 object-cover">
                            <div
                                class="absolute top-4 left-4 bg-primary-blue text-white text-xs px-4 py-1.5 rounded-full font-medium tracking-wider">
                                {{ strtoupper($item['category']) }}</div>
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-3 line-clamp-2">
                                <a href="#"
                                    class="hover:text-primary-blue transition-colors">{{ $item['title'] }}</a>
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3">{{ $item['content'] }}</p>
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <div class="flex items-center">
                                    <i class="far fa-user mr-2"></i>
                                    <span>{{ $item['author'] ?? 'Unknown' }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="far fa-calendar mr-2"></i>
                                    <span>{{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y') }}</span>
                                </div>
                            </div>
                            <a href="#" class="mt-4 inline-flex items-center text-primary-blue hover:underline">
                                Baca selengkapnya
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <nav class="inline-flex rounded-xl shadow-lg bg-white p-2">
                    @if (isset($perPage) && $perPage > 0)
                        @for ($i = 1; $i <= ceil($total / $perPage); $i++)
                            <a href="{{ route('news.index', array_merge(request()->query(), ['page' => $i])) }}"
                                class="px-4 py-2 {{ $i == $page ? 'bg-primary-blue text-white' : 'hover:bg-gray-50 text-gray-500' }} rounded-lg">{{ $i }}</a>
                        @endfor
                    @endif
                </nav>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-b from-gray-900 to-primary-blue text-white py-12">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <p class="text-white/60">&copy; 2024 Dinas Perpustakaan dan Kearsipan Provinsi Maluku. Hak Cipta
                    Dilindungi.</p>
            </div>
        </div>
    </footer>
</body>

</html>
