<?php

namespace App\Services\About;

use App\DTO\About\AboutPageDTO;
use App\Models\Posts\PostModel;
use App\Models\Posts\PostTypeModel;

class AboutPageService
{
    public function getPageData(): array
    {
        $model = PostTypeModel::with('seo')
            ->where('id', 1)
            ->firstOrFail();
            
        $sections= [];
        if($model){
            $sections = PostModel::where('posttype', $model->id)
                ->get()
                ->keyBy('type');
        }

        return [
            'model'    => $model,
            'sections' => $sections,
        ];
    }
}