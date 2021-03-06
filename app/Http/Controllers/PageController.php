<?php

namespace App\Http\Controllers;

use App\Http\Requests\Adminpanel\StorePageRequest;
use App\Http\Requests\Adminpanel\UpdatePageRequest;
use App\Models\Page;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use App\Services\StaticPageGenerator;
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
        return view('Admin.page.index', [
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
        return view('Admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        Page::create($request->validated());

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
        return view('Admin.page.edit', [
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
    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->update($request->validated());

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
        Page::where('id', $id)->firstOrFail()->delete();

        return redirect()
        ->route('admin.page.index')
        ->with('success', 'page deleted successfully');
    }

    public function getSubCategories($id)
    {
        return response()->json([
            'id' => $id,
            'subCategories' => ServiceCategory::where('id', $id)->first()->serviceSubCategories,
        ]);
    }

    public function GenerateStaticPage($page_slug)
    {
        $page = Page::where('slug', $page_slug)
            ->firstOrFail();
        if (StaticPageGenerator::generate(
            'service',
            $page,
            'userpanel.services.index',
            'page'
        )) {
            $data = [
                'success' => 'Static page created successfully',
            ];
        } else {
            $data = [
                'error' => 'something went wrong',
            ];
        }

        return redirect()->back()->with($data);
    }
}
