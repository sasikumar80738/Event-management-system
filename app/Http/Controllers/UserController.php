<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use App\Models\Event;



class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(15); 

        return view('admin.user', compact('data'));
    }

    public function userevent()
    {
        $data = Event::withCount('users')
        ->where('status', 'open')
        ->paginate(15);

return view('userevent', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'usertype' => 'required',
            'password' => 'required',
        ], [
        ]);
        $data = User::create($validatedData);
        return response()->json(['message' => 'Post successfully created', 'data' => $data], 201);

    }
    
    public function edit($id)
    {
        $item = User::find($id);
        return response()->json(['itemm' => $item]);
    }
    
    public function delete($id)
      {
    $item = User::findOrFail($id);
    $item->delete();
    return redirect()->route('user.index');
       }

    public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'usertype' => 'required',
    ]);

    $item = User::findOrFail($id);
    $item->update($validatedData);
    return response()->json(['message' => 'Item updated successfully']);
}

}