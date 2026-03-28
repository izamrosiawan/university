import pandas as pd

df = pd.read_csv('obesity_data_cleaned.csv')
print('Statistik BMI:')
print(df['BMI'].describe())
print(f'\nMean: {df["BMI"].mean():.2f}')
print(f'Min: {df["BMI"].min():.2f}')
print(f'Max: {df["BMI"].max():.2f}')
