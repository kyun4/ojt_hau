import sys
from gensim.models import Word2Vec

model = Word2Vec.load("job_skills_word2vec.model")

job_desc = sys.argv[1].split()
applicant_skills = sys.argv[2].split()
required_proficiency = sys.argv[3].split()
applicant_proficiency = sys.argv[4].split()

skill_similarity = model.wv.n_similarity(job_desc, applicant_skills)
skill_similarity_percentage = skill_similarity * 100

print('Skill Similarity: ')
print(skill_similarity_percentage)

proficiency_keywords = {
    'familiar': ['familiar with', 'basic understanding', 'knowledge of', 'is a plus'],
    'working': ['working knowledge', 'hands-on experience', 'practical understanding'],
    'expert': ['expert in', 'solid experience', 'extensive knowledge', 'highly proficient']
}

def detect_proficiency_level(text):
    text = text.lower()
    for level, keywords in proficiency_keywords.items():
        if any(text in keyword for keyword in keywords):
            return level
    return 'unknown'  # No proficiency level detected

proficiency_weights = {
    'familiar': 0.5,
    'working': 0.75,
    'expert': 1.0,
    'unknown': 0
}

applicant_proficiency_index = detect_proficiency_level(applicant_proficiency[0])
job_proficiency_index = detect_proficiency_level(required_proficiency[0])

# Compute weighted similarity
# Word2Vec similarity



proficiency_weight_applicant = proficiency_weights[applicant_proficiency_index]
proficiency_weight_job = proficiency_weights[job_proficiency_index]

# Final weighted similarity
final_similarity = skill_similarity * (proficiency_weight_applicant + proficiency_weight_job) / 2
final_similarity_percentage = final_similarity * 100

print(f'Applicant Proficiency Index: {proficiency_weight_applicant}')
print(f'Job Proficiency Index: {proficiency_weight_job}')

print('Skill Similarity Based on Level of Expertise: ')
print(final_similarity_percentage)

print("Arg1 Job Desc")
print(job_desc)