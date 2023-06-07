<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Barangay;
use App\Models\Province;
use App\Models\Municipality;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function region()
    {
        $regions = Region::all();

        return response()->json($regions);
    }

    public function province($regionId)
    {
        $provinces = Province::where('region_id', $regionId)->get();

        return response()->json($provinces);
    }

    public function municipality($provinceId)
    {
        $municipalities = Municipality::where('province_id', $provinceId)->get();

        return response()->json($municipalities);
    }

    public function barangay($municipalityId)
    {
        $barangays = Barangay::where('municipality_id', $municipalityId)->get();

        return response()->json($barangays);
    }
}
