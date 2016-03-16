<?php

require_once '../PhotoProcessorSimple.php';

class TestPhotoProcessorSimple extends PHPUnit_Framework_TestCase
{


    public function testSimpleBoundsNoOptions()
    {

        $data = new stdClass();
        $data->photoSize = '4x6';
        $data->photoQuantity = 1;
        $data->photoFinish = 'Glossy';
        $data->processingTime = 'oneDay';
        $data->promotionCode = null;

        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(0.14, $photoProcessor->getTotal());


        $data->photoQuantity = 2;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(0.28, $photoProcessor->getTotal());


        $data->photoQuantity = 49;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(6.86, $photoProcessor->getTotal());

        $data->photoQuantity = 50;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(7, $photoProcessor->getTotal());

        $data->photoQuantity = 51;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(7.12, $photoProcessor->getTotal());


        $data->photoQuantity = 74;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(9.88, $photoProcessor->getTotal());


        $data->photoQuantity = 75;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(10, $photoProcessor->getTotal());


        $data->photoQuantity = 99;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(12.4, $photoProcessor->getTotal());


        $data->photoQuantity = 100;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(12.5, $photoProcessor->getTotal());


        $data->photoQuantity = 0;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(0, $photoProcessor->getTotal()); 


    } 
    public function testSimpleBoundsMatteOnedayOptions()
    {

        $data = new stdClass();
        $data->photoSize = '4x6';
        $data->photoQuantity = 1;
        $data->photoFinish = 'Matte';
        $data->processingTime = 'oneDay';
        $data->promotionCode = null;

        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(0.16, $photoProcessor->getTotal());

        $data->photoQuantity = 2;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(0.32, $photoProcessor->getTotal());

        $data->photoQuantity = 49;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(7.84, $photoProcessor->getTotal());

        $data->photoQuantity = 50;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(8, $photoProcessor->getTotal());

        $data->photoQuantity = 51;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(8.14, $photoProcessor->getTotal());


        $data->photoQuantity = 74;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(11.36, $photoProcessor->getTotal());


        $data->photoQuantity = 75;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(11.50, $photoProcessor->getTotal());

        $data->photoQuantity = 76;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(11.62, $photoProcessor->getTotal());



        $data->photoQuantity = 99;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(14.38, $photoProcessor->getTotal());


        $data->photoQuantity = 100;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(14.5, $photoProcessor->getTotal());


        $data->photoQuantity = 0;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(0, $photoProcessor->getTotal()); 

    }

    public function testSimpleBoundsGlossyOnehourOptions()
    {

        $data = new stdClass();
        $data->photoSize = '4x6';
        $data->photoQuantity = 1;
        $data->photoFinish = 'Glossy';
        $data->processingTime = 'oneHour';
        $data->promotionCode = null;

        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(1.14, $photoProcessor->getTotal());

        $data->photoQuantity = 2;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(1.28, $photoProcessor->getTotal());


        $data->photoQuantity = 59;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(9.08, $photoProcessor->getTotal());


        $data->photoQuantity = 60;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(9.20, $photoProcessor->getTotal());


        $data->photoQuantity = 61;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(9.82, $photoProcessor->getTotal());

        $data->photoQuantity = 99;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(13.90, $photoProcessor->getTotal());



        $data->photoQuantity = 100;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(14.00, $photoProcessor->getTotal());


    }
   public function testSimpleBoundsMatteOnehourOptions()
    {

        $data = new stdClass();
        $data->photoSize = '4x6';
        $data->photoQuantity = 1;
        $data->photoFinish = 'Matte';
        $data->processingTime = 'oneHour';
        $data->promotionCode = null;

        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(1.16, $photoProcessor->getTotal());

        $data->photoQuantity = 2;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(1.32, $photoProcessor->getTotal());


        $data->photoQuantity = 59;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(10.26, $photoProcessor->getTotal());


        $data->photoQuantity = 60;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(10.40, $photoProcessor->getTotal());


        $data->photoQuantity = 61;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(11.04, $photoProcessor->getTotal());

        $data->photoQuantity = 99;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(15.88, $photoProcessor->getTotal());



        $data->photoQuantity = 100;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(16.00, $photoProcessor->getTotal());

    }

}
