# Database-Volumi
Database con inserimento di libri.

Comandi da fare all'interno del dbms:

    Crea database:
    >create database Esercizio;

    Entra nel database:
    >use Esercizio;

    Crea tabella:

    >create table volumi(

        isbn int primary key,
        titolo varchar(50) not null,
        autore varchar(50) not null,
        data_prestito date,
        prestato char(1)
    
    );

    Inserimento:
    >insert into volumi values(1234,"l'informatica mi piace","Mongelli","2023-11-08","N");

    Per la data:
    >select curdate();  solo la data
    >select now(); data + orario
    >select curtime(); solo orario;

    Stampa dei volumi:
    >select * from volumi;