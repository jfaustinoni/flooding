<?php 

namespace App\Http\Services;


class CalculateFloodService {

    public function __invoke($map, $data, $y):int {

        $height = max($data);
        $x = 0;

        $floods = 0;
        for($y; $y < $height; $y++){
            if(isset($map[$y][$x+1])){
                if($map[$y][$x+1]){
                    $y = ($height - $data[$x+1]) - 1;
                    $x++;
                    continue;
                }

                $floods += $this->countFlood(($x+1), $map[$y]);
            }
        }

        return $floods;
    }

    private function countFlood($init, $mapRow):int {
        $tmp = 0;
        for($i = $init; $i < count($mapRow); $i++){
            if($mapRow[$i]){
                return $tmp;
            }
            $tmp++;
        }

        return 0;
    }
}