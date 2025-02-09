# Descrierea site-ului

Acest site a fost realizat pentru **atestatul de competențe profesionale** din liceu.

## Funcționare

1. **Crearea contului**: După crearea contului pe acest site, se generează **hash-ul parolei** (MD5), care este salvat în baza de date.
2. **Autentificare**: La autentificare, hash-ul parolei date de către utilizator este comparat cu hash-ul din baza de date, pentru a verifica dacă parola este aceeași.
3. **Sesiune utilizator**: Dacă utilizatorul este autentificat, se creează o **sesiune în PHP**, pentru a reține utilizatorul logat cât timp vizitează site-ul.

---

**Note**: Aceste măsuri asigură o autentificare sigură și o gestionare a sesiunilor eficientă pe parcursul navigării pe site.
