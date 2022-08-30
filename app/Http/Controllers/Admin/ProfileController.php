<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Profile;

class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        // Varidationを行う
        $this->validate($request, Profile::$rules);
        $Profile = new Profile;
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $Profile->fill($form);
        $Profile->save();

        return redirect('admin/profile/create');
    }


    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != '') {
            $posts = Profile::where('name', $cond_name)->get();
        } else {
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }

  public function edit()
    {
        // Profile Modelからデータを取得する
        $Profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);    
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }

    public function update()
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // Profile Modelからデータを取得する
        $Profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();

        unset($profile_form['remove']);
        unset($profile_form['_token']);
        
        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        return redirect('admin/profile');        
                
        // return redirect('admin/profile/edit');
    }
    
  public function delete(Request $request)
  {
      // 該当するProfile Modelを取得
      $Profile = $Profile::find($request->id);
      // 削除する
      $Profile->delete();
      return redirect('admin/$Profile/');
  }    
    
}
