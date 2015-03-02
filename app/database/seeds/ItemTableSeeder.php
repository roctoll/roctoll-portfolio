<?php

class ItemTableSeeder extends Seeder {
	
	public function run() {

		// clear our database ------------------------------------------
		DB::table('items')->delete();
		DB::table('images')->delete();
		DB::table('types')->delete();
		DB::table('items_types')->delete();

		// seed our bears table -----------------------
		// we'll create three different bears

		$item1 = Item::create(array(
			'title'         => 'Lakme',
			'description'	=> 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
			'url'			=> 'www.sample1.com'
		));

		$item2 = Item::create(array(
			'title'         => 'Euram',
			'description'	=> 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
			'url'			=> 'www.sample2.com'
		));

		$item3 = Item::create(array(
			'title'         => 'Intuitiva',
			'description'	=> 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.',
			'url'			=> 'www.sample3.com'
		));

		$this->command->info('The items have been created');

		
		$Type1 = Type::create(array(
			'name'         	=> 'Wordpress',
			'description'	=> 'Lorem Ipsum es simplemente el texto de relleno de las imprentas.',
		));
		$Type2 = Type::create(array(
			'name'         	=> 'Codeigniter',
			'description'	=> 'Lorem Ipsum es simplemente el texto de relleno de las imprentas.',
		));
		$Type3 = Type::create(array(
			'name'         	=> 'Laravel',
			'description'	=> 'Lorem Ipsum es simplemente el texto de relleno de las imprentas.',
		));
		$Type4 = Type::create(array(
			'name'         	=> 'Symfony',
			'description'	=> 'Lorem Ipsum es simplemente el texto de relleno de las imprentas.',
		));
		$Type5 = Type::create(array(
			'name'         	=> 'Prestashop',
			'description'	=> 'Lorem Ipsum es simplemente el texto de relleno de las imprentas.',
		));
		$Type6 = Type::create(array(
			'name'         	=> 'Mas',
			'description'	=> 'Lorem Ipsum es simplemente el texto de relleno de las imprentas.',
		));


		$img1 = Image::create(array(
			'title'		=> 'title1',
			'path'		=> 'uploads/sample.jpg',
			'imageable_id'		=> $item1->id,
			'imageable_type'	=> 'Item'
		));
		$img2 = Image::create(array(
			'title'		=> 'title2',
			'path'		=> 'uploads/1.jpg',
			'imageable_id'		=> $item2->id,
			'imageable_type'	=> 'Item'
		));
		$img3 = Image::create(array(
			'title'		=> 'title3',
			'path'		=> 'uploads/2.jpg',
			'imageable_id'		=> $item3->id,
			'imageable_type'	=> 'Item'
		));

		$img4 = Image::create(array(
			'title'		=> 'title4',
			'path'		=> 'uploads/sample.jpg',
			'imageable_id'		=> $Type1->id,
			'imageable_type'	=> 'Type'
		));
		$img5 = Image::create(array(
			'title'		=> 'title5',
			'path'		=> 'uploads/1.jpg',
			'imageable_id'		=> $Type1->id,
			'imageable_type'	=> 'Type'
		));
		$img6 = Image::create(array(
			'title'		=> 'title6',
			'path'		=> 'uploads/2.jpg',
			'imageable_id'		=> $Type1->id,
			'imageable_type'	=> 'Type'
		));
		
		$this->command->info('Images attached');

		
		$this->command->info('Types created');
		
		$item1->types()->attach($Type1->id);
		$item2->types()->attach($Type3->id);
		$item3->types()->attach($Type6->id);

		$this->command->info('Types attached');
	}

}
