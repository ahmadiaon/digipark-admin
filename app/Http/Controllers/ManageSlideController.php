<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\User;
use App\Models\Slide;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;



class ManageSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.manage.slide.index', [
            'title'         => 'Slide',

            // 'users'         => User::get()
            // 'users'         => User::select('name', 'email', 'phone_number')->get()->paginate(7)->withQueryString()
        ]);
    }
    public function anyData()
    {
        return Datatables::of(Slide::latest())
            ->addColumn('action', function ($model) {
                return '<a class="text-decoration-none" href="/slide/' . $model->id . '/edit"><button class="btn btn-warning py-1 px-2 mr-1"><i class="icon-copy dw dw-pencil"></i></button></a>
                <form action="/slide/' . $model->id . '" method="post" id="delete-data" class="d-inline">' . csrf_field() .
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.manage.slide.create', [
            'title'     => 'Create',
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
        $validatedData = $request->validate([
            'title'         => 'required|max:255',
            'gallery_uuid'   => 'exists:galleries,uuid',
            'status'    => 'required'
        ]);
        $validatedData['uuid']  = Str::uuid();
        Slide::create($validatedData);
        return redirect('/slide')->with('success', 'New Slide Inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        return view('dashboard.manage.slide.edit', [
            'title'     => 'Edit',
            'slide'      => $slide,
            'galleries' => Gallery::latest()->get()
            // 'users'         => User::get()
            // 'users'         => User::select('name', 'email', 'phone_number')->get()->paginate(7)->withQueryString()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        $validatedData = $request->validate([
            'title'         => 'required|max:255',
            'gallery_uuid'   => 'exists:galleries,uuid',
            'status'    => 'required'
        ]);
        Slide::where('id', $slide->id)->update($validatedData);
        return redirect('/slide')->with('success', 'Slide Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        Slide::destroy($slide->id);
        return redirect('/slide/')->with('success', 'Slide has been Deleted!');
    }
}
