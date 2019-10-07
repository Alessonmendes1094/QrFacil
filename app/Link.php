<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'links';

	protected $fillable = [
		'titulo','url','cliente_id'
	];

	public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
