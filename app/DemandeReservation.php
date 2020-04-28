<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DemandeReservation extends Model
{
    protected $table = 'demande_reservation';
    public $timestamps = false;
	protected $primaryKey = 'id_demande';
	public $incrementing = true;
}