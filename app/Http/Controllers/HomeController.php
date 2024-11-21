<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $activity = new Activity;
        $data = $activity->all();
        return view('home', compact('data'));
    }
    function add() {
        return view('add');
    }
    function store(Request $request){
        $request->validate([
            'activity_name' => 'required|min:4|max:20'
        ],[
            'activity_name.required' => 'activity kudu di isi',
            'activity_name.min' => 'minimal panjangna 4 meter',
            'activity_name.max' => 'maximal panjang na 20 kilometer'
            // 'activity_name.alpha' => 'activityna jenis string'
        ]);

        $activity = new Activity;
        $activity->activity_name = $request->activity_name;
        $activity->save();

        // $activity->create(
        //     'activity_name' => $request->activity_name
        // ]);

        return redirect('/')->with('success', 'Activity ges ditambahkeun');
    }
    function destroy($id) {
        $activity = new Activity;
        $data = $activity->find($id);
        $data->delete();
        return redirect('/')->with('success', 'Activity ges dihapus');
    }

    function update(Request $request, string $id ) {
        $request->validate([
            'activity_name' => 'required|min:4|max:20'
        ],[
            'activity_name.required' => 'activity kudu di isi',
            'activity_name.min' => 'minimal panjangna 4 meter',
            'activity_name.max' => 'maximal panjang na 20 kilometer'
            // 'activity_name.alpha' => 'activityna jenis string'
        ]);

        $activity = new Activity;
        $data = $activity->find($id);
        $data->activity_name = $request->activity_name;
        $data->save();
        return redirect("/")->with('success', 'activity ges diupdate');
    }

    function show(string $id) {
        $activity = new Activity;
        $data = $activity->find($id);
        if (!isset($data)) {
            return abort(404, 'activity not found');
        }
        return view('update', compact('data'));
    }
}
