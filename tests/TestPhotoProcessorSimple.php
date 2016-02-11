<?php

require_once '../PhotoProcessorSimple.php';

class TestPhotoProcessorSimple extends PHPUnit_Framework_TestCase
{


    public function testSimpleLowerBoundNoOptions()
    {

        $data = new stdClass();
        $data->photoSize = '4x6';
        $data->photoQuantity = 1;
        $data->photoFinish = 'Glossy';
        $data->processingTime = 'oneDay';
        $data->promotionCode = null;

        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(1.14, $photoProcessor->getTotal());

        $data->photoQuantity = 50;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(8, $photoProcessor->getTotal());

        $data->photoQuantity = 51;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(8.12, $photoProcessor->getTotal());

        $data->photoQuantity = 75;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(11, $photoProcessor->getTotal());


        $data->photoQuantity = 80;
        $photoProcessor = new PhotoProcessorSimple($data);
        $this->assertEquals(11.5, $photoProcessor->getTotal());


    }
}
