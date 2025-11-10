<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    //
    use HasFactory, SoftDeletes;
    protected $table = 'hotel.clientes';
    protected $fillable = ['estado','persona_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function persona(): HasOne
    {
        return $this->hasOne(Persona::class,'id','persona_id');
    }
}
