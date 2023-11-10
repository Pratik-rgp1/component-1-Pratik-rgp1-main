<?php


namespace awe;


class GameProduct extends ShopProduct
{   
    private $numPegis;
    public function __construct(
        string $id,
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPegis
    )
    {

        parent::__construct(
            $id,
            $title,
            $firstName,
            $mainName,
            $price
        );
        $this->numPegis = $numPegis;
    }

    public function getNumberOfPegis()
    {
        return $this->numPegis;
    }
}