<?php

declare(strict_types=1);

namespace Braddle\Shop\Entity;

class Basket
{
    private $count = 0;

    private $total = 0.0;

    public function isEmpty() : bool
    {
        return $this->count == 0;
    }

    public function getTotal() : float
    {
        return $this->total;
    }

    public function getItemCount() : int
    {
        return $this->count;
    }

    public function addBasketItem(BasketItem $basketItem)
    {
        $this->count++;
        $this->total += $basketItem->getPrice();
    }

    public function RemoveBasketItem(BasketItem $basketItem)
    {
        $this->count--;
    }
}
