<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_logement extends Model
{
	public $timestamps = false;
	protected $primaryKey = 'id_detail';
	public $incrementing = true;
    protected $table = 'detail_logement';
}
