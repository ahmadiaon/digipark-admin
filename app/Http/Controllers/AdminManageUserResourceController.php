<?php

namespace App\Http\Controllers;


use App\Models\Tour;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class AdminManageUserResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.manage.user.yazra', [
            'title'         => 'Users',
            // 'users'         => User::get()
            // 'users'         => User::select('name', 'email', 'phone_number')->get()->paginate(7)->withQueryString()
        ]);
    }
    public function anyData()
    {
        return Datatables::of(User::latest())
            ->addColumn('action', function ($model) {
                return '<a class="text-decoration-none" href="/users/' . $model->id . '/edit"><i class="btn icon-copy dw dw-pencil"></i></a>
                <form action="/users/' . $model->id . '" method="post" id="delete-data" class="d-inline">' . csrf_field() .
                    method_field('delete') . '<button   onclick="JSconfirm()" type="submit" class="btn btn-outline-none text-decoration-none"><span data-feather="x-circle"><i class="icon-copy dw dw-trash"></i></span></button>
                </form>';
            })

            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'         => 'required|max:255',
            'phone_number'          => 'required|unique:users',
            'status'   => 'required',
            'email'     => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['uuid']  = Str::uuid();
        User::create($validatedData);
        return redirect('/users')->with('success', 'New Post Inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        @ddd($id);
        return view('dashboard.manage.user.edit', [
            'title'         => 'Edit',
            'user'          => $id

            // 'users'         => User::get()
            // 'users'         => User::select('name', 'email', 'phone_number')->get()->paginate(7)->withQueryString()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        return ($user);
        User::destroy($user->id);
        return redirect('/users/')->with('success', 'Post has been Deleted!');
    }
}
