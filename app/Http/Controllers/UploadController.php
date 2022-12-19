<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Traits\TimeTrait;

class UploadController extends Controller
{
    
    use TimeTrait;
    
    public function index()
    {
    
    }

     /**
     * Zobraz formulář.
     *
     * @return View
     */
    public function show(): View
    {
        return view('upload.show');
    }


    public function uploadFile(Request $request)
    {
        if($request->file('file'))
        {
            $file = $request->file('file');
            
            $xmlFile = file_get_contents($file->getRealPath());

            $xml = simplexml_load_string($xmlFile);
            
            $i = 1;
            $predchozi_lat = 0;
            $predchozi_lon = 0;
            $delka_narustem = 0;
            
            
            foreach($xml->trk->trkseg->trkpt as $val)
            {
                if($i == 1)
                {
                    $startTime = $this->ISO8601ToSec($val->time);
                }
                    
                if($predchozi_lat && $predchozi_lon)
                {
                        $delka = $this->getDistance(floatval($predchozi_lat),floatval($predchozi_lon),floatval($val['lat']),floatval($val['lon']));
                    $delka_narustem += $delka * 1000;
                    if($delka_narustem > 1000)
                    {
                        //break;
                    }


                }
                    $predchozi_lat = $val['lat'];
                    $predchozi_lon = $val['lon'];
                
                $finishTime = $this->ISO8601ToSec($val->time);
                $i++;
            }


            echo $this->SecToTime(($finishTime - $startTime))."<br>";

            echo round($delka_narustem,1);
                    
                
           // return redirect('/');
        }
    }



    

  

    private function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {
        $earth_radius = 6371;
    
        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);
    
        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;
    
        return $d;
    }

 




    


}
