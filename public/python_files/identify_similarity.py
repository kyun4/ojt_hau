import sys
from gensim.models import Word2Vec


base_string = sys.argv[1].split('~')

model_path = base_string[0]

required_skills = base_string[1]
required_proficiency = base_string[2]
applicant_skills = base_string[3]
applicant_proficiency = base_string[4]


model = Word2Vec.load(model_path)

required_skills_trim = required_skills.replace("_"," ")
applicant_skills_trim = applicant_skills.replace("_"," ")

skill_similarity = model.wv.n_similarity(required_skills_trim, applicant_skills_trim)
skill_similarity_percentage = skill_similarity * 100

print('Skill Similarity: ')
print("{:.2f}".format(skill_similarity_percentage))
print("%")
print("<br/>")

proficiency_keywords = {
    'familiar': ['familiar with', 'famililar', 'basic understanding', 'knowledge of', 'is a plus'],
    'working': ['working knowledge','working experience','hands-on experience', 'practical understanding'],
    'expert': ['expert in','expert','solid experience', 'extensive knowledge', 'highly proficient']
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

applicant_proficiency_index = detect_proficiency_level(applicant_proficiency)
job_proficiency_index = detect_proficiency_level(required_proficiency)

# Compute weighted similarity
# Word2Vec similarity



proficiency_weight_applicant = proficiency_weights[applicant_proficiency_index]
proficiency_weight_job = proficiency_weights[job_proficiency_index]

# Final weighted similarity
final_similarity = skill_similarity * (proficiency_weight_applicant + proficiency_weight_job) / 2
final_similarity_percentage = final_similarity * 100

# print(f'Applicant Proficiency Index: {proficiency_weight_applicant}')
# print("<br/>")
# print(f'Job Proficiency Index: {proficiency_weight_job}')
# print("<br/>")
# print("<br/>")
# print('Skill and Proficiency Percentage')
# print("<br/>")
# print(round(final_similarity_percentage,2))
# print("%")


