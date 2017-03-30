<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneratePasswordRequest;
use App\Services\GeneratorService;
use Illuminate\Http\Request;

class GeneratorController extends Controller
{
    private $generatorService;

    public function __construct(GeneratorService $generatorService)
    {
        $this->generatorService = $generatorService;
    }

    public function generatorForm()
    {
        return view('generate');
    }

    public function generatePassword(GeneratePasswordRequest $request)
    {
        $data = $request->all();
        switch ($data['charset']) {
            case 'lower':
                $alpha = true;
                $alphaUpper = false;
                break;
            case 'upper':
                $alpha = false;
                $alphaUpper = true;
                break;
            case 'lower_and_upper':
                $alpha = true;
                $alphaUpper = true;
                break;
            default:
                return redirect()->back();
        }
        $numerals = isset($data['numerals']) ? true : false;
        $specials = isset($data['specials']) ? true : false;
        $password = $this->generatorService->generate($data['length'], $alpha, $alphaUpper, $numerals, $specials);
        return view('result', ['password' => $password]);
    }
}
