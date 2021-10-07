<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TesisatIsAdimlari extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'data_key',
        'title',
        'tahmin_zaman',
        'gerceklesen_zaman',
        'kayip_zaman',
        'aciklama',
        'ordering',
        'tesisatlar_id',
        'state',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'tesisat_is_adimlaris';

    public function tesisatlar()
    {
        return $this->belongsTo(Tesisatlar::class);
    }
}
