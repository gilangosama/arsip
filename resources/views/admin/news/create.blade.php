@extends('layouts.admin')

@section('title', isset($news) ? 'Edit Berita' : 'Tambah Berita Baru')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ isset($news) ? route('admin.news.update', $news['id']) : route('admin.news.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($news))
                    @method('PUT')
                @endif
                <div class="space-y-6">
                    <!-- Judul -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Judul Berita</label>
                        <input type="text" name="title" value="{{ old('title', $news['title'] ?? '') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @if ($errors->has('title'))
                            <p class="text-red-500 text-sm mt-2">{{ $errors->first('title') }}</p>
                        @endif
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select name="category"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="umum"
                                {{ old('category', $news['category'] ?? '') == 'umum' ? 'selected' : '' }}>Umum</option>
                            <option value="daerah"
                                {{ old('category', $news['category'] ?? '') == 'daerah' ? 'selected' : '' }}>Daerah</option>
                            <option value="dinas"
                                {{ old('category', $news['category'] ?? '') == 'dinas' ? 'selected' : '' }}>Dinas</option>
                        </select>
                        @if ($errors->has('category'))
                            <p class="text-red-500 text-sm mt-2">{{ $errors->first('category') }}</p>
                        @endif
                    </div>

                    <!-- Gambar -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Berita</label>
                        <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                            <label for="image" class="cursor-pointer">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                                <p class="text-gray-500">Klik untuk upload atau drag & drop</p>
                                <p class="text-sm text-gray-400">PNG, JPG up to 5MB</p>
                            </label>
                            <input type="file" name="image" class="hidden" id="image" value="{{ old('image') }}">
                        </div>
                        @if ($errors->has('image'))
                            <p class="text-red-500 text-sm mt-2">{{ $errors->first('image') }}</p>
                        @endif
                        @if (isset($news) && isset($news['image']) && Storage::disk('public')->exists($news['image']))
                            <div class="mt-4">
                                <img src="{{ Storage::url($news['image']) }}" alt="Current Image"
                                    class="w-32 h-32 object-cover rounded-lg">
                                <input type="hidden" name="existing_image" value="{{ $news['image'] }}">
                            </div>
                        @endif
                    </div>

                    <!-- Konten -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Konten Berita</label>
                        <textarea name="content" rows="10"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('content', $news['content'] ?? '') }}</textarea>
                        @if ($errors->has('content'))
                            <p class="text-red-500 text-sm mt-2">{{ $errors->first('content') }}</p>
                        @endif
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex space-x-4">
                            <label class="flex items-center">
                                <input type="radio" name="status" value="published" class="mr-2"
                                    {{ old('status', $news['status'] ?? '') == 'published' ? 'checked' : '' }}>
                                <span>Published</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="status" value="draft" class="mr-2"
                                    {{ old('status', $news['status'] ?? '') == 'draft' ? 'checked' : '' }}>
                                <span>Draft</span>
                            </label>
                        </div>
                        @if ($errors->has('status'))
                            <p class="text-red-500 text-sm mt-2">{{ $errors->first('status') }}</p>
                        @endif
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('admin.news.index') }}"
                            class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                            Cancel
                        </a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            {{ isset($news) ? 'Update Berita' : 'Simpan Berita' }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
