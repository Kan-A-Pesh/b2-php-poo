<?php

class Characters
{

    /**
     * The name of the character
     * @var string
     */
    private string $name;

    /**
     * Amount of marbles the character has
     * @var integer
     */
    protected int $marbles;

    /**
     * Get the amount of marbles the character has
     *
     * @return integer
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the amount of marbles the character has
     *
     * @return integer
     */
    public function getMarbles(): int
    {
        return $this->marbles;
    }

    /**
     * Constructor
     *
     * @param string $name The name of the character
     * @param integer $marbles Amount of marbles the character has
     */
    public function __construct(string $name, int $marbles)
    {
        $this->name = $name;
        $this->marbles = $marbles;
    }
}
