<?php

namespace spec\Braddle\Shop\Entity;

use Braddle\Shop\Entity\Basket;
use Braddle\Shop\Entity\BasketItem;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BasketSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Basket::class);
    }

    function it_should_be_empty_when_new()
    {
        $this->isEmpty()->shouldReturn(true);
    }

    function it_should_have_item_count_of_zero_when_new()
    {
        $this->getItemCount()->shouldReturn(0);
    }

    function it_should_have_a_total_of_zero_when_new()
    {
        $this->getTotal()->shouldReturn(0.0);
    }

    function it_should_not_be_empty_once_an_item_has_been_added()
    {
        $this->addBasketItem(new BasketItem("Building Microservices by Sam Newman", 49.99));
        $this->isEmpty()->shouldReturn(false);
    }

    function it_should_have_a_count_of_one_once_an_item_has_been_added()
    {
        $this->addBasketItem(new BasketItem("Build APIs You Won't Hate by Phil Sturgeon", 17.61));
        $this->getItemCount()->shouldReturn(1);
    }

    function it_should_have_a_total_equal_to_the_value_of_the_item_added()
    {
        $this->addBasketItem(new BasketItem("Clean Coder by Robert C. Martin", 27.95));
        $this->getTotal()->shouldReturn(27.95);
    }

    function it_should_have_a_count_that_matches_the_number_of_items_added()
    {
        $this->addBasketItem(new BasketItem("Build APIs You Won't Hate by Phil Sturgeon", 17.61));
        $this->addBasketItem(new BasketItem("Clean Coder by Robert C. Martin", 27.95));
        $this->getItemCount()->shouldReturn(2);
    }

    function it_should_have_a_total_equal_to_the_value_of_all_items_added()
    {
        $this->addBasketItem(new BasketItem("Building Microservices by Sam Newman", 49.99));
        $this->addBasketItem(new BasketItem("Clean Coder by Robert C. Martin", 27.95));
        $this->getTotal()->shouldReturn(77.94);
    }

    function it_should_be_empty_once_the_last_item_has_been_remove()
    {
        $this->addBasketItem(new BasketItem("Building Microservices by Sam Newman", 49.99));
        $this->RemoveBasketItem(new BasketItem("Building Microservices by Sam Newman", 49.99));
        $this->isEmpty()->shouldReturn(true);
    }

    function it_should_have_a_count_of_zero_once_the_last_item_has_been_remove()
    {
        $this->addBasketItem(new BasketItem("Building Microservices by Sam Newman", 49.99));
        $this->RemoveBasketItem(new BasketItem("Building Microservices by Sam Newman", 49.99));
        $this->getItemCount()->shouldReturn(0);
    }
}
