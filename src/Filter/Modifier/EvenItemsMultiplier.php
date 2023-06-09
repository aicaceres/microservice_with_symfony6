<?php

namespace App\Filter\Modifier;

use App\DTO\PromotionEnquiryInterface;
use App\Entity\Promotion;

class EvenItemsMultiplier implements PriceModifierInterface
{
    public function modify(int $price, int $quantity, Promotion $promotion, PromotionEnquiryInterface $enquiry): int
    {
        if($quantity <2){
            return $price * $quantity;
        }
        // Get the odd item
        $oddCount = $quantity % 2;
        // Even items
        $evenCount = $quantity - $oddCount;

        return (($evenCount * $price) * $promotion->getAdjustment()) + ($oddCount * $price);
    }
}
