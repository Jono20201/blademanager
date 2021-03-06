<?php

namespace Bespoke\BladeManager\Services;

use Illuminate\Support\Facades\Blade;

/**
 * Class BladeDirectiveManager
 *
 * @package App\Core\Services
 */
class BladeDirectiveManager
{
    /**
     * Register the blade directives
     */
    public function register()
    {
        $this->registerFormGroupDirective();
        $this->registerLabelDirective();
        $this->registerStaticDirective();

        // Form fields
        $this->registerCheckboxDirective();
        $this->registerDateDirective();
        $this->registerInputDirective();
        $this->registerSelectDirective();
        $this->registerTextareaDirective();

        // Buttons
        $this->registerCreateButtonDirective();
        $this->registerEditButtonDirective();
        $this->registerShowButtonDirective();
        $this->registerSaveButtonDirective();
        $this->registerDeleteButtonDirective();
        $this->registerBackButtonDirective();
    }


    /**
     * Form Group Directive
     */
    protected function registerFormGroupDirective()
    {
        Blade::directive('formgroup', function () {
            return "<div class=\"form-group\">";
        });

        Blade::directive('endformgroup', function () {
            return "</div>";
        });
    }


    /**
     * Label directive
     */
    protected function registerLabelDirective()
    {
        Blade::directive('label', function ($expression) {
            return $this->render('blade_manager::label', $expression);
        });
    }


    /**
     * Static directive
     */
    protected function registerStaticDirective()
    {
        Blade::directive('static', function ($expression) {
            return $this->render('blade_manager::static', $expression);
        });
    }


    /**
     * Checkbox directive
     */
    protected function registerCheckboxDirective()
    {
        Blade::directive('checkbox', function ($expression) {
            return $this->render('blade_manager::checkbox', $expression);
        });
    }


    /**
     * Date directive
     */
    protected function registerDateDirective()
    {
        Blade::directive('date', function ($expression) {
            return $this->render('blade_manager::date', $expression);
        });
    }


    /**
     * Input directive
     */
    protected function registerInputDirective()
    {
        Blade::directive('input', function ($expression) {
            return $this->render('blade_manager::input', $expression);
        });
    }


    /**
     * Select directive
     */
    protected function registerSelectDirective()
    {
        Blade::directive('select', function ($expression) {
            return $this->render('blade_manager::select', $expression);
        });
    }


    /**
     * Textarea directive
     */
    protected function registerTextareaDirective()
    {
        Blade::directive('textarea', function ($expression) {
            return $this->render('blade_manager::textarea', $expression);
        });
    }


    /**
     * Create Button directive
     */
    protected function registerCreateButtonDirective()
    {
        Blade::directive('createButton', function ($expression) {
            return $this->render('blade_manager::button_create', $expression);
        });
    }


    /**
     * Edit Button directive
     */
    protected function registerEditButtonDirective()
    {
        Blade::directive('editButton', function ($expression) {
            return $this->render('blade_manager::button_edit', $expression);
        });
    }


    /**
     * Show Button directive
     */
    protected function registerShowButtonDirective()
    {
        Blade::directive('showButton', function ($expression) {
            return $this->render('blade_manager::button_show', $expression);
        });
    }


    /**
     * Save Button directive
     */
    protected function registerSaveButtonDirective()
    {
        Blade::directive('saveButton', function ($expression) {
            return $this->render('blade_manager::button_save', $expression);
        });
    }


    /**
     * Delete Button directive
     */
    protected function registerDeleteButtonDirective()
    {
        Blade::directive('deleteButton', function ($expression) {
            return $this->render('blade_manager::button_delete', $expression);
        });
    }


    /**
     * Back Button directive
     */
    protected function registerBackButtonDirective()
    {
        Blade::directive('backButton', function ($expression) {
            return $this->render('blade_manager::button_back', $expression);
        });
    }


    /**
     * Get arguments array from $expression string.
     *
     * @param string $expression
     *
     * @return array
     */
    protected function getArguments($expression)
    {
        return explode(', ', str_replace(['(', ')'], '', $expression));
    }


    /**
     * Render a view based directive
     *
     * @param $view
     * @param $expression
     *
     * @return string
     */
    protected function render($view, $expression)
    {
        if (!$expression) {
            $expression = '[]';
        }

        return "<?php 
            echo \$__env->make('{$view}', array_except(get_defined_vars(), ['__data', '__path']))
            ->with({$expression})
            ->render(); 
        ?>";
    }
}