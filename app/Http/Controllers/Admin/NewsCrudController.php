<?php

namespace App\Http\Controllers\Admin;

use App\Helper;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NewsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function __construct(
        protected Helper $helper
    ) {
        parent::__construct();
        $this->helper = $helper;
    }

    protected function setupSubmissionRoutes($segment, $routeName, $controller) {
        Route::get($segment.'/{news}/page', [
            'as'        => $routeName.'.pageView',
            'uses'      => $controller.'@pageView',
            'operation' => 'pageView',
        ]);
    }

    private function getAttibutes($show = true)
    {
        return [
            [
                'label' => 'Judul',
                'type' => 'text',
                'name' => 'title',
            ],
            [
                'label' => 'Slug',
                'type' => 'hidden',
                'name' => 'slug',
            ],
            [
                'label' => 'Gambar Thumbnail',
                'type' => 'upload',
                'name' => 'news_thumbnail',
                'withFiles' => true,
                'upload' => true,
            ],
            [
                'label' => 'Konten',
                'type' => 'textarea',
                'name' => 'content',
            ],
            [
                'label' => 'Pembuat',
                'type' => 'hidden',
                'name' => 'created_by',
                'value' => backpack_user()->id,
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
        CRUD::setModel(News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('news', 'news');
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
            'label' => 'Gambar',
            'type' => 'custom_html',
            'name' => 'newsThumbnail',
            'value' => function ($entry) {
                return $entry->newsThumbnail ? '<img src="' . $entry->newsThumbnail->getUrl() . '" style="max-width: 200px; max-height: 200px; object-fit: cover;" />' : '';
            },
        ]);

        CRUD::addColumn([
            'label' => 'Judul',
            'type' => 'text',
            'name' => 'title',
        ]);

        CRUD::addButton('line', 'show', 'view', 'crud::buttons.preview_news');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(NewsRequest::class);
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

    protected function store()
    {
        $this->setSlugAttribute();
        
        $response = \DB::transaction(function () {
            $response = $this->traitStore();
            $news = $this->crud->getCurrentEntry();
            $news->addMediaFromRequest('news_thumbnail')
                ->toMediaCollection('news_thumbnail');
            Storage::delete('public/' . $news['news_thumbnail']);
            
            return $response;
        });

        return $response;
    }

    protected function update()
    {
        $this->setSlugAttribute();
        $oldNews = $this->crud->getCurrentEntry();

        $response = \DB::transaction(function () use ($oldNews) {
            $response = $this->traitUpdate();
            $news = $this->crud->getCurrentEntry();

            if ($this->crud->getRequest()->has('news_thumbnail')) {
                // delete old image
                $oldNews->clearMediaCollection('news_thumbnail');

                // new image
                $news->addMediaFromRequest('news_thumbnail')
                    ->toMediaCollection('news_thumbnail');
                Storage::delete('public/' . $news['news_thumbnail']);
            }

            return $response;
        });

        return $response;
    }

    private function setSlugAttribute()
    {
        $request = $this->crud->getRequest()->all();
        if ($request['title']) {
            $request['slug'] = $this->helper::generateSlug(
                $request['title'],
                'App\Models\News'
            );
        }
        $this->crud->getRequest()->request->add($request);
    }

    public function pageView(News $news)
    {
        dd($news);
        // Logic to handle the preview
        // ...

        // Redirect to the preview URL
        // return redirect()->to('custom/preview/link/' . $id);
    }
}
