<?php
require_once 'PhotoProcessor.php';

class PhotoProcessorComplex extends PhotoProcessor
{

    protected $fourBySixGlossyQuantity = 0;
    protected $fourBySixMatteQuantity = 0;
    protected $fiveBySevenGlossyQuantity = 0;
    protected $fiveBySevenMatteQuantity = 0;
    protected $eightByTenGlossyQuantity = 0;
    protected $eightByTenMatteQuantity = 0;

    protected $processingTime;

    protected $pricesArray = [
                                            '4x6' => [
                                            'price' => 0.19,
                                            'matte' => 0.04,
                                            ],
                                            '5x7' => [
                                                'price' => 0.39,
                                                'matte' => 0.06,
                                            ],
                                            '8x10' => [
                                                'price' => 0.79,
                                                'matte' => 0.08,
                                            ],
                                            'processing' => [
                                                'oneHour' =>  ['small' => 2.00, 'large' => 2.50]
                                            ]
                                        ];

    public function __construct($data)
    {

        $this->setPhotoSize($data);

        $this->setProcessingTime($data->processingTime);

        $this->setPromotionCode($data->promotionCode);


    }

    public function getTotal()
    {
        return number_format($this->getPrice() - $this->getDiscount(), 2);
    }

    protected function getPrice()
    {
        $totals = array();
        $totals[] = $this->pricesArray['4x6']['price'] * $this->fourBySixGlossyQuantity;
        $totals[] = ($this->pricesArray['4x6']['price'] * $this->fourBySixMatteQuantity) + ($this->fourBySixMatteQuantity * $this->pricesArray['4x6']['matte']);

        $totals[] = $this->pricesArray['5x7']['price'] * $this->fiveBySevenGlossyQuantity;
        $totals[] = ($this->pricesArray['5x7']['price'] * $this->fiveBySevenMatteQuantity) + ($this->fiveBySevenMatteQuantity * $this->pricesArray['5x7']['matte']);

        $totals[] = $this->pricesArray['8x10']['price'] * $this->eightByTenGlossyQuantity;
        $totals[] = ($this->pricesArray['8x10']['price'] * $this->eightByTenMatteQuantity) + ($this->eightByTenMatteQuantity * $this->pricesArray['8x10']['matte']);

        $totals[] = $this->getProcessingPrice();


        return array_sum($totals);
    }

    public function getDiscountMessage()
    {

    }

    protected function getOrderSize()
    {
        return ($this->fourBySixGlossyQuantity + $this->fourBySixMatteQuantity +  $this->fiveBySevenGlossyQuantity + $this->fiveBySevenMatteQuantity + $this->eightByTenGlossyQuantity + $this->eightByTenMatteQuantity);
    }

    protected function getProcessingPrice()
    {
        if ($this->getOrderSize() == 0 ) {
            return 0;
        } else if ($this->getOrderSize() <= 60) {
            return 2;
        } else {
            return 2.50;
        }
    }

    protected function setPhotoSize($data)
    {
        if ($data->fourBySixGlossyQuantity) {
            $this->fourBySixGlossyQuantity = $data->fourBySixGlossyQuantity;
        }

        if ($data->fourBySixMatteQuantity) {
            $this->fourBySixMatteQuantity = $data->fourBySixMatteQuantity;
        }

        if ($data->fiveBySevenGlossyQuantity) {
            $this->fiveBySevenGlossyQuantity = $data->fiveBySevenGlossyQuantity;
        }

        if ($data->fiveBySevenMatteQuantity) {
            $this->fiveBySevenMatteQuantity = $data->fiveBySevenMatteQuantity;
        }

        if ($data->eightByTenGlossyQuantity) {
            $this->eightByTenGlossyQuantity = $data->eightByTenGlossyQuantity;
        }

        if ($data->eightByTenMatteQuantity) {
            $this->eightByTenMatteQuantity = $data->eightByTenMatteQuantity;
        }
    }

    protected function setPhotoQuantity($data)
    {
        $this->setPhotoSize($data);
    }    
    protected function setPhotoFinish($data)
    {
        $this->setPhotoSize($data);
    }
    
    protected function setProcessingTime($time)
    {
        $this->processingTime = $time;
    }

    protected function getProcessingOrderSize()
    {
        $size = 'small';

        if ($this->getOrderSize() > 60) {
            $size = 'large';
        }

        return $size;
    }

    protected function getMattePrice()
    {

    }

    protected function setPromotionCode($code)
    {
        $this->promotionCode = $code;
    }

    protected function isValidPromotionCode()
    {
        return ($this->promotionCode == $this->validPromotionCode && $this->getOrderSize() >= 100 );
    }
}
