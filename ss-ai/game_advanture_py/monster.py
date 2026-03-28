import random

class Monster:
    def __init__(self, name, hp, base_attack):
        self.name = name
        self.hp = hp
        self.base_attack = base_attack

    def attack(self):
        return random.randint(self.base_attack - 2, self.base_attack + 3)