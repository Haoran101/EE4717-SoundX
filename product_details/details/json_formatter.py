
something = open('temp.txt', 'r')
processed = []
count = 0
processed.append('{')
for line in something:
    processed.append('"'+line.strip()+'"')
    if count % 2 == 0:
        processed.append(':')
    else:
        processed.append(',')
    count += 1
processed.append('}')
print(''.join(processed))