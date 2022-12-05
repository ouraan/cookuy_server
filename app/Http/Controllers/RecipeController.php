<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function readAll(){
        return Recipe::all();
    }

    public function readBasedCategory($category)
    {
       return DB::table('recipes')->join('categories', 'recipes.category_id', '=', 'categories.id')->select('recipes.*', 'categories.id', 'categories.category')->where('categories.category', '=', $category)->get();
    }


    public function readBasedBookmark($isSaved)
    {
       return Recipe::where('isSaved', '=', $isSaved)->get();
    }

    public function readBasedCreator($creator)
    {
       return Recipe::where('creator', '=', $creator)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $recipe = new Recipe();
        $recipe->title = $request->title;
        $recipe->description = $request->description;
        $recipe->creator = $request->creator;
        $recipe->thumb = $request->thumb;
        $recipe->times = $request->times;
        $recipe->serving = $request->serving;
        $recipe->ingredients = $request->ingredients;
        $recipe->direction = $request->direction;
        $recipe->isSaved = $request->isSaved;
        $recipe->category_id = $request->category_id;
        
        $recipe->save();
        return "Data added successfully";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::find($id);
        $recipe->title = $request->title;
        $recipe->description = $request->description;
        $recipe->creator = $request->creator;
        $recipe->thumb = $request->thumb;
        $recipe->times = $request->times;
        $recipe->serving = $request->serving;
        $recipe->ingredients = $request->ingredients;
        $recipe->direction = $request->direction;
        $recipe->isSaved = $request->isSaved;
        $recipe->category_id = $request->category_id;
        $recipe->save();
        
        return "Data changed successfully";
    }

    public function delete($id){
        $recipe = Recipe::find($id);
        $recipe->delete();
        
        return "Data deleted successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
