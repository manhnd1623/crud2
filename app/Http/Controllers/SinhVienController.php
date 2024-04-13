<?php

namespace App\Http\Controllers;

use App\Models\SinhVien;
use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    const PATH_VIEW = 'sinh_viens.';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = SinhVien::query()->latest('id')->paginate(5);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SinhVien::query()->create($request->all());

        return back()->with('msg', 'Thao tác thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(SinhVien $sinhVien)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('sinhVien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SinhVien $sinhVien)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('sinhVien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SinhVien $sinhVien)
    {
        $sinhVien->update($request->all());

        return back()->with('msg', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SinhVien $sinhVien)
    {
        $sinhVien->delete();

        return back()->with('msg', 'Thao tác thành công');
    }
}
