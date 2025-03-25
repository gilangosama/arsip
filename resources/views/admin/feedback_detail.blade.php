<!-- filepath: c:\xampp\htdocs\arsip\resources\views\admin\feedback.detail.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto mt-10">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Feedback Detail</h1>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-gradient-to-r from-gray-500 to-gray-700 text-white p-6">
                <h2 class="text-2xl font-semibold">{{ $feedback['subject'] }}</h2>
            </div>
            <div class="p-6">
                <p class="mb-4"><strong class="text-gray-700">Name:</strong> <span
                        class="text-gray-900">{{ $feedback['name'] }}</span></p>
                <p class="mb-4"><strong class="text-gray-700">Email:</strong> <span
                        class="text-gray-900">{{ $feedback['email'] }}</span></p>
                <p class="mb-4"><strong class="text-gray-700">Message:</strong> <span
                        class="text-gray-900">{{ $feedback['message'] }}</span></p>
                <p class="mb-4"><strong class="text-gray-700">Status:</strong> <span
                        class="inline-block bg-gray-200 text-gray-800 text-sm px-3 py-1 rounded-full">{{ ucfirst($feedback['status']) }}</span>
                </p>
                <p class="mb-4"><strong class="text-gray-700">Submitted At:</strong> <span
                        class="text-gray-900">{{ $feedback['created_at'] }}</span></p>
            </div>
            <div class="bg-gray-100 p-6 text-right">
                <a href="{{ route('admin.feedback') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full transition duration-300">Back
                    to Feedback List</a>
            </div>
        </div>
    </div>
@endsection
