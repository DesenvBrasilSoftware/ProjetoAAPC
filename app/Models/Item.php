<?php

namespace App\Models;

class Item extends BaseModel
{
    protected $table = 'item';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'descricao',
        'grupo_item_id',
        'fabricacao',
        'validade',
        'kit',
        'medicamento_id',
    ];

    public function setKitAttribute($value)
    {
        $this->attributes['kit'] = empty($value) ? '0' : $value;
    }

    public function grupoItem()
    {
        return $this->belongsTo(GrupoItem::class, 'grupo_item_id', 'id');
    }

    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'medicamento_id', 'id');
    }
}
