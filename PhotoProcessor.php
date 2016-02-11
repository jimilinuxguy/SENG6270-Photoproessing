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
}
