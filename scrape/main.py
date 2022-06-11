import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="poliro",
  password="12345678",
  database="poliro"
)

mycursor = mydb.cursor()
sql = "INSERT INTO paragraphs (`text`) VALUES ('alma hehe')"
mycursor.execute(sql)



filename = 'file.txt'
with open(filename, encoding='utf-8') as file:
    info, title, section, subsection, paragraph = ['1', '1', '1', ''], 1, 1, 1, ''
    for line in file:
        line = line.rstrip()
        if not line: continue

        if '#' in line and not line == '## Vége ##':
            if all([char in '#1234567890. ' for char in line]):
                # NEW SECTION
                arr = line[2:-2].split('.')
                title = arr[0]
                section = arr[1]
                subsection = arr[2]
            elif not '=' in line:
                # REAL TITLE
                print('TITLE AT:', title, '=', line[2:-2])
                pass
            else:
                # NEW KEY
                pass
        else:
            # PARAGRAPH TEXT
            paragraph += line
        
        info2 = [title, section, subsection, paragraph]
        if not info[:3] == info2[:3]:
            print(info2)
            info = info2
            paragraph = ''
        
