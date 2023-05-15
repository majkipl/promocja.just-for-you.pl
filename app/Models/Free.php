<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Free extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name'];

    protected $table = 'freebies';

    /**
     * @return HasMany
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    /**
     * @return HasMany
     */
    public function opinions(): HasMany
    {
        return $this->hasMany(Opinion::class);
    }
}
