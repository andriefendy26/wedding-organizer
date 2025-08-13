<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berikan Testimoni Anda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .star {
            transition: all 0.2s ease-in-out;
            cursor: pointer;
        }
        .star:hover {
            transform: scale(1.1);
        }
        .star.active {
            color: #fbbf24;
        }
        .star.inactive {
            color: #d1d5db;
        }
    </style>
</head>
<body class="min-h-screen py-8 bg-gradient-to-br from-blue-50 to-indigo-100">
    <div class="container max-w-2xl px-4 mx-auto">
        <!-- Header -->
        <div class="mb-8 text-center">
            <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-white rounded-full shadow-lg">
                <i class="text-3xl text-yellow-500 fas fa-star"></i>
            </div>
            <h1 class="mb-2 text-4xl font-bold text-gray-800">Berikan Testimoni Anda</h1>
            <p class="text-gray-600">Bagikan pengalaman Anda dengan layanan kami</p>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
        <div class="flex items-center px-6 py-4 mb-6 text-green-700 bg-green-100 border border-green-400 rounded-lg">
            <i class="mr-3 fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
        @endif

        @if($errors->any())
        <div class="px-6 py-4 mb-6 text-red-700 bg-red-100 border border-red-400 rounded-lg">
            <div class="flex items-center mb-2">
                <i class="mr-2 fas fa-exclamation-triangle"></i>
                <span class="font-medium">Terdapat kesalahan:</span>
            </div>
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Form Card -->
        <div class="p-8 bg-white shadow-xl rounded-2xl">
            <form action="{{ route('testimoni.store') }}" method="POST" enctype="multipart/form-data" id="testimoniForm">
                @csrf
                
                <!-- Nama -->
                <div class="mb-6">
                    <label for="nama" class="block mb-2 text-sm font-semibold text-gray-700">
                        <i class="mr-2 text-blue-500 fas fa-user"></i>Nama Lengkap *
                    </label>
                    <input type="text" 
                           id="nama" 
                           name="nama" 
                           value="{{ old('nama') }}"
                           class="w-full px-4 py-3 transition duration-200 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           placeholder="Masukkan nama lengkap Anda"
                           required>
                </div>

                <!-- Rating -->
                <div class="mb-6">
                    <label class="block mb-3 text-sm font-semibold text-gray-700">
                        <i class="mr-2 text-yellow-500 fas fa-star"></i>Rating *
                    </label>
                    <div class="flex items-center mb-2 space-x-2">
                        <div class="flex space-x-1" id="starRating">
                            <i class="text-3xl fas fa-star star inactive" data-rating="1"></i>
                            <i class="text-3xl fas fa-star star inactive" data-rating="2"></i>
                            <i class="text-3xl fas fa-star star inactive" data-rating="3"></i>
                            <i class="text-3xl fas fa-star star inactive" data-rating="4"></i>
                            <i class="text-3xl fas fa-star star inactive" data-rating="5"></i>
                        </div>
                        <span id="ratingText" class="ml-4 text-lg font-medium text-gray-600">Pilih rating</span>
                    </div>
                    <input type="hidden" id="rating" name="rating" value="{{ old('rating') }}" required>
                    <p class="text-sm text-gray-500">Klik bintang untuk memberikan rating</p>
                </div>

                <!-- Foto Profil -->
                <div class="mb-6">
                    <label for="foto" class="block mb-2 text-sm font-semibold text-gray-700">
                        <i class="mr-2 text-green-500 fas fa-camera"></i>Foto Profil (Opsional)
                    </label>
                    <div class="relative">
                        <input type="file" 
                               id="foto" 
                               name="foto" 
                               accept="image/*"
                               class="w-full px-4 py-3 transition duration-200 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <div class="mt-2">
                            <img id="imagePreview" class="hidden object-cover w-24 h-24 border-4 border-blue-200 rounded-full">
                        </div>
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                </div>

                <!-- Deskripsi Testimoni -->
                <div class="mb-8">
                    <label for="deskripsi" class="block mb-2 text-sm font-semibold text-gray-700">
                        <i class="mr-2 text-purple-500 fas fa-comment"></i>Testimoni Anda *
                    </label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              rows="5" 
                              maxlength="500"
                              class="w-full px-4 py-3 transition duration-200 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                              placeholder="Ceritakan pengalaman Anda dengan layanan kami..."
                              required>{{ old('deskripsi') }}</textarea>
                    <div class="flex items-center justify-between mt-2">
                        <p class="text-sm text-gray-500">Bagikan pengalaman detail Anda</p>
                        <span id="charCount" class="text-sm text-gray-400">0/500</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" 
                            class="w-full px-8 py-4 font-bold text-white transition duration-200 transform rounded-lg shadow-lg bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 hover:shadow-xl hover:scale-105 md:w-auto">
                        <i class="mr-2 fas fa-paper-plane"></i>Kirim Testimoni
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-gray-500">Testimoni Anda sangat berarti bagi kami untuk terus meningkatkan layanan</p>
        </div>
    </div>

    <script>
        // Rating functionality
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating');
        const ratingText = document.getElementById('ratingText');
        
        const ratingLabels = {
            1: 'Sangat Buruk',
            2: 'Buruk', 
            3: 'Cukup',
            4: 'Baik',
            5: 'Sangat Baik'
        };

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = parseInt(this.getAttribute('data-rating'));
                ratingInput.value = rating;
                ratingText.textContent = ratingLabels[rating];
                
                // Update star appearance
                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.classList.remove('inactive');
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                        s.classList.add('inactive');
                    }
                });
            });

            // Hover effect
            star.addEventListener('mouseenter', function() {
                const rating = parseInt(this.getAttribute('data-rating'));
                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('active');
                        s.classList.remove('inactive');
                    } else {
                        s.classList.add('inactive');
                        s.classList.remove('active');
                    }
                });
            });
        });

        // Reset on mouse leave
        document.getElementById('starRating').addEventListener('mouseleave', function() {
            const currentRating = parseInt(ratingInput.value) || 0;
            stars.forEach((s, index) => {
                if (index < currentRating) {
                    s.classList.add('active');
                    s.classList.remove('inactive');
                } else {
                    s.classList.add('inactive');
                    s.classList.remove('active');
                }
            });
        });

        // Image preview
        document.getElementById('foto').addEventListener('change', function() {
            const file = this.files[0];
            const preview = document.getElementById('imagePreview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        });

        // Character counter
        const deskripsi = document.getElementById('deskripsi');
        const charCount = document.getElementById('charCount');
        
        deskripsi.addEventListener('input', function() {
            const length = this.value.length;
            charCount.textContent = length + '/500';
            
            if (length > 450) {
                charCount.classList.add('text-red-500');
                charCount.classList.remove('text-gray-400');
            } else {
                charCount.classList.add('text-gray-400');
                charCount.classList.remove('text-red-500');
            }
        });

        // Set initial rating if old value exists
        const oldRating = "{{ old('rating') }}";
        if (oldRating) {
            const rating = parseInt(oldRating);
            ratingInput.value = rating;
            ratingText.textContent = ratingLabels[rating];
            
            stars.forEach((s, index) => {
                if (index < rating) {
                    s.classList.remove('inactive');
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                    s.classList.add('inactive');
                }
            });
        }

        // Form validation
        document.getElementById('testimoniForm').addEventListener('submit', function(e) {
            const rating = ratingInput.value;
            if (!rating) {
                e.preventDefault();
                alert('Silakan pilih rating terlebih dahulu!');
                return false;
            }
        });
    </script>
</body>
</html>