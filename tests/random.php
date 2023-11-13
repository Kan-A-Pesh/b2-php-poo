<?php

// Check if the random number is good
if (Utils::generateRandomNumber(1, 1) != 1) {
    throw new Error("Random number is not good");
}

// Check if the random number is in the range
if (Utils::generateRandomNumber(1, 2) > 2) {
    throw new Error("Random number is not in the range");
}

// Check if the next random number is good
Utils::setNextRandomNumber(50);
if (Utils::generateRandomNumber(1, 100) !== 50) {
    throw new Error("Next random number is not good");
}

Utils::setNextRandomNumber(50);
if (Utils::generateRandomNumber(1, 2) !== 50) {
    throw new Error("Next random number is not good");
}

// Check if the random name is good
Utils::setNextRandomNumber(5);
if (Utils::generateRandomName() != "Bing Chilling") {
    throw new Error("Random name is not good");
}

echo "success";
