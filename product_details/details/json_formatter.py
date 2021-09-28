import json
import os
import pandas as pd

files = os.listdir()
json_files = [str(i) + ".json" for i in range(1, 27)]
df = pd.DataFrame(columns=("product_id", "description", "specification"))

for json_file in json_files:
    with open(json_file, 'r') as f:
        json_data = json.load(f)
        index = json_file.replace('.json', '')
        desc = json_data["description"]
        spec = json.dumps(json_data["specification"])
        df_small = {"product_id" : index, "description" : desc, "specification": spec}
        df = df.append(df_small , ignore_index = True)

df.to_csv('details.csv', index=False)