<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Project extends Model
{

    use HasFactory, Sluggable;

    protected $table = "projects";

    protected $guarded = ['id'];
    protected $with = ['cat'];

    public function scopeFilter($q, array $filters)
    {
        $q->when($filters['search'] ?? false, function ($q, $search) {
            return $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('excerpt', 'like', '%' . $search . '%');
        });

        $q->when($filters['cat'] ?? false, function ($q, $cat) {
            return $q->whereHas('cat', function ($q) use ($cat) {
                $q->where('slug', $cat);
            });
        });
    }

    public function cat()
    {
        return $this->belongsTo(Cat::class);
    }



    public function getRouteKeyName()
    {
        return 'slug';
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
