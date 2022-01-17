<?php 

namespace App\Http\Services;


class CreateMapService {

    public function __invoke($data):array {

        $width = count($data);
        $height = max($data);
        $map = [];

        for($h = ($height - 1); $h >= 0; $h--){
            for($w = 0; $w < $width; $w++){
                if($data[$w]){
                    $map[$h][$w] = 1;
                    $data[$w]--;
                    continue;
                }

                $map[$h][$w] = 0;
            }
        }

        ksort($map);
        
        return $map;
    }
}