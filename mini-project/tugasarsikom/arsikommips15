.data
    # Informasi Kelompok
    nama_kelompok:    .asciiz "DS-04-02 Kelompok 1 - Kasus H\n"
    anggota1:         .asciiz "M. Alfayyadh Nezzati Qosim - 103102400029\n"
    anggota2:         .asciiz "M. Ade Sulistiansyah - 103102400045\n"
    anggota3:         .asciiz "Izam Rosiawan - 103102400049\n"
    anggota4:         .asciiz "Mohammad Bahaudin - 103102400080\n"
    pemisah:          .asciiz "------------------------------------\n"

    # Input
    input_r1:       .asciiz "Masukkan Jari-jari Bola 1 (angka positif, 8008 untuk keluar): "
    input_r2:       .asciiz "Masukkan Jari-jari Bola 2 (angka positif): "
    batasan:        .asciiz "Error: Jari-jari harus bilangan positif (>0).\n"

    # Outcome
    vol_bola1:  .asciiz "Volume Bola 1: "
    vol_bola2:  .asciiz "Volume Bola 2: "
    newline:        .asciiz "\n"

    # Kategori Perbandingan
    cat_ringan:     .asciiz "Kategori: BOLA 1 LEBIH RINGAN\n"
    cat_sama:       .asciiz "Kategori: KEDUA BOLA SAMA BERAT\n"
    cat_berat:      .asciiz "Kategori: BOLA 1 LEBIH BERAT\n"

    # Persiapan untuk loop selanjutnya
    lanjut_loop:  .asciiz "\nSiap untuk perhitungan selanjutnya...\n"

.text
.globl main

main:
    # Tampilkan informasi kelompok sekali di awal
    li $v0, 4
    la $a0, nama_kelompok 
    syscall
    la $a0, anggota1      
    syscall
    la $a0, anggota2      
    syscall
    la $a0, anggota3      
    syscall
    la $a0, anggota4      
    syscall
    la $a0, pemisah       
    syscall

main_loop:
    # Panggil Prosedur MASUKAN
    jal MASUKAN 

    # Cek kondisi keluar
    li $t0, 1
    beq $v0, $t0, exit_program 

    # Panggil Prosedur HITUNG
    jal HITUNG 

    # Panggil Prosedur KELUARAN
    jal KELUARAN 

    # Messeage untuk loop berikutnya
    li $v0, 4
    la $a0, lanjut_loop 
    syscall

    j main_loop

exit_program:
    li $v0, 10 
    syscall

#-----------------------------------------------------------------------
# Prosedur MASUKAN
# - Menerima input r1 dan r2
# - Validasi input > 0
# - Menyimpan r1 di $s0, r2 di $s1
# - Mengembalikan status di $v0 (0: lanjut, 1: keluar jika r1=8008)
#-----------------------------------------------------------------------
MASUKAN:
    addi $sp, $sp, -4
    sw $ra, 0($sp)

input_r1_loop:
    li $v0, 4       
    la $a0, input_r1 
    syscall
    li $v0, 5       
    syscall
    move $s0, $v0   

    li $t0, 8008
    beq $s0, $t0, masukan_exit

    blez $s0, error_r1 

    j input_r2_loop 

error_r1:
    li $v0, 4
    la $a0, batasan 
    syscall
    j input_r1_loop 

input_r2_loop:
    li $v0, 4       
    la $a0, input_r2 
    syscall
    li $v0, 5       
    syscall
    move $s1, $v0   

    blez $s1, error_r2 

    j masukan_continue 

error_r2:
    li $v0, 4
    la $a0, batasan 
    syscall
    j input_r2_loop 

masukan_exit:
    li $v0, 1       
    j masukan_end

masukan_continue:
    li $v0, 0       

masukan_end:
    lw $ra, 0($sp)
    addi $sp, $sp, 4
    jr $ra

#-----------------------------------------------------------------------
# Prosedur HITUNG
# - Menggunakan r1 dari $s0, r2 dari $s1
# - V = (4/3) x phi x Jari-jari x Jari-jari x Jari-jari dengan phi = 3
# - Menyederhanakan rumusnya menjadi V = 4 x jari-jari^3
# - Menghitung V1 = 4 * r1^3
# - Menghitung V2 = 4 * r2^3
# - Menyimpan V1 di $s2, V2 di $s3
# - Menentukan kategori perbandingan dan menyimpan alamat stringnya di $s4
#-----------------------------------------------------------------------
HITUNG:
    addi $sp, $sp, -20
    sw $ra, 0($sp)
    sw $t0, 4($sp)  
    sw $t1, 8($sp)  
    sw $t2, 12($sp) 
    sw $t3, 16($sp) 

    move $a0, $s0   
    move $a1, $s0   
    jal repeated_multiply 
    move $t0, $v0   

    mul $t0, $t0, $s0 
    li $t1, 4
    mul $s2, $t0, $t1 

    mul $t0, $s1, $s1 
    mul $t0, $t0, $s1 
    li $t1, 4
    mul $s3, $t0, $t1 

    blt $s2, $s3, bola1_lebih_ringan  
    beq $s2, $s3, bola_sama_berat    
    la $s4, cat_berat                
    j hitung_end

bola1_lebih_ringan:
    la $s4, cat_ringan               
    j hitung_end

bola_sama_berat:
    la $s4, cat_sama                 

hitung_end:
    lw $t3, 16($sp)
    lw $t2, 12($sp)
    lw $t1, 8($sp)
    lw $t0, 4($sp)
    lw $ra, 0($sp)
    addi $sp, $sp, 20
    jr $ra

#-----------------------------------------------------------------------
# Sub-Prosedur repeated_multiply
# $a0: operand1
# $a1: operand2
# $v0: hasil (operand1 * operand2)
#-----------------------------------------------------------------------
repeated_multiply:
    addi $sp, $sp, -12
    sw $s5, 0($sp) 
    sw $s6, 4($sp)
    sw $s7, 8($sp)

    move $s5, $a0       
    move $s6, $a1       
    li $s7, 0           

multiply_loop:
    beq $s6, $zero, multiply_done 
    add $s7, $s7, $s5       
    addi $s6, $s6, -1       
    j multiply_loop

multiply_done:
    move $v0, $s7           

    lw $s7, 8($sp)
    lw $s6, 4($sp)
    lw $s5, 0($sp)
    addi $sp, $sp, 12
    jr $ra

#-----------------------------------------------------------------------
# Prosedur KELUARAN
# - Menggunakan V1 dari $s2, V2 dari $s3, alamat string kategori dari $s4
# - Lalu menampilkan semua hasil
#-----------------------------------------------------------------------
KELUARAN:
    addi $sp, $sp, -4
    sw $ra, 0($sp)

    # Tampilkan Volume Bola 1
    li $v0, 4
    la $a0, vol_bola1 
    syscall
    li $v0, 1
    move $a0, $s2 
    syscall
    li $v0, 4
    la $a0, newline 
    syscall

    # Tampilkan Volume Bola 2
    li $v0, 4
    la $a0, vol_bola2 
    syscall
    li $v0, 1
    move $a0, $s3 
    syscall
    li $v0, 4
    la $a0, newline 
    syscall

    # Tampilkan Kategori Perbandingan
    li $v0, 4
    move $a0, $s4 
    syscall

    lw $ra, 0($sp)
    addi $sp, $sp, 4
    jr $ra
