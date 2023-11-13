<?php

class Game
{
    /**
     * Number of played levels
     * @var integer
     */
    private int $difficulty;

    /**
     * The player
     * @var Hero
     */
    private Hero $player;

    /**
     * The enemies
     * @var Enemy[]
     */
    private array $enemies;

    /**
     * Select a random difficulty for the game
     * 
     * @return void
     */
    private function selectDifficulty()
    {
        $availableDifficulties = [5, 10, 20];
        $this->difficulty = $availableDifficulties[Utils::GenerateRandomNumber(0, count($availableDifficulties) - 1)];
    }

    /**
     * Select a player for the game
     * 
     * @return void
     */
    private function selectPlayer()
    {
        $availablePlayers = [
            new Hero("Seong Gi-hun", 15, 2, 1),
            new Hero("Kang Sae-byeok", 25, 1, 2),
            new Hero("Cho Sang-woo", 35, 0, 3),
        ];
        $this->player = $availablePlayers[Utils::GenerateRandomNumber(0, count($availablePlayers) - 1)];
    }

    /**
     * Generate the enemies (20) for the game
     * 
     * @return void
     */
    private function generateenemies()
    {
        for ($i = 0; $i < 20; $i++) {
            $this->enemies[] = Enemy::GenerateRandomEnemy();
        }
    }

    /**
     * Play against an enemy
     *
     * @param integer $enemyId The id of the enemy to play against
     * @return boolean True if the player won, false otherwise
     */
    private function versus(int $enemyId): bool
    {
        $enemy = $this->enemies[$enemyId];
        echo "You (" . $this->player->getMarbles() . " marbles) are playing against the enemy " . $enemy->getName() . ".<br>";

        if ($enemy->isOld() && $this->player->cheatChoose()) {
            echo "<i>You chose to cheat!</i><br>";
            echo "*BANG* The enemy " . $enemy->getName() . " was eliminated.<br>";

            // Win the enemy's marbles
            $gain = $this->player->winWithoutBonus($enemy->getMarbles());
            echo "<b>+$gain marbles</b> <i>(You now have " . $this->player->getMarbles() . " marbles)</i>.<br>";

            // Remove the enemy from the list
            array_splice($this->enemies, $enemyId, 1);
            return true;
        }

        $guess = $this->player->checkPairImpair($enemy);

        if ($guess) {
            echo "You guessed the <b>right</b> number of marbles (" . $enemy->getMarbles() . ")!<br>";
            echo "*BANG* The enemy " . $enemy->getName() . " was eliminated.<br>";

            // Win the enemy's marbles
            $gain = $this->player->win($enemy->getMarbles());
            echo "<b>+$gain marbles</b> <i>(You now have " . $this->player->getMarbles() . " marbles)</i>.<br>";

            // Remove the enemy from the list
            array_splice($this->enemies, $enemyId, 1);
        } else {
            echo "You guessed the <b>wrong</b> number of marbles (" . $enemy->getMarbles() . ")!<br>";

            // Lose marbles
            $loss = $this->player->lose($enemy->getMarbles());
            echo "<b>-$loss marbles</b> <i>(You now have " . $this->player->getMarbles() . " marbles)</i>.<br>";

            if ($this->player->getMarbles() <= 0) {
                echo "<b><i>*BANG* You were eliminated.</i></b><br>";
                return false;
            }
        }

        return true;
    }

    /**
     * Start the game
     * 
     * @return void
     */
    public function start()
    {
        $this->selectDifficulty();
        echo "The game has started with a difficulty of $this->difficulty levels.<br>";

        $this->selectPlayer();
        echo "The player " . $this->player->getName() . " has been selected.<br>";

        $this->generateenemies();
        echo "The enemies have been generated.<br>";

        // Play the levels until
        // - the player has no more marbles
        // - the player has won all the levels
        // - there is no more enemies
        $remainingLevels = $this->difficulty;
        while (
            count($this->enemies) > 0
            && $remainingLevels > 0
        ) {
            $enemyId = Utils::GenerateRandomNumber(0, count($this->enemies) - 1);

            echo "<br>";
            $won = $this->versus($enemyId);

            if (!$won) {
                echo "<br><i>Game over.</i><br>";
                return;
            }

            $remainingLevels--;
        }

        if (count($this->enemies) <= 0) {
            echo "<br>No more enemies... You won!<br>";
        } else {
            echo "<br>No more levels... You won!<br>";
        }

        echo "You finished with " . $this->player->getMarbles() . " marbles.<br><b>And 45.6 billion won.</b>";
    }
}
