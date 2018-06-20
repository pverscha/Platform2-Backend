<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Output\ConsoleOutput;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = DB::table('images')->orderByDesc('created_at')->simplePaginate(60);
        return view('backend.pages.image.index', ['images' => $images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: Implement checks for all required input parameters
        foreach($request->file('files') as $file) {
            $filename = $file->store('uploads/images', 'public');
            $image = new Image();
            $image->filename = $filename;
            $image->name = $file->getClientOriginalName();
            $image->save();
        }

        return url()->route('backend/image/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO implement correct!
        return view('backend.pages.image.index');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = Image::find($id);
        // TODO this 'storage/' prepend should not be necessary
        $imgPath = public_path('storage/' . $img->filename);
        File::delete($imgPath);
        if (File::exists($imgPath)) {
            return redirect()->route('backend/image/index')->withErrors(['not_deleted_error' => 'File ' . $img->name . ' could not be deleted! Please try again...']);
        }
        Image::destroy($id);
        return redirect()->route('backend/image/index');
    }

    /**
     * Prepare an HTTP response based on the given image model. This method returns JSON if needed or an HTML view
     * otherwise.
     *
     * @param Image $img
     * @return \Illuminate\Http\Response
     */
    private function convertImageToRequest(Image $img) {

    }
}
