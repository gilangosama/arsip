@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-semibold">Daftar Berita</h3>
        <a href="{{ route('admin.news.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
            <i class="fas fa-plus mr-2"></i>Tambah Berita
        </a>
    </div>

    <!-- Filters -->
    <div class="flex flex-wrap gap-4 mb-6">
        <div class="flex-1 min-w-[200px]">
            <input type="text" placeholder="Cari berita..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
        </div>
        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="">Semua Kategori</option>
            <option value="umum">Umum</option>
            <option value="daerah">Daerah</option>
            <option value="dinas">Dinas</option>
        </select>
        <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <option value="">Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-4 py-4">
                        <div class="flex items-center">
                            <img src="https://source.unsplash.com/random/800x600/?meeting" alt="" class="w-10 h-10 rounded-lg object-cover mr-3">
                            <div class="text-sm font-medium text-gray-900">Lembaga Kearsipan Daerah Gelar Sosialisasi</div>
                        </div>
                    </td>
                    <td class="px-4 py-4">
                        <span class="px-2 py-1 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full">UMUM</span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-500">FREDERICK REUBEN</td>
                    <td class="px-4 py-4">
                        <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Published</span>
                    </td>
                    <td class="px-4 py-4 text-sm text-gray-500">22 FEB 2025</td>
                    <td class="px-4 py-4 text-sm">
                        <div class="flex space-x-2">
                            <button class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <!-- Tambahkan baris lainnya sesuai kebutuhan -->
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex items-center justify-between">
        <div class="text-sm text-gray-500">
            Showing 1 to 10 of 20 entries
        </div>
        <div class="flex space-x-2">
            <button class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50">Previous</button>
            <button class="px-3 py-1 bg-blue-600 text-white rounded-md">1</button>
            <button class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50">2</button>
            <button class="px-3 py-1 border border-gray-300 rounded-md hover:bg-gray-50">Next</button>
        </div>
    </div>
</div>
@endsection 