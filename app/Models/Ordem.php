<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordem extends Model
{
    use HasFactory;

    protected $table = 'ordens';
    public $timestamps = false;

    protected $fillable = [
        'id_estrategy',
        'cod_operador',
        'id_conta',
        'grupo',
        'tipo_operador',
        'valor',
        'tipo_negocio',
        'status',
        'visibility',
        'date_creation',
    ];


    protected $casts = [
        'date_creation' => 'datetime',
    ];

    public function estrategia()
    {
        return $this->belongsTo(Estrategia::class, 'id_estrategy');
    }

    public function operador()
    {
        return $this->belongsTo(Operador::class, 'cod_operador');
    }

    public function conta()
    {
        return $this->belongsTo(Conta::class, 'id_conta');
    }
    
    protected static function booted()
    {
        static::creating(function ($ordem) {
            $ordem->date_creation = now();
        });
    }
}

