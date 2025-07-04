<?php

namespace Models;

interface Shippable {

    public function getWeight(): float;

    public function getName(): string;

}