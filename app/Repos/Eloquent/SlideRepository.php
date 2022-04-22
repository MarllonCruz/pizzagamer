<?php

namespace App\Repos\Eloquent;

use App\Models\Slide;
use App\Repos\Eloquent\AbstractRepository;
use App\Supports\Tools;

class SlideRepository extends AbstractRepository
{
    protected $model = Slide::class;

    public function all()
    {
        return Slide::all();
    }
}