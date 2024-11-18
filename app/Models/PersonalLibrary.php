<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalLibrary extends Model
{
    protected $guarded = [];

    protected function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
