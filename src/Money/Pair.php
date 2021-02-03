<?php


namespace App\Money;


use Exception;

class Pair
{
    /**
     * @var string
     */
    private $from;
    /**
     * @var string
     */
    private $to;
    /**
     * @var string
     */
    private $name;

    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
        $this->name = $from . "to" . $to;
    }

    public function equals(object $object): bool
    {
        $pair = self::cast($object);
        return $this->from === $pair->from && $this->to === $pair->to;
    }

    public function hashCode(): int
    {
        return 0;
    }

    /**
     * @param object $obj
     *
     * @return Pair
     * @throws Exception
     */
    public static function cast(object $obj): Pair
    {
        if (!($obj instanceof self)) {
            throw new Exception("argument is not instance of Pair");
        }
        return $obj;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}