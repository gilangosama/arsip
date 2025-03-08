@extends('layouts.admin')

@section('title', 'Tambah Berita Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-6">
                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Berita</label>
                    <input type="text" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="umum">Umum</option>
                        <option value="daerah">Daerah</option>
                        <option value="dinas">Dinas</option>
                    </select>
                </div>

                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Berita</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                        <input type="file" name="image" class="hidden" id="image-input">
                        <label for="image-input" class="cursor-pointer">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                            <p class="text-gray-500">Klik untuk upload atau drag & drop</p>
                            <p class="text-sm text-gray-400">PNG, JPG up to 5MB</p>
                        </label>
                    </div>
                </div>

                <!-- Konten -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Konten Berita</label>
                    <textarea name="content" rows="10" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <div class="flex space-x-4">
                        <label class="flex items-center">
                            <input type="radio" name="status" value="published" class="mr-2">
                            <span>Published</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="status" value="draft" class="mr-2">
                            <span>Draft</span>
                        </label>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-4">
                    <button type="button" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Simpan Berita
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 