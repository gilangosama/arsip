@extends('layouts.admin')

@section('title', 'Manajemen Kritik & Saran')

@section('content')

@include('sweetalert::alert')
    <div class="bg-white rounded-xl shadow-lg p-6">
        <!-- Header -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Kritik & Saran</h1>

        <!-- Search & Filter -->
        <form method="GET" action="{{ route('admin.feedback') }}"
            class="flex flex-wrap items-center justify-between gap-4 mb-6">
            <div class="relative flex-1">
                <input type="text" name="search" placeholder="Cari..." value="{{ request('search') }}"
                    class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
            </div>
            <div class="flex gap-4">
                <select name="status"
                    class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Status</option>
                    <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Belum Dibaca</option>
                    <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Sudah Dibaca</option>
                    <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Diarsipkan</option>
                </select>
                <select name="sort"
                    class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">Urutkan</option>
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Filter</button>
            </div>
        </form>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subjek
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pesan
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($feedbacks as $id => $feedback)
                        <tr>
                            <td class="px-4 py-4">{{ $feedback['name'] }}</td>
                            <td class="px-4 py-4 text-gray-600">{{ $feedback['email'] }}</td>
                            <td class="px-4 py-4">{{ $feedback['subject'] }}</td>
                            <td class="px-4 py-4 text-gray-600">
                                <div class="truncate max-w-xs">
                                    {{ $feedback['message'] }}
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <span
                                    class="px-2 py-1 text-xs {{ $feedback['status'] == 'unread' ? 'bg-yellow-100 text-yellow-800' : ($feedback['status'] == 'read' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') }} rounded-full">
                                    {{ ucfirst($feedback['status']) }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-gray-600">
                                {{ \Carbon\Carbon::parse($feedback['created_at'])->format('d M Y') }}</td>
                            <td class="px-4 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.feedback.show', $id) }}"
                                        class="text-blue-600 hover:text-blue-800">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.feedback.mark-read', $id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-green-600 hover:text-green-800">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.feedback.archive', $id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="text-gray-600 hover:text-gray-800">
                                            <i class="fas fa-archive"></i>
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
                    <a href="{{ route('admin.feedback', array_merge(request()->query(), ['page' => $i])) }}"
                        class="px-3 py-1 {{ $i == $page ? 'bg-blue-600 text-white' : 'border border-gray-300' }} rounded-md hover:bg-gray-50">{{ $i }}</a>
                @endfor
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
                            <p class="mt-1" id="modal-name">John Doe</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <p class="mt-1" id="modal-email">john@example.com</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Subjek</label>
                            <p class="mt-1" id="modal-subject">Saran Pelayanan</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pesan</label>
                            <p class="mt-1" id="modal-message">Mohon untuk meningkatkan pelayanan perpustakaan digital
                                agar lebih mudah diakses oleh masyarakat...</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                            <p class="mt-1" id="modal-date">10 Maret 2024</p>
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
        function showModal(name, email, subject, message, date) {
            document.getElementById('modal-name').innerText = name;
            document.getElementById('modal-email').innerText = email;
            document.getElementById('modal-subject').innerText = subject;
            document.getElementById('modal-message').innerText = message;
            document.getElementById('modal-date').innerText = date;
            document.getElementById('detailModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function hideModal() {
            document.getElementById('detailModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
    </script>
@endsection
