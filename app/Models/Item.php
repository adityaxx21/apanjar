<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tb_item';
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
        'jenis_id',
        'kunjungan',
        'user_id'
    ];

    //* -------------------- Relations -------------------- *\\

    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
