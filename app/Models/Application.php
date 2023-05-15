<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'firstname', 'lastname', 'address', 'city', 'zip', 'phone', 'email', 'receipt_number', 'img_receipt', 'img_ean', 'buy_at', 'legal_1', 'legal_2', 'legal_3', 'legal_4', 'voivodeship_id', 'product_id', 'shop_id', 'free_id', 'where_id'];

    /**
     * @return BelongsTo
     */
    public function voivodeship(): BelongsTo
    {
        return $this->belongsTo(Voivodeship::class);
    }

    /**
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return BelongsTo
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    /**
     * @return BelongsTo
     */
    public function free(): BelongsTo
    {
        return $this->belongsTo(Free::class);
    }

    /**
     * @return BelongsTo
     */
    public function where(): BelongsTo
    {
        return $this->belongsTo(Where::class);
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
                        'id', 'firstname', 'lastname', 'email', 'phone', 'address', 'city', 'zip',
                        'buy_at', 'receipt_number',
                        'created_at' => $query->orWhere($column, 'like', '%' . $search . '%'),
                        'voivodeship.name' => $query->orWhereHas('voivodeship', function ($subQuery) use ($search) {
                            $subQuery->where('name', 'like', '%' . $search . '%');
                        }),
                        'product.name' => $query->orWhereHas('product', function ($subQuery) use ($search) {
                            $subQuery->where('name', 'like', '%' . $search . '%');
                        }),
                        'shop.name' => $query->orWhereHas('shop', function ($subQuery) use ($search) {
                            $subQuery->where('name', 'like', '%' . $search . '%');
                        }),
                        'free.name' => $query->orWhereHas('free', function ($subQuery) use ($search) {
                            $subQuery->where('name', 'like', '%' . $search . '%');
                        }),
                        'where.name' => $query->orWhereHas('where', function ($subQuery) use ($search) {
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
                    'id', 'firstname', 'lastname', 'email', 'phone', 'address', 'city', 'zip',
                    'buy_at', 'receipt_number',
                    'created_at' => $query->where($column, 'like', '%' . $value . '%'),
                    'voivodeship.name' => $query->orWhereHas('voivodeship', function ($subQuery) use ($value) {
                        $subQuery->where('name', 'like', '%' . $value . '%');
                    }),
                    'product.name' => $query->orWhereHas('product', function ($subQuery) use ($value) {
                        $subQuery->where('name', 'like', '%' . $value . '%');
                    }),
                    'shop.name' => $query->orWhereHas('shop', function ($subQuery) use ($value) {
                        $subQuery->where('name', 'like', '%' . $value . '%');
                    }),
                    'free.name' => $query->orWhereHas('free', function ($subQuery) use ($value) {
                        $subQuery->where('name', 'like', '%' . $value . '%');
                    }),
                    'where.name' => $query->orWhereHas('where', function ($subQuery) use ($value) {
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
