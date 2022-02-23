<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Models\CommunityCategory;
use App\Http\Controllers\Controller;

class CommunityCategoryController extends Controller
{
    public function index()
    {
        $communityCategory = CommunityCategory::query()->orderBy('created_at', 'DESC')->get();
        $meta = [
            'message' => "List all category",
            'code'  => 200,
            'status'  => "success"
        ];
        $response = [
            'meta'  => $meta,
            'data'  => $communityCategory
        ];
        return response()->json($response, 200);
    }
}
