<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Mahasiswa',
            'data'    => $mahasiswas  
        ], 200);

    }
    
     /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrfail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail data mahasiswa!',
            'data'    => $mahasiswa 
        ], 200);

    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim'   => 'required',
            'nama' => 'required',
            'angkatan' => 'required',
            'semester' => 'required',
            'IPK' => 'required',
            'email' => 'required',
            'telepon' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $Mahasiswa = Mahasiswa::create([
            'nim'     => $request->nim,
            'nama'   => $request->nama,
            'angkatan'   => $request->angkatan,
            'semester'   => $request->semester,
            'IPK'   => $request->IPK,
            'email'   => $request->email,
            'telepon'   => $request->telepon
        ]);

        if($Mahasiswa) {

            return response()->json([
                'success' => true,
                'message' => 'Data mahasiswa berhasil dibuat!',
                'data'    => $Mahasiswa  
            ], 201);

        } 

        return response()->json([
            'success' => false,
            'message' => 'Data mahasiswa gagal dibuat!',
        ], 409);

    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validator = Validator::make($request->all(), [
            'nim'   => 'required',
            'nama' => 'required',
            'angkatan' => 'required',
            'semester' => 'required',
            'IPK' => 'required',
            'email' => 'required',
            'telepon' => 'required',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $mahasiswa = Mahasiswa::findOrFail($mahasiswa->id);

        if($mahasiswa) {

            //update post
            $mahasiswa->update([
                'nim'     => $request->nim,
            'nama'   => $request->nama,
            'angkatan'   => $request->angkatan,
            'semester'   => $request->semester,
            'IPK'   => $request->IPK,
            'email'   => $request->email,
            'telepon'   => $request->telepon
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Data mahasiswa berhasil diubah!',
                'data'    => $mahasiswa  
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Post Not Found',
        ], 404);

    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrfail($id);

        if($mahasiswa) {
            $mahasiswa->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data mahasiswa berhasil dihapus!',
            ], 200);

        }

        return response()->json([
            'success' => false,
            'message' => 'Data mahasiswa tidak ditemukan!',
        ], 404);
    }
}
