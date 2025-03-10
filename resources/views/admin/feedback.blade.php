@extends('layouts.admin')

@section('title', 'Manajemen Kritik & Saran')

@section('content')
<div class="bg-white rounded-xl shadow-lg p-6">
    <!-- Header -->
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Kritik & Saran</h1>

    <!-- Search & Filter -->
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div class="relative flex-1">
            <input type="text" 
                   placeholder="Cari..." 
                   class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
        </div>
        <div class="flex gap-4">
            <select class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Status</option>
                <option value="unread">Belum Dibaca</option>
                <option value="read">Sudah Dibaca</option>
                <option value="archived">Diarsipkan</option>
            </select>
            <select class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Urutkan</option>
                <option value="newest">Terbaru</option>
                <option value="oldest">Terlama</option>
            </select>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr>
                    <th class="text-left py-3 text-sm font-medium text-gray-500">NAMA</th>
                    <th class="text-left py-3 text-sm font-medium text-gray-500">EMAIL</th>
                    <th class="text-left py-3 text-sm font-medium text-gray-500">SUBJEK</th>
                    <th class="text-left py-3 text-sm font-medium text-gray-500">PESAN</th>
                    <th class="text-left py-3 text-sm font-medium text-gray-500">STATUS</th>
                    <th class="text-left py-3 text-sm font-medium text-gray-500">TANGGAL</th>
                    <th class="text-left py-3 text-sm font-medium text-gray-500">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b border-gray-100">
                    <td class="py-3">John Doe</td>
                    <td class="py-3 text-gray-600">john@example.com</td>
                    <td class="py-3">Saran Pelayanan</td>
                    <td class="py-3 text-gray-600">
                        <div class="truncate max-w-xs">
                            Mohon untuk meningkatkan pelayanan per...
                        </div>
                    </td>
                    <td class="py-3">
                        <span class="px-2 py-1 text-xs bg-yellow-100 text-yellow-800 rounded-full">
                            Belum Dibaca
                        </span>
                    </td>
                    <td class="py-3 text-gray-600">10 Mar 2024</td>
                    <td class="py-3">
                        <div class="flex gap-2">
                            <button onclick="showModal()" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-green-600 hover:text-green-800">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="text-gray-600 hover:text-gray-800">
                                <i class="fas fa-archive"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex items-center justify-between">
        <p class="text-sm text-gray-600">
            Menampilkan 1 sampai 10 dari 50 data
        </p>
        <div class="flex items-center gap-1">
            <button disabled class="px-2 py-1 text-gray-400">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="px-3 py-1 bg-blue-600 text-white rounded">1</button>
            <button class="px-3 py-1 text-gray-600 hover:bg-gray-100 rounded">2</button>
            <button class="px-3 py-1 text-gray-600 hover:bg-gray-100 rounded">3</button>
            <span class="px-2 text-gray-400">...</span>
            <button class="px-3 py-1 text-gray-600 hover:bg-gray-100 rounded">10</button>
            <button class="px-2 py-1 text-gray-600 hover:bg-gray-100">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg w-full max-w-md">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Detail Kritik & Saran</h3>
                    <button onclick="hideModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nama</label>
                        <p class="mt-1">John Doe</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p class="mt-1">john@example.com</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Subjek</label>
                        <p class="mt-1">Saran Pelayanan</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pesan</label>
                        <p class="mt-1">Mohon untuk meningkatkan pelayanan perpustakaan digital agar lebih mudah diakses oleh masyarakat...</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                        <p class="mt-1">10 Maret 2024</p>
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-2">
                    <button onclick="hideModal()" class="px-4 py-2 text-gray-600 bg-gray-100 rounded hover:bg-gray-200">
                        Tutup
                    </button>
                    <button class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                        Tandai Sudah Dibaca
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showModal() {
        document.getElementById('detailModal').classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function hideModal() {
        document.getElementById('detailModal').classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>
@endsection 