
something = open('temp.txt', 'r')
processed = []
processed.append('{')
for line in something:
    curr = line.strip()
    key, value = curr.split(':')
    processed.append('"' + key.strip() + '" :')
    processed.append('"' + value.strip() + '" ,')
processed.append('}')
print(''.join(processed))