import pandas as pd
df= pd.read_csv('pokemon_data.csv')

# print(df.columns)##print columns
# print(df[['Name','Type 1']][0:5])
print(df.loc[df['Name'] == "Chespin"])


