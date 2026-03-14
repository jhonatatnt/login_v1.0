<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckOperacional extends Model
{
    use SoftDeletes;

    protected $table = 'check_operacional';

    protected $primaryKey = 'id_check';

    public $timestamps = true;

    protected $fillable = [
        'id_operador',
        'login_plataforma',
        'valid_contas',
        'valid_senha_op',
        'valid_OCO',
        'valid_contratos',
        'conf_replicador',
        'reuniao',
        'data_creation',
        'uploaded'
    ];
    
    public function operador()
    {
        return $this->belongsTo(User::class,'id_operador');
    }   
}

