<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $primaryKey = 'company';

    protected $fillable = ['company', 'social_reason', 'address', 'number', 'complement', 'district', 'city', 'state', 'zip', 'phone', 'whastapp', 'email', 'site', 'facebook', 'instagram', 'twitter' ];

    public $timestamps = false;

    public function setCompanyAttribute($value)
    {
        $this->attributes['company'] = mb_convert_case($value, MB_CASE_UPPER, 'UTF-8');
    }

    public function setSocialReasonAttribute($value)
    {
        $this->attributes['social_reason'] = mb_convert_case($value, MB_CASE_UPPER, 'UTF-8');
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = mb_convert_case($value, MB_CASE_LOWER, 'UTF-8');
    }

    public function scopeTable()
    {
        return with(new Company)->getTable();
    }

}
