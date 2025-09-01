<?php

namespace App\Http\Controllers\Admin;

use App\Models\MainGallery;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class MainGalleryCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    // ha kell: use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(MainGallery::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/main-gallery');
        CRUD::setEntityNameStrings('galéria kép', 'Galéria');
        CRUD::orderBy('sort')->orderBy('id','desc');
    }

   protected function setupListOperation(): void
{
    CRUD::addColumn([
        'name'  => 'image',
        'label' => 'Kép',
        'type'  => 'upload',
        'disk'  => 'public',   // <<-- kötelező!
        'prefix'=> 'storage/', // opcionális, ha asset() kell
    ]);

    CRUD::column('title')->label('Cím');
    CRUD::column('category')->label('Kategória');
    CRUD::column('sort')->label('Sorrend')->type('number');
    CRUD::column('is_active')->label('Aktív')->type('boolean');
}

    protected function setupCreateOperation(): void
    {
        CRUD::field('title')->label('Cím')->type('text');
        CRUD::field('category')->label('Kategória')->type('text');
        CRUD::field('image')->label('Kép')
            ->type('upload')->upload(true)->disk('public')->prefix('storage/')
            ->crop(false)->aspect_ratio(0);
        CRUD::field('sort')->label('Sorrend')->type('number')->default(0);
        CRUD::field('is_active')->label('Aktív')->type('checkbox');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
