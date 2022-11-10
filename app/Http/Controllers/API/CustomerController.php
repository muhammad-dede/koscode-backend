<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::orderBy('name', 'asc')->get();

        return response()->json([
            'code' => 200,
            'status' => 'OK',
            'message' => 'Success',
            'data' => $data,
        ], 200);
    }
}
