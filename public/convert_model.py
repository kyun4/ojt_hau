from gensim.models import KeyedVectors

# Load the binary Word2Vec model
path = 'path/to/GoogleNews-vectors-negative300.bin.gz'
word_vectors = KeyedVectors.load_word2vec_format(path, binary=True)

# Save the model in text format
# word_vectors.save_word2vec_format('google_news_vectors.txt', binary=False)
w2v.save_word2vec_format('corpus_vectors.txt', binary= False, write_header= False)
