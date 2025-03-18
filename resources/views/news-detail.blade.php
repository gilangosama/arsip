<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news['title'] }} - DISPUSIP Maluku</title>
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
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Back Button -->
    <div class="fixed top-6 left-6 z-50">
        <a href="{{ route('news.index') }}" 
           class="flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 group">
            <i class="fas fa-arrow-left text-primary-blue group-hover:-translate-x-1 transition-transform"></i>
            <span class="font-medium text-gray-700">Kembali</span>
        </a>
    </div>

    <!-- Article Header -->
    <div class="w-full h-[60vh] relative">
        <div class="absolute inset-0 bg-black/50 z-10"></div>
        <img src="{{ Storage::url($news['image']) }}" 
             alt="{{ $news['title'] }}" 
             class="w-full h-full object-cover">
        <div class="absolute inset-0 z-20 flex items-center">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto text-center text-white">
                    <span class="inline-block px-4 py-1.5 bg-primary-blue rounded-full text-sm font-medium mb-4">
                        {{ strtoupper($news['category']) }}
                    </span>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $news['title'] }}</h1>
                    <div class="flex items-center justify-center gap-6 text-white/80">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-user"></i>
                            <span>{{ $news['author'] ?? 'Admin' }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-calendar"></i>
                            <span>{{ \Carbon\Carbon::parse($news['created_at'])->format('d F Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Article Content -->
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <!-- Content -->
                <div class="prose prose-lg max-w-none">
                    {!! $news['content'] !!}
                </div>

                <!-- Tags -->
                @if(isset($news['tags']))
                <div class="mt-8 pt-8 border-t">
                    <div class="flex flex-wrap gap-2">
                        @foreach(explode(',', $news['tags']) as $tag)
                        <span class="px-3 py-1 bg-gray-100 rounded-full text-sm text-gray-600">
                            #{{ trim($tag) }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Share Buttons -->
                <div class="mt-8 pt-8 border-t">
                    <h3 class="text-lg font-semibold mb-4">Bagikan Artikel</h3>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-sky-500 rounded-full flex items-center justify-center text-white hover:bg-sky-600">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center text-white hover:bg-green-600">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white hover:bg-blue-600">
                            <i class="fab fa-telegram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 