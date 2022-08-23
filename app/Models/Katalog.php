<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Katalog extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tb_katalogs';
    protected $guarded = ['id'];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'nama_item',
        'harga',
        'deskripsi',
        'satuan',
        'gambar',
        'jenis_id',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }


}
