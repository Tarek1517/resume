<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\Portfolio;
use \App\Models\portfolioCategories;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['portfolios'] = Portfolio::with('categories')->get();
        return view("pages.portfolio.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = portfolioCategories::all();
        return view("pages.portfolio.add", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([

            'portfolio_name' => 'required | string',
            'portfolio_img' => 'required',
            'categories' => 'required | array',

        ]);

        $portfolioData = [];

        $portfolioData['name'] = $request->portfolio_name;
        $categories = $request->categories;

        if ($request->file('portfolio_img')) {

            $img_file = $request->file('portfolio_img');
            $image_name = Str::random(20);
            $ext = strtolower($img_file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $img_file->storeAs('public/img/' . $image_full_name);
            $portfolioData['image'] = $image_full_name;

        }

        $portfolio = Portfolio::create($portfolioData);

        $portfolio->categories()->attach($categories);

        if ($portfolio) {

            return redirect()->route('add_portfolioContent')->with('success', 'Portfolio Data has been save successfully');

        } else {

            return redirect()->route('add_portfolioContent')->with('error', 'Portfolio Data is not save');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [];
        $data['editContent'] = Portfolio::with('categories')->find($id);
        $data['cat'] = portfolioCategories::get();
        return view("pages.portfolio.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([

            'portfolio_name' => 'required | string',
            'categories' => 'required | array',

        ]);

        $portfolioData = [];

        $portfolioData['name'] = $request->portfolio_name;
        // $categories = $request->categories;

        if ($request->file('portfolio_img')) {

            $img_file = $request->file('portfolio_img');
            $image_name = Str::random(20);
            $ext = strtolower($img_file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $img_file->storeAs('public/img/' . $image_full_name);
            $portfolioData['image'] = $image_full_name;

        }

        $portfolio = Portfolio::find($id);

        if ($portfolio) {
            $portfolio->update($portfolioData);
            $portfolio->categories()->sync($request->categories);

            return redirect()->route('portfolioContent_list')->with('success', 'Portfolio Data has been update successfully');
        } else {
            return redirect()->route('portfolioContent_list')->with('error', 'Portfolio Data is not saved');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Portfolio::find($id);
        $delete->where('id', $id)->delete();
        return redirect()->route('portfolioContent_list')->with('success', 'Data delete Successfully');
    }

    public function addCategory()
    {

        return view("pages.portfolio.category");

    }

    public function saveCategory(Request $request)
    {

        request()->validate([

            'name' => 'required',
            'Slug' => 'required|unique:portfolio_categories',

        ]);

        $portfolioData = [];

        $portfolioData['name'] = $request->name;
        $portfolioData['Slug'] = $request->Slug;

        portfolioCategories::create($portfolioData);

        if ($portfolioData) {

            return redirect()->route('add_categories')->with('success', 'Category has been save successfully');

        } else {

            return redirect()->route('add_heroContent')->with('error', 'Category Data is not added');

        }

    }

    public function categoryList()
    {

        $data = [];
        $data['categories'] = portfolioCategories::get();

        return view("pages.portfolio.categoryList", $data);

    }

    public function destroyCategory(string $id)
    {
        $delete = portfolioCategories::find($id);
        $delete->where('id', $id)->delete();
        return redirect()->route('category_list')->with('success', 'Data delete Successfully');
    }

    public function editCat(string $id)
    {
        $data = [];
        $data['cat'] = portfolioCategories::find($id);
        return view("pages.portfolio.editcategory", $data);
    }

    public function updateCat(Request $request, string $id){

        request()->validate([

            'name' => 'required',
            'Slug' => 'required|unique:portfolio_categories',

        ]);

        $portfolioData = [];

        $portfolioData['name'] = $request->name;
        $portfolioData['Slug'] = $request->Slug;

        portfolioCategories::where('id',$id)->update($portfolioData);

        if ($portfolioData) {

            return redirect()->route('add_categories')->with('success', 'Category has been save successfully');

        } else {

            return redirect()->route('add_heroContent')->with('error', 'Category Data is not added');

        }
    }

}
