php rendu

**rendre tous les choix aléatoires**

class Game :
  créer Hero -> faire boucle de création
  créer Enemy -> faire boucle de création
  gérer les rencontres
  lancer les combats -> while
  choix du héro (aléatoire)
  choix de la difficulté (aléatoire)
  (rejouer ?)

Hero et Enemy ont des points communs -> class Characters
class Characters
  nom
  nb billes
  gagner
  perdre

class Hero
  bonus
  malus
  tricher (public)
  pair ou impair (public) (appelle la méthode check pair ou impair)
  méthode check pair ou impair

class Enemy
  age

abstract class Utils
  static GenerateRandomNumber(min, max)
