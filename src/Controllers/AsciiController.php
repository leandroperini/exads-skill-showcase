<?php


namespace Exads\Controllers;

use Exads\Numbers\NumberService;
use Exads\RequestInterface;
use Exads\Text\AsciiService;

class AsciiController extends AbstractController
{

    public function defaultHandler(RequestInterface $request): mixed
    {
        $first       = ',';
        $last        = '|';
        $randomChars = $this->getAsciiService()->getRandomChars($first, $last);

        $charToRemove = $request->getQueryParam('removeChar');

        $randomChars = $this->removeCharFromList($charToRemove, $randomChars, $removed);

        $missingChar = $this->getAsciiService()->detectMissingCharFromList($randomChars, $first, $last);

        return $this->sendResponse(
            sprintf(
                'Removed char was "%s"(ascii=>%s). Was detect the missing char "%s"(ascii=>%s)',
                chr($removed),
                $removed,
                chr($missingChar),
                $missingChar,
            ) . PHP_EOL
        );
    }

    /*
     * Could be a Factory if it was bigger and more complex
     */
    private function getAsciiService(): AsciiService
    {
        return $this->asciiService ??= new AsciiService(new NumberService());
    }

    private function removeCharFromList(?string $charToRemove, array $chars, ?int &$removedCharCode = null): array
    {
        if ($charToRemove !== null) {
            $chars           = $this->getAsciiService()->removeCharFromList($charToRemove, $chars);
            $removedCharCode = ord($charToRemove);
        } else {
            $chars = $this->getAsciiService()->removeRandomCharFromList($chars, $removedCharCode);
        }

        return $chars;
    }
}