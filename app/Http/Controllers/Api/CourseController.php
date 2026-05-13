<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Http\Resources\Api\CourseResource;

class CourseController extends ApiController
{
    public function __construct()
    {
        $this->model = Course::class;
        $this->resource = CourseResource::class;
    }
}
