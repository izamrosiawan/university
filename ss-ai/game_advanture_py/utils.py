def display_intro():
    print("===================================")
    print(" SELAMAT DATANG DI GAME PETUALANGAN")
    print("     KALAHKAN SEMUA MONSTER!       ")
    print("===================================")

def display_outro(victory):
    if victory:
        print("\nKamu adalah pahlawan sejati! Semua monster telah dikalahkan!")
    else:
        print("\nKamu gugur dalam pertempuran. Cobalah lagi lain waktu!")
    print("Terima kasih telah bermain.")