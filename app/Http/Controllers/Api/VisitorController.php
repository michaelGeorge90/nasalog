<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VistorResource;
use App\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function get(){
        // return all visitors data
        return VistorResource::collection(Visitor::select('name')->get());
    }
}
