import random

class Player:
    def __init__(self, name):
        self.name = name
        self.hp = 50
        self.max_hp = 50
        self.base_attack = 10

    def attack(self):
        return random.randint(self.base_attack - 3, self.base_attack + 5)

    def heal(self):
        heal_amount = random.randint(6, 12)
        self.hp = min(self.max_hp, self.hp + heal_amount)
        return heal_amount