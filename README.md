# M07 Projecte aQ Programacions

## Descripció i Objectius

Aquesta aplicació web desenvolupada amb PHP, MySQL i Laravel té com a objectiu principal facilitar als professors la gestió i organització de les seves Programacions Didàctiques. Permet gestionar Unitats Formatives (UF), Resultats d'Aprenentatge (RA), criteris d'avaluació i continguts.

## Requeriments Funcionals

1. **Sistema de Login**: Autenticació per a professors i administradors.
2. **Gestió de Programacions Didàctiques**: Creació, modificació i eliminació de programacions.
3. **Gestió de Unitats Formatives (UF)**: Administració de les UF (crear, modificar, eliminar).
4. **Gestió de Resultats d'Aprenentatge (RA)**: Edició dels RA per cada UF (addició, modificació, eliminació de criteris d'avaluació i continguts).
5. **Rols d'Usuari**: Diferenciació entre rols: professor i administrador.
6. **Vista d'Administrador**: Capacitat de l'administrador per gestionar totes les programacions i els seus components.
7. **Creació de Mòduls pels Administradors amb els seus RA, Criteris i Continguts**.
8. **Creació de Programacions de Mòduls pels Professors amb afegir activitats**.
9. **Validació d'hores per UF**: Assegurar que les hores de les activitats d'una UF sumin el total correcte.

## Requeriments Tècnics

- **Frontend**: Interfície d'usuari clara i adaptable.
- **Backend**: Ús de PHP i Laravel per la lògica de l'aplicació.
- **Base de Dades**: Utilització de MySQL per emmagatzemar dades de programacions, UF, RA, criteris i continguts.
- **Seguretat**: Implementació de mesures de seguretat per protegir les dades d'usuari i el contingut.

## Diagrama de Classes

### Classes Principals

1. **Usuari**: Representa usuaris amb atributs com ID, nom, correu, contrasenya i rol (professor/administrador).
2. **Mòdul**: Assignatura amb atributs com ID, nom, descripció, hores_totals.
3. **UF (Unitat Formativa)**: Defineix una unitat formativa dins d'un mòdul.
4. **RA (Resultat d'Aprenentatge)**: Detalla els resultats d'aprenentatge per a cada UF.
5. **Criteri**: Especifica els criteris d'avaluació per a cada RA.
6. **Contingut**: Defineix els continguts associats a cada RA.
7. **Programació**: Representa una programació didàctica completa.
8. **Activitat**: Representa una activitat feta a classe.

Cada classe té els seus atributs i relacions, permetent una gestió eficient del contingut educatiu.