<?php

namespace App\Event;

use App\DTO\PromotionEnquiryInterface;
use Symfony\Contracts\EventDispatcher\Event;

class AfterDtoCreatedEvent extends Event
{
    // what.doing convention
    public const NAME = 'dto.created';

    public function __construct(protected PromotionEnquiryInterface $dto)
    {
    }

    public function getDto(): PromotionEnquiryInterface
    {
        return $this->dto;
    }
}
