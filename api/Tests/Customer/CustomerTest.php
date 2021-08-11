<?php

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
        $testResponse = [(object)['name' => 'Jonh Doe']];

        $this->customerService = new ServicesCustomer($this->customerModelMock);
        $this->customerModelMock->expects($this->once())->method('getAll')->will($this->returnValue($testResponse));

        $this->customerService->getAll();
    }

    public function testGet(): void
    {
        $idCustomer   = 1;
        $testResponse = [(object)['idcustomer' => 1]];

        $this->customerService = new ServicesCustomer($this->customerModelMock);
        $this->customerModelMock->expects($this->once())->method('get')->will($this->returnValue($testResponse));

        $this->customerService->get($idCustomer);
    }

    public function testUpdate(): void
    {
        $idCustomer = 1;
        $update     = ['key' => 'value'];

        $this->customerService = new ServicesCustomer($this->customerModelMock);
        $this->customerModelMock->expects($this->once())->method('update')
            ->with($this->equalTo($idCustomer), $this->equalTo($update))->will($this->returnValue(True));

        $return = $this->customerService->update($idCustomer, ['key' => 'value']);

        $this->assertTrue($return);
    }

    protected function tearDown(): void
    {
        unset($this->customerService);
        unset($this->customerModelMock);
    }
}
