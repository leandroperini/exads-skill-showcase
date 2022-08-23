<?php


namespace Exads\AbTests\Models;


interface ScenarioInterface
{
    public function getPayload(): array;

    public function getOccurrencePercentage(): float;

    public function getTargetEntity(): string;
}