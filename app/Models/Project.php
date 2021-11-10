<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Sluggable;
    protected $guarded = [];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category() {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id', 'id');
    }
}
