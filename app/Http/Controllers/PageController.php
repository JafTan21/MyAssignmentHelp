<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.page.index', [
            'pages' => Page::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Page::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $request->slug,
            'content' => $request->page,
            'main_category_id' => $request->serviceCategory,
            'sub_category_id' => $request->serviceSubCategory,
        ]);

        return redirect()
            ->route('admin.page.index')
            ->with('success', 'page created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.page.edit', [
            'page' => Page::where('id', $id)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::where('id', $id)->firstOrFail();
        $page->update([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $request->slug,
            'content' => $request->page,
            'main_category_id' => $request->serviceCategory,
            'sub_category_id' => $request->serviceSubCategory,
        ]);

        return redirect()
            ->route('admin.page.index')
            ->with('success', 'page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSubCategories($id)
    {
        return response()->json([
            'id' => $id,
            'subCategories' => ServiceCategory::where('id', $id)->first()->serviceSubCategories,
        ]);
    }
}