"""
Program Demonstrasi Functional Programming
============================================
Konsep: Immutability, Referential Transparency, dan Higher-Order Function
"""

from typing import Callable, List, Tuple
from functools import reduce
from dataclasses import dataclass

# ============================================================================
# 1. IMMUTABILITY - Data tidak dapat diubah setelah dibuat
# ============================================================================

@dataclass(frozen=True)  # frozen=True membuat object immutable
class Student:
    """Class immutable untuk merepresentasikan data siswa"""
    name: str
    score: int
    
    def __repr__(self):
        return f"Student(name='{self.name}', score={self.score})"


# ============================================================================
# 2. REFERENTIAL TRANSPARENCY - Fungsi selalu menghasilkan output sama untuk input sama
#    dan tidak memiliki side effects
# ============================================================================

def add_bonus_points(student: Student, bonus: int) -> Student:
    """
    Pure function - Referential Transparency:
    - Selalu menghasilkan output yang sama untuk input yang sama
    - Tidak mengubah data asli (immutable)
    - Tidak memiliki side effects
    """
    return Student(name=student.name, score=student.score + bonus)


def is_passing(min_score: int) -> Callable[[Student], bool]:
    """
    Pure function yang mengembalikan fungsi
    Higher-Order Function: Menerima parameter dan mengembalikan fungsi
    """
    def check_passing(student: Student) -> bool:
        return student.score >= min_score
    return check_passing


def get_grade(student: Student) -> str:
    """
    Pure function - Referential Transparency:
    - Output konsisten untuk input yang sama
    - Tidak ada side effects
    """
    if student.score >= 80:
        return "A"
    elif student.score >= 70:
        return "B"
    elif student.score >= 60:
        return "C"
    else:
        return "D"


# ============================================================================
# 3. HIGHER-ORDER FUNCTION - Fungsi yang bekerja dengan fungsi lain
# ============================================================================

def apply_transformation(students: List[Student], 
                        transform: Callable[[Student], Student]) -> List[Student]:
    """
    Higher-Order Function: Menerima fungsi sebagai parameter
    Menerapkan transformasi ke setiap elemen
    """
    return [transform(student) for student in students]


def apply_filter(students: List[Student], 
                predicate: Callable[[Student], bool]) -> List[Student]:
    """
    Higher-Order Function: Menerima fungsi predicate sebagai parameter
    Memfilter berdasarkan kondisi
    """
    return [student for student in students if predicate(student)]


def apply_map(students: List[Student], 
             mapper: Callable[[Student], Tuple[str, str]]) -> List[Tuple[str, str]]:
    """
    Higher-Order Function: Menerima fungsi mapper
    Mentransformasi struktur data
    """
    return [mapper(student) for student in students]


def compose(f: Callable, g: Callable) -> Callable:
    """
    Higher-Order Function: Komposisi fungsi
    Menggabungkan dua fungsi menjadi satu
    """
    return lambda x: f(g(x))


# ============================================================================
# DEMONSTRASI PROGRAM
# ============================================================================

def main():
    print("=" * 70)
    print("DEMONSTRASI FUNCTIONAL PROGRAMMING")
    print("=" * 70)
    
    # Data awal (Immutable)
    print("\n[1] IMMUTABILITY - Data siswa awal (tidak dapat diubah):")
    print("-" * 70)
    students = [
        Student(name="Alice", score=75),
        Student(name="Bob", score=65),
        Student(name="Charlie", score=85),
        Student(name="Diana", score=55),
        Student(name="Eve", score=95),
    ]
    
    for student in students:
        print(f"  {student}")
    
    # Demonstrasi Referential Transparency
    print("\n[2] REFERENTIAL TRANSPARENCY - Transformasi tanpa mengubah data asli:")
    print("-" * 70)
    
    # Menambah bonus poin (membuat object baru, tidak mengubah asli)
    bonus_added = apply_transformation(students, lambda s: add_bonus_points(s, 10))
    
    print("Setelah menambah 10 poin bonus:")
    for student in bonus_added:
        print(f"  {student}")
    
    print("\nData asli masih tetap sama (referential transparency):")
    for student in students:
        print(f"  {student}")
    
    # Demonstrasi Higher-Order Function
    print("\n[3] HIGHER-ORDER FUNCTION - Filter dan Map:")
    print("-" * 70)
    
    # Higher-Order Function 1: Filter dengan predikat
    passing_check = is_passing(min_score=70)  # Mengembalikan fungsi
    passing_students = apply_filter(bonus_added, passing_check)
    
    print("Siswa yang LULUS (score >= 70) setelah bonus:")
    for student in passing_students:
        print(f"  {student}")
    
    # Higher-Order Function 2: Map dengan mapper
    def student_to_grade(student: Student) -> Tuple[str, str]:
        return (student.name, get_grade(student))
    
    grades = apply_map(bonus_added, student_to_grade)
    print("\nNilai huruf siswa setelah bonus:")
    for name, grade in grades:
        print(f"  {name}: {grade}")
    
    # Higher-Order Function 3: Komposisi fungsi
    print("\n[4] KOMPOSISI FUNGSI - Menggabungkan beberapa transformasi:")
    print("-" * 70)
    
    def add_5_points(s: Student) -> Student:
        return add_bonus_points(s, 5)
    
    def add_10_points(s: Student) -> Student:
        return add_bonus_points(s, 10)
    
    # Komposisi: tambah 10 kemudian tambah 5
    combined_transform = compose(add_5_points, add_10_points)
    
    print("Hasil komposisi (tambah 10 + tambah 5):")
    for student in students:
        result = combined_transform(student)
        print(f"  {student} -> {result}")
    
    # Higher-Order Function 4: Reduce (fold)
    print("\n[5] REDUCE - Agregasi data dengan Higher-Order Function:")
    print("-" * 70)
    
    def sum_scores(acc: int, student: Student) -> int:
        return acc + student.score
    
    total_score = reduce(sum_scores, bonus_added, 0)
    average_score = total_score / len(bonus_added)
    
    print(f"Total skor setelah bonus: {total_score}")
    print(f"Rata-rata skor: {average_score:.2f}")
    
    # Demonstrasi Konsistensi (Referential Transparency)
    print("\n[6] KONSISTENSI - Panggil fungsi yang sama menghasilkan output sama:")
    print("-" * 70)
    
    alice = students[0]
    result1 = add_bonus_points(alice, 5)
    result2 = add_bonus_points(alice, 5)
    result3 = add_bonus_points(alice, 5)
    
    print(f"Panggilan 1: {result1}")
    print(f"Panggilan 2: {result2}")
    print(f"Panggilan 3: {result3}")
    print(f"Semua hasil identik: {result1 == result2 == result3}")
    
    print("\n" + "=" * 70)
    print("KESIMPULAN:")
    print("=" * 70)
    print("""
✓ IMMUTABILITY: Data Student tidak berubah, transformasi membuat object baru
✓ REFERENTIAL TRANSPARENCY: Fungsi pure selalu konsisten untuk input sama
✓ HIGHER-ORDER FUNCTION: Fungsi menerima fungsi sebagai parameter
  - apply_transformation, apply_filter, apply_map
  - compose untuk komposisi fungsi
  - reduce untuk agregasi
    """)


if __name__ == "__main__":
    main()
