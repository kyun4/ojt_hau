import sys

arg1 = sys.argv[1].split('_')

base_string = arg1 

model_path = base_string[0]

job_desc = base_string[1]
required_proficiency = base_string[2]
applicant_skills = base_string[3]
applicant_proficiency = base_string[4]

print(f"sample {applicant_proficiency}")