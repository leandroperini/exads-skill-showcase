<?php


namespace Exads\TvSeries\Entities;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tv_series")
 */
class TvSeries
{
    /**
     * @ORM\OneToMany(targetEntity="Interval", mappedBy="TvSeries")
     * @var Collection<Interval>|null $Intervals
     */
    private ?Collection $Intervals;

    public function __construct(
        /**
         * @ORM\Id
         * @ORM\Column(type="bigint")
         * @ORM\GeneratedValue
         */
        private ?int $id = null,
        /**
         * @ORM\Column(type="string")
         */
        private ?string $title = null,
        /**
         * @ORM\Column(type="string")
         */
        private ?string $channel = null,
    ) {
    }

    /**
     * @return Collection<Interval>|null
     */
    public function getIntervals(): ?Collection
    {
        return $this->Intervals;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }

    public function __serialize(): array
    {
        return get_object_vars($this);
    }
}