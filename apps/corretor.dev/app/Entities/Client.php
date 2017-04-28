<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Client extends Model {

    protected $table = 'clients';

    protected $fillable = ['name', 'birthday', 'creci', 'set_profession_id'];

    protected $hidden = ['set_profession_id'];

    protected $dates = ['birthday'];

    public function profession()
    {
        return $this->belongsTo(SetProfession::class, 'set_profession_id', 'id');
    }

    public function email()
    {
        return $this->hasMany(ClientEmail::class, 'client_id', 'id');
    }

    public function phone()
    {
        return $this->hasMany(ClientPhone::class, 'client_id', 'id');
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = mb_convert_case($name, MB_CASE_UPPER, 'UTF-8');
    }

    public function getNameAttribute($name)
    {
        return mb_convert_case($name, MB_CASE_UPPER, 'UTF-8');
    }
    
    public function setBirthdayAttribute($day)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d/m/Y', $day)->format('Y-m-d');
    }

    public function getBirthdayAttribute($day)
    {
        return Carbon::parse($day)->format('d/m/Y');
    }

}