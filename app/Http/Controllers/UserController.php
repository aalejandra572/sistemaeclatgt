<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Empresa;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index($search = '')
    {
        $users = User::where('name', 'like', "%$search%")->paginate(15);
        return view('users.index')->with(['users' => $users, 'search' => $search]);
    }

    public function new()
    {
        $roles = Role::all();
        

        

        return view('users.new')
                ->with([
                    'roles' => $roles,
                    
                    
                ]);
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)],
            'password' => ['required', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&\.]/']
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        
        $user->roles()->attach($request->roles);

        return redirect()->route('users.edit', $user)->with(['status' => 'success', 'message' => 'User was successfully created!']);
    }
    
    public function edit(User $user)
{
    $roles = Role::all();
    

    

    

    

    return view('users.edit', [
        'user' => $user,
        'roles' => $roles,
        
        
    ]);
}



    

public function update(Request $request, User $user)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        
    ]);

    $user->name = $request->name;
    $user->lastname = $request->lastname;
    $user->email = $request->email;
    
    $user->save();

    $user->roles()->sync($request->roles ?? []);
    

    

    

    return redirect()->route('users.edit', $user)
                     ->with(['status' => 'success', 'message' => 'User was successfully updated!']);
}



    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'min:8', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&\.]/']
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.edit', $user)
                ->with(['status' => 'success', 'message' => 'Password was successfully updated!']);
    }

    public function delete(User $user)
    {
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index')
            ->with(['status' => 'success', 'message' => 'User was successfully deleted!']);
    }


   




}
