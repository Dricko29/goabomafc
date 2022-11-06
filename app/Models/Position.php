<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function players() : BelongsToMany
    {
        return $this->belongsToMany(Player::class, 'position_id');
    }
}