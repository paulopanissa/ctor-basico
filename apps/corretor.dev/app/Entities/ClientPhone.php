<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ClientPhone extends Model {

    protected $table = 'client_phones';

    protected $fillable = ['client_id', 'type', 'phone'];

    protected $hidden = ['client_id'];

    public $timestamps = false;

    public function clients()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
}