<?php 

namespace App\Http\Services;

use App\Http\Request\FloodingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FileService {

    public function __invoke($dataFile) {

        $cases = [];
        $next = 1;

        foreach ($dataFile as $key => $line){
            if ($line == '' || $key == 0 || $key != $next){
                continue;
            }

            $cases[] = [
                'length' => $line,
                'data' => explode(' ', $dataFile[$key+1])
            ];

            $next = $key+2;
        }

       return $cases;
    }
}