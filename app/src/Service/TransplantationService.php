<?php

namespace App\Service;

use App\Entity\Bonsai;
use App\Constants\Date as DateConstants;

class TransplantationService
{
    public function transplant(Bonsai $bonsai)
    {
        $datetimeNow = new \DateTime();
        $month = $datetimeNow->format('m');

        $transplant = false;
        if ($month == DateConstants::MARCH) {
            $transplant = true;
        }
        
        return $transplant;
    }
}