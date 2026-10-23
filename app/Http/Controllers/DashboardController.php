<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\AlatInput;
use App\Models\Cuaca;
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
use App\Models\MaterialInput;
use App\Models\SowInput;
use App\Models\TenagaKerjaInput;
use App\Models\TworkInput;
use App\Models\Unit;
use App\Models\Dokumentasi;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Format;
use Barryvdh\DomPDF\Facade\Pdf;
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
    public function haltambah_lapharian($id)
    {
        $scope_work = ScopeWork::get();
        $type_work = TypeWork::get();
        $tenaga_kerja = TenagaKerja::get();
        $alat = Alat::get();
        $material = Material::get();
        $unit = Unit::get();
        $project_id = $id;
        return view('pages.lapharian.tambah', compact(
            'scope_work',
            'type_work',
            'tenaga_kerja',
            'alat',
            'material',
            'project_id',
            'unit'
        ));
    }

    public function tambah_lapharian(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            // dd($request->all());
            $lapharian = LapHarian::create([
                'project_id' => $request->project_id,
                'nomor' => $request->nomor,
                'tanggal' => $request->tanggal,
                'sisa_waktu' => $request->sisa_waktu,
                'konsultan_pengawas_id' => $request->konsultan_pengawas_id,
                'keterangan' => $request->input('keta'),
                'instruksi_catatan' => $request->input('ic'),
                'status' => 1,
            ]);
            $lapharian_id =  $lapharian->id;
            // sow
            foreach ($request->sow_id as $key => $itemId) {
                SowInput::create([
                    'lap_harian_id' =>  $lapharian_id,
                    'sow_id'     => $itemId
                ]);
            }

            foreach ($request->type_work_id as $key => $itemId) {
                TworkInput::create([
                    'lap_harian_id' =>  $lapharian_id,
                    'type_work_id'     => $itemId
                ]);
            }

            foreach ($request->tenaga_kerja_id as $key => $itemId) {
                TenagaKerjaInput::create([
                    'lap_harian_id' =>  $lapharian_id,
                    'tenaga_kerja_id'     => $itemId,
                    'jumlah'     => $request->jumlah_tenaga_kerja[$key]
                ]);
            }
            foreach ($request->alat_id as $key => $itemId) {
                AlatInput::create([
                    'lap_harian_id' =>  $lapharian_id,
                    'alat_id'     => $itemId,
                    'unit_id'     => $request->unit_id_alat[$key],
                    'jumlah'     => $request->jumlah_alat[$key]
                ]);
            }
            foreach ($request->material_id as $key => $itemId) {
                MaterialInput::create([
                    'lap_harian_id' =>  $lapharian_id,
                    'material_id'     => $itemId,
                    'unit_id'     => $request->unit_id_material[$key],
                    'jumlah'     => $request->jumlah_material[$key]
                ]);
            }
            foreach ($request->remarko as $key => $itemId) {
                KeteranganOptional::create([
                    'lap_harian_id' =>  $lapharian_id,
                    'remark'     => $itemId
                ]);
            }

            Cuaca::create([
                'lap_harian_id' =>  $lapharian_id,
                'pagi' => $request->cuaca_pagi,
                'siang' => $request->cuaca_siang,
                'sore' => $request->cuaca_sore,
                'malam' => $request->cuaca_malam
            ]);
            DB::commit();

            return response()->json([
                'status' => 1,
                'message' => 'Laporan harian berhasil ditambahkan',
                'redirect' => route('HalamanAdminlapharian', [
                    'id' => $request->project_id
                ])
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }


    // foto
    public function halfoto_lapharian($id)
    {
        $lap_harian = LapHarian::findorFail($id);
        $foto = Dokumentasi::where('lap_harian_id', $id)->get();
        return view('pages.lapharian.foto', compact('lap_harian', 'foto'));
    }

    // upload foto
    public function upload_foto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lap_harian_id' => 'required|exists:lap_harian,id',
            'foto'          => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $thumbnail = $request->file('foto');
        $thumbnailPath = null;

        try {
            // Ambil nama asli foto
            $originalName = pathinfo(
                $thumbnail->getClientOriginalName(),
                PATHINFO_FILENAME
            );

            // Bersihkan nama file
            $originalName = preg_replace(
                '/[^A-Za-z0-9_-]/',
                '-',
                $originalName
            );

            // Buat nama file unik
            $thumbnailName = uniqid() . '_foto_' . $originalName . '.webp';

            // Folder penyimpanan foto dokumentasi
            $destination = public_path('inputan/dokumentasi/');

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            // Inisialisasi Intervention Image
            $manager = new ImageManager(new Driver());

            $image = $manager->decode($thumbnail->getPathname());

            // Resize maksimal 1920 x 1920 px
            $image->scaleDown(
                width: 1920,
                height: 1920
            );

            // Konversi ke WebP kualitas 80
            $encoded = $image->encode(
                new WebpEncoder(quality: 80)
            );

            // Simpan gambar
            $encoded->save($destination . $thumbnailName);

            // Path relatif yang disimpan ke database
            $thumbnailPath = 'inputan/dokumentasi/' . $thumbnailName;

            // Simpan data dokumentasi
            $dokumentasi = Dokumentasi::create([
                'lap_harian_id' => $request->lap_harian_id,
                'foto'          => $thumbnailPath,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Foto dokumentasi berhasil diunggah.',
                'data' => [
                    'id'            => $dokumentasi->id,
                    'lap_harian_id' => $dokumentasi->lap_harian_id,
                    'foto'          => $dokumentasi->foto,
                    'url'           => asset($dokumentasi->foto),
                ],
            ], 201);
        } catch (\Throwable $e) {
            // Hapus file jika proses penyimpanan gagal
            if ($thumbnailPath && file_exists(public_path($thumbnailPath))) {
                unlink(public_path($thumbnailPath));
            }

            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Gagal memproses atau menyimpan foto dokumentasi.',
            ], 500);
        }
    }

    public function hapus_foto(Dokumentasi $dokumentasi)
    {
        DB::beginTransaction();

        try {
            // hapus data
            $dokumentasi->delete();

            DB::commit();

            return response()->json([
                'status'  => 1,
                'message' => 'Data dokumentasi berhasil dihapus'
            ]);
        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status'  => 0,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function lapharian_destroy(LapHarian $lapharian)
    {
        try {
            DB::transaction(function () use ($lapharian) {

                // Pastikan record utama ditemukan
                if (!$lapharian->exists) {
                    throw new \RuntimeException('Data laporan harian tidak ditemukan.');
                }

                // Hapus data relasi
                $lapharian->keteranganOptional()->delete();
                $lapharian->tenagaKerjaInputs()->delete();
                $lapharian->alatInputs()->delete();
                $lapharian->materialInputs()->delete();
                $lapharian->cuaca()->delete();
                $lapharian->sow_inputs()->delete();
                $lapharian->twork_inputs()->delete();

                // Hapus marker dan dokumentasi
                $lapharian->dokumentasi()->get()->each(function ($item) {
                    $item->delete();
                });

                // Hapus data utama
                $deleted = $lapharian->delete();

                if (!$deleted) {
                    throw new \RuntimeException(
                        'Data laporan harian gagal dihapus.'
                    );
                }
            });

            return response()->json([
                'status' => 1,
                'message' => 'Data laporan harian berhasil dihapus.'
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'status' => 0,
                'message' => 'Gagal menghapus data laporan harian.',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }
    public function cetak_pdf()
    {
        $pdf = Pdf::loadView('pdf.laporan-harian-statis')
            ->setPaper('a4', 'landscape');

        return $pdf->stream('laporan-harian.pdf');
    }
}
