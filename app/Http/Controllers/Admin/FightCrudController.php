<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FightRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FightCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FightCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Fight::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/fight');
        CRUD::setEntityNameStrings('meccs', 'meccsek');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // set columns from db columns.
        CRUD::column('fighter1_id')->label('Piros sarok');
        CRUD::column('fighter2_id')->label('Kék sarok');
        CRUD::column('winner_id')->label('Győztes');
        CRUD::column('date')->label('Időpont');
        CRUD::column('weight')->label('Súly');
        CRUD::column('duration')->label('Mérkőzés');
        CRUD::column('fighting_style')->label('Szabályrendszer');
        CRUD::column('agegroup')->label('Korosztály');
        CRUD::column('title_fight')->label('Címmeccs');
        CRUD::column('ko')->label('Ko');
        CRUD::column('tko')->label('Tko');
        CRUD::column('judges')->label('Pontozás');
        CRUD::column('photo')->label('Fotó')->type('image');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(FightRequest::class);
        CRUD::setFromDb(); // set fields from db columns.


        $fighters = \App\Models\Fighter::all()->pluck('name', 'id')->toArray();
        CRUD::field([
            'name' => 'fighter1_id',
            'type' => 'select_from_array',
            'label' => 'Piros sarok',
            'options' => $fighters,
            'allows_null' => false,
        ]);
        CRUD::field([
            'name' => 'fighter2_id',
            'type' => 'select_from_array',
            'label' => 'Kék sarok',
            'options' => $fighters,
            'allows_null' => false,
        ]);
        CRUD::field([
            'name' => 'winner_id',
            'type' => 'select_from_array',
            'label' => 'Győztes',
            'options' => $fighters,
            'allows_null' => true,
        ]);
        CRUD::field([
            'name' => 'date',
            'type' => 'datetime',
            'label' => 'Időpont',
            'allows_null' => false,
        ]);
        CRUD::field([
            'name' => 'weight',
            'type' => 'text',
            'label' => 'Súly',
            'attributes' => [
                'placeholder' => 'Súly'
            ]
        ]);
        CRUD::field([
            'name' => 'duration',
            'type' => 'text',
            'label' => 'Mérkőzés',
            'attributes' => [
                'placeholder' => 'Mérkőzés'
            ]
        ]);
        CRUD::field([
            'name' => 'fighting_style',
            'type' => 'text',
            'label' => 'Szabályrendszer',
            'attributes' => [
                'placeholder' => 'Szabályrendszer'
            ]
        ]);
        CRUD::field([
            'name' => 'agegroup',
            'type' => 'text',
            'label' => 'Korosztály',
            'attributes' => [
                'placeholder' => 'Korosztály'
            ]
        ]);
        CRUD::field([
            'name' => 'title_fight',
            'type' => 'checkbox',
            'label' => 'Címmeccs',
        ]);
        CRUD::field([
            'name' => 'ko',
            'type' => 'checkbox',
            'label' => 'Ko',
        ]);
        CRUD::field([
            'name' => 'tko',
            'type' => 'checkbox',
            'label' => 'Tko',
        ]);
        CRUD::field([
            'name' => 'judges',
            'type' => 'text',
            'label' => 'Pontozás',
            'attributes' => [
                'placeholder' => 'Pontozás'
            ],
            'allows_null' => true
        ]);
        CRUD::field(
            [
                'name' => 'photo',
                'type' => 'upload',
                'label' => 'Kép',
                'attributes' => [
                    'placeholder' => 'Kép'
                ]
            ]
        )->withFiles([
                    'disk' => 'public',
                    'path' => 'uploads'
                ]);

    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
