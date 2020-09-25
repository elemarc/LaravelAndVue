<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingVueController extends Controller
{
    public function index()
    {
        return [ //laravel manda este array automaticamente por  json
            'name' => 'John Doe',
        ];
    }
}
