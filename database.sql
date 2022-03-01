------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: advert
#------------------------------------------------------------

CREATE TABLE advert(

id Int  Auto_increment  NOT NULL primary key,
title Varchar (100) NOT NULL ,
description Varchar (250) NOT NULL ,
postal_code Char (6) NOT NULL ,
city Varchar (50) NOT NULL ,
type Varchar (50) NOT NULL ,
price INT (20,6) NOT NULL ,
reservation_message Varchar (250) 
);