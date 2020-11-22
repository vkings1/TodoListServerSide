<?php

namespace App\Http\Controllers;

use App\Events\Todo;
use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    public function todo()
    {
        $testData = Test::orderBy('id', 'DESC')->get();
        return response()->json($testData);
    }

    public function todoPost(Request $request)
    {
        $dataTest = Test::create([
            'description' => request('description')
        ]);
        event(new Todo($dataTest));
        return response()->json($dataTest);
    }

    public function todoGet($id)
    {
        $dataGet = Test::findOrFail($id);
        return response()->json($dataGet);
    }

    public function todoUpDate($id)
    {

        Test::findOrFail($id)->update([
            'description' => request('description')
        ]);

        $dataGet = Test::findOrFail($id);
        event(new Todo($dataGet));
        return response()->json($dataGet);
    }
    public function todoDelete($id)
    {
        $deleteData = Test::findOrFail($id);
        event(new Todo($deleteData));
        $deleteData->delete();
    }
}
