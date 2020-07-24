<?php

namespace App\Tests\Service;

use App\Constants\BonsaiType as BonsaiTypeConstants;
use App\Constants\Irrigation as IrrigationConstants;
use App\Entity\Bonsai;
use App\Entity\BonsaiType;
use App\Service\PulverizationService;
use PHPUnit\Framework\TestCase;

class PulverizationTest extends TestCase
{
    public function testPulverizeAppleTree()
    {
        $pulverizationService = new PulverizationService();

        $bonsaiType = new BonsaiType();
        $bonsaiType->setType(BonsaiTypeConstants::TYPE_APPLE_TREE);
        $bonsaiType->setIrrigation(IrrigationConstants::IRRIGATION_FREQUENT);

        $bonsai = new Bonsai();
        $bonsai->setBonsaiType($bonsaiType);

        $result = $pulverizationService->pulverize($bonsai);

        $this->assertEquals(null, $result);
    }

    public function testPulverizeElm()
    {
        $pulverizationService = new PulverizationService();

        $bonsaiType = new BonsaiType();
        $bonsaiType->setType(BonsaiTypeConstants::TYPE_ELM);
        $bonsaiType->setIrrigation(IrrigationConstants::IRRIGATION_FREQUENT);

        $bonsai = new Bonsai();
        $bonsai->setBonsaiType($bonsaiType);

        $result = $pulverizationService->pulverize($bonsai);

        $this->assertEquals(IrrigationConstants::IRRIGATION_FREQUENT, $result);
    }
}