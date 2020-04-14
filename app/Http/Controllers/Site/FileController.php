<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use App\Document;
use App\Models\FormMultipleUpload;
use App\Models\PortfolioLink;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
  public function index()
  {
        $user = auth()->user();
        $accountPage = 'tenders';
        $user_id = $user->id;
        $data = FormMultipleUpload::where('user_id', $user_id)->get();
        $data_link = PortfolioLink::where('user_id', $user_id)->get();
        return view('site.pages.account.contractor.portfolio', compact('data', 'data_link', 'user', 'accountPage'));
  }





  public function save(Request $request){

        $user = auth()->user();
        $validationMessages = [
            'filename.*' => 'Файл должен быть картинкой',

        ];

        $validatedData = Validator::make($request->all(), [
          'filename' => 'required',
          'filename.*' => 'image|max:4098',
      ], $validationMessages)->validate();

      if($request->hasFile('filename')){
          foreach($request->file('filename') as $image){
            $name = $image->getClientOriginalName();
            $image->move(public_path().'/images/portfolio/portfolio_contractor', $name);
            $data[] = $name;
          }
      }
      $upload_model = new FormMultipleUpload;
      $upload_model -> project_name = $request -> project_name;
      $upload_model -> filename = json_encode($data);
      $upload_model -> user_id = $user->id;
      $upload_model->save();
      return redirect()->route('site.account.portfolio')->with('account.success', 'Файлы успешно добавлены');


  }

  public function save_link(Request $request){
    $user = auth()->user();
    $validationMessages = [
        'link_name' => 'Введите название ссылки',
        'link' => 'Введите ссылку',

    ];

    $validatedData = Validator::make($request->all(), [
      'link_name' => 'required',
      'link' => 'required',
    ], $validationMessages)->validate();

    $write_link = new PortfolioLink;
    $write_link -> project_name = $request-> link_name;
    $write_link -> link = $request -> link;
    $write_link -> user_id = $user->id;
    $write_link -> save();
    return redirect()->route('site.account.portfolio')->with('account.success', 'Ссылка успешно добавлена');
  }

  }
