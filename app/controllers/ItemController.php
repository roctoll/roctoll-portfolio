<?php 
class ItemController extends BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $items = Item::all(); 
        
        // Con el método all() le estamos pidiendo al modelo de Item
        // que busque todos los registros contenidos en esa tabla y los devuelva en un Array
        
        return View::make('admin.items.list')
        	->with('items', $items);
        
        // El método make de la clase View indica cual vista vamos a mostrar al usuario 
        //y también pasa como parámetro los datos que queramos pasar a la vista. 
        // En este caso le estamos pasando un array con todos los items
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	    $categories = Type::all();
	    
		return View::make('admin.items.create')->with('categories', $categories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'title'	=> 'required',
			'url'	=> '',
			'type'	=> 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('items/create')
				->withErrors($validator)
				->withInput(Input::except(''));
		} else {
		
			// store
			$item = new Item;
			$item->title = Input::get('title');
			$item->url = Input::get('url');
			$item->client = Input::get('client');
			$item->role = Input::get('role');
			$item->year = Input::get('year');
			$item->description	= Input::get('description');
			$item->save();

			$item->types()->attach(Input::get('type'));

		    $destinationPath 	= '';
		    $filename        	= '';
		    $item_id			= $item->id;
		
		    if (Input::hasFile('images')) {
		    	$files = Input::file('images');
				foreach($files as $file) {
			        $destinationPath =  'uploads/';
			        $filename        = $file->getClientOriginalName();
			        $uploadSuccess   = $file->move($destinationPath, $filename);
			        
	       			$image 					= new Image;
					$image->imageable_id	= $item_id;
					$image->imageable_type	= 'Item';
					$image->title			= $filename;
					$image->path			= $destinationPath.$filename;
					$image->save();
				}
		    }		

			// redirect
			Session::flash('message', 'Successfully created item!');
			return Redirect::to('items');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$item = Item::find($id);
	    $categories = Type::all();

		// show the edit form and pass the item
		return View::make('admin.items.edit')
			->with('categories', $categories)
			->with('item', $item);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'title'	=> 'required',
			'url'	=> '',
			'type'	=> 'required|numeric'
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('items/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$item 				= Item::find($id);
			$item->title		= Input::get('title');
			$item->url			= Input::get('url');
			$item->client 		= Input::get('client');
			$item->role 		= Input::get('role');
			$item->year 		= Input::get('year');
			$item->description	= Input::get('description');
			$item->save();

			$item->types()->sync(array(Input::get('type')));

		    if (Input::hasFile('images')) {
		    	$files = Input::file('images');
			    $destinationPath 	= '';
			    $filename        	= '';
			    $item_id			= $item->id;
			
				foreach($files as $file) {
			        $destinationPath =  'uploads/';
			        $filename        = $file->getClientOriginalName();
			        $uploadSuccess   = $file->move($destinationPath, $filename);
			        
	       			$image 					= new Image;
					$image->imageable_id	= $item_id;
					$image->imageable_type	= 'Item';
					$image->title			= $filename;
					$image->path			= $destinationPath.$filename;
					$image->save();
				}
		    }		

			// redirect
			Session::flash('message', 'Successfully updated item!');
			return Redirect::to('items');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete
		$item = Item::find($id);
		$item->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the item!');
		return Redirect::to('items');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyImg($img_id, $item_id)
	{
		// delete
		$img = Image::find($img_id);
		$img->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the image!');
		return Redirect::to("items/{$item_id}/edit");
	}
 
}
?>