<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProfileRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Support\Facades\Storage;

/**
 * Class ProfileCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProfileCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation{ store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation{ update as traitUpdate; }
    // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    private function getAttibutes($show = true)
    {
        return [
            [
                'label' => 'Struktur Organisasi',
                'type' => 'upload',
                'name' => 'organizational_structure',
                'withFiles' => true,
                'upload' => true,
            ],
            [
                'label' => 'Visi dan Misi',
                'type' => 'textarea',
                'name' => 'vission_and_mission',
            ],
        ];
    }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Profile::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/profile');
        CRUD::setEntityNameStrings('profile', 'profiles');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::addColumn([
            'label' => 'Struktur Organisasi',
            'type' => 'custom_html',
            'name' => 'organizationalStructureImage',
            'value' => function ($entry) {
                return $entry->organizationalStructureImage ? '<img src="' . $entry->organizationalStructureImage->getUrl() . '" style="max-width: 200px; max-height: 200px; object-fit: cover;" />' : '';
            },
        ]);

        CRUD::addColumn([
            'label' => 'Visi dan Misi',
            'type' => 'custom_html',
            'name' => 'vission_and_mission',
            'value' => function ($entry) {
                return '<div style="max-width: 200px;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    text-overflow: ellipsis;
                ">' . $entry->vission_and_mission . '</div>';
            },
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProfileRequest::class);
        CRUD::addFields($this->getAttibutes());

        Widget::add()->type('script')->content('js/ckeditor.js');
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

    protected function update()
    {
        $response = \DB::transaction(function () {
            $response = $this->traitUpdate();
            $news = $this->crud->getCurrentEntry();
            $news->addMediaFromRequest('organizational_structure')
                ->toMediaCollection('organizational_structure');
            Storage::delete('public/' . $news['organizational_structure']);
            
            return $response;
        });

        return $response;
    }
}
