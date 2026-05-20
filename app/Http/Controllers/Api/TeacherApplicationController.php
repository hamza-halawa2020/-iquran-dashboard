<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\TeacherApplicationStoreRequest;
use App\Models\Staff;

class TeacherApplicationController extends ApiController
{
    public function store(TeacherApplicationStoreRequest $request)
    {
        $payload = $request->validated();

        $item = Staff::create([
            'name' => $payload['name'],
            'email' => $payload['email'],
            'phone' => $payload['phone'],
            'country' => $payload['country'],
            'job_title' => $payload['job_title'],
            'description' => $payload['message'],
            'status' => 0,
            'created_by' => null,
        ]);

        return response()->json(['message' => 'Teacher application submitted successfully.','id' => $item->id,'status' => $item->status], 201);
    }
}
