<?php
namespace Hungvt\Master\Controller;
use Illuminate\Routing\Controller;
class BaseController extends Controller
{
	protected function _name(){
		echo "Hello, Vth";
	}
	protected function addExtensionTwig($extension){
		if (is_string($extension)) {
	        try {
	            $extension = app($extension);
	        } catch (\Exception $e) {
	            throw new \InvalidArgumentException(
	                "Cannot instantiate Twig extension '$extension': " . $e->getMessage()
	            );
	        }
	    } elseif (is_callable($extension)) {
	        $extension = $extension(app(), app('twig'));
	    } elseif (!is_a($extension, 'Twig_Extension')) {
	        throw new \InvalidArgumentException('Incorrect extension type');
	    }
	    \Twig::addExtension($extension);
    }
}