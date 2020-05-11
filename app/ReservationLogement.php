<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationLogement extends Model
{
    protected $table = 'reservation_logement';
    public $timestamps = false;
	protected $primaryKey = 'id_reservation';
	public $incrementing = true;
}
