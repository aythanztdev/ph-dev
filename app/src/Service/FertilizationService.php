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

        $fertilizedInTheLastThirtyDays = false;
        if ($bonsai->getLastFertilization()) {
            $diff = date_diff($bonsai->getLastFertilization(), $datetimeNow);
            if ($diff->format("%d") <= 30) {
                $fertilizedInTheLastThirtyDays = true;
            }
        }

        $fertilize = false;
        if ((
                $datetimeNow >= $datetimeSummer && $datetimeSpring <= $datetimeFall ||
                $datetimeNow >= $datetimeSpring && $datetimeSpring <= $datetimeSummer
            ) &&
            !$fertilizedInTheLastThirtyDays
        ) {
            $fertilize = true;
        }

        return $fertilize;
    }
}