<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FloodingRequest;
use App\Http\Services\FileService;
use App\Http\Services\CreateMapService;
use App\Http\Services\CalculateFloodService;

class FloodingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(FloodingRequest $request, FileService $fileService, CreateMapService $createMapService, CalculateFloodService $calculateFlood)
    {
        $request->validated();
        
        $dataFile = file($request->file->path(), FILE_IGNORE_NEW_LINES);
        $cases = $fileService($dataFile);

        if ($dataFile[0] != count($cases)){
            $message = "Quantidade de casos diferente da quantidade enviada";
            return view('flooding', ['message' => $message]);
        }

        $results = [];
        foreach($cases as $case) {
            $map = $createMapService($case['data']);

            $startY = (max($case['data']) - $case['data'][0]);

            $results[] = $calculateFlood($map, $case['data'], $startY);
        }

        return view('flooding', ['results' => $results]);
    }
}
