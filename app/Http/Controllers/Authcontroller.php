<<<<<<< HEAD
<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login attempt
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            
            // Get the authenticated user
            $user = Auth::user();
            
            // Redirect based on role
            if ($user->role == 'Admin') {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('home');
            }
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan tidak valid.',
        ])->withInput($request->except('password'));
    }

    /**
     * Show registration form
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nik' => 'required|string|size:16|unique:pengguna',
            'email' => 'required|string|email|max:100|unique:pengguna',
            'nomor_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create user
        Pengguna::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'role' => 'Masyarakat', // Default role
        ]);

        // Attempt to log in the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            
            return redirect()->route('home')->with('success', 'Registrasi berhasil dan Anda telah login!');
        }

        return redirect()->route('login');
    }

    /**
     * Log out the user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
=======
<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login attempt
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            
            // Get the authenticated user
            $user = Auth::user();
            
            // Redirect based on role
            if ($user->role == 'Admin') {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('home');
            }
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan tidak valid.',
        ])->withInput($request->except('password'));
    }

    /**
     * Show registration form
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nik' => 'required|string|size:16|unique:pengguna',
            'email' => 'required|string|email|max:100|unique:pengguna',
            'nomor_hp' => 'required|string|max:15',
            'alamat' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create user
        Pengguna::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'role' => 'Masyarakat', // Default role
        ]);

        // Attempt to log in the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            
            return redirect()->route('home')->with('success', 'Registrasi berhasil dan Anda telah login!');
        }

        return redirect()->route('login');
    }

    /**
     * Log out the user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
>>>>>>> 96a5c68c35660172e84ba26a0982509cbc5efc3f
}