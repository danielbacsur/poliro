filename = 'konyv.txt'
with open(filename, encoding='utf-8') as file:
    for line in file:
        line = line.rstrip()
        has_all = all([char in '#01234. ' for char in line])
        if line and has_all:
            print(line)
