<?php


namespace Exads\TvSeries;

use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\EntityManager;
use Exads\TvSeries\Entities\TvSeries;

class TvSeriesService
{
    public function __construct(
        private EntityManager $entityManager
    ) {
    }

    /**
     * @return TvSeries[]
     */
    public function findTvSeriesByTime(int $time): array
    {
        return $this->findTvSeries(null, $time);
    }

    /**
     * @return TvSeries[]
     */
    public function findTvSeriesByWeekDay(int $weekDay): array
    {
        return $this->findTvSeries($weekDay);
    }

    /**
     * @return TvSeries[]
     */
    public function findTvSeries(int $weekDay = null, int $time = null): array
    {
        $qb = $this->getRepo()
                   ->createQueryBuilder('tvs')
                   ->join('tvs.Intervals', 'i');

        if ($weekDay !== null) {
            $qb->addCriteria($this->withWeekDayEquals($weekDay));
        }

        if ($time !== null) {
            $qb->addCriteria($this->withHourEquals($time));
        }

        return $qb->getQuery()->getArrayResult();
    }

    private function withWeekDayEquals(int $weekDay): Criteria
    {
        return Criteria::create()->where(
            Criteria::expr()->eq('i.weekDay', $weekDay)
        );
    }

    private function withHourEquals(int $time): Criteria
    {
        return Criteria::create()->where(
            Criteria::expr()->eq('i.showTime', $time)
        );
    }

    public function getRepo()
    {
        return $this->entityManager->getRepository(TvSeries::class);
    }
}