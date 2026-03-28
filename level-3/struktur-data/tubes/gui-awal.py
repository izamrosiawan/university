import tkinter as tk
from tkinter import ttk

root = tk.Tk()
root.title("CIC Music Player")
root.geometry("1100x650")

# ==============================
# FRAME KIRI – PLAYLIST
# ==============================
frame_playlist = tk.Frame(root, bd=1, relief="solid")
frame_playlist.place(x=10, y=10, width=250, height=500)

tk.Label(frame_playlist, text="Playlist", font=("Arial", 12, "bold")).pack(anchor="w", padx=10, pady=10)

playlist_box = tk.Listbox(frame_playlist)
playlist_box.pack(fill="both", expand=True, padx=10, pady=5)

# ==============================
# FRAME TENGAH – DAFTAR LAGU
# ==============================
frame_library = tk.Frame(root, bd=1, relief="solid")
frame_library.place(x=270, y=10, width=350, height=500)

tk.Label(frame_library, text="Daftar Lagu", font=("Arial", 12, "bold")).pack(anchor="w", padx=10, pady=10)

library_box = tk.Listbox(frame_library)
library_box.pack(fill="both", expand=True, padx=10, pady=5)

# ==============================
# FRAME KANAN – INFO LAGU / ALBUM
# ==============================
frame_info = tk.Frame(root, bd=1, relief="solid")
frame_info.place(x=630, y=10, width=450, height=500)

tk.Label(frame_info, text="Info Lagu / Album", font=("Arial", 12, "bold")).pack(anchor="w", padx=10, pady=10)

info_label = tk.Label(frame_info, text="Tidak ada lagu yang diputar", justify="left")
info_label.pack(anchor="nw", padx=10, pady=5)

# ==============================
# FRAME BAWAH – PLAYER CONTROL
# ==============================
frame_control = tk.Frame(root)
frame_control.place(x=10, y=520, width=1070, height=100)

current_song_label = tk.Label(frame_control, text="Lagu yang sedang diputar:", font=("Arial", 11))
current_song_label.pack(pady=5)

btn_frame = tk.Frame(frame_control)
btn_frame.pack()

tk.Button(btn_frame, text="Play", width=10).grid(row=0, column=0, padx=10)
tk.Button(btn_frame, text="Next", width=10).grid(row=0, column=1, padx=10)
tk.Button(btn_frame, text="Previous", width=10).grid(row=0, column=2, padx=10)

root.mainloop()
