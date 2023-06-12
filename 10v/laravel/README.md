Hozirda proyekt ishlamoqda va ichida custom posts jadvali mavjud:
1. /api/resources ga kirsangiz hamma postlarni chiqaradi
2. /api/resources/{id} ga kirsangiz idsi $id ga teng bolgan postni chiqaradi
3. /api/resources/e/{id} berilgan id dan tashqari hamma postlarni chiqaradi

Agar baza.sql faylini ishalatmoqchi bolsangiz:
1. Phpmyadminni ochasiz
2. Ichida apidb degan bazani korasiz
3. Bazani ichida sizga berilgan baza.sql faylni import qilasiz
4. Bazada bitta yoki bir nechta jadavallar paydo boladi
5. VsCode da app/models papkasini ichida Resource.php ni ochasiz
6. $table = 'posts' degan yozuvni korasiz, posts degan yozuvni phpmyadmindagi jadvalingiz nomi bilan almashtirasiz