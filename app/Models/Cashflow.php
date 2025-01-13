<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Cashflow extends Model
{
    use HasFactory;


    protected $guarded = ['id'];
    protected $table = "cashflow";
    protected $with = ['performer', 'company', 'transaction_category', 'cashflow_category'];

    public function scopeFilter($q, array $filters)
    {
        $q->when($filters['search'] ?? false, function ($q, $search) {
            return $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('excerpt', 'like', '%' . $search . '%');
        });

        $q->when($filters['category'] ?? false, function ($q, $category) {
            return $q->whereHas('category', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        });

        $q->when($filters['author'] ?? false, function ($q, $author) {
            return $q->whereHas('author', function ($q) use ($author) {
                $q->where('username', $author);
            });
        });
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function transaction_category()
    {
        return $this->belongsTo(TransactionCategory::class);
    }

    public function performer()
    {
        return $this->belongsTo(User::class);
    }

    public function cashflow_category()
    {
        return $this->belongsTo(CashflowCategory::class);
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
