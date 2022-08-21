<?php

namespace Exads\Controllers;

use DateTimeImmutable;
use Exads\RequestInterface;
use Exads\TvSeries\TvSeriesService;

class TvSeriesController extends AbstractController
{

    public function handle(RequestInterface $request): mixed
    {
        return $this->sendJsonResponse(
            $this->getTvSeriesService()
                 ->findTvSeries(
                     $request->getQueryParam('weekDay', -1),
                     $request->getQueryParam('time', -1),
                 )
        );
    }

    public function nowHandler(RequestInterface $request): mixed
    {
        $now = new DateTimeImmutable();

        return $this->sendJsonResponse(
            $this->getTvSeriesService()
                 ->findTvSeries(
                     $now->format('N'),
                     $now->format('H'),
                 )
        );
    }

    private function getTvSeriesService(): TvSeriesService
    {
        return new TvSeriesService(getEM());
    }

}