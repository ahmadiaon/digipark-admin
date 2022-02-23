<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Community;
use App\Models\CommunityCategory;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ManageCommunityController extends Controller
{
    public function index()
    {
        // return Community::join('community_categories', 'community_categories.uuid', '=', 'communities.community_category_uuid')->get(['communities.*', 'community_categories.category']);

        return view('dashboard.manage.community.index', [
            'title'         => 'Community',
        ]);
    }
    public function anyData()
    {
        return Datatables::of(Community::join('community_categories', 'community_categories.uuid', '=', 'communities.community_category_uuid')->get(['communities.*', 'community_categories.category']))
            ->addColumn('action', function ($model) {
                return '<a class="text-decoration-none" href="/community/' . $model->id . '/edit"><button class="btn btn-warning py-1 px-2 mr-1"><i class="icon-copy dw dw-pencil"></i></button></a>
                <form action="/community/' . $model->id . '" method="post" id="delete-data" class="d-inline">' . csrf_field() .
                    method_field('delete') . '<button onclick="JSconfirm()" type="submit" class="btn btn-danger  py-1 px-2"><i class="icon-copy dw dw-trash"></i></button>
                </form>';
            })
            ->addColumn('image', function ($model) {
                return '
                <div class="user-info-dropdown">
                    <a class="dropdown-toggle" >
                        <span class="user-icon">
                            <img src=" http://digipark-admin.test/vendors/images/photo1.jpg" alt="">
                        </span>
                    </a>
                </div>
                ';
            })
            ->escapeColumns('image')

            ->make(true);
    }
    public function create()
    {
        return view('dashboard.manage.community.create', [
            'title'     => 'Create',
            'categories' => CommunityCategory::latest()->get(),
            'galleries' => Gallery::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        //
    }
}
