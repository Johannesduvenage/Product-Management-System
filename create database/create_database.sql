drop database if exists hair;
create database hair;
use hair;
drop table if exists activities;
create table activities(id int(10) NOT NULL,activity varchar(20));
INSERT INTO `activities`(id,activity) VALUES ('1','PULL_HAIR'),('1','HACKLE'),('1','SIZE_DRAW'),('1','BLEND_DRAW'),('1','SPLIT_END'),('1','SPLIT_END _DRAW'),('1','CLEANING'),('1','CONDITIONING'),('1','RAW_HAIR_SEWING'),('1','DYEING'),('2','PULL_HAIR'),('2','HACKLE'),('2','SIZE_DRAW'),('2','BLEND_DRAW'),('2','SPLIT_END'),('2','SPLIT_END _DRAW'),('2','CLEANING'),('2','CONDITIONING'),('2','RAW_HAIR_SEWING'),('2','DYEING'),('3','PULL_HAIR'),('3','HACKLE'),('3','SIZE_DRAW'),('3','BLEND_DRAW'),('3','SPLIT_END'),('3','SPLIT_END _DRAW'),('3','CLEANING'),('3','CONDITIONING'),('3','RAW_HAIR_SEWING'),('3','DYEING'),('4','CY-PREPARATION'),('4','CY-MAKING'),('4','POLY-PREPARATION'),('4','POLY-MAKING'),('4','WEFTING'),('4','WEFTING_SEWING'),('4','WEFTING_QC'),('4','POLY_TRIMMING'),('5','NITS_REMOVAL'),('5','GREY_REMOVAL'),('6','FINAL_COATING'),('6','FINAL_QC');
drop table if exists details;
create table details(
	ordernum varchar(10) NOT NULL,
	startdate date NOT NULL,
	starttime datetime NOT NULL,
	worker varchar(30) NOT NULL,
	activity varchar(20) NOT NULL,
	station varchar(20) NOT NULL,
	len_in int(10) NOT NULL,
	len_out int(10) NOT NULL,
	wei_in int(10) NOT NULL,
	wei_out int(10) NOT NULL,
	grams int(10) NOT NULL,
	end_time datetime NOT NULL,
	id varchar(50) NOT NULL,
	user varchar(20) NOT NULL,
	status int(2) NOT NULL,
	primary key(id)
);
drop table if exists dailyplan;
create table dailyplan(
	id int(50) NOT NULL,
	station varchar(20) NOT NULL,
	ordernum varchar(10) NOT NULL,
	activity varchar(20) NOT NULL,
	startdate date NOT NULL,
	worker varchar(30) NOT NULL,
	starttime datetime NOT NULL,
	user varchar(20) NOT NULL,
	wei_in int(10) NOT NULL,
timerqrd int(10) NOT NULL,
	primary key(id)
);
drop table if exists employees;
create table employees(
	employee varchar(30)
);
insert into `employees`(`employee`) values ('AMBIKA'),('ANANDHI'),('ARUNA'),('CHITHRA'),('D SELVI'),('D.LAXMI'),('DEVI'),('INDRIA'),('JEYA'),('KALAI'),('KK INDIRA'),('M.LASMI'),('MALA'),('MENAGA'),('NIRMALA'),('NIRMALA RANI'),('POONGOTHAI'),('RANGEELA'),('S SELVI'),('SANGEETHA'),('SANKARI'),('SARALA'),('SARITHA'),('SEETHA'),('SUGANTHI');
drop table if exists orders;
create table orders(
	ordernum varchar(10) NOT NULL,
	item int(11) NOT NULL,
	email varchar(50) NOT NULL,
	startdate date NOT NULL,
	quan int(10) NOT NULL,
	type varchar(50) NOT NULL,
	color varchar(50) NOT NULL,
	length int(10) NOT NULL,
	extenstion varchar(50) NOT NULL,
	size int(10) NOT NULL,
	primary key(ordernum)
);
drop table if exists stations;
create table stations(
	id int(10) NOT NULL AUTO_INCREMENT,
	station varchar(20),
	primary key(id)
);
insert into stations (id,station) values ('1','HAIR_ISSUE'),('2','BLEACHING'),('3','DYE'),('4','PLUG&WEFT'),('5','NITS'),('6','FINAL_STAGE');
drop table if exists users;
create table users(
	username varchar(20) NOT NULL,
	password varchar(20) NOT NULL,
	email varchar(50),
	status int(5),
	primary key(username)
);
insert into `users` values ('admin','admin','admin@gmail.com','1'),('superviser','superviser','superviser@gmail.com','0');