<?php

class PhotoProcessorSimple
{

    protected $validPromotionCode = 'N56M2';

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
                                                'small' => 1.00,
                                                'large' => 1.50,
                                            ]
                                        ];

    protected $promotionCodeDiscount = 2.50;

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

    public function getTotal()
    {
        $size               = $this->getOrderSize();
        $pricePerPhoto      = $this->pricesArray[$this->photoSize][$size];
        $quantity           = $this->photoQuantity;
        $priceBeforeMatte   = $pricePerPhoto * $quantity;
        $mattePricePerPhoto = $this->pricesArray[$this->photoSize]['matte'];
        $mattePrice         = ( $this->photoFinish == 'Matte' ? ($quantity * $mattePricePerPhoto) : 0 );
        $price              = $mattePrice + $priceBeforeMatte;

        if ($this->processingTime == 'oneHour') {
            $price += $this->pricesArray['processing'][$this->getProcessingOrderSize()];
        }

        if ($this->isValidPromotionCode()) {
            $price -= $this->promotionCodeDiscount;
        }

        return $price;
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


}
