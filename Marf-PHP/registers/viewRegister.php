<?php

class ViewRegister {
    private static $viewList = [];

    public static function register($viewObj) {
        ViewRegister::$viewList[] = $viewObj;
    }

    public static function show($viewName) {
        foreach (ViewRegister::$viewList as $view) {
            if ($view->getName() == $viewName) {
                header("Content-Type: " . ViewRegister::getMimeType($view->getFnex()));
                $view->show();
            }
        }
        die("<h1>Error: view '" . $viewName . "' does not exist.</h1>");
    }

    private static function getMimeType($fnex) {
        return match ($fnex) {
            'html', 'htm', 'php' => 'text/html',
            'css'   => 'text/css',
            'csv'   => 'text/csv',
            'js'    => 'text/javascript',
            'json'  => 'application/json',
            'xml'   => 'application/xml',
            'pdf'   => 'application/pdf',
            'zip'   => 'application/zip',
            'gz'    => 'application/gzip',
            'tar'   => 'application/x-tar',
            'rar'   => 'application/x-rar-compressed',
            '7z'    => 'application/x-7z-compressed',
            'doc'   => 'application/msword',
            'xls'   => 'application/vnd.ms-excel',
            'ppt'   => 'application/vnd.ms-powerpoint',
            'docx'  => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'xlsx'  => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'pptx'  => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
            'jpg', 'jpeg' => 'image/jpeg',
            'png'   => 'image/png',
            'gif'   => 'image/gif',
            'svg'   => 'image/svg+xml',
            'webp'  => 'image/webp',
            'bmp'   => 'image/bmp',
            'tif', 'tiff' => 'image/tiff',
            'ico'   => 'image/vnd.microsoft.icon',
            'mp3'   => 'audio/mpeg',
            'ogg'   => 'audio/ogg',
            'wav'   => 'audio/wav',
            'aac'   => 'audio/aac',
            'weba'  => 'audio/webm',
            'mp4'   => 'video/mp4',
            'mpeg'  => 'video/mpeg',
            'ogv'   => 'video/ogg',
            'webm'  => 'video/webm',
            'avi'   => 'video/x-msvideo',
            'mov'   => 'video/quicktime',
            'ttf'   => 'font/ttf',
            'woff'  => 'font/woff',
            'woff2' => 'font/woff2',
            'eot'   => 'application/vnd.ms-fontobject',
            'bin', 'exe', 'dll' => 'application/octet-stream',
            default => 'text/plain',
        };
    }
}
?>