<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FighterRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class FighterCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class FighterCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Fighter::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/fighter');
        CRUD::setEntityNameStrings('harcos', 'harcosok');
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
        CRUD::column('name')->label('Név');
        CRUD::column('gender')->label('Nem');
        CRUD::column('agegroup')->label('Korosztály');
        CRUD::column('active')->label('Aktív');
        CRUD::column('mothers_name')->label('Anyja neve');
        CRUD::column('date_of_birth')->label('Születési idő');
        CRUD::column('birth_place')->label('Születési hely');
        CRUD::column('city')->label('Város');
        CRUD::column('country')->label('Ország');
        CRUD::column('trainer')->label('Edző');
        CRUD::column('photo')->label('Kép');
        CRUD::column('club')->label('Klub');
        CRUD::column('weight')->label('Súly');
        CRUD::column('fighting_style')->label('Szabályrendszer');
        CRUD::column('wins')->label('Győzelem');
        CRUD::column('losses')->label('Vereség');
        CRUD::column('draws')->label('Döntetlen');
        CRUD::column('phone')->label('Telefon');
        CRUD::column('email')->label('Email');
        
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(FighterRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        CRUD::field(
            [
                'name' => 'name',
                'type' => 'text',
                'label' => 'Név',
                'attributes' => [
                    'placeholder' => 'Harcos neve'
                ]
            ],
        )->tab('Általános adatok');
        CRUD::field(
            [
                'name' => 'gender',
                'type' => 'select_from_array',
                'label' => 'Nem',
                'options' => [
                    0 => 'Férfi',
                    1 => 'Nő'
                ],
                'allows_null' => false,
            ],
        )->tab('Általános adatok');
        CRUD::field(
            [
                'name' => 'agegroup',
                'type' => 'select_from_array',
                'label' => 'Korosztály',
                'options' => [
                    'Gyerek' => 'Gyerek',
                    'Felnőtt' => 'Felnőtt',
                ],
                'allows_null' => false,
            ],
        )->tab('Általános adatok');
        CRUD::field(
            [
                'name' => 'active',
                'type' => 'select_from_array',
                'label' => 'Aktív',
                'options' => [
                    0 => 'Inaktív',
                    1 => 'Aktív'
                ],
                'allows_null' => false,
            ],
        )->tab('Általános adatok');
        CRUD::field(
            [
                'name' => 'mothers_name',
                'type' => 'text',
                'label' => 'Anyja neve',
                'attributes' => [
                    'placeholder' => 'Anyja neve'
                ]
            ]
        )->tab('Általános adatok');
        CRUD::field(
            [
                'name' => 'date_of_birth',
                'type' => 'date',
                'label' => 'Születési idő',
                'attributes' => [
                    'placeholder' => 'Születési idő'
                ]
            ]
        )->tab('Általános adatok');
        CRUD::field(
            [
                'name' => 'birth_place',
                'type' => 'text',
                'label' => 'Születési hely',
                'attributes' => [
                    'placeholder' => 'Születési hely'
                ]
            ]
        )->tab('Általános adatok');
        CRUD::field(
            [
                'name' => 'city',
                'type' => 'text',
                'label' => 'Város',
                'attributes' => [
                    'placeholder' => 'Város'
                ]
            ]
        )->tab('Általános adatok');
        CRUD::field(
            [
                'name' => 'country',
                'type' => 'text',
                'label' => 'Ország',
                'attributes' => [
                    'placeholder' => 'Ország'
                ]
            ]
        )->tab('Általános adatok');
        CRUD::field(
            [
                'name' => 'trainer',
                'type' => 'text',
                'label' => 'Edző',
                'attributes' => [
                    'placeholder' => 'Edző'
                ]
            ]
        )->tab('Versenyzői adatok');
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
                ])->tab('Képek');
        CRUD::field(
            [
                'name' => 'club',
                'type' => 'text',
                'label' => 'Klub',
                'attributes' => [
                    'placeholder' => 'Klub'
                ]
            ]
        )->tab('Versenyzői adatok');
        ;
        CRUD::field(
            [
                'name' => 'weight',
                'type' => 'text',
                'label' => 'Súly',
                'attributes' => [
                    'placeholder' => 'Súly'
                ]
            ]
        )->tab('Versenyzői adatok');
        CRUD::field(
            [
                'name' => 'fighting_style',
                'type' => 'text',
                'label' => 'Szabályrendszer',
                'attributes' => [
                    'placeholder' => 'Szabályrendszer'
                ]
            ]
        )->tab('Versenyzői adatok');
        CRUD::field(
            [
                'name' => 'wins',
                'type' => 'text',
                'label' => 'Győzelem',
                'attributes' => [
                    'placeholder' => 'Győzelem'
                ]
            ]
        )->tab('Versenyzői adatok');
        CRUD::field(
            [
                'name' => 'losses',
                'type' => 'text',
                'label' => 'Vereség',
                'attributes' => [
                    'placeholder' => 'Vereség'
                ]
            ]
        )->tab('Versenyzői adatok');
        CRUD::field(
            [
                'name' => 'draws',
                'type' => 'text',
                'label' => 'Döntetlen',
                'attributes' => [
                    'placeholder' => 'Döntetlen'
                ]
            ]
        )->tab('Versenyzői adatok');
        CRUD::field(
            [
                'name' => 'phone',
                'type' => 'text',
                'label' => 'Telefon',
                'attributes' => [
                    'placeholder' => 'Telefon'
                ]
            ]
        )->tab('Elérhetőségek');
        CRUD::field(
            [
                'name' => 'email',
                'type' => 'email',
                'label' => 'Email',
                'attributes' => [
                    'placeholder' => 'Email'
                ]
            ]
        )->tab('Elérhetőségek');
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
