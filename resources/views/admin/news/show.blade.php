@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-lg font-semibold">Detail Berita</h3>
        <div class="flex gap-2">
            <a href="{{ route('admin.news.edit', $news['id']) }}" 
               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('admin.news.index') }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <!-- Content -->
    <div class="space-y-6">
        <!-- Image -->
        <div class="relative h-[300px] rounded-xl overflow-hidden">
            @if(isset($news['image']) && Storage::disk('public')->exists($news['image']))
                <img src="{{ Storage::url($news['image']) }}" 
                     alt="{{ $news['title'] }}" 
                     class="w-full h-full object-cover">
            @else
                <img src="{{ asset('img/default-news.jpg') }}" 
                     alt="Default Image" 
                     class="w-full h-full object-cover">
            @endif
            <div class="absolute top-4 left-4 bg-primary-blue text-white px-3 py-1 rounded-full text-sm">
                {{ strtoupper($news['category']) }}
            </div>
        </div>

        <!-- Title -->
        <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $news['title'] }}</h2>
            <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                <div class="flex items-center">
                    <i class="far fa-user mr-2"></i>
                    <span>{{ $news['author'] ?? 'Admin' }}</span>
                </div>
                <div class="flex items-center">
                    <i class="far fa-calendar mr-2"></i>
                    <span>{{ \Carbon\Carbon::parse($news['created_at'])->format('d F Y') }}</span>
                </div>
                <div class="flex items-center">
                    <i class="far fa-clock mr-2"></i>
                    <span>{{ \Carbon\Carbon::parse($news['created_at'])->format('H:i') }}</span>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="prose max-w-none">
            {!! $news['content'] !!}
        </div>

        <!-- Meta Information -->
        <div class="grid grid-cols-2 gap-4 p-4 bg-gray-50 rounded-lg mt-6">
            <div>
                <p class="text-sm text-gray-600">Status</p>
                <p class="font-medium">{{ $news['status'] }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Kategori</p>
                <p class="font-medium">{{ $news['category'] }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Dibuat pada</p>
                <p class="font-medium">{{ \Carbon\Carbon::parse($news['created_at'])->format('d F Y H:i') }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Terakhir diupdate</p>
                <p class="font-medium">{{ \Carbon\Carbon::parse($news['updated_at'])->format('d F Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection 