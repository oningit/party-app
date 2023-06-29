<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pub extends Model
{
    use HasFactory;

    protected $fillable = [
        'pubname',
        'event',
        'location',
        'ytkey',
        'user_id',
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user(): BelongsTo {

        return $this->belongsTo(User::class);

    }

}
