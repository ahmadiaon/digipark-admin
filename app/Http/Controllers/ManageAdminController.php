<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Str;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class ManageAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.manage.admin.index', [
            'title'         => 'Admin',
            // 'users'         => User::get()
            // 'users'         => User::select('name', 'email', 'phone_number')->get()->paginate(7)->withQueryString()
        ]);
    }
    public function anyData()
    {
        return Datatables::of(Admin::latest())
            ->addColumn('action', function ($model) {
                return '<a class="text-decoration-none" href="/admin/' . $model->id . '/edit"><button class="btn btn-warning py-1 px-2 mr-1"><i class="icon-copy dw dw-pencil"></i></button></a>
                <button onclick="myFunction(' . $model->id . ')"  type="button" class="btn btn-danger  py-1 px-2"><i class="icon-copy dw dw-trash"></i></button>';
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
        return view('dashboard.manage.admin.create', [
            'title'     => 'Create'
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
            'name'         => 'required|max:255',
            'phone'        => 'required|unique:admins',
            'status'       => 'required',
            'email'        => 'required|email:dns|unique:admins',
            'password'     => 'required'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['uuid']  = Str::uuid();
        $validatedData['phone'] = $request->phone;
        Admin::create($validatedData);
        return redirect('/admin')->with('success', 'New Admin Inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('dashboard.manage.admin.edit', [
            'title'     => 'Edit',
            'admin'      => $admin
            // 'users'         => User::get()
            // 'users'         => User::select('name', 'email', 'phone_number')->get()->paginate(7)->withQueryString()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $rules = [
            'name'         => 'required|max:255',
            'status'       => 'required',
        ];


        if ($request->email != $admin->email) {
            $rules['email'] =  'required|email:dns|unique:admins';
        }
        if ($request->phone != $admin->phone) {
            $rules['phone'] =  'required|unique:admins';
        }

        $validateData =  $request->validate($rules);
        // $validatedData = $request->except('_method', '_token');
        if ($request->password == null) {
            unset($validateData['password']);
        } else {
            $validateData['password'] = bcrypt($request->password);
        }
        Admin::where('id', $admin->id)->update($validateData);
        return redirect('/admin')->with('success', 'New Post Inserted!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        Admin::destroy($admin->id);
        return redirect('/admin/')->with('success', 'Post has been Deleted!');
    }
}
