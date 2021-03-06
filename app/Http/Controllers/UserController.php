<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Hash;
use App\Role;
use Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
    	$listUser = User::with('roles');
        if($request->search) {
            $listUser = $listUser->where('name', 'LIKE', '%'.$request->search.'%')
                                        ->orWhere('email', 'LIKE', '%'.$request->search.'%')
                                        ->orWhere('role_id', 'LIKE', '%'.$request->search.'%');
        } 
        if($request->role) {
            $listUser->where('role_id', $request->role);
        }
        $listUser = $listUser->orderBy('id', 'DESC')->paginate(10);
        $roles = Role::all();
    	return view('admin.user.index', compact('listUser', 'roles'));
    }

    public function create()
    {
    	$roles = Role::all();
    	return view('admin.user.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
    	// $data = $request->except('_token');
    	// $data = $request->all();
    	// $user = User::create($data);

    	$userCreate = User::create([
			'name'      => $request->name,
			'email'     => $request->email,
			'password'  => Hash::make($request->password),
			'telephone' => $request->telephone,
			'address'   => $request->address,
			'role_id'   => $request->role_id,
			'gender'    => $request->gender
    	]);
    	return redirect()->route('user-list')->with(['type_message' => 'success', 'flash_message' => 'Success ! Complete add user.']);
    }

    public function edit($id)
    {
    	$roles = Role::all();
    	$user = User::find($id);
    	if ((Auth::user()->role_id == 2) && ($user->role_id == 1 || ($user->role_id == 2 && (Auth::user()->id != $id)))) {
    		return redirect()->route('user-list')->with(['type_message' => 'danger', 'flash_message' => 'Sorry ! You can\'t edit user.']);
    	} 
    	return view('admin.user.edit', compact('user', 'roles', 'id'));
    }

    public function update(Request $request, $id)
    {
    	// Validate password
		$this->validate($request,
			[
                're-password' => 'required|same:password',
                'password' => 'required'
            ],
			[
                're-password.same' => 'Mật khẩu không giống nhau !',
                're-password.required' => 'Vui lòng nhập lại mật khẩu.',
                'password.required' => 'Vui lòng nhập mật khẩu'
            ]
		);
		// Update data user
		$user = User::find($id);
		$data = $request->except('_token');
		$data = $request->only('name', 'email', 'telephone', 'address', 'gender', 'role_id');		
		$user->update($data);
		// Encode password
		$user->password = Hash::make($request->password);
		$user->save();

		return redirect()->route('user-list')->with(['type_message' => 'success', 'flash_message' => 'Success ! Complete edit user.']);
    }

    public function delete($id)
    {
    	$user_login = Auth::user()->id;
    	$user = User::find($id);
    	if ((Auth::user()->role_id == 2) && ($user->role_id == 1 || ($user->role_id == 2 && (Auth::user()->id != $id))) || $user->role_id == 1) {
    		return redirect()->route('user-list')->with(['type_message' => 'danger', 'flash_message' => 'Sorry ! You can\'t delete user.']);
    	} else {
    		$user->delete();
    		return redirect()->route('user-list')->with(['type_message' => 'success', 'flash_message' => 'Success ! Complete delete user.']);
    	}
    }
}
