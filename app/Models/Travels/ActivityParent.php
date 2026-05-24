<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityParent extends Model
{
    use HasFactory;

    protected $table = 'cl_activity_parent';

    protected $fillable = [
        'title',
        'uri',
        'template',
    ];
    public function activityCategory()
    {
        return $this->hasMany(
            ActivityModel::class,
            'activity_parent',
            'uri'
        );
    }
}
