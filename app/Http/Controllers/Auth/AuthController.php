<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App\Events\UserWasRegistered;
use Illuminate\Support\Facades\Auth;
use App\AccountToken;
use App\ApiResponse;
use Log;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    /**
     * @var string
     */
    protected $redirectTo = '/api/v1/users';

    protected $response;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->response = new ApiResponse();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_verified' => '0',
        ]);
    }

    public function validateEmail($token)
    {
        $account_token = AccountToken::where('token', $token)->firstOrFail();
        $user = User::where('id', $account_token->user_id)->first();
        $expire_at = $account_token->expire_at;

        //if the token expired
        if (strtotime(date('c')) > strtotime($expire_at))
        {
            return response()->json(['error' => 'expired_token'], 401);
        }

        if($user->email_verified == '0') {
            $user->email_verified = 1;
            $user->save();
        }

        return response()->json(['error' => '', 'data' => 'email_verified'], 200);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        try {
            if ($validator->fails()) {
                return $this->response->sendValidationError($validator->errors());
            }

            $user = $this->create($request->all());
            $expire_at = date('Y-m-d', strtotime('+7 day'));

            \Event::fire(new UserWasRegistered($user, $expire_at, AccountToken::VERIFY_VIEW, AccountToken::VERIFY));
            return $this->response->send();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return $this->response-errorInternalError();
        }
    }
}
