<?php

namespace Modules\User\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\User\Entities\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user = User::query();
        if($keyword = request('g')){
            $user->where('name','LIKE',"%{$keyword}%")
                ->orWhere('email','LIKE',"%{$keyword}%")
                ->orWhere('id',"$keyword");
        }

        $users = $user->latest()->paginate(env('PAGINATE_COUNTER'));
        return view('user::admin.all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);



        $user = User::create($validate);

        if($request->has('verify')){

            $user->markEmailAsVerified();
        }
        return redirect(route('user::admin.index'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(User $user)
    {
        return view('user::admin.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore($user->id)],
        ]);

        if(! is_null($request->password)){
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
        }

        $validate['password'] = $request->password;

        $user->update($validate);
        if($request->has('verify')){

            $user->markEmailAsVerified();
        }
    return redirect(route('admin.users.index'));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
