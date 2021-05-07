<?php

namespace App\Http\Controllers;

use App\Http\Requests\QueryUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(QueryUserRequest $request)
    {   
        $this->authorize('index', User::class);
        $query = User::query();

        if($request->filter){
            $query = $query
                ->where('first_name', 'like', '%'.$request->filter.'%')
                ->orWhere('last_name', 'like', '%'.$request->filter.'%')
                ->orWhere('title', 'like', '%'.$request->filter.'%');
        }
        if($request->sort){
            $query = $query->orderBy($request->sort);
        }
        return response()->json($query->paginate(Config::get('employees.per_page', 10)));
    }


    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', User::class);
        $validated = $request->validated();
        $validated['password'] = Hash::make(config('DEFAULT_PASSWORD', "changeme123"));
        $validated['role'] = 'user';
        User::create($validated);
        
    }


    public function show($user)
    {
        $user = User::with('articles')->findOrFail($user);
        $this->authorize('view', $user);
        return response()->json($user);
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $this->authorize('update', $user);
        $user->update($request->validated());
    }


    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
    }
    
}
