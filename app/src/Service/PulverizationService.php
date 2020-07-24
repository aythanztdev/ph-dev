<?php

namespace App\Service;

use App\Entity\Bonsai;
use App\Constants\BonsaiType as BonsaiTypeConstants;

class PulverizationService
{
    public function pulverize(Bonsai $bonsai)
    {
        $pulverize = null;
;        if ($bonsai->getBonsaiType() === BonsaiTypeConstants::TYPE_ELM) {
            $pulverize = $bonsai->getBonsaiType()->getIrrigation();
        }

        return $pulverize;
    }
}