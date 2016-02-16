<?php

require_once '../PhotoProcessorComplex.php';

class TestPhotoProcessorComplex extends PHPUnit_Framework_TestCase
{


    public function testComplexBoundsNoOrders()
    {

        $data = new stdClass();
        $data->fourBySixGlossyQuantity = 0;
        $data->fourBySixMatteQuantity = 0;
        $data->fiveBySevenGlossyQuantity = 0;
        $data->fiveBySevenMatteQuantity = 0;
        $data->eightByTenGlossyQuantity = 0;
        $data->eightByTenMatteQuantity = 0;
        $data->processingTime = 'oneDay';
        $data->promotionCode = null;

        $photoProcessor = new PhotoProcessorComplex($data);
        $this->assertEquals(0, $photoProcessor->getTotal());
    }

    public function testComplexBoundsOneOptionNoPromotionOneDay()
    {

        $data = new stdClass();
        $data->fourBySixGlossyQuantity = 1;
        $data->fourBySixMatteQuantity = 0;
        $data->fiveBySevenGlossyQuantity = 0;
        $data->fiveBySevenMatteQuantity = 0;
        $data->eightByTenGlossyQuantity = 0;
        $data->eightByTenMatteQuantity = 0;
        $data->processingTime = 'oneDay';
        $data->promotionCode = null;

        $photoProcessor = new PhotoProcessorComplex($data);
        $this->assertEquals(2.19, $photoProcessor->getTotal());
    }

    public function testComplexBoundsOneOfEachOptionNoPromotionOneDay()
    {

        $data = new stdClass();
        $data->fourBySixGlossyQuantity = 1;
        $data->fourBySixMatteQuantity = 1;
        $data->fiveBySevenGlossyQuantity = 1;
        $data->fiveBySevenMatteQuantity = 1;
        $data->eightByTenGlossyQuantity = 1;
        $data->eightByTenMatteQuantity = 1;
        $data->processingTime = 'oneDay';
        $data->promotionCode = null;

        $photoProcessor = new PhotoProcessorComplex($data);
        $this->assertEquals(4.92, $photoProcessor->getTotal());

    }

    public function testComplexBoundsHundredOfEachOptionNoPromotionOneDay()
    {

        $data = new stdClass();
        $data->fourBySixGlossyQuantity = 100;
        $data->fourBySixMatteQuantity = 100;
        $data->fiveBySevenGlossyQuantity = 100;
        $data->fiveBySevenMatteQuantity = 100;
        $data->eightByTenGlossyQuantity = 100;
        $data->eightByTenMatteQuantity = 100;
        $data->processingTime = 'oneDay';
        $data->promotionCode = null;

        $photoProcessor = new PhotoProcessorComplex($data);
        $this->assertEquals(279.78, $photoProcessor->getTotal());

    }

    public function testComplexBoundsHundredOfEachOptionValidPromotionOneDay()
    {

        $data = new stdClass();
        $data->fourBySixGlossyQuantity = 100;
        $data->fourBySixMatteQuantity = 100;
        $data->fiveBySevenGlossyQuantity = 100;
        $data->fiveBySevenMatteQuantity = 100;
        $data->eightByTenGlossyQuantity = 100;
        $data->eightByTenMatteQuantity = 100;
        $data->processingTime = 'oneDay';
        $data->promotionCode = 'N56M2';

        $photoProcessor = new PhotoProcessorComplex($data);
        $this->assertEquals(279.78, $photoProcessor->getTotal()); // Should give the greater discount of 5% instead of the $2 here

    }
    public function testComplexBoundsValidPromotionOneDay()
    {

        $data = new stdClass();
        $data->fourBySixGlossyQuantity = 100;
        $data->fourBySixMatteQuantity = 0;
        $data->fiveBySevenGlossyQuantity = 0;
        $data->fiveBySevenMatteQuantity = 0;
        $data->eightByTenGlossyQuantity = 0;
        $data->eightByTenMatteQuantity = 0;
        $data->processingTime = 'oneDay';
        $data->promotionCode = 'N56M2';

        $photoProcessor = new PhotoProcessorComplex($data);
        $this->assertEquals(19.5, $photoProcessor->getTotal()); // Should give the discount of 5 $2 here

    }

    public function testComplexBoundsInvalidPromotionOneDay()
    {

        $data = new stdClass();
        $data->fourBySixGlossyQuantity = 100;
        $data->fourBySixMatteQuantity = 0;
        $data->fiveBySevenGlossyQuantity = 0;
        $data->fiveBySevenMatteQuantity = 0;
        $data->eightByTenGlossyQuantity = 0;
        $data->eightByTenMatteQuantity = 0;
        $data->processingTime = 'oneDay';
        $data->promotionCode = 'JIMI';

        $photoProcessor = new PhotoProcessorComplex($data);
        $this->assertEquals(21.5, $photoProcessor->getTotal()); // Should not give discount

    }


}
