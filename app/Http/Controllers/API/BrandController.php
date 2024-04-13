<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    const PATH_UPLOAD = 'brands';

    public function index()
    {
        try {
            $data = Brand::query()->latest()->paginate(5);

            return $data;
        } catch (\Exception $exception) {
            Log::error('Exception', [$exception]);
            return response()->json([], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store()
    {
        $data = \request()->except('img');

        if (\request()->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, \request()->file('img'));
        }

        $brand = Brand::query()->create($data);

        return response()->json($brand, Response::HTTP_CREATED);
    }

    public function show(Brand $brand)
    {
        return $brand;
    }

    public function update(Brand $brand)
    {
        $data = \request()->except('img');

        if (\request()->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, \request()->file('img'));
        }

        $oldImg = $brand->img;
        $brand->update($data);

        if (\request()->hasFile('img') && Storage::exists($oldImg)) {
            Storage::delete($oldImg);
        }

        return response()->json($brand);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        if (Storage::exists($brand->img)) {
            Storage::delete($brand->img);
        }

        return response()->json([
            'status' => 204,
            'data' => []
        ]);
    }
}
