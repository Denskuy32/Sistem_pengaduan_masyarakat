<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah pengaduan instansi</title>
</head>
<body>
     <!-- Main Content -->
     <main class="flex-1 p-6">
            <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah pengaduan instansi</h1>

        @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-4 rounded">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ url('/pengaduan_instansi') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                        <label for="id_pengaduan" class="block text-gray-700 font-medium mb-2">pengaduan:</label>
                        <select id="id_pengaduan" name="id_pengaduan" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="">-- Pilih pengaduan --</option>
                            @foreach($pengaduan as $aduan)
                                <option value="{{ $aduan->id_pengaduan }}">pelapor: {{ $aduan->pengguna->nama }} || {{ $aduan->judul_pengaduan}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="id_instansi" class="block text-gray-700 font-medium mb-2">instansi:</label>
                        <select id="id_instansi" name="id_instansi" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            <option value="">-- Pilih instansi --</option>
                            @foreach($instansi as $tes)
                                <option value="{{ $tes->id_instansi }}">{{ $tes->nama_instansi}} </option>
                            @endforeach
                        </select>
                    </div>
            <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none">
                Tambah
            </button>
        </form>
    </div>
    </main>
</body>
</html>