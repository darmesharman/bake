<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'board_id',
        'description',
        'status_id',
        'sum',
        'order',
        'created_at'
    ];


    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function hasCompany(Company $company)
    {
        return $this->company and $this->company->is($company);
    }

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }

    public function hasContact(Contact $contact)
    {
        return $this->contacts->contains($contact);
    }
}
