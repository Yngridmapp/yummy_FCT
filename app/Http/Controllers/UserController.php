<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rol.administrador')->only('index');
        // $this->middleware('auth')->only('create');
        // $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *->middleware('rol.administrador')->only('index')
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::orderBy('id')->limit('10')->get();
        $user = User::paginate(10);
        //$recipe_catego = Recipe::where('category_id',$category_id)->paginate(3);
        $array_variables = ['categories'=>$categories,'users'=>$user];
        return view('users.index',$array_variables);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        //dd($user);
        $categories = Category::orderBy('id')->limit('10')->get();
        //$recipe_catego = Recipe::where('category_id',$category_id)->paginate(3);
        $array_variables = ['categories'=>$categories,'user'=>$user];
        return view('users.show',$array_variables);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $categories = Category::orderBy('id')->limit('10')->get();
        //$recipe_catego = Recipe::where('category_id',$category_id)->paginate(3);
        $array_variables = ['categories'=>$categories,'user'=>$user];
        return view('users.edit',$array_variables);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request,User $user)
    {
        
        //dd($request->all());
        $comprobacion = $request->all();
        $user->fill($comprobacion);
        //dd($user);

        $user->save();
        if ($request->selfie) {
            $this::pic($request, $user);
        }
        $categories = Category::orderBy('id')->limit('10')->get();
        $array_variables = ['categories'=>$categories,'user'=>$user];
        return view('users.show',$array_variables);
        
     }
    public static function pic(Request $request, User $user)
    {
        $request->validate(
            [
                'selfie' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5096'
            ]
        );
        if (!is_null($user->selfie)) {
            //Borramos la foto antigua
            if (File::exists('img/perfiles/' . $user->selfie))
                File::delete('img/perfiles/' . $user->selfie);
        }
        $nombreFichero = md5(microtime()) . "." . $request->selfie->extension();

        /** Muevo la foto de la carpeta tempral al destino definitivo */

        $request->selfie->move(public_path('img/perfiles/'), $nombreFichero);

        /** 
         * Por ultimo tenemos que guardar en la tabla en la persona correspondiente 
         * El nombre de la foto de su perfil
         */
        $user->selfie = $nombreFichero;
        $user->save();
        return back()->with('estado', 'Se ha subido la fotografía correctamente')->with('selfie', $nombreFichero);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect(route('users.index'));
    }
    public function myrecipes(User $user){
        $recipes = Recipe::where('user_id',$user->id)->orderByDesc('created_at')->paginate(9);//me devuelve todas las recetas de ese usuario
        $categories = Category::orderBy('id')->limit('10')->get();
        //$recipe_catego = Recipe::where('category_id',$category_id)->paginate(3);
        $array_variables = ['categories'=>$categories,'user'=>$user,'recipes'=>$recipes];
        return view('users.myrecipes',$array_variables);
    }
}
