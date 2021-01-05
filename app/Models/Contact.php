<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'email',
    ];

    public function leads()
    {
        return $this->belongsToMany(Lead::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function hasCompany(Company $company)
    {
        return $this->companies->contains($company);
    }
}
