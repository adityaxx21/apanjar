<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gambar_item extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tb_gambar_item';
    protected $guarded = ['id'];

    protected $appends = ['path'];
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = [
        'gambar',
        'item_id'
    ];

    //* -------------------- Relations -------------------- *\\

    public function gambar_item()
    {
        return $this->belongsTo(Item::class);
    }

    public function getPathAttribute()
    {
        return asset($this->gambar);
    }
}
