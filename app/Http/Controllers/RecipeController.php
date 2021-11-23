<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreRecipePost;


class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$categories = Category::orderBy('id')->limit('10')->get();
        //$recipe_catego = Recipe::where('category_id',$category_id)->paginate(3);
        $categories = DB::table('categories')->orderBy('category')->get();
        $array_variables = ['categories'=>$categories];
        return view('recipes.create',['recipe' => new Recipe()],$array_variables);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRecipePost $request)
    {
        $user = Auth::user();
      //FALLA EL REQUEST StoreRecipeRequest
      //dd($request);
    //   $validation= $request->validate([
    //     'title' => 'required|min:5|max:50',
    //         'category_id' => 'required',
    //         'ingredient' => 'required|min:50|max:1000',
    //         'preparation' => 'required|min:50|max:1000',
    //         'pic_recipes' => 'nullable'
    // ]);
       //+ ['user_id' => Auth::user()->id]
       
      
       $recipe = Recipe::create($request->validated() + ['user_id' =>$user->id]);
       //dd($request->validate());
       //dd($recipe);
       if ($request->pic_recipes) {
           $this::pic($request, $recipe);
       }
       

       return redirect(route('users.myrecipes',$user));
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
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

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
    public static function pic(Request $request, Recipe $recipe)
    {
        $request->validate(
            [
                'pic_recipes' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:5096'
            ]
        );
        if (!is_null($recipe->pic_recipes)) {
            //Borramos la foto antigua
            if (File::exists('img/food/' . $recipe->pic_recipes))
                File::delete('img/food/' . $recipe->pic_recipes);
        }
        $nombreFichero = md5(microtime()) . "." . $request->pic_recipes->extension();

        /** Muevo la foto de la carpeta tempral al destino definitivo */

        $request->pic_recipes->move(public_path('img/food/'), $nombreFichero);

        /** 
       
         */
        $recipe->pic_recipes = $nombreFichero;
        $recipe->save();
        return back()->with('estado', 'Se ha subido la fotografía correctamente')->with('pic_recipes', $nombreFichero);
    }
}
