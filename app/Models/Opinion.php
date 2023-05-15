<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'firstname','lastname','email','application_id','url','content','legal_1','legal_2','legal_3','legal_4','free_id'];

    /**
     * @return BelongsTo
     */
    public function free(): BelongsTo
    {
        return $this->belongsTo(Free::class);
    }

    /**
     * @param $query
     * @param $search
     * @param $searchable
     * @return mixed
     */
    public function scopeSearch($query, $search, $searchable): mixed
    {
        if ($search && $searchable) {
            $query->where(function ($query) use ($search, $searchable) {
                foreach ($searchable as $column) {
                    match ($column) {
                        'id', 'firstname', 'lastname', 'email', 'application_id', 'url', 'content',
                        'created_at' => $query->orWhere($column, 'like', '%' . $search . '%'),
                        'free.name' => $query->orWhereHas('free', function ($subQuery) use ($search) {
                            $subQuery->where('name', 'like', '%' . $search . '%');
                        }),
                        default => null,
                    };
                }
            });
        }

        return $query;
    }

    /**
     * @param $query
     * @param $filter
     * @return mixed
     */
    public function scopeFilter($query, $filter): mixed
    {
        if ($filter) {
            $filters = json_decode($filter, true);

            foreach ($filters as $column => $value) {
                match ($column) {
                    'id', 'firstname', 'lastname', 'email', 'application_id', 'url', 'content',
                    'created_at' => $query->where($column, 'like', '%' . $value . '%'),
                    'free.name' => $query->orWhereHas('free', function ($subQuery) use ($value) {
                        $subQuery->where('name', 'like', '%' . $value . '%');
                    }),
                    'legal_1', 'legal_2', 'legal_3', 'legal_4' => $query->where($column, '=', $value === 'TAK' ? 1 : 0),
                    default => null,
                };
            }
        }

        return $query;
    }
}
