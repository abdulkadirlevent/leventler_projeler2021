<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projeler extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'cari_id',
        'proje_adi',
        'sozlezme_no',
        'image',
        'baslama_tarihi',
        'teslim_tarihi',
        'birim_fiyati',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'baslama_tarihi' => 'datetime',
        'teslim_tarihi' => 'datetime',
    ];

    public function cari()
    {
        return $this->belongsTo(Cari::class);
    }

    public function tesisatlars()
    {
        return $this->hasMany(Tesisatlar::class);
    }
}
