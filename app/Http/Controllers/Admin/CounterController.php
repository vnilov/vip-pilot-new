<?php
/**
 * Created by PhpStorm.
 * User: vnilov
 * Date: 3/17/17
 * Time: 12:54 PM
 */

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Requests\CrudRequest as StoreRequest;
use Backpack\CRUD\app\Http\Requests\CrudRequest as UpdateRequest;

class CounterController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("\App\Models\Counter");
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/counters');
        $this->crud->setEntityNameStrings('счетчик', 'счетчики');

        $this->crud->addColumn(['name' => 'name', 'label'=> 'Имя']);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Имя',
        ]);
        $this->crud->addField([
            'name' => 'value',
            'label' => 'Содержимое счетчика',
            'type' => 'textarea',
            'attributes' => [
                'style' => 'height: 500px',
            ],
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