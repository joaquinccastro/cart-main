<?php

class FileUtility
{
    public static function openCSV($csv_file)
    {
        $data = [];
        $headers = [];
        $index = 0;
        try {
            $file = fopen($csv_file, 'r');
            while($row = fgetcsv($file)) {
                if ($index == 0) {
                    $headers = $row;
                    $index++;
                    continue;
                }

                $csv_data = [];
                for ($i = 0; $i < count($row); $i++) {
                    $csv_data[$headers[$i]] = $row[$i];
                }
                array_push($data, $csv_data);
                $index++;
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
        
        return $data;
    }

    public static function writeToFile($target_file, $data)
    {
        return;
    }
}