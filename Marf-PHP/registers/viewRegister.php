<?php

class ViewRegister {
    private static $viewMap = [];

    public static function register($viewName, $className) {
        self::$viewMap[$viewName] = $className;
    }

    public static function show($viewName) {
        if (!isset(self::$viewMap[$viewName])) {
            header("Content-Type: application/json");
            http_response_code(500);
            die("Error: view '$viewName' not found.");
        }

        $className = self::$viewMap[$viewName];
        $view = new $className();
        header("Content-Type: " . self::getMimeType($view->getFnex()));
        die($view->show());
    }

    public static function getMimeType($fnex) {
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