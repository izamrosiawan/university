import random
from player import Player
from monster import Monster
from utils import display_intro, display_outro

def main():
    display_intro()
    name = input("Masukkan nama pahlawanmu: ")
    player = Player(name)
    monsters = [
        Monster("Goblin", 30, 5),
        Monster("Orc", 40, 7),
        Monster("Troll", 50, 10),
        Monster("Naga", 70, 15)
    ]
    stage = 1

    for monster in monsters:
        print(f"\n--- Stage {stage}: {monster.name} muncul! ---")
        while monster.hp > 0 and player.hp > 0:
            print(f"\n{player.name} [HP: {player.hp}] vs {monster.name} [HP: {monster.hp}]")
            action = input("Serang (s) atau Sembuh (h)? ").lower()
            if action == "s":
                damage = player.attack()
                monster.hp -= damage
                print(f"Kamu menyerang {monster.name} dan memberikan {damage} damage.")
            elif action == "h":
                heal = player.heal()
                print(f"Kamu menyembuhkan diri sendiri sebesar {heal} HP.")
            else:
                print("Aksi tidak dikenal.")
                continue

            if monster.hp > 0:
                m_damage = monster.attack()
                player.hp -= m_damage
                print(f"{monster.name} menyerang balik dan memberikan {m_damage} damage!")
            
            if player.hp <= 0:
                print("Kamu kalah! Petualangan berakhir...")
                display_outro(False)
                return

        print(f"Kamu berhasil mengalahkan {monster.name}!")
        stage += 1
        player.hp += 10  # Sedikit recovery setelah menang
        print(f"{player.name} mendapatkan 10 HP sebagai bonus kemenangan!")

    print("Selamat! Semua monster telah dikalahkan!")
    display_outro(True)

if __name__ == "__main__":
    main()