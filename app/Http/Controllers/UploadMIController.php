<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\MainImage;
use Illuminate\Support\Facades\File;

class UploadMIController extends Controller
{
    public function upload()
    {
        $mainimage = MainImage::get();
        return view('dashboard.main-image.upload', [
            'mainimage' => $mainimage,
            'page_title' => 'Dashboard | Image',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
        return view('home', [
            'mainimage' => $mainimage,
            'page_title' => 'Dashboard | Image',
            'profile' => Profile::get()
        ]);
    }

    public function proses_upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        MainImage::create([
            'file' => $nama_file,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('succes', 'Image Data Has Been Added!');
    }
    public function hapus($id)
    {
        // hapus file
        $mainimage = MainImage::where('id', $id)->first();
        File::delete('data_file/' . $mainimage->file);

        // hapus data
        MainImage::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Image Data Has Been Deleted!');
    }
}
