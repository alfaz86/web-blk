<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RegistrationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class RegistrationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class RegistrationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Registration::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/registration');
        CRUD::setEntityNameStrings('registration', 'registrations');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::with(['user', 'ktpImage', 'kkImage']);

        CRUD::addColumn([
            'label' => 'Nama',
            'type' => 'custom_html',
            'name' => 'user.name',
            'value' => function ($entry) {
                return $entry->user->name;
            },
            'searchLogic' => function ($query, $column, $searchTerm) {
                $query->orWhereHas('user', function ($q) use ($column, $searchTerm) {
                    $q->where('name', 'like', '%' . $searchTerm . '%');
                });
            }
        ]);

        CRUD::addColumn([
            'label' => 'No Telp',
            'type' => 'text',
            'name' => 'number',
        ]);

        CRUD::addColumn([
            'label' => 'Alamat',
            'type' => 'text',
            'name' => 'address',
        ]);
    }

    protected function setupShowOperation()
    {
        CRUD::with(['user']);

        CRUD::addColumn([
            'label' => 'Nama',
            'type' => 'custom_html',
            'name' => 'user.name',
            'value' => function ($entry) {
                return $entry->user->name;
            },
        ]);

        CRUD::addColumn([
            'label' => 'Email',
            'type' => 'custom_html',
            'name' => 'user.email',
            'value' => function ($entry) {
                return $entry->user->email;
            },
        ]);

        CRUD::addColumn([
            'label' => 'No Telp',
            'type' => 'text',
            'name' => 'number',
        ]);

        CRUD::addColumn([
            'label' => 'Alamat',
            'type' => 'text',
            'name' => 'address',
        ]);

        CRUD::addColumn([
            'label' => 'Foto KTP',
            'type' => 'custom_html',
            'name' => 'ktpImage',
            'value' => function ($entry) {
                return $entry->ktpImage ? '<img src="' . $entry->ktpImage->getUrl() . '" style="max-width: 400px; max-height: 200px; object-fit: cover;" />' : '';
            },
        ]);

        CRUD::addColumn([
            'label' => 'Foto KK',
            'type' => 'custom_html',
            'name' => 'kkImage',
            'value' => function ($entry) {
                return $entry->kkImage ? '<img src="' . $entry->kkImage->getUrl() . '" style="max-width: 400px; max-height: 200px; object-fit: cover;" />' : '';
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
        CRUD::setValidation(RegistrationRequest::class);
        CRUD::setFromDb(); // set fields from db columns.

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
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

    public function form()
    {
        return view('registration.form');
    }

    public function store(RegistrationRequest $request)
    {
        $password = explode(' ', $request->name)[0] . substr($request->email, 0, strpos($request->email, '@'));

        $user = new \App\Models\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($password);
        $user->save();

        $registration = new \App\Models\Registration();
        $registration->user_id = $user->id;
        $registration->number = $request->number;
        $registration->address = $request->address;
        $registration->save();

        $registration->addMediaFromRequest('ktp_image')->toMediaCollection('ktp_image');
        $registration->addMediaFromRequest('kk_image')->toMediaCollection('kk_image');

        return redirect()->route('registration.form')->with('success', 'Registration successful');
    }
}
