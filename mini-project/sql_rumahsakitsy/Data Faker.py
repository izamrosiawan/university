import os
import random
from faker import Faker
from datetime import datetime, timedelta, date

fake = Faker('id_ID')

NUM_RECORDS = 100

list_poliklinik = [
    (1, 'Poli Umum', 'Melayani pemeriksaan kesehatan umum.'),
    (2, 'Poli Gigi dan Mulut', 'Melayani kesehatan gigi, gusi, dan mulut.'),
    (3, 'Poli Anak', 'Spesialis kesehatan anak dan tumbuh kembang.'),
    (4, 'Poli Penyakit Dalam', 'Melayani diagnosis dan penanganan organ dalam.'),
    (5, 'Poli THT', 'Melayani gangguan telinga, hidung, tenggorokan.'),
    (6, 'Poli Mata', 'Spesialis kesehatan mata.'),
    (7, 'Poli Jantung', 'Melayani masalah kesehatan jantung dan pembuluh darah.')
]

list_obat = [
    ('Paracetamol', 'Tablet', '500 mg', 2.50), ('Amoxicillin', 'Kapsul', '500 mg', 3.00),
    ('OBH Combi', 'Sirup', '100 ml', 15.00), ('Betadine', 'Cair', '30 ml', 25.00),
    ('Ibuprofen', 'Tablet', '400 mg', 5.00), ('Cetirizine', 'Tablet', '10 mg', 4.50),
    ('Loratadine', 'Tablet', '10 mg', 6.00), ('Vitamin C', 'Tablet Hisap', '500 mg', 1.00)
]

def generate_sql_file(filename, table_name, columns, records):
    output_dir = "sql_output"
    if not os.path.exists(output_dir):
        os.makedirs(output_dir)
    
    filepath = os.path.join(output_dir, filename)

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(f"-- Data untuk tabel {table_name}\n")
        for record in records:
            processed_values = []
            for v in record:
                if v is None:
                    processed_values.append("NULL")
                elif isinstance(v, str):
                    escaped_v = str(v).replace("'", "''")
                    sql_string = f"'{escaped_v}'"
                    processed_values.append(sql_string)
                elif isinstance(v, (datetime, date)):
                    processed_values.append(f"'{v.strftime('%Y-%m-%d %H:%M:%S')}'") 
                else:
                    processed_values.append(str(v))
            
            values_str = ", ".join(processed_values)
            f.write(f"INSERT INTO {table_name} ({', '.join(columns)}) VALUES ({values_str});\n")
    print(f"File {filepath} berhasil dibuat dengan {len(records)} data.")

def generate_master_data():
    poliklinik_records = [(p[0], p[1], p[2]) for p in list_poliklinik]
    generate_sql_file("01_poliklinik.sql", "Poliklinik", ["id_poliklinik", "nama", "deskripsi"], poliklinik_records)

    pasien_records, local_dokter_records, perawat_records = [], [], [] 
    apoteker_records, cs_records, kasir_records = [], [], []
    local_obat_records = []

    for i in range(1, NUM_RECORDS + 1):
        tanggal_lahir_pasien = fake.date_of_birth(minimum_age=5, maximum_age=80)
        if isinstance(tanggal_lahir_pasien, datetime):
            tanggal_lahir_pasien = tanggal_lahir_pasien.date()

        pasien_records.append((i, fake.name(), fake.address(), fake.phone_number(), tanggal_lahir_pasien, random.choice(['A', 'B', 'AB', 'O'])))
        id_poli_staf = random.choice([p[0] for p in list_poliklinik])
        local_dokter_records.append((i, f"Dr. {fake.name()}", fake.address(), fake.phone_number(), random.choice(['Umum', 'Gigi', 'Anak', 'Penyakit Dalam', 'THT']), id_poli_staf))
        perawat_records.append((i, fake.name(), fake.address(), fake.phone_number(), id_poli_staf))
        apoteker_records.append((i, fake.name(), fake.address(), fake.phone_number()))
        cs_records.append((i, fake.name(), fake.address(), fake.phone_number()))
        kasir_records.append((i, fake.name(), fake.address(), fake.phone_number()))

    generate_sql_file("02_pasien.sql", "Pasien", ["id_pasien", "nama", "alamat", "no_hp", "tanggal_lahir", "golongan_darah"], pasien_records)
    generate_sql_file("03_dokter.sql", "Dokter", ["id_dokter", "nama", "alamat", "no_hp", "spesialis", "id_poliklinik"], local_dokter_records)
    generate_sql_file("04_perawat.sql", "Perawat", ["id_perawat", "nama", "alamat", "no_hp", "id_poliklinik"], perawat_records)
    generate_sql_file("05_apoteker.sql", "Apoteker", ["id_apoteker", "nama", "alamat", "no_hp"], apoteker_records)
    generate_sql_file("06_customer_service.sql", "Customer_Service", ["id_cs", "nama", "alamat", "no_hp"], cs_records)
    generate_sql_file("07_kasir.sql", "Kasir", ["id_kasir", "nama", "alamat", "no_hp"], kasir_records)

    pemasok_records = [(i, fake.company(), fake.address(), fake.phone_number(), random.choice(['Utama', 'Tambahan'])) for i in range(1, NUM_RECORDS + 1)]
    
    for i_obat, o_data in enumerate(random.choices(list_obat, k=NUM_RECORDS), 1):
        local_obat_records.append((i_obat, o_data[0], o_data[1], o_data[2], random.randint(100, 1000), float(o_data[3]*1000)))
    
    generate_sql_file("08_pemasok.sql", "Pemasok", ["id_pemasok", "nama", "alamat", "no_hp", "jenis_pemasok"], pemasok_records)
    generate_sql_file("09_obat.sql", "Obat", ["id_obat", "nama_obat", "jenis_obat", "ukuran", "jumlah", "harga"], local_obat_records)

