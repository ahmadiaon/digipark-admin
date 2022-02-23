<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function listCommunity()
    {
        $communities = Community::join('galleries', 'communities.logo_path', '=', 'galleries.uuid')
            ->get(['communities.*', 'galleries.path']);

        $meta = [
            'message' => "List all communities",
            'code'  => 200,
            'status'  => "success"
        ];
        $response = [
            'meta'  => $meta,
            'data'  => $communities
        ];
        return response()->json($response, 200);
    }
}
