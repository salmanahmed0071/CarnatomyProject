create database DBProject;
use DBProject;
show tables;
describe userprofile;

create table userprofile
(User_id int primary key auto_increment,
First_name varchar(30),
Last_name varchar(30),
email tinytext,
user_password varchar(32),
Street varchar(40),
City varchar(40),
State_Province varchar(40));

select * from userprofile;


##Creation of FORUM table
create table forum
(forum_id integer primary key,
NumberOfPosts integer,
Title varchar(250),
creatorID integer);

alter table forum auto_increment=1;
describe forum;

alter table forum 
add foreign key (creatorID) references userProfile(User_id);

#-----------------------------------------------------------------
#Creation of POSTS table
create table Posts
(DateCreated date,
TextFileDirectory text(300) not null,
imageDirectory text(300));

alter table Posts
add column forum_id integer;

alter table Posts 
add column user_id integer;
alter table Posts 
add foreign key (forum_id) references forum(forum_id);

alter table Posts 
add foreign key (user_id) references userprofile(User_id);
describe Posts;

#-------------------------------------------------------------
## creating Car table
drop table vehicle;
create table vehicle
(CarCode integer primary key auto_increment,
model_year year,
price float,
make varchar(30) not null,
model_name varchar(30) not null);

describe vehicle;
select * from vehicle;

alter table vehicle
modify CarCode integer auto_increment;

insert into vehicle values(1,2005,800000,"Honda","civic");
insert into vehicle values(2,2010,1000000,"Honda","civic");
insert into vehicle values(3,2010,1000000,"BMW","3 series");
select * from vehicle where make like "%honda%" and model_name like "%civic%" and model_year between 2001 and 2012;

select * from vehicle where make like "%honda%" 
and CarCode in (select c.CarCode from vehicle c where c.model_year between 2001 and 2012); 
describe vehicle;
## now creating car details table
drop table carDetails;
create table carDetails
(CarID integer primary key,
Mileage integer,
Transmission varchar(10),
Color varchar(30) unique,
RegistrationNo varchar(30) unique);

describe carDetails;

alter table carDetails
add foreign key (CarID) references vehicle(CarCode);

select * from carDetails;
insert into carDetails values(1,175000,"Manual","Black","LXH-166");
insert into carDetails values(2,105000,"Automatic","Silver","LEC-10-6884");

#query for viewing car details
select v.*,c.* from vehicle v join carDetails c on v.carCode=c.CarID;

insert into carDetails values((select MAX(CarCode) from vehicle),97000,"Manual","Gun Metallic","LEC-10-1451");

drop table seller;
create table seller
(user_id integer,
CarID integer);

describe userprofile;
alter table seller
add foreign key (user_id) references userprofile(User_id);

alter table seller
add foreign key (CarID) references vehicle(CarCode);

select * from seller;
select * from userProfile;
insert into seller values (10,1);
insert into seller values (14,2);
insert into seller values (1,3);

delete from seller
where CarID=11;
##query to check the seller of the car
select u.*,m.* from userProfile u join seller s on u.User_id=s.user_id
join vehicle v on v.CarCode=s.CarID join mediaData m on m.uploaderID=u.User_id;

show tables;

select * from vehicle;
delete from vehicle
where CarCode=17;
select * from cardetails;
delete from cardetails
where CarID=11;

insert into seller values(1,(select MAX(CarCode) from vehicle));

create table mediaData
(imgPathway text(250),
uploaderID int);

drop table mediaData;
insert into mediaData values("uploads/10/img1",13);
select * from mediaData;
delete from mediaData
where uploaderID=10;


create table purchaser
(buyerID integer,
CarID integer);

alter table purchaser
add foreign key (buyerID) references userProfile(User_id);

alter table purchaser 
add foreign key (CarID) references vehicle(CarCode);

alter table userProfile
drop column Account_number;


select * from carDetails;
select * from seller;

delete from seller
where CarID=17;

select s.*,v.*,c.* from seller s join vehicle v on s.CarID=v.CarCode join carDetails c on c.CarID=v.CarCode;

alter table mediaData
add foreign key (uploaderID) references userprofile(User_id);

alter table purchaser
add foreign key (buyerID) references userprofile(User_id);

alter table purchaser
add foreign key (CarID) references vehicle(CarCode);

select * from carDetails;
describe carDetails;
alter table carDetails
drop unique (Color);

select * from userprofile;
describe forum;
insert into forum values(1,2,"Bumpers new",4);
insert into forum values(2,2,"new Headlights",10);
insert into forum values(3,2,"headgaskets",14);
insert into forum values(4,2,"Best engines",4);
insert into forum values(5,2,"Fog Lights",9);