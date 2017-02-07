<?php

namespace spec\Braddle\Shop\Entity;

use Braddle\Shop\Entity\BasketItem;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BasketItemSpec extends ObjectBehavior
{

    function let()
    {
        $this->beConstructedWith("Clean Code by Robert C. Martin", 24.99);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(BasketItem::class);
    }

    function it_should_return_its_name()
    {
        $this->getName()->shouldReturn("Clean Code by Robert C. Martin");
    }

    function it_should_return_its_price()
    {
        $this->getPrice()->shouldReturn(24.99);
    }

    function it_should_be_the_same_as_another_item_when_the_name_and_price_match()
    {
        $otherItem = new BasketItem("Clean Code by Robert C. Martin", 24.99);

        $this->sameAs($otherItem)->shouldReturn(true);
    }

    function it_should_not_be_the_same_as_another_item_if_only_the_name_matches()
    {
        $otherItem = new BasketItem("Clean Code by Robert C. Martin", 54.99);

        $this->sameAs($otherItem)->shouldReturn(false);
    }

    function it_should_not_be_the_same_as_another_item_if_only_the_price_matches()
    {
        $otherItem = new BasketItem("Build APIs You Won't Hate by Phil Sturgeon", 24.99);

        $this->sameAs($otherItem)->shouldReturn(false);
    }
}
