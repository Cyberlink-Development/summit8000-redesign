<?php

namespace App\Models\HomeBrief;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBriefModel extends Model
{
    use HasFactory;
    protected $table = 'home_brief';
    protected $fillable = ['title', 'brief','thumbnail','image','pic'];
}
