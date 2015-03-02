<?php

class TypeController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $categories = Type::all();
        
        return View::make('admin.types.list')
        	->with('categories', $categories);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.types.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'	=> 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('types/create')
				->withErrors($validator)
				->withInput(Input::except(''));
		} else {
		
			// store
			$type = new Type;
			$type->name = Input::get('name');
			$type->description = Input::get('description');
			$type->save();

		    if (Input::hasFile('image')) {
			    $destinationPath 	= '';
			    $filename        	= '';
			    $type_id			= $type->id;

		    	$file = Input::file('image');
		        $destinationPath =  'uploads/';
		        $filename        = $file->getClientOriginalName();
		        $uploadSuccess   = $file->move($destinationPath, $filename);
		        
       			$image 			= new Image;
				$image->imageable_id	= $type_id;
				$image->imageable_type	= 'Type';
				$image->title	= $filename;
				$image->path	= $destinationPath.$filename;
				$image->save();
			}

			// redirect
			Session::flash('message', 'Successfully created type!');
			return Redirect::to('types');
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
		$type = Type::find($id);

		// show the edit form and pass the type
		return View::make('admin.types.edit')
			->with('type', $type);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'name'	=> 'required',
		);
		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('types/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except(''));
		} else {
		
			// store
			$type = Type::find($id);
			$type->name = Input::get('name');
			$type->description = Input::get('description');
			$type->save();

		    if (Input::hasFile('image')) {
		    	
		    	if($oldImage = Image::find($type->image['id'])){
			    	
			    	$oldImage->delete();
			    }
			    
			    $destinationPath 	= '';
			    $filename        	= '';

		    	$file = Input::file('image');
		        $destinationPath = 'uploads/';
		        $filename        = $file->getClientOriginalName();
		        $uploadSuccess   = $file->move($destinationPath, $filename);
		        
       			$image 			= new Image;
				$image->imageable_id	= $id;
				$image->imageable_type	= 'Type';
				$image->title	= $filename;
				$image->path	= $destinationPath.$filename;
				$image->save();
			}

			// redirect
			Session::flash('message', 'Successfully updated type!');
			return Redirect::to('types');
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
		$type = Type::find($id);
		$type->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the type!');
		return Redirect::to('types');
	}


}
