<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message_contact extends Model
{
    public $timestamps = false;
	protected $primaryKey = 'id_message';
	public $incrementing = true;
    protected $table = 'message_contact';
}
