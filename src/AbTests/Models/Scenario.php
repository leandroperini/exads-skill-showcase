<?php


namespace Exads\AbTests\Models;

use JsonSerializable;

class Scenario implements ScenarioInterface, JsonSerializable
{
    public function __construct(
     protected array $payload,
     protected float $occurrencePercentage,
     protected string $targetEntity,
    ){
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function getOccurrencePercentage(): float
    {
        return $this->occurrencePercentage;
    }

    public function getTargetEntity(): string
    {
        return $this->targetEntity;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}