<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

	protected $fillable = [
		'nome','email','cnpj','telefone','endereco','cidade','contato'
	];

	public function links()
    {
        return $this->hasMany(Links::class);
    }

}
