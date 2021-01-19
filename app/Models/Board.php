<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
    
class Board extends Model
{
    protected $table = 'boards';

    protected $fillable = [
        'id', 'title', 'order', 'created_at'
    ];

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

}
