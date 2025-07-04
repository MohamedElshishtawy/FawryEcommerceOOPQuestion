<?php 


interface Expirable {

    public function getExpirationDate(): \DateTime;

    public function isExpired(): bool;

}