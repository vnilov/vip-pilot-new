<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\app\Http\Requests\CrudRequest as StoreRequest;
use Backpack\CRUD\app\Http\Requests\CrudRequest as UpdateRequest;

class MenuItemCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("\App\Models\MenuItem");
        $this->crud->setRoute(config('backpack.base.route_prefix').'/menu-item');
        $this->crud->setEntityNameStrings('пункт меню', 'пункты меню');

        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('name', 2);

        $this->crud->addColumn([
                                'name' => 'name',
                                'label' => 'Имя пункта',
                            ]);
        $this->crud->addColumn([
                                'label' => 'Родительский пункт',
                                'type' => 'select',
                                'name' => 'parent_id',
                                'entity' => 'parent',
                                'attribute' => 'name',
                                'model' => "\App\Models\MenuItem",
                            ]);
        $this->crud->addColumn([
            'label' => 'Страница',
            'name' => 'name',
            'model' => "\App\Models\MPage",
        ]);

        $this->crud->addField([
                                'name' => 'name',
                                'label' => 'Имя пункта',
                            ]);
        $this->crud->addField([
                                'label' => 'Родительский пункт',
                                'type' => 'select',
                                'name' => 'parent_id',
                                'entity' => 'parent',
                                'attribute' => 'name',
                                'model' => "\App\Models\MenuItem",
                            ]);
        $this->crud->addField([
                                'name' => 'type',
                                'label' => 'Тип (страница или ссылка)',
                                'type' => 'page_or_link',
                                'page_model' => '\App\Models\Page',
                            ]);
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud($request);
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud($request);
    }
}
