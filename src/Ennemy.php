<?php

class Enemy extends Characters
{
    /**
     * The age of the enemy
     * @var integer
     */
    private int $age;

    /**
     * Get if the enemy is old (more than 70 years old)
     *
     * @return boolean True if the enemy is old, false otherwise
     */
    public function isOld(): bool
    {
        return $this->age > 70;
    }

    /**
     * Constructor
     *
     * @param string $name The name of the enemy
     * @param integer $marbles Amount of marbles the enemy has
     * @param integer $age The age of the enemy
     */
    public function __construct(string $name, int $marbles, int $age)
    {
        parent::__construct($name, $marbles);
        $this->age = $age;
    }

    /**
     * Generate a random enemy
     *
     * @return Enemy
     */
    public static function generateRandomEnemy(): Enemy
    {
        $name = Utils::generateRandomName();
        $marbles = Utils::generateRandomNumber(1, 20);
        $age = Utils::generateRandomNumber(1, 100);

        return new self($name, $marbles, $age);
    }
}
