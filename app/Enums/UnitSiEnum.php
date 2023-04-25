<?php
namespace App\Enums;

enum UnitSiEnum: string
{
    case KILO = 'kilo';
    case LITER = 'liter';
    case METERS = 'meters';

    public function translate(): string
    {
        return match ($this) {
            self::KILO   => 'kilogramy',
            self::LITER  => 'litry',
            self::METERS => 'metry',
        };

    }

    public function display(): string
    {
        return match ($this) {
            self::KILO   => 'kg',
            self::METERS => 'm',
            self::LITER  => 'l'
        };
    }
}
