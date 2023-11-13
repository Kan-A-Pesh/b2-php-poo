<?php

abstract class Utils
{
    /**
     * The next random number to return (used for testing)
     * @var integer|null
     */
    private static ?int $nextRandomNumber = null;

    public static function setNextRandomNumber(int $number): void
    {
        self::$nextRandomNumber = $number;
    }

    /**
     * Return a random number between $min and $max
     *
     * @param integer $min The minimum value (inclusive)
     * @param integer $max The maximum value (inclusive)
     * @return integer The random number
     */
    public static function generateRandomNumber(int $min, int $max): int
    {
        if (self::$nextRandomNumber !== null) {
            $number = self::$nextRandomNumber;
            self::$nextRandomNumber = null;
            return $number;
        }

        return rand($min, $max);
    }

    /**
     * Return a random name
     *
     * @return string The random name
     */
    public static function generateRandomName(): string
    {
        $availableNames = [
            "Ham Jin-Sang",
            "No Hyun-Woo",
            "Pae Yong-Joon",
            "Hae Song-Su",
            "Kong Ju-Won",
            "Bing Chilling",
            "Hyong Byung-Ho",
            "Ch'on Seong-Hyeon",
            "Kong Byeong-Cheol",
            "Pang Jong-Yul",
            "Ho Yong-Gi"
        ];

        return $availableNames[self::generateRandomNumber(0, count($availableNames) - 1)];
    }
}
