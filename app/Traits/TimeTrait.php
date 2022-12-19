<?php

namespace App\Traits;


trait TimeTrait
{

    public function SecToTime($timesource)
    {
	    //je to varianta i pro případ, když je cas vetsi nez 24 hodin
	    $time = trim($timesource);
	    $time = explode(".",$timesource);
	    $seconds = $time[0];
	    $H = floor($seconds / 3600);
	    $i = ($seconds / 60) % 60;
	    $s = $seconds % 60;
	    
        if(count($time) > 1)
        {
		    $vystupni_cas = sprintf("%02d:%02d:%02d.%02d", $H, $i, $s,$time[1]);
	    }
	    else
        {
		    $vystupni_cas = sprintf("%02d:%02d:%02d", $H, $i, $s);
	    }
	    
        return $vystupni_cas;
	}

	
	
	
	public function TimeToSec($timesource)
	{
		return  (strtotime($timesource) - strtotime('00:00:00'));
	}

	
	
	
	
	
	public function ISO8601ToSec($timesource)
    {
        $a = explode("T",$timesource);
        $b = explode('.',$a[1]);
        
        return  $this->TimeToSec($b[0]); 
    }


    
}


