<?php

namespace App\Http\Controllers;

use App\Processors\NumberCalculatorProcessor;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function findEquation(Request $request, NumberCalculatorProcessor $numberCalculatorProcessor)
    {
        $data = $request->validate(
            [
                'target' => 'required|integer',
                'input_csv' => 'file'
            ]
        );

        $target = (int)$data['target'];
        $numbers = $this->getNumbersFromCsv($data['input_csv']);

        $results = $numberCalculatorProcessor->findEquations($target, $numbers);

        return view('numbers', ['results' => $results]);
    }

    protected function getNumbersFromCsv($filename): array
    {
        $contents = file_get_contents($filename);

        $entries = explode(',', $contents);

        return array_map(function($entry) {
            return (int)$entry;
        }, $entries);
    }
}
