<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;

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


    /**
     * @return mixed
     */
    public static function getAllCached(): mixed
    {
        $cacheKey = (new self)->getTable();

        return Cache::remember($cacheKey, now()->addDay(365), function () {
            return self::all();
        });
    }
}
