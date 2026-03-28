import numpy as np
import skfuzzy as fuzz
from skfuzzy import control as ctrl

# Variabel fuzzy
ipk = ctrl.Antecedent(np.arange(0, 4.1, 0.1), 'ipk')
toefl = ctrl.Antecedent(np.arange(250, 601, 1), 'toefl')
income = ctrl.Antecedent(np.arange(0, 2.1, 0.01), 'income')  # juta
eligibility = ctrl.Consequent(np.arange(0, 101, 1), 'eligibility')

# Fungsi keanggotaan
ipk['cukup'] = fuzz.trimf(ipk.universe, [2.5, 3.0, 3.5])
ipk['bagus'] = fuzz.trimf(ipk.universe, [3.0, 3.5, 4.0])

toefl['menengah'] = fuzz.trimf(toefl.universe, [400, 450, 500])
toefl['tinggi'] = fuzz.trimf(toefl.universe, [500, 550, 600])

income['kecil'] = fuzz.trapmf(income.universe, [0, 0, 0.6, 1.0])
income['sedang'] = fuzz.trimf(income.universe, [0.8, 1.2, 1.6])
income['besar'] = fuzz.trimf(income.universe, [1.4, 1.7, 2.0])
income['sangat_besar'] = fuzz.trapmf(income.universe, [1.8, 2.0, 2.0, 2.0])

eligibility['rendah'] = fuzz.trimf(eligibility.universe, [0, 25, 50])
eligibility['tinggi'] = fuzz.trimf(eligibility.universe, [50, 75, 100])

# Rules
rule1 = ctrl.Rule(ipk['bagus'] & (income['kecil'] | income['sedang']),
                eligibility['tinggi'])

rule2 = ctrl.Rule(ipk['bagus'] & (income['besar'] | income['sangat_besar']),
                eligibility['rendah'])

rule3 = ctrl.Rule(ipk['cukup'] & (income['kecil'] | income['sedang']),
                eligibility['rendah'])

rule4 = ctrl.Rule(toefl['tinggi'] & (income['kecil'] | income['sedang']),
                eligibility['tinggi'])

rule5 = ctrl.Rule(toefl['menengah'] & (income['kecil'] | income['sedang']),
                eligibility['tinggi'])

# Sistem kontrol
system = ctrl.ControlSystem([rule1, rule2, rule3, rule4, rule5])
sim = ctrl.ControlSystemSimulation(system)

# Data mahasiswa
students = [
    ('Tyes', 450, 4, 0.75),
    ('Bowo', 480, 3, 1.50),
    ('Erna', 360, 3, 1.26),
    ('Astuti', 270, 2, 1.04),
    ('Yuni', 420, 4, 0.95),
    ('Heribertus', 390, 4, 1.60),
    ('Edy', 370, 3, 1.25),
    ('Usman', 255, 3, 0.55),
    ('Pujiono', 325, 2, 0.74),
    ('Slamet', 250, 1, 0.86)
]

# Hitung semua
for name, t, i, inc in students:
    sim.input['toefl'] = t
    sim.input['ipk'] = i
    sim.input['income'] = inc
    
    try:
        sim.compute()
        print(f"{name:10s} → Nilai Kelayakan: {sim.output['eligibility']:.2f}")
    except KeyError:
        print(f"{name:10s} → Nilai Kelayakan: Tidak dapat dihitung (tidak memenuhi rule)")
