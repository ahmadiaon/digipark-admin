<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Gallery;

class SlideController extends Controller
{
    public function listSlide()
    {
        $slides = Slide::join('galleries', 'slides.gallery_uuid', '=', 'galleries.uuid')
            ->get(['slides.*', 'galleries.path']);

        $meta = [
            'message' => "List all slide",
            'code'  => 200,
            'status'  => "success"
        ];
        $response = [
            'meta'  => $meta,
            'data'  => $slides
        ];
        return response()->json($response, 200);
    }
}
