<?php

namespace App\JDR\Class;

use App\JDR\Interface\MaterielInterface;
use App\JDR\Trait\StringableTrait;

class De implements MaterielInterface
{
    use StringableTrait;

    public function __invoke(int $faces) {
        return $faces > 1;
    }

    public function __construct(
        private int $faces = 6,
    ) {
    }

    public function lancer() {
        return rand(1, $this->faces);
    }

    public function isInvalid(){
        if($this->faces < 1) {
            return "Un dé doit avoir au moins 1 face";
        }
        return false;
    }

    public function getMax() {
        return $this->faces;
    }
}