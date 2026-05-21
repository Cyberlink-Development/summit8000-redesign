<?php

namespace App\Services\Slug;

use App\Models\PageSlug;
use Illuminate\Support\Str;

class SlugService
{
    /**
     * Store slug
     */
    public function store($model, $slug)
    {
        $uniqueSlug = $this->generateUniqueSlug($slug);

        $model->slugs()->create([
            'slug' => $uniqueSlug,
        ]);

        return $uniqueSlug;
    }

    /**
     * Update slug
     */
    public function update($model, $slug)
    {
        $uniqueSlug = $this->generateUniqueSlug(
            $slug,
            $model
        );

        if ($model->slugs()->exists()) {

            $model->slugs()->first()->update([
                'slug' => $uniqueSlug,
            ]);

        } else {

            $model->slugs()->create([
                'slug' => $uniqueSlug,
            ]);
        }

        return $uniqueSlug;
    }

    /**
     * Generate globally unique slug
     */
    protected function generateUniqueSlug($slug, $model = null)
    {
        $slug = Str::slug($slug);

        $originalSlug = $slug;

        $count = 1;

        while (
            PageSlug::where('slug', $slug)
                ->when($model, function ($query) use ($model) {

                    return $query->where(function ($q) use ($model) {
                        $q->where('sluggable_id', '!=', $model->id)
                          ->orWhere(
                              'sluggable_type',
                              '!=',
                              get_class($model)
                          );
                    });

                })
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $count;

            $count++;
        }

        return $slug;
    }
}
