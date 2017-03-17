<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\PageManager\app\Http\Requests\PageRequest as StoreRequest;
use Backpack\PageManager\app\Http\Requests\PageRequest as UpdateRequest;
use App\PageTemplates;
class PageCrudController extends CrudController
{
    use PageTemplates;

    public function __construct($template_name = false)
    {
        parent::__construct();

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\Page");
        $this->crud->setRoute(config('backpack.base.route_prefix').'/page');
        $this->crud->setEntityNameStrings('страницу', 'страницы');

        /*
        |--------------------------------------------------------------------------
        | COLUMNS
        |--------------------------------------------------------------------------
        */

        $this->crud->addColumn(['name' => 'name', 'label'=> 'Название']);
        $this->crud->addColumn(['name' => 'title', 'label'=> 'Заголовок']);
       /* $this->crud->addColumn([
                                'name' => 'template',
                                'type' => 'model_function',
                                'function_name' => 'getTemplateName',
                                'label' => 
                                ]);*/
        $this->crud->addColumn(['name' => 'slug', 'label' => 'Путь']);

        /*
        |--------------------------------------------------------------------------
        | FIELDS
        |--------------------------------------------------------------------------
        */

        // In PageManager,
        // - default fields, that all templates are using, are set using $this->addDefaultPageFields();
        // - template-specific fields are set per-template, in the PageTemplates trait;


        /*
        |--------------------------------------------------------------------------
        | BUTTONS
        |--------------------------------------------------------------------------
        */
        $this->crud->addButtonFromModelFunction('line', 'open', 'getOpenButton', 'beginning');
    }

    // -----------------------------------------------
    // Overwrites of CrudController
    // -----------------------------------------------

    // Overwrites the CrudController create() method to add template usage.
    public function create($template = "default")
    {
        $this->addDefaultPageFields($template);
        $this->useTemplate($template);

        return parent::create();
    }

    // Overwrites the CrudController store() method to add template usage.
    public function store(StoreRequest $request)
    {
        $this->addDefaultPageFields(\Request::input('template'));
        $this->useTemplate(\Request::input('template'));

        return parent::storeCrud();
    }

    // Overwrites the CrudController edit() method to add template usage.
    public function edit($id, $template = false)
    {
        // if the template in the GET parameter is missing, figure it out from the db
        if ($template == false) {
            $model = $this->crud->model;
            $this->data['entry'] = $model::findOrFail($id);
            $template = $this->data['entry']->template;
        }

        $this->addDefaultPageFields($template);
        $this->useTemplate($template);

        return parent::edit($id);
    }

    // Overwrites the CrudController update() method to add template usage.
    public function update(UpdateRequest $request)
    {
        $this->addDefaultPageFields(\Request::input('template'));
        $this->useTemplate(\Request::input('template'));

        return parent::updateCrud();
    }

    // -----------------------------------------------
    // Methods that are particular to the PageManager.
    // -----------------------------------------------

    /**
     * Populate the create/update forms with basic fields, that all pages need.
     *
     * @param string $template The name of the template that should be used in the current form.
     */
    public function addDefaultPageFields($template = false)
    {
        $this->crud->addField([
                                'name' => 'template',
                                'label' => 'Шаблон',
                                'type' => 'hidden',
                                'options' => $this->getTemplatesArray(),
                                'value' => $template,
                                'allows_null' => false,
                                'wrapperAttributes' => [
                                    'class' => 'form-group col-md-6',
                                ],
                            ]);
        $this->crud->addField([
                                'name' => 'name',
                                'label' => 'Название (видно только администратору)',
                                'type' => 'text',
                                /*'wrapperAttributes' => [
                                    'class' => 'form-group col-md-6',
                                ],*/
                                // 'disabled' => 'disabled'
                            ]);
        $this->crud->addField([
                                'name' => 'title',
                                'label' => 'Заголовок страницы',
                                'type' => 'text',
                                // 'disabled' => 'disabled'
                            ]);
        $this->crud->addField([
                                'name' => 'slug',
                                'label' => 'Путь',
                                'type' => 'text',
                                'hint' => 'Если оставить пустым, то будет сгенерирован автоматически из заголовка',
                                // 'disabled' => 'disabled'
                            ]);
    }

    /**
     * Add the fields defined for a specific template.
     *
     * @param  string $template_name The name of the template that should be used in the current form.
     */
    public function useTemplate($template_name = "default")
    {
        $templates = $this->getTemplates();
        
        // set the default template
        if ($template_name == false) {
            $template_name = $templates[0]->name;
        }

        // actually use the template
        if ($template_name) {
            $this->{$template_name}();
        }
    }

    /**
     * Get all defined templates.
     */
    public function getTemplates()
    {
        $templates_array = [];

        $templates_trait = new \ReflectionClass('App\PageTemplates');
        $templates = $templates_trait->getMethods();

        if (! count($templates)) {
            abort('403', 'No templates have been found.');
        }

        return $templates;
    }

    /**
     * Get all defined template as an array.
     *
     * Used to populate the template dropdown in the create/update forms.
     */
    public function getTemplatesArray()
    {
        $templates = $this->getTemplates();

        foreach ($templates as $template) {
            $templates_array[$template->name] = $this->crud->makeLabel($template->name);
        }

        return $templates_array;
    }
}
