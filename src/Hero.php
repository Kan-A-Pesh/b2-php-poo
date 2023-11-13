<?php

class Hero extends Characters
{
    /**
     * Additional number of marbles lost when a game is lost (penalty)
     * @var integer
     */
    private int $loss;

    /**
     * Additional number of marbles won when a game is won (gain)
     * @var integer
     */
    private int $gain;

    /**
     * Win marbles and add them to the hero's marbles
     *
     * @param integer $marbles The amount of marbles won
     * @return integer The total amount of marbles won (with the gain)
     */
    public function win(int $marbles): int
    {
        $gain = $marbles + $this->gain;
        $this->marbles += $gain;
        return $gain;
    }

    /**
     * Win marbles and add them to the hero's marbles, without the bonus
     *
     * @see Hero::win() The method with the bonus
     * @param integer $marbles The amount of marbles won
     * @return integer The total amount of marbles won (without the gain)
     */
    public function winWithoutBonus(int $marbles): int
    {
        $this->marbles += $marbles;
        return $marbles;
    }

    /**
     * Lose marbles and remove them from the hero's marbles
     *
     * @param integer $marbles The amount of marbles lost
     * @return integer The total amount of marbles lost (with the loss)
     */
    public function lose(int $marbles): int
    {
        $loss = $marbles + $this->loss;
        $this->marbles -= $loss;
        return $loss;
    }

    /**
     * Constructor
     *
     * @param string $name The name of the hero
     * @param integer $marbles Amount of marbles the hero has
     * @param integer $loss Additional number of marbles lost when a game is lost (penalty)
     * @param integer $gain Additional number of marbles won when a game is won (gain)
     */
    public function __construct(string $name, int $marbles, int $loss, int $gain)
    {
        parent::__construct($name, $marbles);
        $this->loss = $loss;
        $this->gain = $gain;
    }

    /**
     * Randomly guess if the number of marbles is pair or impair
     *
     * @return boolean True if the guess is pair, false if it's impair
     */
    private function guessPairImpair(): bool
    {
        return Utils::GenerateRandomNumber(0, 1) === 0;
    }

    /**
     * Check if the guess is correct
     *
     * @param Enemy $enemy The enemy to play against
     * @return boolean True if the guess is correct, false otherwise
     */
    public function checkPairImpair(Enemy $enemy): bool
    {
        $guess = $this->guessPairImpair();
        // Comparing guess (pair/impair) with the enemy's number of marbles (pair/impair
        return $guess === ($enemy->getMarbles() % 2 === 0);
    }

    /**
     * Choose if the hero wants to cheat or not
     *
     * @return boolean True if the hero wants to cheat, false otherwise
     */
    public function cheatChoose(): bool
    {
        return Utils::GenerateRandomNumber(0, 1) === 0;
    }
}