def generate_transactional_data():
    registrasi_records, pemeriksaan_records = [], []
    resep_records, detail_resep_records, pembayaran_records = [], [], []
    
    detail_resep_counter = 1

    for i in range(1, NUM_RECORDS + 1):
        id_pasien = random.randint(1, NUM_RECORDS)
        id_cs = random.randint(1, NUM_RECORDS)
        id_dokter_reg = random.randint(1, NUM_RECORDS) 
        
        dokter_dipilih = next((d for d in dokter_records if d[0] == id_dokter_reg), None)
        id_poliklinik_reg = dokter_dipilih[5] if dokter_dipilih else random.choice([p[0] for p in list_poliklinik])

        tgl_kunjungan = fake.date_between(start_date='-1y', end_date='today')
        if isinstance(tgl_kunjungan, datetime):
            tgl_kunjungan = tgl_kunjungan.date()
        registrasi_records.append((i, id_pasien, id_cs, id_poliklinik_reg, id_dokter_reg, tgl_kunjungan))
        
        id_perawat = random.randint(1, NUM_RECORDS)
        tanggal_pemeriksaan_val = tgl_kunjungan 
        if isinstance(tanggal_pemeriksaan_val, datetime):
            tanggal_pmeriksaan_val = tanggal_pemeriksaan_val.date()

        pemeriksaan_records.append((i, i, id_dokter_reg, id_perawat, fake.sentence(nb_words=6),
                                      round(random.uniform(45, 90), 2), round(random.uniform(150, 190), 2),
                                      round(random.uniform(36.5, 39.0), 2), fake.sentence(nb_words=10), tanggal_pemeriksaan_val))
        
        id_apoteker = random.randint(1, NUM_RECORDS)
        tanggal_resep_val = tgl_kunjungan 
        if isinstance(tanggal_resep_val, datetime):
            tanggal_resep_val = tanggal_resep_val.date()
        resep_records.append((i, i, id_apoteker, tanggal_resep_val))
        
        for _ in range(random.randint(1, 3)):
            id_obat_resep = random.randint(1, NUM_RECORDS) 
            dosis = f"{random.randint(1,3)}x sehari"
            
            obat_terpilih_info_tuple = next((ob_tuple for ob_tuple in obat_records if ob_tuple[0] == id_obat_resep), None)

            jumlah_obat = random.randint(1,2)
            if obat_terpilih_info_tuple and obat_terpilih_info_tuple[2] in ['Tablet', 'Kapsul', 'Tablet Hisap']:
                jumlah_obat = random.randint(1,2) * 10
            
            detail_resep_records.append((detail_resep_counter, i, id_obat_resep, dosis, jumlah_obat))
            detail_resep_counter += 1

        id_kasir = random.randint(1, NUM_RECORDS)
        total_biaya = round(random.uniform(75000, 500000), -3) 
        tanggal_pembayaran_val = tgl_kunjungan
        if isinstance(tanggal_pembayaran_val, datetime):
            tanggal_pembayaran_val = tanggal_pembayaran_val.date()
        pembayaran_records.append((i, i, id_kasir, total_biaya, random.choice(['QRIS', 'Debit', 'Tunai']),
                                      random.choice(['Umum', 'Asuransi']), 'Lunas', tanggal_pembayaran_val))

    generate_sql_file("10_registrasi.sql", "Registrasi", ["id_registrasi", "id_pasien", "id_cs", "id_poliklinik", "id_dokter", "tanggal_kunjungan"], registrasi_records)
    generate_sql_file("11_pemeriksaan.sql", "Pemeriksaan", ["id_pemeriksaan", "id_registrasi", "id_dokter", "id_perawat", "keluhan", "berat_badan", "tinggi_badan", "suhu", "hasil_pemeriksaan", "tanggal_pemeriksaan"], pemeriksaan_records)
    generate_sql_file("12_resep.sql", "Resep", ["id_resep", "id_pemeriksaan", "id_apoteker", "tanggal_resep"], resep_records)
    generate_sql_file("13_detail_resep.sql", "Detail_Resep", ["id_detail_resep", "id_resep", "id_obat", "dosis", "jumlah"], detail_resep_records)
    generate_sql_file("14_pembayaran.sql", "Pembayaran", ["id_pembayaran", "id_registrasi", "id_kasir", "total_biaya", "metode_pembayaran", "tipe_pembayaran", "status_pembayaran", "tanggal_pembayaran"], pembayaran_records)

