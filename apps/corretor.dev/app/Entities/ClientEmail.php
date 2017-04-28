<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ClientEmail extends Model {

    protected $table = 'client_emails';

    protected $fillable = ['client_id', 'email'];

    protected $hidden = ['client_id'];

    public $timestamps = false;

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

}