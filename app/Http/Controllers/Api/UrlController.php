<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UrlResource;
use App\Http\Resources\VistorResource;
use App\URL;
use App\Visitor;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function hits(){
        return UrlResource::collection(URL::select(['route','hits'])->get());
    }


    public function top(){
        return [
            'visitors'=> VistorResource::collection(Visitor::select('name','hits')->orderBy('hits','desc')->get()),
            'urls'=> UrlResource::collection(URL::select(['route','hits'])->orderBy('hits','desc')->get())
        ];
    }
}
