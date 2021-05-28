import requests
from bs4 import BeautifulSoup
import pandas as pd
import numpy as np
import urllib.request
import os
import uuid
import time
import random
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
    
t=random.randint(2, 5)
book_name = list()
author = list()
genre = list()

toplam_sayfa = 581

f = open("kalinan_yer.txt", "r")
kalinan_yer = f.read()
f.close()

f = open("kalinan_sayfa.txt", "r")
i = f.read()
f.close()

f = open("book_num.txt", "r")
book_num = f.read()
f.close()

kalinan_yer = int(kalinan_yer)
book_num = int(book_num)
i = int(i)

while kalinan_yer < toplam_sayfa*36:
    
    i = str(i)
    siteurl = "https://www.idefix.com/kategori/Kitap/Arastirma-Tarih/grupno=00051?Page="+i
    r = requests.get(siteurl)
    soup = BeautifulSoup(r.content,"html.parser")
    gelen_veri = soup.find_all("a",{"class":"product-image"})
    
    
    for link in gelen_veri:
        time.sleep(t)
        linkler = link.get('href')
        kitapurl = "https://www.idefix.com/"+linkler
        r = requests.get(kitapurl)
        soup = BeautifulSoup(r.content, "html.parser")
        
        gelen_veri2 = soup.find_all("a", {"class": "bold"})        
        try:
            kitapismi = gelen_veri2[0].text
        except :
            kitapismi = 'null'
            pass
        kitapismi = kitapismi.replace("\n", "")
    
        gelen_veri3 = soup.find_all("a", {"class": "bold authorr"})
        try:
            yazar = gelen_veri3[0].text
        except :
            yazar = 'null'
            pass
        yazar = yazar.replace("\n", "")
        tur = 'Araştırma-Tarih'
        
        # Get Cursor
        cur = conn.cursor()
        try:
            cur.execute(
                "INSERT INTO kitaplar(kitap_ad,yazar_ad,tur) VALUES (?, ?,?)", 
                (kitapismi,yazar,tur))
        except mariadb.Error as e: 
            print(f"Error: {e}")
            
        conn.commit() 
        print(f"Last Inserted ID: {cur.lastrowid}")
        
        kalinan_yer = str(kalinan_yer)
        book_num = str(book_num)
        i = str(i)

        f = open("kalinan_yer.txt", "w")
        f.write(kalinan_yer)
        f.close()
        f = open("kalinan_sayfa.txt", "w")
        f.write(i)
        f.close()
        f = open("book_num.txt", "w")
        f.write(book_num)
        f.close()
        
        kalinan_yer = int(kalinan_yer)
        book_num = int(book_num)
        i = int(i)
        
        kalinan_yer=kalinan_yer+1
        
        book_num = book_num+1
        if (book_num%36) == 0:
            i=i+1
            
conn.close()