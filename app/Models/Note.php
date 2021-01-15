<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    // use HasFactory;
    protected $table = 'notes';
    protected $fillable = [
        'id', 'board_id', 'description', 'created_at'
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }


}
