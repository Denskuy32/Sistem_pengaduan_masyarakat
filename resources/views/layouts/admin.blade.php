<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Sistem Pengaduan Masyarakat</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('styles')
</head>
<body class="bg-gray-100 min-h-screen flex flex-col md:flex-row">
    <!-- Sidebar -->
    <aside class="bg-gray-800 text-white w-full md:w-64 md:min-h-screen md:fixed z-10 transition-all duration-300" id="sidebar">
        <div class="p-4 border-b border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold">Admin Panel</h2>
                    <p class="text-gray-400 text-sm">Sistem Pengaduan Masyarakat</p>
                </div>
                <button class="md:hidden text-white focus:outline-none" id="sidebarClose">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <nav class="p-2">
            <ul>
                <li class="mb-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded {{ Request::is('dashboard*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }} transition-all">
                        <i class="fas fa-tachometer-alt w-6"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('pengguna.index') }}" class="flex items-center p-3 rounded {{ Request::is('pengguna*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }} transition-all">
                        <i class="fas fa-users w-6"></i>
                        <span>Pengguna</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('pengaduan.index') }}" class="flex items-center p-3 rounded {{ str_starts_with(Route::currentRouteName(), 'pengaduan.') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }} transition-all">
                        <i class="fas fa-file-alt w-6"></i>
                        <span>Pengaduan</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('kategori.index') }}" class="flex items-center p-3 rounded {{ Request::is('kategori*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }} transition-all">
                        <i class="fas fa-tags w-6"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('tanggapan.index') }}" class="flex items-center p-3 rounded {{ Request::is('tanggapan*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }} transition-all">
                        <i class="fas fa-reply w-6"></i>
                        <span>Tanggapan</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('komentar.index') }}" class="flex items-center p-3 rounded {{ Request::is('komentar*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }} transition-all">
                        <i class="fas fa-comments w-6"></i>
                        <span>Komentar</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('instansi.index') }}" class="flex items-center p-3 rounded {{ Request::is('instansi*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }} transition-all">
                        <i class="fas fa-building w-6"></i>
                        <span>Instansi</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('pengaduan_instansi.index') }}" class="flex items-center p-3 rounded {{ Request::is('pengaduan_instansi*') || Request::is('pengaduan_instansi/*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }} transition-all">
                        <i class="fas fa-exclamation-triangle w-6"></i>
                        <span>Pengaduan_Instansi</span>
                    </a>
                </li>
                <li class="mb-1">
                    <a href="{{ route('notifikasi.index') }}" class="flex items-center p-3 rounded {{ Request::is('notifikasi*') ? 'bg-blue-600 text-white' : 'hover:bg-gray-700' }} transition-all">
                        <i class="fas fa-bell w-6"></i>
                        <span>Notifikasi</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 md:ml-64 min-h-screen">
        <!-- Top Navigation -->
        <header class="bg-white shadow-md p-4 flex justify-between items-center">
            <div class="flex items-center">
                <button class="md:hidden mr-4 text-gray-600" id="sidebarToggle">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h2 class="text-xl font-semibold">@yield('page-title', 'Dashboard')</h2>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <div class="p-6">
            @yield('content')
        </div>

        <!-- Footer -->
        <footer class="bg-white p-4 border-t mt-6">
            <p class="text-center text-gray-500 text-sm">© 2025 Sistem Pengaduan Masyarakat. All rights reserved.</p>
        </footer>
    </main>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar Toggle
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarClose = document.getElementById('sidebarClose');
            const sidebar = document.getElementById('sidebar');
            
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('md:-translate-x-full');
                    sidebar.classList.toggle('translate-x-0');
                    sidebar.classList.toggle('-translate-x-full');
                });
            }
            
            if (sidebarClose) {
                sidebarClose.addEventListener('click', function() {
                    sidebar.classList.add('-translate-x-full');
                    sidebar.classList.remove('translate-x-0');
                });
            }

            // Notification Dropdown
            const notificationToggle = document.getElementById('notificationToggle');
            const notificationDropdown = document.getElementById('notificationDropdown');
            
            if (notificationToggle && notificationDropdown) {
                notificationToggle.addEventListener('click', function() {
                    notificationDropdown.classList.toggle('hidden');
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', function(event) {
                    if (!notificationToggle.contains(event.target) && !notificationDropdown.contains(event.target)) {
                        notificationDropdown.classList.add('hidden');
                    }
                });
            }
        });
    </script>
    @yield('scripts')
</body>
</html>