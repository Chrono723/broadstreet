<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderInformation;
use App\HeaderKeywords;
use App\HeaderViewport;
use Request as ajaxCall;
use Laracasts\Utilities\JavaScript\JavaScriptFacade as Javascript;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function checkAuth(){
        $user = null;
        $avatar = null;
        if (Auth::check()){
            if (Auth::user()->avatar()){
                $avatar = Auth::user()->avatar()->get();

            }
            $user = [
                'id' => Auth::user()->id,
                'email' => Auth::user()->email,
                'permission' => Auth::user()->permission,
                'name' => Auth::user()->name,
                'avatar' => $avatar,
            ];
        }
        return $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (ajaxCall::ajax()) {
            return response()->json([
                'user' => $this ->checkAuth()
            ]);
        }
        JavaScript::put([
            'page' => null,
            'user' => $this -> checkAuth(),
        ]);
        return view('home')
            -> with('keywords',     HeaderKeywords::generate()['string'])
            -> with('viewPort',     HeaderViewport::generate()['string'])
            -> with('description',  HeaderInformation::where('is_active', true)->pluck('description')[0])
            -> with('author',       HeaderInformation::where('is_active', true)->pluck('author')[0])
            -> with('icon',         HeaderInformation::where('is_active', true)->pluck('icon')[0]);
    }
}
