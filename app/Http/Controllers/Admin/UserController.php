<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Validation\Rule;

class userController extends Controller
{
    public function index(){
        $users = User::with(['country','role'])->get();
        return view('admin.users.index',compact('users')); 
        
    }
    public function toggleBlock($id){
        $user = User::findOrFail($id);

        $user->is_locked  =!$user-> is_locked;
        if(!$user-> is_locked){
            $user->NOFA = 0;
        }
        $user->save();

        $status= $user ->  is_locked ? 'blocked':'unblocked';
        return redirect()->back()->with('status',"User has been {$status} successfully.");
    }

    public function show (User $user){
        return view('admin.users.show',compact('user'));
    }

    public function edit(User $user){
        $countries = Country::all();
        $roles = Roles::all();
        return view('admin.users.edit',compact('user','roles', 'countries'));

    }

    // public function update(Request $request, User $user){
    //     $request->validate([
    //         'name'=>'required|string|max:255',
    //         'email'=>'required|string|email|max:255|unique:users,email',
    //         'role_id'=>'required|exists:roles,id',
    //         'age'=>'required|integer',
    //         'country_id' => 'required|exists:countries,id',
    //     ]);
    //     $user->update($request->all());
    //     return redirect()->route('admin.users.index')->with('success','User updated successfully.');

    // }
    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',

        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore($user->id),
        ],

        'role_id' => 'required|exists:roles,id',
        'age' => 'required|integer',
        'country_id' => 'required|exists:countries,id',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role_id' => $request->role_id,
        'age' => $request->age,
        'country_id' => $request->country_id,
    ]);

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'User updated successfully.');
}

public function destroy(User $user){
    $user->delete();
    return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
}
}
