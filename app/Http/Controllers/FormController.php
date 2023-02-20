<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Validation\Rule;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.index');
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
            'email' => 'required|email|unique:forms',
            'name' => 'required',
            'password' => 'min:8',
            'confirm_password' => 'required_with:password|same:password|min:8',
            'address_line_1' => 'required',
            'country' => 'required',
            'job_title' => 'required',
            'zip_code' => 'required',
            'profile_image' => 'required',
        ]);
        $addNew = new Form();
        $addNew->email = $request->email;
        $addNew->name = $request->name;
        $addNew->password = Hash::make($request->password);
        $addNew->address_line_1 = $request->address_line_1;
        $addNew->address_line_2 = $request->address_line_2;
        $addNew->city = $request->city;
        $addNew->zip_code = $request->zip_code;
        $addNew->country = $request->country;
        $addNew->job_title = $request->job_title;
        $addNew->job_description = $request->job_description;
        if($request->hasFile('profile_image')){
            $file = $request->profile_image;
            $extension = $file->getClientOriginalExtension();
            $fileName = hexdec(uniqid()).'.'.$extension;
            $file->move('assets/images/profileImages', $fileName);
            $addNew->profile_image = $fileName;
        }
        if($request->hasFile('document')){
            $file = $request->document;
            $extension = $file->getClientOriginalExtension();
            $fileName = hexdec(uniqid()).'.'.$extension;
            $file->move('assets/documents', $fileName);
            $addNew->document = $fileName;
        }
        $addNew->save();
        return redirect()->route('form.allData')->with('success', 'New Info Added Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function allData(){
        $informations = Form::orderBy('id', 'desc')->get();
        return view('pages.allInfo', compact('informations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editdata($id)
    {
        $data = Form::find($id);
        return view('pages.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateData(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',Rule::unique('forms')->ignore($id),
            'name' => 'required',
            'address_line_1' => 'required',
            'country' => 'required',
            'job_title' => 'required',
            'zip_code' => 'required',
        ]);
        $update = Form::find($id);
        $update->email = $request->email;
        $update->name = $request->name;

        $update->address_line_1 = $request->address_line_1;
        $update->address_line_2 = $request->address_line_2;
        $update->city = $request->city;
        $update->zip_code = $request->zip_code;
        $update->country = $request->country;
        $update->job_title = $request->job_title;
        $update->job_description = $request->job_description;
        if($request->hasFile('profile_image')){
            $oldFile = asset('assets/images/profileImages/'.$update->profile_image);
            if(File::exists(public_path($oldFile))){
                File::delete(public_path($oldFile));
            }
            $file = $request->profile_image;
            $extension = $file->getClientOriginalExtension();
            $fileName = hexdec(uniqid()).'.'.$extension;
            $file->move('assets/images/profileImages', $fileName);
            $update->profile_image = $fileName;
        }
        if($request->hasFile('document')){
            $oldFile = asset('assets/documents/'.$update->document);
            if(File::exists(public_path($oldFile))){
                File::delete(public_path($oldFile));
            }
            $file = $request->document;
            $extension = $file->getClientOriginalExtension();
            $fileName = hexdec(uniqid()).'.'.$extension;
            $file->move('assets/documents', $fileName);
            $update->document = $fileName;
        }
        $update->update();
        return redirect()->route('form.allData')->with('success', 'New Info Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = Form::find($id);
        $oldProfileImage = asset('assets/images/profileImages/'.$deleteData->profile_image);
        if(File::exists(public_path($oldProfileImage))){
            File::delete(public_path($oldProfileImage));
        }
        $oldDocument = asset('assets/documents/'.$deleteData->document);
        if(File::exists(public_path($oldDocument))){
            File::delete(public_path($oldDocument));
        }
        $deleteData->delete();
        return redirect()->route('form.allData')->with('success', 'New Info Deleted Successfully');
    }
}
