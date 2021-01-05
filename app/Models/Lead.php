<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status_id',
        'sum',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
