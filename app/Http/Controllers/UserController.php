<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataUser'] = User::all();
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['roles'] = Role::all();
        return view('admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:7',
            'role' => 'required', // Wajib pilih role
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto
        ]);

        // 1. Hash Password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // 2. Upload Foto (Jika ada)
        if ($request->hasFile('avatar')) {
            // Simpan ke folder 'public/avatars'
            $validatedData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // 3. Simpan User
        $user = User::create($validatedData);

        // 4. Pasang Role ke User
        $user->assignRole($request->role);

        // Redirect ke user.index (sesuai route baru)
        return redirect()->route('user.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $data['user'] = User::findOrFail($id);
        // return view('admin.user.edit', $data);
        $data['dataUser'] = User::findOrFail($id);
        $data['roles'] = Role::all();
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:7',
            'role' => 'required', // Role wajib dipilih saat edit
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 1. Cek Password (Update hanya jika diisi)
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']); // Jangan update password jika kosong
        }

        // 2. Cek Upload Foto Baru
        if ($request->hasFile('avatar')) {
            // Hapus foto lama jika ada
            if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
                Storage::disk('public')->delete($user->avatar);
            }
            // Simpan foto baru
            $validatedData['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        // 3. Update Data User
        $user->update($validatedData);

        // 4. Update Role (Sync mengganti role lama dengan yang baru)
        $user->syncRoles($request->role);

        return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $user = User::findOrFail($id);

        // Hapus foto profilnya juga agar hemat penyimpanan
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
    }
}
