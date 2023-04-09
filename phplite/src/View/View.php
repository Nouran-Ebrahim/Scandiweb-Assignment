<?php
namespace phplite\View;

use phplite\File\File;

use Jenssegers\Blade\Blade;

class View
{
    private function __construct()
    {
    }
    /**
     * Render view file
     *@param string $path
     *@param array $data
     * @return string
     */
    public static function render($path, $data = [])
    {
        return static::viewrender($path,$data);
    }
    /**
     * Render view file using the blade engine
     *@param string $path
     *@param array $data
     * @return string
     */
    public static function bladeRender($path, $data = [])
    {
        $blade = new Blade(File::path('views'), File::path('storage/cache'));

        return $blade->make($path, $data)->render();
    }
    /**
     * Render view file
     *@param string $path
     *@param array $data
     * @return string
     */
    public static function viewrender($path, $data = [])
    {
        $path = 'views' . File::ds() . str_replace(['/', '\\', '.'], File::ds(), $path) . '.php';
        if (!File::exist($path)) {
            echo " the view file path " . $path . " does not exist";
        }
        ob_start();
        extract($data);
        include File::path($path);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}