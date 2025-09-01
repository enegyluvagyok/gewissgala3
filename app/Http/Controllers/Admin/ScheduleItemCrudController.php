<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ScheduleItemRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ScheduleItemCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ScheduleItemCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\ScheduleItem::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/schedule-item');
        CRUD::setEntityNameStrings('órarendi elem', 'Órarend');
    }

    /**
     * List operation.
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb();

        CRUD::column('day')
            ->label('Nap')
            ->type('select_from_array')
            ->options(\App\Models\ScheduleItem::dayLabels());

        CRUD::column('start_time')->label('Kezdés');
        CRUD::column('end_time')->label('Vége');
        CRUD::column('title')->label('Megnevezés');
        CRUD::column('subtitle')->label('Alcím');
        CRUD::column('sort')->label('Sorrend')->type('number');
    }

    /**
     * Create operation.
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ScheduleItemRequest::class);

        CRUD::field('day')
            ->label('Nap')
            ->type('select_from_array')
            ->options(\App\Models\ScheduleItem::dayLabels())
            ->allows_null(false)
            ->default(1);

        CRUD::field('start_time')
            ->label('Kezdés')
            ->type('time');

        CRUD::field('end_time')
            ->label('Vége')
            ->type('time');

        CRUD::field('title')
            ->label('Megnevezés')
            ->type('text');

        CRUD::field('subtitle')
            ->label('Alcím')
            ->type('text');

        CRUD::field('sort')
            ->label('Sorrend')
            ->type('number')
            ->default(0);
    }

    /**
     * Update operation.
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
