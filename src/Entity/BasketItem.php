<?php

declare(strict_types=1);

namespace Braddle\Shop\Entity;

class BasketItem
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getPrice() : float
    {
        return $this->price;
    }

    public function sameAs(BasketItem $comparisonItem) : bool
    {
        return (
            $this->price === $comparisonItem->price &&
            $this->name === $comparisonItem->name
        );
    }
}
