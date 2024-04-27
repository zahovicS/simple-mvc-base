<?php

namespace System\Views;

use Exception;
use System\Base\IBase;

class View implements IBase
{
    protected static $app_path;

    public static function setPath($app_path)
    {
        self::$app_path = $app_path;
    }
    public static function render(string $template, array $data = []): void
    {
        if (!empty($data)) {
            extract($data);
        }

        $template = str_replace(".", DIRECTORY_SEPARATOR, $template);
        $path_template = self::$app_path . DIRECTORY_SEPARATOR . $template . ".php";
        if (!file_exists($path_template)) {
            throw new Exception("No View exists");
        }
        ob_start(); // Iniciar el búfer de salida
        require_once $path_template;
        $content_html = ob_get_clean(); // Obtener el contenido del búfer de salida y limpiarlo
        echo $content_html;
    }
    public static function include(string $template, array $data = []): void
    {
        self::render($template, $data);
    }
}
