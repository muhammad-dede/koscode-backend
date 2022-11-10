<?php

namespace App\Http\Controllers\API;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Success',
            'data' => $services
        ], 200);
    }

    public function show($uuid)
    {
        $service = Service::where('uuid', $uuid)->first();

        if (!$service) {
            return response()->json([
                'code' => 404,
                'status' => 'Not Found',
                'message' => 'Failed',
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Success',
            'data' => $service
        ], 200);
    }
}
