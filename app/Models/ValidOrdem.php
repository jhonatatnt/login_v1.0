<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ValidOrdem extends Model
{
    use SoftDeletes;

    protected $table = 'valid_ordens';

    protected $primaryKey = 'id_valid_ordens';

    protected $fillable = [
        'id_user',
        'ordem_id',
        'status',
        'resultado'
    ];

    public function ordem()
    {
        return $this->belongsTo(Ordem::class, 'ordem_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}