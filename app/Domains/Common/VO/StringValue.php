<?php

namespace App\Domains\Common\VO;

abstract class StringValue
{
    /**
     * @var string
     */
    private string $value;

    /**
     * StringValue constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}

