<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\StaffResource;
use App\Models\Staff;

class StaffController extends ApiController
{
    public function __construct()
    {
        $this->model = Staff::class;
        $this->resource = StaffResource::class;
    }
}
