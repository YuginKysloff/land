<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function vkAuth(Request $request)
    {
        if (isset($request->error)) {
            dump($request->error);
        } else {
            dump($request->code);
            $result = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id=5968898&client_secret=ZtIYQEcwJRYiG84fwhq1&redirect_uri=http://land.loc/test&code='.$request->code));
            dump($result);

            $user_id = $result->user_id;
            $token = $result->access_token;
            $request_params = array(
                'user_id' => $user_id,
                'fields'       => 'sex, bdate, city, country, home_town, domain, has_mobile, contacts, site, status, last_seen, nickname, personal, about, timezone, screen_name, email',
                'access_token' => $token,
                'v' => '5.63'
            );
            $get_params = http_build_query($request_params);
            $user = json_decode(file_get_contents('https://api.vk.com/method/users.get?'.$get_params));
                dump($user);

//            Auth::loginUsingId(1, FALSE);
//            return redirect('admin');
//            return $this->sendLoginResponse($request);
        }
    }
}
