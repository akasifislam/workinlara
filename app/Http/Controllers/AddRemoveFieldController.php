<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddRemoveFieldController extends Controller
{
    public function index() 
    {
        return view("add-remove-input-fields");
    }
    public function store(Request $request) {
 
       $data = [];
 
        foreach($request->input('title') as $key => $value) {
            $data["title.{$key}"] = 'required';
        }
 
        $validator = Validator::make($request->all(), $data);
 
        if ($validator->passes()) {
 
            foreach($request->input('title') as $key => $value) {
                Todo::create(['title'=>$value]);
            }
 
            return response()->json(['success'=>'true']);
        }
 
        return response()->json(['error'=>$validator->errors()->all()]);
  }
}
