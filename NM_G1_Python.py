import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt

# Load the dataset
df = pd.read_csv('Data.csv')

# Univariate Analysis: Create histograms for each numerical column
df.hist(figsize=(10,8))
plt.show()

# Bivariate Analysis: Create boxplot and scatterplot for numerical columns vs. categorical column 'smoker'
sns.boxplot(x='smoker', y='charges', data=df)
plt.show()

sns.scatterplot(x='age', y='charges', hue='smoker', data=df)
plt.show()

# Multi-Variate Analysis: Create a heatmap of the correlation matrix
sns.heatmap(df.corr(), annot=True)
plt.show()

# Descriptive statistics using the describe() method
print(df.describe())

# Handle missing values: Check for missing values and fill them with the mean of the column
print(df.isnull().sum())

df.fillna(df.mean(), inplace=True)
