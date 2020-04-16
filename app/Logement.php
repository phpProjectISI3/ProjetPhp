<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logement extends Model
{
    public $timestamps = false;
	protected $primaryKey = 'id_logement';
	public $incrementing = true;
    protected $table = 'logement';
}
