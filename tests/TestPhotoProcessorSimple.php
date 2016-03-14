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
}
