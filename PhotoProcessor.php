<?php

abstract class PhotoProcessor
{

    abstract protected function setPhotoSize($val);
    abstract protected function setPhotoQuantity($val);
    abstract protected function setPhotoFinish($val);
    abstract protected function setPromotionCode($val);
    abstract protected function setProcessingTime($val);
    abstract protected function isValidPromotionCode();
    abstract protected function getOrderSize();
    abstract protected function getProcessingOrderSize();

    abstract protected function getTotal();
    abstract protected function getMattePrice();

    protected $validPromotionCode = 'N56M2';

    protected function getParts($quantity)
    {
        $bounds = [0,50, 75, 100];
        $data   = [0, 0, $quantity];

        if ($quantity > $bounds[2] && $quantity <= $bounds[3] ) {
            $data = [ ($quantity - 75), (75 - 50), 50];
        } else if ($quantity <= $bounds[2] && $quantity > $bounds[1] ) {
            $data = [ 0, ($quantity - 50), 50];
        }
        return $data;
    }

    protected function getDiscount()
    {
        $price = $this->getPrice();

        $discount[] = 0;

        if ($price >= 35) {
            $discount[] = $price * 0.05;
        }

        if ($this->isValidPromotionCode()) {
            $discount[] = 2;
        }

        return max($discount);
    }


    public function getDiscountMessage()
    {
        $discount = $this->getDiscount();

        if (!empty($discount)) {
            return 'A discount in the amount of $' . $discount . ' was applied.';
        } else {
            return 'No discount applied';
        }
    }
}
