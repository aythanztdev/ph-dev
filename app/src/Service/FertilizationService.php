<?php

namespace App\Service;

use App\Constants\Season as SeasonConstants;
use App\Entity\Bonsai;

class FertilizationService
{
    public function fertilizate(Bonsai $bonsai)
    {
        $datetimeNow = new \DateTime();

        $datetimeSpring = new \DateTime(SeasonConstants::SPRING);
        $datetimeSummer = new \DateTime(SeasonConstants::SUMMER);
        $datetimeFall = new \DateTime(SeasonConstants::FALL);

        $diff = date_diff($bonsai->getLastFertilization(), $datetimeNow);

        $fertilize = false;
        if ((
                $datetimeNow >= $datetimeSummer && $datetimeSpring <= $datetimeFall ||
                $datetimeNow >= $datetimeSpring && $datetimeSpring <= $datetimeSummer
            ) &&
            $diff->format("%d") <= 30
        ) {
            $fertilize = true;
        }

        return $fertilize;
    }
}