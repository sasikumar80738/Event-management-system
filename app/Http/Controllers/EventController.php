<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\event_accept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class EventController extends Controller
{
    public function index()
    {
        $data = Event::withCount('users')
                     ->where('status', 'open')
                     ->paginate(15);
    
        return view('admin.event', compact('data'));
    }
    
    public function admindashboard(){
        $data = Event::withCount('users')
        ->where('status', 'completed')
        ->paginate(15);

        return view('admin.dashboard', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'event_date_time' => 'required',
            'location' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ], [
        ]);
        $validatedData['status'] = 'open';

        $data = Event::create($validatedData);
        return response()->json(['message' => 'Event successfully created', 'data' => $data], 201);

    }
    
    public function edit($id)
    {
        $item = Event::find($id);
        return response()->json(['itemm' => $item]);
    }
    
    public function delete($id)
      {
    $item = Event::findOrFail($id);
    $item->delete();
    return redirect()->route('event.index');
       }

    public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
            'name' => 'required',
            'event_date_time' => 'required|date_format:Y-m-d\TH:i',
            'location' => 'required',
            'location' => 'required',
            'latitude' => 'required',
            'status' => 'required',
    ]);
    $validatedData['status'] = 'open';

    $item = Event::findOrFail($id);
    $item->update($validatedData);
    return response()->json(['message' => 'Item updated successfully']);
}

public function show($id)
{
    // Fetch the event details
    $event = Event::findOrFail($id);

    // Fetch users and their proof files associated with the event using raw SQL query
    $users = DB::table('users')
                ->join('event_accepts', 'users.id', '=', 'event_accepts.user_id')
                ->where('event_accepts.event_id', $id)
                ->select('users.*', 'event_accepts.proof')
                ->get();

    return view('admin.show_users', compact('event', 'users'));
}

public function event_complete($id){
    $item = Event::findOrFail($id);
    $update = DB::table('events')->where('id', $id)->update(['status' => 'completed']);
    return redirect()->route('event.index');
}

public function bulkParticipate(Request $request)
{
    $request->validate([
        'event_ids' => 'required|array',
        'event_ids.*' => 'exists:events,id',
        'proof' => 'required|mimes:pdf|max:2048', 
    ]);

    $user_id = auth()->id(); 
    if ($request->hasFile('proof')) {
        $file = $request->file('proof');
        $filename = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('proofs', $filename, 'public');

        foreach ($request->event_ids as $event_id) {
            $exists = DB::table('event_accepts')
                        ->where('user_id', $user_id)
                        ->where('event_id', $event_id)
                        ->exists();

            if (!$exists) {
                DB::table('event_accepts')->insert([
                    'user_id' => $user_id,
                    'event_id' => $event_id,
                    'proof' => $filePath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'You have successfully participated in the selected events.');
    }

    return redirect()->back()->with('error', 'Failed to upload proof.');
}



}
