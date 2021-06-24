<?php

namespace App\Services;

use App\Models\Page;
use Exception;
use Illuminate\Support\Facades\Storage;

class StaticPageGenerator
{
    public static function generate($model, $obj, $view, $data_name_to_pass_in_the_view = null)
    {
        if (!$data_name_to_pass_in_the_view) {
            $data_name_to_pass_in_the_view = $model;
        }
        try {
            Storage::disk('public_htmls')->put(
                $model . '/' . $obj->slug . '.html',
                response()->view($view, [
                    $data_name_to_pass_in_the_view => $obj,
                ])->content()
            );
            $obj->update([
                'has_static_page' => true,
            ]);
        } catch (Exception $e) {
            dd($e);
        }

        return true;
    }
}
