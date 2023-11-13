<?php

$hero = new Hero("Cho Sang-woo", 35, 0, 3);

// Test Hero::checkPairImpair() with pair/pair
Utils::setNextRandomNumber(0);
if (!$hero->checkPairImpair(new Enemy("Pro Tester", 10, 50))) {
    die("checkPairImpair() should return true");
}

// Test Hero::checkPairImpair() with impair/impair
Utils::setNextRandomNumber(1);
if (!$hero->checkPairImpair(new Enemy("Pro Tester", 11, 50))) {
    die("checkPairImpair() should return true");
}

// Test Hero::checkPairImpair() with impair/pair
Utils::setNextRandomNumber(1);
if ($hero->checkPairImpair(new Enemy("Pro Tester", 10, 50))) {
    die("checkPairImpair() should return false");
}

// Test cheat type
if (gettype($hero->cheatChoose()) !== "boolean") {
    die("tricher() should return a boolean");
}

// Test cheat value
Utils::setNextRandomNumber(1);
if ($hero->cheatChoose() !== false) {
    die("tricher() should return true");
}

echo "success";
