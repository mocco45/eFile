<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function index(){
        $files = Files::all();
        return view('pages.tables', ['files' => $files]);
    }

    public function store(Request $request){
        
        $lastSubmission = Files::orderBy('file_no', 'desc')->first();
        
        if ($lastSubmission) {
            $lastFileName = $lastSubmission->file_no;
            $lastIncrement = (int)substr($lastFileName, 4);
            $nextIncrement = $lastIncrement + 1;
        } else {
            $nextIncrement = 1;
        }
    
        $nextFileName = 'kog/' . str_pad($nextIncrement, 4, '0', STR_PAD_LEFT);
    
        // Create a new submission record
        $submission = new Files();
        $submission->file_no = $nextFileName;
        $submission->firstName = $request->firstName;
        $submission->lastName = $request->lastName;
        $submission->phone = $request->phone;
        $submission->save();

        return redirect()->back();
        
        
    }

    public function update(Files $file, Request $request){

        $data = $request->all();

        $file->update($data);

        $files = Files::all();

        return redirect()->back();

    }

    public function destroy(Files $file){
        $file->delete();

        return redirect()->back();
    }
}
