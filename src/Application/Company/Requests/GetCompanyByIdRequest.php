<?php

declare(strict_types=1);

namespace src\Application\Company\Requests;


class GetCompanyByIdRequest
{
    public function __construct(
        public string $id
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id']
        );
    }
}
