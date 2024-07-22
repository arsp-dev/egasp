<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function execute(Request $request)
    {
        // Validate the request
        $request->validate([
            'query' => 'required|string',
        ]);

        // Retrieve the raw SQL query string from the request
        $query = $request->input('query');

        // Execute the raw SQL query
        try {
            $results = DB::select(DB::raw($query));
            return response()->json($results);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
