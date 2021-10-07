<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cari extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'ticari_unvani',
        'cari_kodu',
        'adi',
        'soyadi',
        'vergi_dairesi',
        'vergi_no',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    public function projelers()
    {
        return $this->hasMany(Projeler::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