dokter_records = []
obat_records = []

def generate_master_data_modified():
    global dokter_records, obat_records
    poliklinik_records = [(p[0], p[1], p[2]) for p in list_poliklinik]
    generate_sql_file("01_poliklinik.sql", "Poliklinik", ["id_poliklinik", "nama", "deskripsi"], poliklinik_records)

    pasien_records, temp_dokter_records, perawat_records = [], [], []
    apoteker_records, cs_records, kasir_records = [], [], []
    temp_obat_records = [] 

    for i in range(1, NUM_RECORDS + 1):
        tanggal_lahir_pasien = fake.date_of_birth(minimum_age=5, maximum_age=80)
        if isinstance(tanggal_lahir_pasien, datetime):
            tanggal_lahir_pasien = tanggal_lahir_pasien.date()
        pasien_records.append((i, fake.name(), fake.address(), fake.phone_number(), tanggal_lahir_pasien, random.choice(['A', 'B', 'AB', 'O'])))
        
        id_poli_staf = random.choice([p[0] for p in list_poliklinik])
        temp_dokter_records.append((i, f"Dr. {fake.name()}", fake.address(), fake.phone_number(), random.choice(['Umum', 'Gigi', 'Anak', 'Penyakit Dalam', 'THT']), id_poli_staf))
        perawat_records.append((i, fake.name(), fake.address(), fake.phone_number(), id_poli_staf))
        apoteker_records.append((i, fake.name(), fake.address(), fake.phone_number()))
        cs_records.append((i, fake.name(), fake.address(), fake.phone_number()))
        kasir_records.append((i, fake.name(), fake.address(), fake.phone_number()))

    dokter_records = temp_dokter_records
    generate_sql_file("02_pasien.sql", "Pasien", ["id_pasien", "nama", "alamat", "no_hp", "tanggal_lahir", "golongan_darah"], pasien_records)
    generate_sql_file("03_dokter.sql", "Dokter", ["id_dokter", "nama", "alamat", "no_hp", "spesialis", "id_poliklinik"], dokter_records)
    generate_sql_file("04_perawat.sql", "Perawat", ["id_perawat", "nama", "alamat", "no_hp", "id_poliklinik"], perawat_records)
    generate_sql_file("05_apoteker.sql", "Apoteker", ["id_apoteker", "nama", "alamat", "no_hp"], apoteker_records)
    generate_sql_file("06_customer_service.sql", "Customer_Service", ["id_cs", "nama", "alamat", "no_hp"], cs_records)
    generate_sql_file("07_kasir.sql", "Kasir", ["id_kasir", "nama", "alamat", "no_hp"], kasir_records)

    pemasok_records = [(i, fake.company(), fake.address(), fake.phone_number(), random.choice(['Utama', 'Tambahan'])) for i in range(1, NUM_RECORDS + 1)]
    
    for i_obat, o_data in enumerate(random.choices(list_obat, k=NUM_RECORDS), 1):
        temp_obat_records.append((i_obat, o_data[0], o_data[1], o_data[2], random.randint(100, 1000), float(o_data[3]*1000)))
    
    obat_records = temp_obat_records
    generate_sql_file("08_pemasok.sql", "Pemasok", ["id_pemasok", "nama", "alamat", "no_hp", "jenis_pemasok"], pemasok_records)
    generate_sql_file("09_obat.sql", "Obat", ["id_obat", "nama_obat", "jenis_obat", "ukuran", "jumlah", "harga"], obat_records)

if __name__ == "__main__":
    print("Mulai menghasilkan data SQL...")
    
    generate_master_data_modified()
    generate_transactional_data()
    
    print("\nSemua file .sql berhasil dibuat di direktori 'sql_output'.")