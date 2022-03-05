<?php

namespace App\Http\Controllers;

use App\Models\FinancialService;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Str;

class FinancialServiceController extends Controller
{
    public function index()
    {
        return view('dashboard.manage.financial.index', [
            'title'         => 'Financial',
        ]);
    }
    public function anyData()
    {
        return Datatables::of(FinancialService::latest())
            ->addColumn('action', function ($model) {
                return '<a class="text-decoration-none" href="/financials/' . $model->id . '/edit"><button class="btn btn-warning py-1 px-2 mr-1"><i class="icon-copy dw dw-pencil"></i></button></a>
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FinancialService  $financialService
     * @return \Illuminate\Http\Response
     */
    public function show(FinancialService $financialService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FinancialService  $financialService
     * @return \Illuminate\Http\Response
     */
    public function edit(FinancialService $financialService)
    {
        return $financialService;
        $str = ltrim($financialService->image_path, '[');
        $str1 = substr($str, 0, -1);
        $myArray = explode(',', $str1);
        return view('dashboard.manage.financial.edit', [
            'title'     => 'Edit',
            'galleries' => Gallery::latest()->get(),
            'financial'      => $financialService,
            'image_paths' => $myArray
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FinancialService  $financialService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinancialService $financialService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FinancialService  $financialService
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinancialService $financialService)
    {
        //
    }
}
