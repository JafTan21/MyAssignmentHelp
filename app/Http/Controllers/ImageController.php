<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use stdClass;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $extension = $request->image_param->extension();
        $path = $request->image_param->storeAs('images', time() . $extension, 'public');

        return response()->json([
            'link' => 'http://localhost:8000/uploads/' . $path,
        ]);

        // return response()->json([
        //     'url' => 'https://ui-avatars.com/api/?name=John+Doe'
        // ]);
    }
}
