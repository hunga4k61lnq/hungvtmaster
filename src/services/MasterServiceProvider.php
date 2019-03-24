<?php 
namespace Hungvt\Master\Services;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class MasterServiceProvider extends ServiceProvider {

    protected function initProviderAlias($module){
        $configPath = base_path() . '/packages/' . $module . '/config/app.php';
        if(file_exists($configPath)){
            $config = include $configPath;
            if(array_key_exists("providers", $config)){
                foreach ($config['providers'] as $key => $value) {
                    $this->app->register($value);
                }
            }
            if(array_key_exists("aliases", $config)){
                foreach ($config['aliases'] as $key => $value) {
                    AliasLoader::getInstance()->alias($key,$value);
                }
            }

        }
    }
}