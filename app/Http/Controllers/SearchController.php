<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $model = $request->get('model');
        $searchTerm = $request->get('search');

        $models = [
            'patients' => ['name', 'id_number', 'phone'],
            'departments' => ['name'],
            'users' => ['name', 'email', 'phone', 'id_number'],
        ];

        if (!array_key_exists($model, $models)) {
            return response()->json(['error' => 'Invalid model specified.'], 400);
        }

        if ($model == 'patients') {
            $modelClass = 'App\\Models\\' . ucfirst($model);
        } else {

            $modelClass = 'App\\Models\\' . Str::singular(ucfirst($model));
        }
        if (!class_exists($modelClass)) {
            return response()->json(['error' => 'Model class not found.'], 500);
        }

        $results = $modelClass::query();
        foreach ($models[$model] as $field) {
            $results->orWhere($field, 'LIKE', "%{$searchTerm}%");
        }

        $results = $results->limit(10)->get();

        return response()->json(['results' => $results]);
    }
}
