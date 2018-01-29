<?php

namespace App\Http\Controllers\Api;

use Auth;
use App\Transformers\UserTransformer;
use Hash;
// use BrowserDetect;
use Illuminate\Http\Request;

use App\Http\Requests;

class MeController extends ApiController
{
    protected $user;
    protected $useragent;

    /**
     * CategoriesController constructor.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('timeout');

//        $this->middleware('authorized:manage-category,categories', ['except' => ['index', 'show']]);
//        $this->user = $request->user();
        $this->user = Auth::user();
        $this->useragent = $request->header('User-Agent');
    }

    /**
     * Display the specified resource.
     * @return \Response
     */
    public function show()
    {
        return $this->respondWith($this->user, new UserTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request)
    {
        //check that user has provided his current password
        if($request->has('password') && Hash::check($request->get('password'), $this->user->password)){
            $this->validate($request, [
                'email' => 'email|max:255|unique:users,email,'.$this->user->id,
                'username' => 'max:50|unique:users,username,'.$this->user->id,
                'name' => 'max:255',
                'new_password' => 'min:6|confirmed'
            ]);

            $this->user->fill($request->all());
            
            if($request->get('new_password')){
                $this->user->password = bcrypt($request->get('new_password'));
            }

            $this->user->save();

            LogsController::saveLog('users', 'update(更新)', $request->ip(), $this->useragent);
            return $this->respondWith($this->user, new UserTransformer);
        } else {
            return $this->errorUnauthorized('無效的密碼!');
        }
    }
}
