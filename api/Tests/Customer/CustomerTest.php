<?php

declare(strict_types=1);

namespace Tests\Customer;


use Models\Customer;
use PHPUnit\Framework\TestCase;
use Services\Customer as ServicesCustomer;

final class CustomerTest extends TestCase
{
    private $customerModelMock;
    private $customerService;
    protected function setUp(): void
    {
        $this->customerModelMock = $this->createMock(Customer::class);
    }

    public function testGetAll(): void
    {
        
        $this->customerService = new ServicesCustomer($this->customerModelMock);
        $this->customerModelMock->expects($this->once())->method('getAll')->will($this->returnValue((object)['name'=>'Jonh Doe']));

        $this->customerService->getAll();
    }

    protected function tearDown(): void
    {
        unset($this->customerService);
        unset($this->customerModelMock);
    }
    
}
