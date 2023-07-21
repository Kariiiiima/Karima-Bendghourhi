/*==============================================================*/
/* Table : USER                                                 */
/*==============================================================*/
create table USER
(
   USER_ID1             int not null auto_increment,
   PRENOM               char(100),
   EMAIL                char(100),
   PASSWORD             varchar(100),
   NOM                  char(100) not null,
   primary key (USER_ID1)
);

/*==============================================================*/
/* Table : ARTICLE                                              */
/*==============================================================*/
create table ARTICLE
(
   ARTICLEID            int not null auto_increment,
   USER_ID1             int not null,
   TITLE                char(100),
   AR_CONTEN            char(200),
   PUBLISHED_AT         varchar(100),
   FILE                 varchar(1000),
   primary key (ARTICLEID),
   foreign key (USER_ID1) references USER (USER_ID1) on delete restrict on update restrict
);

/*==============================================================*/
/* Table : COMMENTAIRE                                          */
/*==============================================================*/
create table COMMENTAIRE
(
   COMMENT_ID           varchar(100) not null,
   ARTICLEID            int not null,
   USER_ID1             int,
   NFCREA_AT            int,
   PARENT_ID            int,
   CON_COM              varchar(200),
   primary key (COMMENT_ID),
   foreign key (USER_ID1) references USER (USER_ID1) on delete restrict on update restrict,
   foreign key (ARTICLEID) references ARTICLE (ARTICLEID) on delete restrict on update restrict
);

/*==============================================================*/
/* Table : NOTIFICATION                                         */
/*==============================================================*/
create table NOTIFICATION
(
   NOTI_ID              int not null auto_increment,
   USER_ID1             int not null,
   TARGET_ID            int not null,
   MESSAGE              longtext,
   NO_DATE              datetime,
   primary key (NOTI_ID),
   foreign key (USER_ID1) references USER (USER_ID1) on delete restrict on update restrict
);

/*==============================================================*/
/* Table : CONTAIN                                              */
/*==============================================================*/
create table CONTAIN
(
   NOTI_ID              int not null,
   COMMENT_ID           varchar(100) not null,
   primary key (NOTI_ID, COMMENT_ID),
   foreign key (COMMENT_ID) references COMMENTAIRE (COMMENT_ID) on delete restrict on update restrict,
   foreign key (NOTI_ID) references NOTIFICATION (NOTI_ID) on delete restrict on update restrict
);

/*==============================================================*/
/* Table : MESSAGE                                              */
/*==============================================================*/
create table MESSAGE
(
   MSG_ID               int not null auto_increment,
   USER_ID1             int not null,
   NOTI_ID              int not null,
   SENDER_ID            int,
   RECEIVER_ID          int,
   CREATED_ATMSG        int,
   MPARENT_ID           int,
   MSG_CONTENRT         char(255),
   primary key (MSG_ID),
   foreign key (USER_ID1) references USER (USER_ID1) on delete restrict on update restrict,
   foreign key (NOTI_ID) references NOTIFICATION (NOTI_ID) on delete restrict on update restrict
);
