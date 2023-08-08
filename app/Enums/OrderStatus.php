<?php

namespace App\Enums;

enum OrderStatus: int
{
    case CREATED = 1;
    case PENDING = 2;
    case PAID = 3;
    case CANCELED = 4;

    public function getName(): string
    {
        return match ($this) {
            self::CREATED => 'Criado',
            self::PENDING => 'Pendente',
            self::PAID => 'Pago',
            self::CANCELED => 'Cancelado',
            default => 'OrderStatus não encontrado'
        };
    }

    public function getStyles(): string
    {
        return match ($this) {
            self::CREATED => 'bg-gray-100 text-gray-800',
            self::PENDING => 'bg-yellow-100 text-yellow-800',
            self::PAID => 'bg-green-100 text-green-800',
            self::CANCELED => 'bg-red-100 text-red-800',
            default => ''
        };
    }
}
