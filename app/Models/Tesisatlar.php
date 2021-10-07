<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tesisatlar extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'tesisat_no',
        'baslama_tarihi',
        'teslim_tarihi',
        'projeler_id',
        'birim_fiyati',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'baslama_tarihi' => 'datetime',
        'teslim_tarihi' => 'datetime',
    ];

    public function tesisatIsAdimlaris()
    {
        return $this->hasMany(TesisatIsAdimlari::class);
    }

    public function projeler()
    {
        return $this->belongsTo(Projeler::class);
    }
}
