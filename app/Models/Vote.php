<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'voter_id',
        'election_id',
    ];

    public function reset($election_id)
    {
        return $this->where('election_id', $election_id)->delete();
    }
}
