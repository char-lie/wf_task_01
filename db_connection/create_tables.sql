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
   id_user    int          not null auto_increment,
   email      varchar(256) not null,
   password   varchar(100) not null,
   constraint pk_user primary key (id_user)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table country (
   id_country   int          not null auto_increment,
   name_country varchar(200) not null,
   constraint pk_country primary key (id_country)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table city (
   id_city    int          not null auto_increment,
   id_country int          not null,
   name_city  varchar(200) not null,
   constraint pk_city primary key (id_city),
   constraint `fk_country_city` foreign key (`id_country`) references `country` (`id_country`) on delete cascade on update cascade
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table place (
   id_place    int          not null auto_increment,
   id_city     int          not null,
   name_place  varchar(200) not null,
   description varchar(500)         ,
   constraint pk_place primary key (id_place),
   constraint `fk_city_place` foreign key (`id_city`) references `city` (`id_city`) on delete cascade on update cascade
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table place_type (
   id_place_type   int         not null auto_increment,
   name_place_type varchar(50) not null,
   constraint pk_place_type primary key (id_place_type)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table lnk_user_place (
   id_lnk_user_place int not null auto_increment,
   id_user           int not null,
   id_place          int not null,
   id_place_type     int not null,
   constraint pk_lnk_user_place primary key (id_lnk_user_place),
   constraint `fk_user_lnk_user_place` foreign key (`id_user`) references `user` (`id_user`) on delete cascade on update cascade,
   constraint `fk_place_lnk_user_place` foreign key (`id_place`) references `place` (`id_place`) on delete cascade on update cascade,
   constraint `fk_place_type_lnk_user_place` foreign key (`id_place_type`) references `place_type` (`id_place_type`) on delete cascade on update cascade
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table photo_album (
   id_photo_album   int          not null auto_increment,
   id_user          int                  ,
   name_photo_album varchar(200) not null,
   description      varchar(500)         ,
   id_main_photo    int                  ,
   constraint pk_photo_album primary key (id_photo_album),
   constraint `fk_user_photo_album` foreign key (`id_user`) references `user` (`id_user`) on delete cascade on update cascade
--   constraint `fk_photo_photo_album` foreign key (`id_main_photo`) references `photo` (`id_photo`) on delete cascade on update cascade
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table photo (
   id_photo         int         not null auto_increment,
   id_photo_album   int                  ,
   name_photo  varchar(200)              ,
   description varchar(500)              ,
   constraint pk_photo primary key (id_photo),
   constraint `fk_photo_album_photo` foreign key (`id_photo_album`) references `photo_album` (`id_photo_album`) on delete cascade on update cascade
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
alter table `task_001`.`photo_album` 
  add constraint `fk_photo_photo_album`
  foreign key (`id_main_photo`)
  references `task_001`.`photo` (`id_photo`)
  on delete set null
  on update cascade;
create table gender (
   id_gender   int         not null auto_increment,
   name_gender varchar(50) not null,
   constraint pk_gender primary key (id_gender)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table preference (
   id_preference int not null auto_increment,
   id_user       int not null,
   id_gender     int         ,
   constraint pk_preference primary key (id_preference),
   constraint `fk_user_preference` foreign key (`id_user`) references `user` (`id_user`) on delete cascade on update cascade,
   constraint `fk_gender_preference` foreign key (`id_gender`) references `gender` (`id_gender`) on delete cascade on update cascade
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table physique (
   id_physique   int         not null auto_increment,
   name_physique varchar(50) not null,
   constraint pk_physique primary key (id_physique)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table eyes_color (
   id_eyes_color   int         not null auto_increment,
   name_eyes_color varchar(50) not null,
   constraint pk_eyes_color primary key (id_eyes_color)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table hair_color (
   id_hair_color   int         not null auto_increment,
   name_hair_color varchar(50) not null,
   constraint pk_hair_color primary key (id_hair_color)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table hair_length (
   id_hair_length   int         not null auto_increment,
   name_hair_length varchar(50) not null,
   constraint pk_hair_length primary key (id_hair_length)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table appearance (
   id_user        int not null,
   height         int         ,
   id_physique    int         ,
   id_eyes_color  int         ,
   id_hair_color  int         ,
   id_hair_length int         ,
   constraint pk_appearance primary key (id_user),
   constraint `fk_user_appearance` foreign key (`id_user`) references `user` (`id_user`) on delete cascade on update cascade,
   constraint `fk_physique_appearance` foreign key (`id_physique`) references `physique` (`id_physique`) on delete cascade on update cascade,
   constraint `fk_eyes_color_appearance` foreign key (`id_eyes_color`) references `eyes_color` (`id_eyes_color`) on delete cascade on update cascade,
   constraint `fk_hair_color_appearance` foreign key (`id_hair_color`) references `hair_color` (`id_hair_color`) on delete cascade on update cascade,
   constraint `fk_hair_length_appearance` foreign key (`id_hair_length`) references `hair_length` (`id_hair_length`) on delete cascade on update cascade
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table personal (
   id_user    int  not null,
   id_gender  int          ,
   birth_date date         ,
   constraint pk_personal primary key (id_user),
   constraint `fk_user_personal` foreign key (`id_user`) references `user` (`id_user`) on delete cascade on update cascade,
   constraint `fk_gender_personal` foreign key (`id_gender`) references `gender` (`id_gender`) on delete cascade on update cascade
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table interest (
   id_interest   int          not null auto_increment,
   name_interest varchar(200)         ,
   constraint pk_interest primary key (id_interest)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;
create table lnk_user_interest (
   id_lnk_user_interest int not null auto_increment,
   id_user              int not null,
   id_interest          int not null,
   constraint pk_lnk_user_interest primary key (id_lnk_user_interest),
   constraint `fk_user_lnk_user_interest` foreign key (`id_user`) references `user` (`id_user`) on delete cascade on update cascade,
   constraint `fk_interest_lnk_user_interest` foreign key (`id_interest`) references `interest` (`id_interest`) on delete cascade on update cascade
)   ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- get_view_create

-- get_permissions_create

-- get_inserts

-- get_smallpackage_post_sql

-- get_associations_create
