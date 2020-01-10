<?php

namespace App\Http\Controllers;

use App\Logger;
use App\URL;
use App\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoggerController extends Controller
{
    public function buildFormFile($file){
        // reading from file line by line
        $counter  =0;
        foreach(file($file) as $line) {

            //explode the data to store it
            $data = explode(' ',$line);
            //check if the host exists or not

            if ($visitor  = Visitor::where('name',$data[0])->first()){
                $visitor->increment('hits');
            }else{
                $visitor = Visitor::create(['name'=>$data[0],'hits'=>1]);
            }

            if ($url  = URL::where('route',$data[6])->first()){
                $url->increment('hits');
            }else{
                $url = URL::create(['route'=>$data[6],'method'=>trim($data[5],'"'),'hits'=>1]);
            }

            dump(\DateTime::createFromFormat('d/M/Y:H:i:s',trim($data[3],'[')));
            Logger::create([
                'visitor_id'=>$visitor->id,
                'url_id'=>$url->id,
                'time'=>\DateTime::createFromFormat('d/M/Y:H:i:s',trim($data[3],'[')),
                'time_zone'=>trim($data[4],']'),
                'http_version'=>trim($data[7],'"'),
                'request_response'=>$data[8],
                'size'=>@$data[9],
            ]);
        $counter++;
        }

        return $counter;
    }
}
