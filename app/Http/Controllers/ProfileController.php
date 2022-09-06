<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $profiles = Profile::all()->sortByDesc('updated_at');

        if (count($profiles) > 0) {
            $headline = $profiles->shift();
        } else {
            $headline = null;
        }

        // rofile/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 profiles、という変数を渡している
        return view('profile.index', ['headline' => $headline, 'profiles' => $profiles]);
    }
}
