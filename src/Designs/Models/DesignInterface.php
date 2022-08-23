<?php


namespace Exads\Designs\Models;


interface DesignInterface
{
    public function getId(): int;

    public function getName(): string;
}