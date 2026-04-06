<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function auth(Request $request)
    {

        $admin = DB::table('admins')
            ->where('username', $request->username)
            ->first();

        if ($admin && password_verify($request->password, $admin->password)) {

            Session::put('admin_id', $admin->id);
            Session::put('admin_username', $admin->username);

            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'Login gagal');
    }

    public function dashboard()
    {

        $aspirations = Aspiration::with(['category', 'admin'])
            ->latest()
            ->get();

        return view('admin.dashboard', [
            'aspirations' => $aspirations
        ]);
    }

    public function update(Request $request, $id)
    {

        $aspirasi = Aspiration::findOrFail($id);

        $aspirasi->admin_id = Session::get('admin_id');
        $aspirasi->status = $request->status;
        $aspirasi->respon_admin = $request->respon_admin;

        $aspirasi->save();

        return back()->with('success', 'Aspirasi berhasil ditangani');
    }

    public function datadelete($id)
    {

        $aspirasi = Aspiration::findOrFail($id);

        $aspirasi->delete();

        return back()->with('success', 'Aspirasi berhasil dihapus');
    }

    public function logout()
    {

        Session::forget('admin_id');
        Session::forget('admin_username');

        return redirect('/admin/login');
    }
}
