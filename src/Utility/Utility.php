<?php


namespace Utils\SohelRana820\Utility;


class Utility
{
    /**
     * @param $files
     * @param $filesPath
     * @param $zipFileName
     * @link https://gist.github.com/sohelrana820/95a37a475cf00580efe0347ee384152d
     * @link http://blog.sohelrana.me/create-download-zip-file-php/
     *
     * This function will create ZIP file and download.
     * It's takes $files array, $files location (path), and ZIP file name
     * as parameters and create ZIP file of these files and download
     */
    public static function createZipAndDownload($files, $filesPath, $zipFileName)
    {
        // Create instance of ZipArchive. and open the zip folder.
        $zip = new \ZipArchive();
        if ($zip->open($zipFileName, \ZipArchive::CREATE) !== TRUE) {
            exit("cannot open <$zipFileName>\n");
        }

        // Adding every attachments files into the ZIP.
        foreach ($files as $file) {

            $zip->addFile($filesPath . $file, $file);
        }
        $zip->close();

        // Download the created zip file
        header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename = $zipFileName");
        header("Pragma: no-cache");
        header("Expires: 0");
        readfile("$zipFileName");
        exit;
    }

    /**
     * @param $array
     * @param $key
     * @param $value
     * @return array
     *
     * Search multidimensional array by key/value
     */
    public static function arrayKeyValueSearch($array, $key, $value)
    {
        $results = array();
        if (is_array($array)) {
            if (isset($array[$key]) && $array[$key] == $value) {
                $results[] = $array;
            }
            foreach ($array as $subArray) {
                $results = array_merge($results, self::arrayKeyValueSearch($subArray, $key, $value));
            }
        }
        return $results;
    }
}