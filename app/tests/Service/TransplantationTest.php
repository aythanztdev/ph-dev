<?php

namespace App\Tests\Service;

use App\Constants\BonsaiType as BonsaiTypeConstants;
use App\Constants\Irrigation as IrrigationConstants;
use App\Entity\Bonsai;
use App\Entity\BonsaiType;
use App\Service\TransplantationService;
use PHPUnit\Framework\TestCase;

class TransplantationTest extends TestCase
{
    public function testTransplantOk()
    {
        $transplantationService = new TransplantationService();

        $bonsaiType = new BonsaiType();
        $bonsaiType->setType(BonsaiTypeConstants::TYPE_APPLE_TREE);
        $bonsaiType->setIrrigation(IrrigationConstants::IRRIGATION_FREQUENT);

        $bonsai = new Bonsai();
        $bonsai->setBonsaiType($bonsaiType);

        $result = $transplantationService->transplant($bonsai);

        $this->assertEquals(false, $result);
    }
}