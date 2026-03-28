import math

def display_board(board):
    print("---------")
    for i in range(0, 9, 3):
        print(f"| {board[i]} {board[i+1]} {board[i+2]} |")
    print("---------")

def check_winner(board):
    wins = [
        (0,1,2), (3,4,5), (6,7,8),  # rows
        (0,3,6), (1,4,7), (2,5,8),  # cols
        (0,4,8), (2,4,6)            # diagonals
    ]
    for a,b,c in wins:
        if board[a] == board[b] == board[c] and board[a] != " ":
            return board[a]
    if " " not in board:
        return "D"  # Draw
    return None

def minimax(board, depth, is_maximizing):
    winner = check_winner(board)
    if winner == "X":
        return -10 + depth
    elif winner == "O":
        return 10 - depth
    elif winner == "D":
        return 0

    if is_maximizing:
        best_score = -math.inf
        for i in range(9):
            if board[i] == " ":
                board[i] = "O"
                score = minimax(board, depth+1, False)
                board[i] = " "
                best_score = max(score, best_score)
        return best_score
    else:
        best_score = math.inf
        for i in range(9):
            if board[i] == " ":
                board[i] = "X"
                score = minimax(board, depth+1, True)
                board[i] = " "
                best_score = min(score, best_score)
        return best_score

def computer_move(board):
    best_score = -math.inf
    move = None
    for i in range(9):
        if board[i] == " ":
            board[i] = "O"
            score = minimax(board, 0, False)
            board[i] = " "
            if score > best_score:
                best_score = score
                move = i
    return move

def main():
    board = [" "] * 9
    while True:
        display_board(board)
        if check_winner(board) is not None:
            winner = check_winner(board)
            if winner == "X":
                print("Anda menang!")
            elif winner == "O":
                print("Komputer menang!")
            else:
                print("Seri!")
            break

        # Giliran pemain
        while True:
            try:
                player_pos = int(input("Pilih posisi (1-9): ")) - 1
                if 0 <= player_pos < 9 and board[player_pos] == " ":
                    board[player_pos] = "X"
                    break
                else:
                    print("Posisi tidak valid.")
            except ValueError:
                print("Masukkan angka yang valid.")

        if check_winner(board) is not None:
            continue

        # Giliran komputer
        ai_pos = computer_move(board)
        if ai_pos is not None:
            board[ai_pos] = "O"

if __name__ == "__main__":
    main()
