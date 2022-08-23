<?php


namespace Exads\AbTests;

use Exads\AbTests\Models\ScenarioInterface;

interface AbTestServiceInterface
{
    public function getTargetEntity(): string;

    public function getScenarioForTarget(mixed $targetIdentifier): ScenarioInterface;

    /**
     * @return ScenarioInterface[]
     */
    public function getAbTestData(mixed $testDataIdentifier): array;

    /**
     * @param ScenarioInterface[] $scenarios
     */
    public function pickRandomScenario(array $scenarios): ScenarioInterface;
}