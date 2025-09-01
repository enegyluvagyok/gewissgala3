<?php

namespace App\Http\Controllers\Admin;

use App\Models\LinkWidget;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;


class LinkWidgetCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    use CreateOperation { store as traitStore; }
    use UpdateOperation { update as traitUpdate; }

    public function setup(): void
    {
        CRUD::setModel(LinkWidget::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/link-widget');
        CRUD::setEntityNameStrings('link kártya', 'Link kártyák');
        CRUD::orderBy('sort')->orderByDesc('id');
    }

    protected function setupListOperation(): void
    {
        CRUD::addColumn(['name'=>'title','label'=>'Cím']);
        CRUD::addColumn(['name'=>'url','label'=>'Link','type'=>'url']);
        CRUD::addColumn(['name'=>'image','label'=>'Kép','type'=>'upload','disk'=>'public']);
        CRUD::addColumn(['name'=>'excerpt','label'=>'Kivonat','type'=>'text','limit'=>120]);
        CRUD::addColumn(['name'=>'is_active','label'=>'Aktív','type'=>'boolean']);
        CRUD::addColumn(['name'=>'sort','label'=>'Sorrend','type'=>'number']);
        CRUD::addButtonFromModelFunction('line', 'fetch_meta', 'fetchMetaButton', 'begin');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::field('title')->label('Cím')->type('text')->attributes(['required'=>true]);
        CRUD::field('url')->label('Link (https://...)')->type('url')->attributes(['required'=>true, 'placeholder'=>'https://...']);
        CRUD::field('excerpt')->label('Kivonat')->type('textarea')->hint('Ha üres, megpróbáljuk automatikusan kitölteni OG alapján.');
        CRUD::field('image')->label('Kép (felülírja az OG képet)')->type('upload')->upload(true)->disk('public');
        CRUD::field('sort')->label('Sorrend')->type('number')->default(0);
        CRUD::field('is_active')->label('Aktív')->type('checkbox');
    }

    protected function setupUpdateOperation(): void { $this->setupCreateOperation(); }


    public function store()
    {
        $response = $this->traitStore();
        $this->crud->entry->fetchMeta(true); // OG meta automatikusan
        return $response;
    }

    public function update()
    {
        $response = $this->traitUpdate();
        $this->crud->entry->fetchMeta(true); // OG meta automatikusan
        return $response;
    }

    public function fetchMeta($id)
{
    $entry = \App\Models\LinkWidget::findOrFail($id);
    $entry->fetchMeta(true);
    \Prologue\Alerts\Facades\Alert::success('Metaadatok frissítve.')->flash();
    return back();
}
}
