<?php

namespace App\Console\Commands\Commands;

use Illuminate\Console\GeneratorCommand;

class CrudRouteCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:route
                            {name : The name of the module.}
                            {--with-api=no : Include api routes.}
                            {--crud-name= : The name of the Crud.}
                            {--route-group= : The name of the route group.}
                            {--module-name= : The name of the module.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new route.';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Route';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return config('crudgenerator.custom_template')
        ? config('crudgenerator.path') . '/routes.stub'
        : __DIR__ . '/../stubs/routes.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return 'App\Modules\\'.$this->option('module-name');
    }

    /**
     * Build the model class with the given name.
     *
     * @param  string  $name
     *
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        // dd($stub);
        $moduleName =  $this->option('module-name');
        $withApi =  $this->option('with-api');
        $viewName = snake_case($this->option('crud-name'), '-');
        $routeGroup = ($this->option('route-group')) ? $this->option('route-group') . '/' : '';
        $lowerModuleName =  strtolower($moduleName);

        $this->replaceModuleName($stub, $moduleName)
              ->replaceRouteGroup($stub, $routeGroup)
              ->replaceViewName($stub, $viewName);

        if($withApi == 'yes'){
          $this->addApiRoute($stub, true, $moduleName, $lowerModuleName, $routeGroup, $viewName);
        }else{
          $this->addApiRoute($stub, false);
        }

        return $stub;
    }

    /**
     * Replace the viewName fo the given stub.
     *
     * @param string $stub
     * @param string $viewName
     *
     * @return $this
     */
    protected function replaceViewName(&$stub, $viewName)
    {
        $stub = str_replace('{{viewName}}', $viewName, $stub);

        return $this;
    }

    /**
     * Replace the routeGroup for the given stub.
     *
     * @param  string  $stub
     * @param  string  $routeGroup
     *
     * @return $this
     */
    protected function replaceRouteGroup(&$stub, $routeGroup)
    {
        $stub = str_replace('{{routeGroup}}', $routeGroup, $stub);

        return $this;
    }

    /**
     * Replace the module name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     *
     * @return $this
     */
    protected function addApiRoute(&$stub, $is, $moduleName='', $routeGroup='', $viewName='')
    {
        if($is){
          echo 'API ';
          $isiStub = "Route::namespace('App\Modules\\".$moduleName."\Controllers')->prefix('api')->name('api.')->middleware(['api'])->group(function () {
  Route::apiResource('".$routeGroup.$viewName."', '".$moduleName."ApiController');
});";
        }else{
          echo 'No API';
          $isiStub = '';
        }

        $stub = str_replace('{{apiRoute}}', $isiStub, $stub);

        return $this;
    }

    /**
     * Replace the module name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     *
     * @return $this
     */
    protected function replaceModuleName(&$stub, $name)
    {
        $stub = str_replace('{{moduleName}}', $name, $stub);

        return $this;
    }

    /**
     * Replace the module name in lowercase for the given stub.
     *
     * @param  string  $stub
     * @param  string  $lowerModuleName
     *
     * @return $this
     */
    protected function replaceLowerModuleName(&$stub, $lowername)
    {
        $stub = str_replace('{{lowerModuleName}}', $lowername, $stub);

        return $this;
    }
}
