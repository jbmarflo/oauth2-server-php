create table mentor(
	id varchar(40) COLLATE utf8_unicode_ci NOT NULL,
    career varchar(250) COLLATE utf8_unicode_ci null,
    specialization varchar(250) COLLATE utf8_unicode_ci null,
    social_media varchar(250) COLLATE utf8_unicode_ci null,
    link_project varchar(250) COLLATE utf8_unicode_ci null,
    photo_path varchar(250) COLLATE utf8_unicode_ci null,
    about text COLLATE utf8_unicode_ci null,
    question_about_decision text COLLATE utf8_unicode_ci null,
    CONSTRAINT pk_mentor PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

create table experience(
	id varchar(40) COLLATE utf8_unicode_ci NOT NULL,
    mentor_id varchar(40) COLLATE utf8_unicode_ci null,
    title varchar(250) COLLATE utf8_unicode_ci null,
    achievement text COLLATE utf8_unicode_ci null,
    CONSTRAINT pk_experience PRIMARY KEY(id),
    CONSTRAINT fk_experience_mentor FOREIGN KEY(mentor_id) REFERENCES mentor(id) ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;