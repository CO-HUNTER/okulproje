# Module Imports
import mariadb
import sys

# Connect to MariaDB Platform
try:
    conn = mariadb.connect(
        user="dene_ibrahim",
        password="Arzgrs43!",
        host="localhost",
        port=3306,
        database="dene_book"

    )
except mariadb.Error as e:
    print(f"Error connecting to MariaDB Platform: {e}")
    sys.exit(1)

# Get Cursor
cur = conn.cursor()

kitaplar = []

cur.execute(
    "SELECT kitap_ad FROM kitaplar ")
    
for (kitap_ad) in cur:
    print(f"First Name: {kitap_ad}")    



try:
    cur.execute(
        "INSERT INTO kitaplar(kitap_ad,yazar_ad,tur) VALUES (?, ?,?)", 
        ('first','second','third'))
except mariadb.Error as e: 
    print(f"Error: {e}")
    
conn.commit() 
print(f"Last Inserted ID: {cur.lastrowid}")
    
conn.close()    
        