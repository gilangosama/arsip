@extends('layouts.admin')

@section('title', 'Manajemen File')

@section('content')
@include('sweetalert::alert')

<div class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50 py-12">
    <div class="container mx-auto px-4 max-w-7xl">
        <!-- Upload Section -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-12 border border-white/20 hover:shadow-2xl transition-shadow duration-300">
            <h2 class="text-4xl font-extrabold mb-8 text-center bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                <i class="fas fa-cloud-upload-alt mr-3"></i>Upload File
            </h2>
            
            <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                <div class="space-y-4">
                    <label class="block text-lg font-semibold text-gray-700 mb-2 flex items-center">
                        <i class="fas fa-file-upload mr-2 text-blue-500"></i>
                        Pilih File
                    </label>
                    <div class="relative group">
                        <input type="file" name="file" 
                               class="w-full p-4 border-2 border-dashed border-gray-300 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 hover:border-blue-400 transition-colors duration-200
                                      file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                               accept=".pdf,.jpg,.jpeg,.png,.gif,.ppt,.pptx">
                    </div>
                    @error('file')
                        <p class="text-red-600 text-sm mt-2 flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>{{ $message }}
                        </p>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-4 rounded-xl hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-[1.02] shadow-lg hover:shadow-xl flex items-center justify-center gap-3">
                    <i class="fas fa-upload text-xl"></i>
                    <span class="text-lg font-bold">Upload Files</span>
                </button>
            </form>
        </div>

        <!-- File List Section -->
        <h2 class="text-4xl font-extrabold mb-8 text-center bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            <i class="fas fa-archive mr-3"></i>File Repository
        </h2>

        @if(count($files) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($files as $key => $file)
                    <div class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-purple-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="relative ">
                            <div class="flex items-center gap-3 mb-4">
                                @switch($file['type'] ?? 'unknown')
                                @case('pdf')
                                    <i class="fas fa-file-pdf text-3xl text-red-500"></i>
                                    @break
                                @case('image')
                                    <i class="fas fa-image text-3xl text-green-500"></i>
                                    @break
                                @case('ppt')
                                    <i class="fas fa-file-powerpoint text-3xl text-orange-500"></i>
                                    @break
                                @default
                                    <i class="fas fa-file text-3xl text-gray-500"></i> {{-- Ikon default --}}
                            @endswitch                              
                                <h3 class="text-xl font-bold text-gray-800 truncate">{{ $file['title'] }}</h3>
                            </div>
                            
                            <div class="space-y-2 text-sm text-gray-600">
                                <p class="flex items-center gap-2">
                                    <i class="fas fa-tag text-gray-400"></i>
                                    <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">{{ $file['category'] }}</span>
                                </p>
                                <p class="flex items-center gap-2">
                                    <i class="fas fa-database text-gray-400"></i>
                                    {{ $file['size'] ?? 'N/A' }}
                                </p>
                            </div>

                            <div class="mt-6 flex justify-between items-center">
                                <a href="{{ Storage::url($file['path']) }}" 
                                   class="bg-blue-100 text-blue-700 px-4 py-2 rounded-lg hover:bg-blue-200 transition-colors duration-200 flex items-center gap-2">
                                    <i class="fas fa-download"></i>
                                    <span>Download</span>
                                </a>
                            </div>
                            <div class="mt-6 flex justify-between items-center">
                                <form action="{{ route('file.destroy', $key) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus file ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12 bg-white rounded-2xl shadow-xl border-2 border-dashed border-gray-200">
                <i class="fas fa-file-alt text-6xl text-gray-300 mb-4"></i>
                <h3 class="text-2xl font-bold text-gray-500 mb-2">No Files Found</h3>
                <p class="text-gray-400">Upload your first file using the form above</p>
            </div>
        @endif
    </div>
</div>

<style>
    .tooltip {
        position: relative;
        display: inline-block;
    }
    
    .tooltip::before {
        content: attr(data-tip);
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0,0,0,0.8);
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: all 0.2s ease;
    }
    
    .tooltip:hover::before {
        opacity: 1;
        visibility: visible;
        bottom: 120%;
    }
</style>

@endsection