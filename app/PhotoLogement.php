<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoLogement extends Model
{
    //
    public $timestamps = false;
	protected $primaryKey = 'id_photo';
	public $incrementing = true;
    protected $table = 'PHOTO_LOGEMENT';
}
