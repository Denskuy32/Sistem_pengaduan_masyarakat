<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit pengguna</title>
</head>
<body>
    <!-- Main Content -->
    <main class="flex-1 p-6">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold mb-6 text-gray-700">Edit Pengguna</h1>

                <form action="{{ route('pengguna.update', $pengguna->id_pengguna) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="nik" class="block text-gray-700 font-medium mb-2">Nik:</label>
                        <input type="text" id="nik" name="nik" value="{{ old('nik', $pengguna->nik) }}" required
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="nama" class="block text-gray-700 font-medium mb-2">Nama:</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', $pengguna->nama) }}" required
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $pengguna->email) }}" required
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password:</label>
                        <input type="password" name="password" id="password"
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Konfirmasi Password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="nomor_hp" class="block text-gray-700 font-medium mb-2">Nomor Telepon:</label>
                        <input type="text" id="nomor_hp" name="nomor_hp"
                            value="{{ old('nomor_hp', $pengguna->nomor_hp) }}"
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat:</label>
                        <input type="text" id="alamat" name="alamat"
                            value="{{ old('alamat', $pengguna->alamat) }}"
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="role" class="block text-gray-700 font-medium mb-2">Role:</label>
                        <select name="role" id="role"
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="masyarakat" {{ old('role', $pengguna->role) == 'masyarakat' ? 'selected' : '' }}>
                                masyarakat
                            </option>
                            <option value="admin" {{ old('role', $pengguna->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                            Perbarui
                        </button>
                    </div>
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
    <title>Edit pengguna</title>
</head>
<body>
    <!-- Main Content -->
    <main class="flex-1 p-6">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold mb-6 text-gray-700">Edit Pengguna</h1>

                <form action="{{ route('pengguna.update', $pengguna->id_pengguna) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="nik" class="block text-gray-700 font-medium mb-2">Nik:</label>
                        <input type="text" id="nik" name="nik" value="{{ old('nik', $pengguna->nik) }}" required
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="nama" class="block text-gray-700 font-medium mb-2">Nama:</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama', $pengguna->nama) }}" required
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $pengguna->email) }}" required
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password:</label>
                        <input type="password" name="password" id="password"
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Konfirmasi Password:</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="nomor_hp" class="block text-gray-700 font-medium mb-2">Nomor Telepon:</label>
                        <input type="text" id="nomor_hp" name="nomor_hp"
                            value="{{ old('nomor_hp', $pengguna->nomor_hp) }}"
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="alamat" class="block text-gray-700 font-medium mb-2">Alamat:</label>
                        <input type="text" id="alamat" name="alamat"
                            value="{{ old('alamat', $pengguna->alamat) }}"
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    </div>
                    <div>
                        <label for="role" class="block text-gray-700 font-medium mb-2">Role:</label>
                        <select name="role" id="role"
                            class="w-full px-4 py-1 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="masyarakat" {{ old('role', $pengguna->role) == 'masyarakat' ? 'selected' : '' }}>
                                masyarakat
                            </option>
                            <option value="admin" {{ old('role', $pengguna->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                            Perbarui
                        </button>
                    </div>
                </form>
            </div>
        </main>
</body>
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
</html>