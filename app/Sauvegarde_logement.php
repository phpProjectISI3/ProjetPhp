<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sauvegarde_logement extends Model
{
    public $timestamps = false;
	protected $primaryKey = 'id_sauvegarde';
	public $incrementing = true;
    protected $table = 'sauvegarde_logement';
}
