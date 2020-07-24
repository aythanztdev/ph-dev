<?php

namespace App\Tests\Service;

use App\Entity\Bonsai;
use App\Entity\BonsaiType;
use App\Constants\BonsaiType as BonsaiTypeConstants;
use App\Constants\Irrigation as IrrigationConstants;
use App\Service\IrrigationService;
use PHPUnit\Framework\TestCase;

class IrrigationTest extends TestCase
{
    public function testIrrigationSummer()
    {
        $irrigationService = new IrrigationService();

        $bonsaiType = new BonsaiType();
        $bonsaiType->setType(BonsaiTypeConstants::TYPE_APPLE_TREE);
        $bonsaiType->setIrrigation(IrrigationConstants::IRRIGATION_FREQUENT);

        $bonsai = new Bonsai();
        $bonsai->setBonsaiType($bonsaiType);

        $result = $irrigationService->irrigate($bonsai);

        $this->assertEquals(IrrigationConstants::IRRIGATION_VERY_FREQUENT, $result);
    }
}