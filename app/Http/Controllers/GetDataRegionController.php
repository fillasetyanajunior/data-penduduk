<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class GetDataRegionController extends Controller
{
    public function getKabupaten($id)
    {
        $kabupaten = Regency::where('province_id', $id)->get();
        return response()->json($kabupaten);
    }
    public function getKecamatan($id)
    {
        $kecamatan = District::where('regency_id', $id)->get();
        return response()->json($kecamatan);
    }
    public function getDesa($id)
    {
        $desa = Village::where('district_id', $id)->get();
        return response()->json($desa);
    }
}
