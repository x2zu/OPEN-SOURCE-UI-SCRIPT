<?php

namespace App\Http\Controllers;

use App\Models\Aspiration;
use App\Models\Category;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        return view('siswa.index',[
            'categories' => Category::all(),
            'aspirations' => Aspiration::latest()->get()
        ]);
    }
    public function store(Request $request){
            Aspiration::create($request->all());
            return redirect()->back()->with('success','Aspirasi berhasil dikirim');
        }
    }
