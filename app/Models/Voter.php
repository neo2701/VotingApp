<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Voter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'voter_token',
        'election_id',
    ];

    public function election()
    {
        return $this->belongsTo(Election::class);
    }
}
