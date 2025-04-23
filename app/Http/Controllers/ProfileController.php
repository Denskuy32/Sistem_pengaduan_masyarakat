<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Pengaduan;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Display the user's profile
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        // Get statistics
        $stats = [
            'total' => Pengaduan::where('id_pengguna', $user->id_pengguna)->count(),
            'pending' => Pengaduan::where('id_pengguna', $user->id_pengguna)->where('status', 'Pending')->count(),
            'verified' => Pengaduan::where('id_pengguna', $user->id_pengguna)->where('status', 'Diverifikasi')->count(),
            'processed' => Pengaduan::where('id_pengguna', $user->id_pengguna)->where('status', 'Diproses')->count(),
            'completed' => Pengaduan::where('id_pengguna', $user->id_pengguna)->where('status', 'Selesai')->count(),
        ];

            // Ubah menjadi:
            $notifications = Notifikasi::where('id_pengguna', $user->id_pengguna)
            ->orderBy('tanggal_kirim', 'desc')
            ->paginate(5);

            // Lalu, ubah format tanggal setelah pagination:
            foreach ($notifications as $notification) {
            $notification->tanggal_kirim = Carbon::parse($notification->tanggal_kirim);
            }
                    
        // Get unread notifications count
        $unreadNotifications = Notifikasi::where('id_pengguna', $user->id_pengguna)
            ->where('status', 'Belum Dibaca')
            ->count();
        
        // Get notifications with pagination
        $notifications = Notifikasi::where('id_pengguna', $user->id_pengguna)
            ->orderBy('tanggal_kirim', 'desc')
            ->paginate(5);
            
        // Get user's complaints with pagination
        $pengaduan = Pengaduan::where('id_pengguna', $user->id_pengguna)
            ->with(['kategori', 'tanggapan'])
            ->orderBy('tanggal_pengaduan', 'desc')
            ->paginate(5);
        
        return view('profile.index', compact('user', 'stats', 'notifications', 'pengaduan', 'unreadNotifications'));
    }

    /**
     * Show the form for editing the profile
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:pengguna,email,' . Auth::user()->id_pengguna . ',id_pengguna',
            'nomor_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'foto_profil' => 'nullable|image|max:2048',
        ]);

        $user = Pengguna::find(Auth::user()->id_pengguna);
        
        // Update user data
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->nomor_hp = $request->nomor_hp;
        $user->alamat = $request->alamat;
        
        // Handle profile photo upload
        if ($request->hasFile('foto_profil')) {
            // Delete old profile photo if it exists
            if ($user->foto_profil) {
                Storage::disk('public')->delete($user->foto_profil);
            }
            
            // Store new profile photo
            $path = $request->file('foto_profil')->store('profile_photos', 'public');
            $user->foto_profil = $path;
        }
        
        $user->save();
        
        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Show the change password form
     *
     * @return \Illuminate\Http\Response
     */
    public function showChangePasswordForm()
    {
        return view('profile.password');
    }

    /**
     * Update the user's password
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Pengguna::find(Auth::user()->id_pengguna);
        
        // Check if the current password matches
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak cocok']);
        }
        
        // Update the password
        $user->password = Hash::make($request->password);
        $user->save();
        
        return redirect()->route('profile.index')->with('success', 'Password berhasil diubah');
    }
}