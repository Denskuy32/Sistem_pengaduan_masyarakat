<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah pengguna</title>
</head>
<body>
    <!-- Main Content -->
    <main class="flex-1 p-6">
            <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah Pengguna</h1>

                @if($errors->any())
                <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ url('/pengguna') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="nik" class="block text-gray-700 font-medium mb-2">Nik:</label>
                        <input type="text" id="nik" name="nik" value="{{ old('nik') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="nama" class="block text-gray-700 font-medium mb-2">Nama:</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password:</label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="nomor_hp" class="block text-gray-700 font-medium mb-2">Nomor Telepon:</label>
                        <input type="text" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat:</label>
                        <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="role" class="block text-gray-700 font-medium mb-2">Role:</label>
                        <select name="role" id="role"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="masyarakat" {{ old('role') == 'masyarakat' ? 'selected' : '' }}>masyarakat</option>
                            <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Tambah
                    </button>
                </form>
            </div>
        </main>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah pengguna</title>
</head>
<body>
    <!-- Main Content -->
    <main class="flex-1 p-6">
            <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah Pengguna</h1>

                @if($errors->any())
                <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ url('/pengguna') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="nik" class="block text-gray-700 font-medium mb-2">Nik:</label>
                        <input type="text" id="nik" name="nik" value="{{ old('nik') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="nama" class="block text-gray-700 font-medium mb-2">Nama:</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password:</label>
                        <input type="password" name="password" id="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="nomor_hp" class="block text-gray-700 font-medium mb-2">Nomor Telepon:</label>
                        <input type="text" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat:</label>
                        <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="role" class="block text-gray-700 font-medium mb-2">Role:</label>
                        <select name="role" id="role"
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="masyarakat" {{ old('role') == 'masyarakat' ? 'selected' : '' }}>masyarakat</option>
                            <option value="Admin" {{ old('role') == 'Admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Tambah
                    </button>
                </form>
            </div>
        </main>
</body>
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
</html>