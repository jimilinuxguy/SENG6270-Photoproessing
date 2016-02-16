<?php

require_once 'PhotoProcessor.php';

class PhotoProcessorSimple extends PhotoProcessor
{

    

    protected $promotionCode;

    protected $photoSize;

    protected $photoFinish;

    protected $processingTime;

    protected $photoQuantity;

    protected $pricesArray = [
                                            '4x6' => [
                                                'small' => 0.14, 
                                                'medium' => 0.12, 
                                                'large' => 0.10,
                                            'matte' => 0.12,
                                            ],
                                            '5x7' => [
                                                'small' => 0.34, 
                                                'medium' => 0.31,
                                                'large' => 0.28,
                                                'matte' => 0.03,
                                            ],
                                            '8x10' => [
                                                'small' => 0.68, 
                                                'medium' => 0.64,
                                                'large' => 0.60,
                                                'matte' => 0.04,
                                            ],
                                            'processing' => [
                                                'oneDay' => 1.00,
                                                'oneHour' => 1.50,
                                            ]
                                        ];

    public function __construct($data)
    {
        $this->setPhotoSize($data->photoSize);
        $this->setPhotoQuantity($data->photoQuantity);
        $this->setPhotoFinish($data->photoFinish);
        $this->setProcessingTime($data->processingTime);
        $this->setPromotionCode($data->promotionCode);

    }

    protected function setPhotoSize($size)
    {
        $this->photoSize = $size;
    }

    protected function setPhotoQuantity($quantity)
    {
        $this->photoQuantity = $quantity;
    }

    protected function setPhotoFinish($finish)
    {
        $this->photoFinish = $finish;
    }

    protected function setPromotionCode($code)
    {
        $this->promotionCode = $code;
    }

    protected function setProcessingTime($time)
    {
        $this->processingTime = $time;
    }

    protected function isValidPromotionCode()
    {
        return ($this->promotionCode == $this->validPromotionCode && $this->photoQuantity >= 100 );
    }

    protected function getOrderSize()
    {

        $size = 'large';

        if ($this->photoQuantity <= 50 ) {
            $size = 'small';
        } else if ($this->photoQuantity > 50 && $this->photoQuantity <= 75 ) {
            $size = 'medium';
        }

        return $size;
    }

    protected function getProcessingOrderSize()
    {
        $size = 'small';

        if ($this->photoQuantity > 60) {
            $size = 'large';
        }

        return $size;
    }

    protected function getMattePrice()
    {
        $mattePrice = 0;
        if ($this->photoFinish == 'Matte') {
            $mattePrice = $this->pricesArray[$this->photoSize]['matte'];
        }

        return $mattePrice * $this->photoQuantity;
    }

    protected function getPrice()
    {
        list($large, $medium, $small) = $this->getParts($this->photoQuantity);

        $prices[] = ($small * $this->pricesArray[$this->photoSize]['small']);

        $prices[] = ($medium * $this->pricesArray[$this->photoSize]['medium']); 

        $prices[] = ($large * $this->pricesArray[$this->photoSize]['large']); 

        $prices[] = $this->getMattePrice();

        $prices[] = $this->getProcessingPrice();

        return array_sum($prices);

    }

    public function getTotal()
    {
        return $this->getPrice() - $this->getDiscount();
    }


    protected function getProcessingPrice()
    {
        return $this->pricesArray['processing'][$this->processingTime];
    }


}
