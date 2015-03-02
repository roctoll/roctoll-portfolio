<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $items = Item::all(); 
        $categories = Type::all();
        
        // Con el método all() le estamos pidiendo al modelo de Item
        // que busque todos los registros contenidos en esa tabla y los devuelva en un Array
        
        return View::make('public.index')
        	->with('items', $items)
        	->with('categories', $categories);
        
        // El método make de la clase View indica cual vista vamos a mostrar al usuario 
        //y también pasa como parámetro los datos que queramos pasar a la vista. 
        // En este caso le estamos pasando un array con todos los items
	}
	
	public function showCategory($id)
	{
        $category = Type::find($id);

        
        // Con el método all() le estamos pidiendo al modelo de Item
        // que busque todos los registros contenidos en esa tabla y los devuelva en un Array
        
        return View::make('public.category')
        	->with('category', $category);
        
        // El método make de la clase View indica cual vista vamos a mostrar al usuario 
        //y también pasa como parámetro los datos que queramos pasar a la vista. 
        // En este caso le estamos pasando un array con todos los items
	}

}
