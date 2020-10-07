<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{
    //
    protected $fillable = [
        'vacante', 'imagen', 'skill', 'descripcion', 'salario_id', 'ubicacion_id', 'experiencia_id',
        'categoria_id'
    ];

    //Relacionando la tabla de categorias con la de vacante 1:1
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
    //Relacionando la tabla de salario con la de vacante 1:1
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }
    //Relacionando la tabla de ubicacion con la de vacante 1:1
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
    //Relacionando la tabla de experiencia con la de vacante 1:1
    public function experiencia()
    {
        return $this->belongsTo(Experiencia::class);
    }
    //Relacionando la tabla de usuario(reclutador) con la vacante
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    //Relacionando la tabla de vacantes con la de candidatos
    public function candidatos()
    {
        return $this->hasMany(Candidato::class);
    }
}
