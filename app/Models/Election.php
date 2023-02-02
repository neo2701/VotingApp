<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'starts_at',
        'ends_at',
    ];
    protected $appends = ['status'];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function voters()
    {
        return $this->hasMany(Voter::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function getStatusAttribute()
    {
        if ($this->starts_at->isFuture()) {
            $status = 'Upcoming';
        }
        if ($this->ends_at->isPast()) {
            $status = 'Ended';
        }
        if ($this->starts_at->isPast() && $this->ends_at->isFuture()) {
            $status = 'Ongoing';
        }
        return $this->attributes['status'] = $status;
    }

    public function currentBallot()
    {
    }
}
