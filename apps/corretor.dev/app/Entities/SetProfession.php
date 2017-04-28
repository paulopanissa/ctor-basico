<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class SetProfession extends Model {

    protected $table = 'set_professions';

    public $timestamps = false;

    protected $fillable = ['name', 'day'];

    protected $hidden = ['day'];

    protected $dates = ['day'];

    public function clients()
    {
        return $this->hasMany(Client::class, 'set_profession_id', 'id');
    }

    public function setDayAttribute($day)
    {
        $this->attributes['day'] = Carbon::createFromFormat('d/m/Y', $day)->format('Y-m-d');
    }

    public function getDayAttribute($day)
    {
        return Carbon::parse($day)->format('d/m/Y');
    }

}