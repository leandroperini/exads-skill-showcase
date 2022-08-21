<?php


namespace Exads\TvSeries\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tv_series_intervals")
 */
class Interval
{
    /**
     * @ORM\ManyToOne(targetEntity="TvSeries")
     * @ORM\JoinColumn(name="id_tv_series", referencedColumnName="id")
     */
    private ?TvSeries $TvSeries;

    public function __construct(
        /**
         * @ORM\Id
         * @ORM\Column(type="bigint")
         * @ORM\GeneratedValue
         */
        private ?int $id = null,
        /**
         * @ORM\Column(type="smallint", length=1, name="week_day")
         */
        private ?int $weekDay = null,
        /**
         * @ORM\Column(type="smallint", length=2, name="show_time")
         */
        private ?int $showTime = null,
    ) {
    }

    /**
     * @return TvSeries|null
     */
    public function getTvSeries(): ?TvSeries
    {
        return $this->TvSeries;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return int|null
     */
    public function getWeekDay(): ?int
    {
        return $this->weekDay;
    }

    /**
     * @return int|null
     */
    public function getShowTime(): ?int
    {
        return $this->showTime;
    }

    public function __serialize(): array
    {
        return get_object_vars($this);
    }

}