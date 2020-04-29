<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    //
    public $timestamps = false;
	protected $primaryKey = 'id_client';
	public $incrementing = true;
    protected $table = 'personne';
}
