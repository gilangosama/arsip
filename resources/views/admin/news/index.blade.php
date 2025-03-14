@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
    @include('sweetalert::alert')
    <div class="bg-white rounded-lg shadow-md p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold">Daftar Berita</h3>
            <a href="{{ route('admin.news.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-plus mr-2"></i>Tambah Berita
            </a>
        </div>

        <!-- Filters -->
        <form method="GET" action="{{ route('admin.news.index') }}" class="flex flex-wrap gap-4 mb-6">
            <div class="flex-1 min-w-[200px]">
                <input type="text" name="search" placeholder="Cari berita..." value="{{ request('search') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <select name="category"
                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Semua Kategori</option>
                <option value="umum" {{ request('category') == 'umum' ? 'selected' : '' }}>Umum</option>
                <option value="daerah" {{ request('category') == 'daerah' ? 'selected' : '' }}>Daerah</option>
                <option value="dinas" {{ request('category') == 'dinas' ? 'selected' : '' }}>Dinas</option>
            </select>
            <select name="status"
                class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <option value="">Status</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            </select>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Filter</button>
        </form>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($news as $id => $item)
                        <tr>
                            <td class="px-4 py-4">
                                <div class="flex items-center">
                                    <img src="{{ Storage::url($item['image']) }}" alt=""
                                        class="w-10 h-10 rounded-lg object-cover mr-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $item['title'] }}</div>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <span
                                    class="px-2 py-1 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full">{{ strtoupper($item['category']) }}</span>
                            </td>
                            <td class="px-4 py-4">
                                <span
                                    class="px-2 py-1 text-xs font-semibold {{ $item['status'] == 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} rounded-full">{{ ucfirst($item['status']) }}</span>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y') }}</td>
                            <td class="px-4 py-4 text-sm">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.news.show', $id) }}"
                                        class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.news.edit', $id) }}"
                                        class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Showing {{ ($page - 1) * $perPage + 1 }} to {{ min($page * $perPage, $total) }} of {{ $total }}
                entries
            </div>
            <div class="flex space-x-2">
                @for ($i = 1; $i <= ceil($total / $perPage); $i++)
                    <a href="{{ route('admin.news.index', array_merge(request()->query(), ['page' => $i])) }}"
                        class="px-3 py-1 {{ $i == $page ? 'bg-blue-600 text-white' : 'border border-gray-300' }} rounded-md hover:bg-gray-50">{{ $i }}</a>
                @endfor
            </div>
        </div>
    </div>
@endsection
