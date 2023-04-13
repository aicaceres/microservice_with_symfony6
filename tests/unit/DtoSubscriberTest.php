<?php

namespace App\Tests\Unit;

use App\DTO\LowestPriceEnquiry;
use App\Event\AfterDtoCreatedEvent;
use App\EventSubscriber\DtoSubscriber;
use App\Tests\ServiceTestCase;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class DtoSubscriberTest extends ServiceTestCase
{
    public function testEventSubscription(): void
    {
        $this->assertArrayHasKey(AfterDtoCreatedEvent::NAME, DtoSubscriber::getSubscribedEvents());
    }

    /** @test */
    public function testValidateDto(): void
    {
        //Given
        $dto = new LowestPriceEnquiry();
        $dto->setQuantity(-5);

        $event = new AfterDtoCreatedEvent($dto);

        /** @var EventDispatcherInterface $eventDispatcher */
        $eventDispatcher = $this->container->get('debug.event_dispatcher');

        // Expect
        $this->expectException(ValidationFailedException::class);
        $this->expectExceptionMessage('This value should be positive.');

        //When
        $eventDispatcher->dispatch($event, $event::NAME);
    }
}
