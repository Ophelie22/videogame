### On va afficher tt ce qu'il y a ds notre bdd

SELECT * FROM videogame

### Si par exemple je veux juste le titres

SELECT title FROM videogame:

Mario Bros
The legend of Zelda
Tetris
Sonic
 
## Si je veux l'id et et le titre:
SELECT id, title FROM videogame:

# La ou le jeu est TEtRIS
SELECT id, title FROM videogame WHERE title ='Tetris'
SELECT FROM videogame WHERE id = 4

# avant janvier 87
SELECT FROM videogame where release_date < '1987-01-01 :

# Inserer une données
INSERT INTO videogame (
    title,
    editor,
    release_date) values
('Tomb Raidere',
    'Eidos',
    '1996-11-25')

# Par ordre Alphbetique (par defaut croissant)(ou ASC)
SELECT FROM videogame ORDER BY title ASC
# "" descroissant

SELECT FROM videogame ORDER BY title DESC
# par ordre croissant dans la limite de 3
SELECT FROM videogame ORDER BY release_date ASC LIMIT 3