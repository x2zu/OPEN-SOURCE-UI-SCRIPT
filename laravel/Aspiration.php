<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspiration extends Model
{

    use HasFactory;

    protected $fillable = [
        'nama',
        'nis',
        'kelas',
        'category_id',
        'status',
        'admin_id',
        'respon_admin'
    ];

    public function category()
    {

        return $this->belongsTo(Category::class);
    }

    public function admin()
    {

        return $this->belongsTo(Admin::class);
    }
}
