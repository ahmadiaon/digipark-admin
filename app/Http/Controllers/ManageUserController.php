<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;


class ManageUserController extends Controller
{

    public function index()
    {
        return view('dashboard.manage.user.index', [
            'title'         => 'Users',
            // 'users'         => User::get()
            // 'users'         => User::select('name', 'email', 'phone_number')->get()->paginate(7)->withQueryString()
        ]);
    }


    public function anyData()
    {
        return Datatables::of(User::latest())
            ->addColumn('action', function ($model) {
                return '<a class="text-decoration-none" href="/users/' . $model->id . '/edit"><button class="btn btn-warning py-1 px-2 mr-1"><i class="icon-copy dw dw-pencil"></i></button></a>
                <form action="/users/' . $model->id . '" method="post" id="delete-data" class="d-inline">' . csrf_field() .
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
        return view('dashboard.manage.user.create', [
            'title'     => 'Create'
        ]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'         => 'required|max:255',
            'phone_number'          => 'required|unique:users',
            'email'     => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['uuid']  = Str::uuid();
        User::create($validatedData);
        return redirect('/users')->with('success', 'New Post Inserted!');
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        return view('dashboard.manage.user.edit', [
            'title'     => 'Edit',
            'user'      => $user
            // 'users'         => User::get()
            // 'users'         => User::select('name', 'email', 'phone_number')->get()->paginate(7)->withQueryString()
        ]);
    }

    public function update(Request $request, User $user)
    {


        $rules = [
            'name'          => 'required|max:255',

            'email'         => 'required|email:dns',
        ];

        if ($request->phone_number != $user->phone_number) {
            $rules['phone_number'] =  'required|unique:users';
        }

        $validateData =  $request->validate($rules);

        if ($request->password == null) {
            unset($validateData['password']);
        } else {
            $validateData['password'] = bcrypt($request->password);
        }

        User::where('id', $user->id)->update($validateData);
        return redirect('/users')->with('success', 'New Post Inserted!');
    }


    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/users/')->with('success', 'Post has been Deleted!');
    }
}
