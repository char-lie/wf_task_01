-- Parse::SQL::Dia          version 0.27                              
-- Documentation            http://search.cpan.org/dist/Parse-Dia-SQL/
-- Environment              Perl 5.018002, /usr/bin/perl              
-- Architecture             x86_64-linux-gnu-thread-multi             
-- Target Database          mysql-myisam                              
-- Input file               webmasters_forge_ltd.dia                  
-- Generated at             Mon Feb 23 19:38:09 2015                  
-- Typemap for mysql-myisam not found in input file                   

-- get_constraints_drop 

-- get_permissions_drop 

-- get_view_drop

-- get_schema_drop
drop table if exists user;
drop table if exists lnk_user_place;
drop table if exists place;
drop table if exists city;
drop table if exists country;
drop table if exists photo_album;
drop table if exists photo;
drop table if exists gender;
drop table if exists preference;
drop table if exists appearance;
drop table if exists physique;
drop table if exists eyes_color;
drop table if exists hair_color;
drop table if exists hair_length;
drop table if exists personal;
drop table if exists lnk_user_interest;
drop table if exists interest;

-- get_smallpackage_pre_sql 

-- get_schema_create
create table user (
   id_user    int          not null,
   email      varchar(256) not null,
   password   varchar(100) not null,
   id_gender  int                  ,
   birth_date date                 ,
   constraint pk_user primary key (id_user)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table lnk_user_place (
   id_lnk_user_place int not null,
   id_user           int not null,
   id_place          int not null,
   constraint pk_lnk_user_place primary key (id_lnk_user_place)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table place (
   id_place    int          not null,
   id_city     int          not null,
   name_place  varchar(200) not null,
   description varchar(500)         ,
   constraint pk_place primary key (id_place)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table city (
   id_city    int          not null,
   id_country int          not null,
   name_city  varchar(200) not null,
   constraint pk_city primary key (id_city)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table country (
   id_country   int          not null,
   name_country varchar(200) not null,
   constraint pk_country primary key (id_country)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table photo_album (
   id_photo_album   int          not null,
   id_user          int                  ,
   name_photo_album varchar(200) not null,
   description      varchar(500)         ,
   id_main_photo    int                  ,
   constraint pk_photo_album primary key (id_photo_album)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table photo (
   id_photo    int          not null,
   id_album    int                  ,
   name_photo  varchar(200)         ,
   description varchar(500)         
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table gender (
   id_gender   int         not null,
   name_gender varchar(50) not null,
   constraint pk_gender primary key (id_gender)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table preference (
   id_preference int not null,
   id_user       int not null,
   id_gender     int         ,
   constraint pk_preference primary key (id_preference)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table appearance (
   id_user        int not null,
   height         int         ,
   id_physique    int         ,
   id_eyes_color  int         ,
   id_hair_color  int         ,
   id_hair_length int         ,
   constraint pk_appearance primary key (id_user)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table physique (
   id_physique   int         not null,
   name_physique varchar(50) not null,
   constraint pk_physique primary key (id_physique)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table eyes_color (
   id_eyes_color   int         not null,
   name_eyes_color varchar(50) not null,
   constraint pk_eyes_color primary key (id_eyes_color)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table hair_color (
   id_hair_color   int         not null,
   name_hair_color varchar(50) not null,
   constraint pk_hair_color primary key (id_hair_color)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table hair_length (
   id_hair_length   int         not null,
   name_hair_length varchar(50) not null,
   constraint pk_hair_length primary key (id_hair_length)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table personal (
   id_user    int  not null,
   id_gender  int          ,
   birth_date date         ,
   constraint pk_personal primary key (id_user)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table lnk_user_interest (
   id_lnk_user_interest int not null,
   id_user              int not null,
   id_interest          int not null,
   constraint pk_lnk_user_interest primary key (id_lnk_user_interest)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;
create table interest (
   id_interest   int          not null,
   name_interest varchar(200)         ,
   constraint pk_interest primary key (id_interest)
)   ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- get_view_create

-- get_permissions_create

-- get_inserts

-- get_smallpackage_post_sql

-- get_associations_create
