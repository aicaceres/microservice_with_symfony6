<?php

namespace App\Service;

use PhpParser\Node\Expr\Cast\String_;

class ServiceExceptionData
{
    public function __construct(protected int $statusCode, protected string $type)
    {
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type
        ];
    }

}
