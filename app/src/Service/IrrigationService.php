<?php

namespace App\Service;

use App\Entity\Bonsai;
use App\Constants\Irrigation as IrrigationConstants;

class IrrigationService
{
    public function irrigate(Bonsai $bonsai)
    {
        $datetimeNow = new \DateTime();
        $month = $datetimeNow->format('m');

        if ($month >= IrrigationConstants::VERY_FREQUENT_MONTH_START && $month <= IrrigationConstants::VERY_FREQUENT_MONTH_END) {
            return IrrigationConstants::IRRIGATION_VERY_FREQUENT;
        }

        return $bonsai->getBonsaiType()->getIrrigation();
    }
}