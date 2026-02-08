@extends('layouts.admin')

@section('title', 'Edit Personal Information')

@section('content')
<div>
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Personal Information</h1>
        <p class="text-gray-600 mt-1">Update your profile details</p>
    </div>
    
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.personal-information.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Photo Upload -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Profile Photo</label>
                    
                    @if($info->photo)
                    <div class="mb-4">
                        <img src="{{ asset($info->photo) }}" alt="Current Photo" class="w-32 h-32 rounded-full object-cover border-4 border-blue-100 shadow-lg">
                        <p class="text-sm text-gray-500 mt-2">Current photo</p>
                    </div>
                    @endif
                    
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center px-4 py-3 bg-gradient-to-r from-blue-50 to-purple-50 text-blue-700 rounded-lg cursor-pointer hover:from-blue-100 hover:to-purple-100 transition border-2 border-blue-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <span class="text-sm font-medium">Choose Photo</span>
                            <input type="file" name="photo" class="hidden" accept="image/*" onchange="previewImage(this)">
                        </label>
                        <span id="file-name" class="text-sm text-gray-500">No file chosen</span>
                    </div>
                    
                    <!-- Image Preview -->
                    <div id="image-preview" class="mt-4 hidden">
                        <p class="text-sm font-semibold text-gray-700 mb-2">New photo preview:</p>
                        <img id="preview-img" src="" alt="Preview" class="w-32 h-32 rounded-full object-cover border-4 border-green-100 shadow-lg">
                    </div>
                    
                    <p class="text-gray-500 text-xs mt-2">Recommended: Square image, at least 400x400px. Max 2MB (JPG, PNG, GIF)</p>
                    @error('photo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Full Name -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Full Name *</label>
                    <input type="text" name="full_name" value="{{ old('full_name', $info->full_name ?? '') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                           placeholder="John Doe"
                           required>
                    @error('full_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Email Address *</label>
                    <input type="email" name="email" value="{{ old('email', $info->email ?? '') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                           placeholder="john@example.com"
                           required>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Phone Number *</label>
                    <input type="text" name="phone" value="{{ old('phone', $info->phone ?? '') }}" 
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                           placeholder="+1 (555) 123-4567"
                           required>
                    @error('phone')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Address *</label>
                    <textarea name="address" rows="3" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                              placeholder="123 Main Street, City, Country"
                              required>{{ old('address', $info->address ?? '') }}</textarea>
                    @error('address')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Professional Objective -->
                <div class="md:col-span-2">
                    <label class="block text-gray-700 text-sm font-semibold mb-2">Professional Objective *</label>
                    <textarea name="professional_objective" rows="5" 
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" 
                              placeholder="A motivated professional seeking to leverage skills in..."
                              required>{{ old('professional_objective', $info->professional_objective ?? '') }}</textarea>
                    <p class="text-gray-500 text-xs mt-1">Write a brief statement about your career goals and what you bring to the table</p>
                    @error('professional_objective')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between mt-8 pt-6 border-t">
                <p class="text-sm text-gray-600">* Required fields</p>
                <button type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-8 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transform hover:scale-105 transition duration-200 shadow-lg">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    const fileName = document.getElementById('file-name');
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    
    if (input.files && input.files[0]) {
        fileName.textContent = input.files[0].name;
        
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        fileName.textContent = 'No file chosen';
        preview.classList.add('hidden');
    }
}
</script>
@endsection