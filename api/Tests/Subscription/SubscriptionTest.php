<?php

namespace Tests\Subscription;

use Exception;
use Models\Subscription;
use Models\SubscriptionPet;
use PHPUnit\Framework\TestCase;
use Services\Subscription as ServicesSubscription;

final class SubscriptionTest extends TestCase
{
    private $subscriptionService;
    private $subscriptionModelMock;
    private $subscriptionPetModelMock;
    protected function setUp(): void
    {
        $this->subscriptionModelMock    = $this->createMock(Subscription::class);
        $this->subscriptionPetModelMock = $this->createMock(SubscriptionPet::class);
        $this->subscriptionService      = new ServicesSubscription($this->subscriptionModelMock, $this->subscriptionPetModelMock);
    }

    public function testGetSubscriptionCustomer(): void
    {
        $idCustomer = 1;
        $testResponse = [(object)['idsubscription' => '1']];

        $this->subscriptionModelMock->expects($this->once())->method('getSubscriptionCustomer')->will($this->returnValue($testResponse));

        $this->subscriptionService->getSubscriptionCustomer($idCustomer);
    }

    public function testRemovePet(): void
    {

        $idPet          = 1;
        $idSubscription = 1;

        $this->subscriptionPetModelMock->expects($this->once())->method('deletePet')->will($this->returnValue(True));

        $this->subscriptionService->removePet($idPet, $idSubscription);
    }

    public function testUpdateNextOrder(): void
    {
        $date           = '2021-08-15';
        $idCustomer     = 1;
        $idSubscription = 1;
        $update         = ['nextorderdate' => $date];

        $this->subscriptionModelMock->expects($this->once())->method('update')
            ->with($this->equalTo($idCustomer), $this->equalTo($update))->will($this->returnValue(True));

        $return = $this->subscriptionService->updateNextOrder($idSubscription, $date);

        $this->assertTrue($return);
    }

    /**
     *
     * @dataProvider dataProvider
     */
    public function testUpdateNextOrderInvalidDate($date): void
    {
        $idCustomer     = 1;
        $idSubscription = 1;
        $update         = ['nextorderdate' => $date];

        $this->subscriptionModelMock->expects($this->never())->method('update')
            ->with($this->equalTo($idCustomer), $this->equalTo($update))->will($this->returnValue(True));

        $this->expectException(Exception::class);

        $return = $this->subscriptionService->updateNextOrder($idSubscription, $date);

        $this->assertTrue($return);
    }

    /**
     *
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            'past date'           => ['2021-08-10'],
            'empty'               => [''],
            'invalid date'        => ['20-20'],
            'invalid date format' => ['12-12-2021']
        ];
    }


    protected function tearDown(): void
    {
        unset($this->subscriptionService);
        unset($this->subscriptionModelMock);
    }
}
