<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\KeteranganOptional;
use App\Models\KonsultanPengawas;
use App\Models\LapHarian;
use App\Models\Owner;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ScopeWork;
use App\Models\TenagaKerja;
use App\Models\TypeWork;
use App\Models\Material;
use App\Models\Unit;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Format;
// use SebastianBergmann\CodeCoverage\Report\Xml\Project;


class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard');
    }
    // project

    public function admin_project()
    {
        $project = Project::get();
        $konsultan_pengawas = KonsultanPengawas::get();
        $konsultan_pengawas2 = KonsultanPengawas::get();
        $owner = Owner::get();
        $owner2 = Owner::get();
        $kontraktor = KonsultanPengawas::get();
        $kontraktor2 = KonsultanPengawas::get();

        return view('pages.project', compact(
            'project',
            'konsultan_pengawas',
            'konsultan_pengawas2',
            'owner',
            'owner2',
            'kontraktor',
            'kontraktor2'
        ));
    }

    public function tambah_project(Request $request)
    {

        DB::beginTransaction();

        try {

            // dd($request->all());    
            $project = Project::create([
                'kode_project' => $request->kode_project,
                'nama_project' => $request->nama_project,
                'konsultan_pengawas_id' => $request->konsultan_pengawas_id,
                'owner_id' => $request->owner_id,
                'kontraktor_pelaksana_id' => $request->kontraktor_pelaksana_id,
            ]);

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'project berhasil ditambahkan'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function edit_project(Request $request, $id)
    {

        $partner = Project::find($id);
        $data = [
            'kode_project' => $request->kode_project,
            'nama_project' => $request->nama_project,
            'konsultan_pengawas_id' => $request->konsultan_pengawas_id,
            'owner_id' => $request->owner_id,
            'kontraktor_pelaksana_id' => $request->kontraktor_pelaksana_id,

        ];

        Project::where('id', $id)->update($data);
        return response()->json([
            'status'  => 1,
            'message' => 'Data project berhasil diupdate'
        ]);
    }
    public function project_destroy(Project $project)
    {
        DB::beginTransaction();

        try {
            // hapus data
            $project->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data project berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // lapharian
    public function admin_lapharian($id)
    {
        // dd($id);
        $project = Project::findOrFail($id);
        $lapharian = LapHarian::where('project_id', $id)->get();
        return view('pages.lapharian.lapharian', compact('lapharian', 'project'));
    }
    public function haltambah_lapharian()
    {
        $scope_work = ScopeWork::get();
        $type_work = TypeWork::get();
        $tenaga_kerja = TenagaKerja::get();
        $alat = Alat::get();
        $material = Material::get();
        $unit = Unit::get();
        return view('pages.lapharian.tambah', compact(
            'scope_work',
            'type_work',
            'tenaga_kerja',
            'alat',
            'material',
            'unit'
        ));
    }
}
