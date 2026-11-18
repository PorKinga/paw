<?php

namespace App\Tests\Entity;

use App\Entity\Measurement;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MeasurementTest extends TestCase
{
    public static function dataGetFahrenheit(): array
    {
        return [
            ['0', '32'],
            ['-100', '-148'],
            ['100', '212'],
            ['20', '68'],
            ['34', '93.2'],
            ['12.5', '54.5'],
            ['6.7', '44.06'],
            ['-68', '-90.4'],
            ['101', '213.8'],
            ['50.5', '122.9']
        ];
    }

    #[DataProvider('dataGetFahrenheit')]

    public function testGetFahrenheit(string $celsius, string $expectedFahrenheit): void
    {
        $measurement = new Measurement();
        $measurement->setCelsius($celsius);
        $this->assertEquals(
            $expectedFahrenheit,
            $measurement->getFahrenheit(),
            "Expected $expectedFahrenheit Fahrenheit for $celsius Celsius, got {$measurement->getFahrenheit()}"
        );
    }
}
