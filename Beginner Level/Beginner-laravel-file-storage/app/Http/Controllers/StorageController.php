<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = User::select('id', 'name')->whereNotIn('name', function ($query) {
            $query->select('name')->where('name', 'LIKE', '%.pdf');
        })->get()->toArray();
        return view('file-upload', ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:3000'
        ], [
            'file.required' => 'Please select a file',
            'file.mimes' => 'File must be .jpg,.jpeg,.png,.pdf',
            'file.max' => 'File must be lessar than 3 Mb'
        ]);

        /*
            Store the file in the storage/app/private/files directory
            and create a hashed name for security purposes.
        */
        // $path = $request->file('file')->store('files');

        /*
            Store the file in the storage/app/public/images directory
            and create a hashed name for security purposes.
        */

        // $path = $request->file('file')->store('images', 'public');


        /**
         * File Details
         */

        /*

            $file = $request->file('file');

            $data['fileName'] = $file->getClientOriginalName();  // get original file name
            $data['extension'] = $file->getClientOriginalExtension();
            $data['mimeType'] = $file->getClientMimeType();
            $data['baseName'] = $file->getBasename();
            $data['hasName'] = $file->hashName();  // get the encrypted file name
            $data['size'] = $file->getSize();

            return $data;
        */


        $file = $request->file('file');
        if ($file->getClientOriginalExtension() == 'pdf') {
            $path = $request->file('file')->store('documents');
        }

        /**
         * use storeAs() method
         */

        // $fileName = time() . '-' . $file->getClientOriginalName();
        // $path = $request->file('file')->storeAs('images', $fileName, 'public');


        $path = $file->store('images', 'public');


        /**
         * use move() method
         */

        // $file->move(public_path('uploads'), $file->getClientOriginalName());

        /*
            $data['path'] = $path;
            $data['isPresent'] = Storage::exists($path);
            $data['fileName'] = $file->hashName();

            dd($data);

        */

        $user = new User([
            'name' => $path,
            'original_name' => $file->getClientOriginalName()
        ]);

        // for move() method

        /*
        $user = new User([
            'name' => time() . '-' . $file->getClientOriginalName(),
            'original_name' => $file->getClientOriginalName()
        ]);
        */

        $user->save();

        return redirect()->back()->with('success', 'File Uploaded Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $file = User::findOrFail($id);
        return view('file-update', ['file' => $file]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $file = User::find($id);
        if (!$file) {
            return redirect()->back()->with('error', 'File Not Found');
        }

        if (Storage::disk('public')->exists($file->name)) {
            Storage::disk('public')->delete($file->name);
        }

        $newFile = $request->file('file');
        $path = $newFile->store('images', 'public');
        $file->name = $path;
        $file->original_name = $newFile->getClientOriginalName();
        $file->save();


        return redirect('/file')->with('success', 'File Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $file = User::find($id);
        if (!$file) {
            return redirect()->back()->with('error', 'File Not Found');
        }
        $file->delete();

        if (Storage::disk('public')->exists($file->name)) {
            Storage::disk('public')->delete($file->name);
        }

        return redirect()->back()->with('success', 'File Deleted Successfully');
    }
}
