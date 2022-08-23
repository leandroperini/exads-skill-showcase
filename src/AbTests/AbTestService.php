<?php


namespace Exads\AbTests;

use Exads\AbTests\Models\ScenarioInterface;

abstract class AbTestService implements AbTestServiceInterface
{
    /**
     * @param ScenarioInterface[] $scenarios
     */
    public function pickRandomScenario(array $scenarios): ScenarioInterface
    {
        $lotteryTickets = $this->generateLotteryTickets($scenarios);
        $drawnTicket    = $this->drawTicket($lotteryTickets);

        return $lotteryTickets[$drawnTicket];
    }

    public function getScenarioForTarget(mixed $targetIdentifier): ScenarioInterface
    {
        return $this->pickRandomScenario($this->getAbTestData($targetIdentifier));
    }

    /**
     * @param ScenarioInterface[] $scenarios
     */
    private function generateLotteryTickets(array &$scenarios): array
    {
        $tickets = [];

        foreach ($scenarios as &$scenario) {
            $ticketAmount = $scenario->getOccurrencePercentage();
            while ($ticketAmount > 0) {
                $tickets[] = &$scenario;
                $ticketAmount--;
            }
        }

        return $tickets;
    }

    private function drawTicket(array $lotteryTickets): int
    {
        return mt_rand(
            0,
            count($lotteryTickets) - 1
        );
    }
}