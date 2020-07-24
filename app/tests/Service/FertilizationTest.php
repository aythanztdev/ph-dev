<?php

namespace App\Tests\Service;

use App\Entity\Bonsai;
use App\Entity\BonsaiType;
use App\Constants\BonsaiType as BonsaiTypeConstants;
use App\Constants\Irrigation as IrrigationConstants;
use App\Service\FertilizationService;
use PHPUnit\Framework\TestCase;

class FertilizationTest extends TestCase
{
    public function testFertilizate()
    {
        $fertilizationService = new FertilizationService();

        $bonsaiType = new BonsaiType();
        $bonsaiType->setType(BonsaiTypeConstants::TYPE_APPLE_TREE);
        $bonsaiType->setIrrigation(IrrigationConstants::IRRIGATION_FREQUENT);

        $bonsai = new Bonsai();

        $result = $fertilizationService->fertilizate($bonsai);

        $this->assertEquals(true, $result);
    }
}