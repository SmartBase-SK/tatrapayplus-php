<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class Tests extends TestCase
{
    public function testPrint(): void
    {
        print('testing my custom test');
    }
}