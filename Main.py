import pandas as pd
import nltk
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
import string
from elasticsearch import Elasticsearch, helpers

# Download necessary NLTK data
nltk.download('stopwords')
nltk.download('punkt')

# Example data
data = {
    'user_id': [1, 2, 3],
    'username': ['alice', 'bob', 'charlie'],
    'post': [
        "I love coding in Python!",
        "Data science and AI are the future.",
        "Python is great for data analysis."
    ]
}

df = pd.DataFrame(data)

# Preprocessing function
def preprocess_text(text):
    text = text.lower()
    text = text.translate(str.maketrans('', '', string.punctuation))
    tokens = word_tokenize(text)
    tokens = [word for word in tokens if word not in stopwords.words('english')]
    return ' '.join(tokens)

# Apply preprocessing
df['processed_post'] = df['post'].apply(preprocess_text)

# Connect to Elasticsearch
es = Elasticsearch([{'host': 'localhost', 'port': 9200}])
index_name = 'social_network'

# Delete the index if it exists
if es.indices.exists(index=index_name):
    es.indices.delete(index=index_name)

# Create the index
es.indices.create(index=index_name)

# Prepare and bulk index the data
def generate_actions(df):
    for _, row in df.iterrows():
        yield {
            "_index": index_name,
            "_source": {
                "user_id": row["user_id"],
                "username": row["username"],
                "post": row["post"],
                "processed_post": row["processed_post"]
            }
        }

helpers.bulk(es, generate_actions(df))

# Search function
def search_social_network(query, es, index_name='social_network'):
    preprocessed_query = preprocess_text(query)
    search_body = {
        "query": {
            "multi_match": {
                "query": preprocessed_query,
                "fields": ["post", "processed_post"]
            }
        }
    }
    res = es.search(index=index_name, body=search_body)
    results = res['hits']['hits']
    return results

# Example search
query = "Python data"
results = search_social_network(query, es)

# Display results
for result in results:
    print(f"Username: {result['_source']['username']}")
    print(f"Post: {result['_source']['post']}\n")
