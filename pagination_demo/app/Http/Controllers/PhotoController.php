<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('image_index', compact('photos'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $image = $request->file('image');

        $file = $request->file('image')->getClientOriginalName();

        $fileName = time() . $file;

        $publicPath = public_path('/images/');

        $image->move($publicPath, $fileName);

        $photo = Photo::create([
            'photo_name' => $file,
            'path'       => $fileName
        ]);

        return redirect()->route('photo.create')->with('success', 'Image Uploaded Successfully');
    }

    public function edit($id)
    {
        $photo = Photo::findOrFail($id);
        return view('edit', compact('photo'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $id = $request->id;

        $image = $request->file('image');

        $file = $request->file('image')->getClientOriginalName();

        $fileName = time() . $file;

        $publicPath = public_path('/images/');

        $image->move($publicPath, $fileName);

        Photo::where('id', $id)->update([
            'photo_name' => $file,
            'path'       => $fileName
        ]);

        return redirect()->back()->with('success', 'Image Updated Successfully');
    }

    public function delete($id)
    {
        $photo = Photo::findOrFail($id)->delete();
        return redirect()->route('photo.index');
    }
}
