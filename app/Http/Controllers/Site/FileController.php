<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
Use App\Document;
use App\FormMultipleUpload;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
  public function index()
  {
      if (Auth::check()) {
        $user_id = auth()->user()->id;
        $data = FormMultipleUpload::where('user_id', $user_id)->get();

        return view('site.pages.account.contractor.portfolio', compact('data'));
      }
      return view('site.pages.account.contractor.portfolio');
  }


  public function save(Request $request){
        $validatedData = $request->validate([
          'filename' => 'required',
          'filename.*' => 'image|mimes:jpeg, jpg, png, gif, svg|max:4098',
      ]);

      if($request->hasFile('filename')){
          foreach($request->file('filename') as $image){
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/images/', $name);
            $data[] = $name;
          }
      }
      $upload_model = new FormMultipleUpload;
      $upload_model -> filename = json_encode($data);
      $upload_model -> user_id = auth()->user()->id;
      $upload_model->save();
      return back()->with('success', 'Картинка добавлена');

  }
}
