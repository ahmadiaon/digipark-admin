<?php

namespace App\Http\Controllers;

use App\Models\Financial;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class ManageFinancialController extends Controller
{
    public function index()
    {
        return view('dashboard.manage.financial.index', [
            'title'         => 'Financial',
        ]);
    }
    public function anyData()
    {
        return Datatables::of(Financial::latest())
            ->addColumn('action', function ($model) {
                return '<a class="text-decoration-none" href="/financial/' . $model->id . '/edit"><button class="btn btn-warning py-1 px-2 mr-1"><i class="icon-copy dw dw-pencil"></i></button></a>
                <button onclick="myFunction(' . $model->id . ')"  type="button" class="btn btn-danger  py-1 px-2"><i class="icon-copy dw dw-trash"></i></button>';
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
        return view('dashboard.manage.financial.create', [
            'title'     => 'Create',
            'galleries' => Gallery::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'                      => 'required|max:255',
            'description'               => 'required',
            'address'                   => 'required',
            'city'                      => 'required',
            'province'                  => 'required',
            'location'                  => 'required',
            'instagram'                 => 'required',
            'facebook'                  => 'required',
            'youtube'                   => 'required',
            'image_path'                => 'required',
            'status'                    => 'required',
        ]);
        $myArray = explode(',', $validatedData['image_path']);
        $validatedData['image_path'] = "";
        foreach ($myArray as $value) {
            $validatedData['image_path'] = $validatedData['image_path'] . ',"' . $value . '"';
        }
        $str = ltrim($validatedData['image_path'], ',');
        $validatedData['image_path'] = '[' . $str . ']';
        $validatedData['uuid']  = Str::uuid();
        // return ($validatedData);
        Financial::create($validatedData);
        return redirect('/financial')->with('success', 'New Financial Inserted!');
        return $request;
    }


    public function show(Financial $financial)
    {
        //
    }

    public function edit(Financial $financial)
    {
        $str = ltrim($financial->image_path, '[');
        $str1 = substr($str, 0, -1);
        $myArray = explode(',', $str1);
        return view('dashboard.manage.financial.edit', [
            'title'     => 'Edit',
            'galleries' => Gallery::latest()->get(),
            'financial'      => $financial,
            'image_paths' => $myArray
        ]);
    }


    public function update(Request $request, Financial $financial)
    {
        $validatedData = $request->validate([
            'name'                      => 'required|max:255',
            'description'               => 'required',
            'address'                   => 'required',
            'city'                      => 'required',
            'province'                  => 'required',
            'location'                  => 'required',
            'instagram'                 => 'required',
            'facebook'                  => 'required',
            'youtube'                   => 'required',
            'image_path'                => 'required',
            'status'                    => 'required',
        ]);
        $myArray = explode(',', $validatedData['image_path']);
        $validatedData['image_path'] = "";
        foreach ($myArray as $value) {
            $validatedData['image_path'] = $validatedData['image_path'] . ',"' . $value . '"';
        }
        $str = ltrim($validatedData['image_path'], ',');
        $validatedData['image_path'] = '[' . $str . ']';

        Financial::where('id', $financial->id)->update($validatedData);
        return redirect('/financial')->with('success', 'Financial Edited!');
    }

    public function destroy(Financial $financial)
    {
        Financial::destroy($financial->id);
        return redirect('/financial/')->with('success', 'Tour has been Deleted!');
    }
}
