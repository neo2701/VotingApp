<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'position_id',
        'election_id',

    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
    public function election()
    {
        return $this->belongsTo(Election::class);
    }
}
