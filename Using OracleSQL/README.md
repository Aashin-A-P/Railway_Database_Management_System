## Railway Ticket Reservation System

# User Table:

```bash CREATE TABLE login_user(
user_id int NOT NULL,
username varchar2(25) NOT NULL,
password varchar2(15) NOT NULL,
pref_lang varchar2(10),
name varchar2(20) NOT NULL,
DOB DATE,
maritalstatus varchar2(10),
sec_qn varchar2(50),
sec_ans varchar2(50),
address varchar2(100) NOT NULL,
email varchar2(25),
mob_no int NOT NULL,
gender varchar2(10),
occp_type varchar2(15),
nationality varchar2(15),
PRIMARY KEY(user_id));
```
# Table Entries

```bash INSERT INTO login_user VALUES(100000,'apaashin','aashin123','English','Aashin A P','21-JAN-2005','Unmarried','Who is your favourite sportsperson?','MS Dhoni','4-34,Mary Mandiram, Konassery, Sooriacode, Kanyakumari district Pincode:629153','apaashin@gmail.com',9489960744,'Male','Student','Indian');

INSERT INTO login_user VALUES(100001,'sasikumar','sasi321','English','Sasi Kumar R','27-OCT-2004','Unmarried','Who is your favourite actor?','Ajith','1234 Elm Street,Cityville, Stateville,ZIP Code:12345','sasikumar@gmail.com',9483466746,'Male','Student','Indian');

INSERT INTO login_user VALUES(100002,'antokumar','anto7677','English','R P Anto Kumar','07-JUN-1977','Married','Which institution are you working in?','SXCCE','4-34,Mary Mandiram, Konassery, Sooriacode, Kanyakumari district Pincode:629153','anto_friends@yahoo.com',9443282263,'Male','Private','Indian');

INSERT INTO login_user VALUES(100003,'apaarush','aarush2101','English','Aarush A P','20-JUN-2011','Unmarried','What is the name of your pet?','Tiger','4-34,Mary Mandiram, Konassery, Sooriacode, Kanyakumari district Pincode:629153','apaarush2011@gmail.com',9488748746,'Male','Student','Indian');

INSERT INTO login_user VALUES(100004,'preetha','preetha0505','English','Preetha S','05-MAY-2005','Married','What is the name of your spouse?','R P Anto Kumar','4-34,Mary Mandiram, Konassery, Sooriacode, Kanyakumari district Pincode:629153','preethaaashin@gmail.com',9487311744,'Female','Other','Indian');

INSERT INTO login_user VALUES(100005,'naveen','naveen123','English','Naveen J','10-DEC-2004','Unmarried','Who is your favourite sportsperson?','Christiano Ronaldo','Dubai Cross Street,Dubai Main Road,Opp to Dubai Bus Stand,Chromepet.','naveen@gmail.com',9898959512,'Male','Student','Indian');

INSERT INTO login_user VALUES(100006,'aadharsh','aadharsh123','English','Aadharsh S','12-NOV-2004','Unmarried','Who is your college crush?','H R','NIT Trichy Quarters, NIT Trichy, Trichy','aadharsh@gmail.com',9476356458,'Male','Student','Indian');

INSERT INTO login_user VALUES(100007,'tamilselvan','tamil420','English','Tamilselvan V','23-JUN-2005','Unmarried','Who is your favourite sportsperson?','Virat Kohli','Gingee, Viluppuram','abimonshri@gmail.com',9487387437,'Male','Student','Indian');
```

# Journey Table:

```bash CREATE TABLE journey(
j_id int,
j_source varchar2(25),
j_dest varchar2(25),
j_date DATE,
createdon DATE,
j_status varchar2(25),
login_id int,
PRIMARY KEY(j_id),
FOREIGN KEY(login_id) REFERENCES login_user(user_id)
);
```
# Table Entries:

```bash INSERT INTO journey VALUES(001,'Nagercoil Junction','Chennai Egmore','27-SEP-2023','23-SEP-2023','Pending','100001');

INSERT INTO journey VALUES(002,'Chennai Egmore','Nagercoil Junction','02-OCT-2023','23-SEP-2023','Pending','100000');

INSERT INTO journey VALUES(003,'Kanniyakumari Terminus','Agra Cantt','01-AUG-2023','23-JUL-2023','Completed','100002');

INSERT INTO journey VALUES(004,'MGR Chennai Central','Bangalore Junction','24-NOV-2023','27-SEP-2023','Pending','100001');

INSERT INTO journey VALUES(005,'Trivandrum Central','MGR Chennai Central','29-SEP-2023','23-SEP-2023','Pending','100004');

INSERT INTO journey VALUES(006,'Nagercoil Junction','Chennai Egmore','27-SEP-2023','23-SEP-2023','Cancelled','100003');
```

# Train Table:

```bash CREATE TABLE train(
t_id int,
t_name varchar2(100),
t_type varchar2(25),
dep_st varchar2(25),
arr_st varchar2(25),
dep_time TIMESTAMP,
arr_time TIMESTAMP,
halts int,
pantry_status varchar2(10),
us_id int,
jo_id int,
PRIMARY KEY(t_id),
FOREIGN KEY(us_id) REFERENCES login_user(user_id),
FOREIGN KEY(jo_id) REFERENCES journey(j_id));
```
# Table Entries:

```bash INSERT INTO train VALUES(12666,'Kanniyakumari - Howrah Superfast Express','SuperFast','Nagercoil Junction','Howrah Cantt','27-SEP-2023 12:00:00 AM','28-SEP-2023 04:00:00 PM',14,'Open',100000,002);

INSERT INTO train VALUES(16128,'Guruvayur - Chennai Egmore Express','Express','Kochuveli Junction','Chennai Egmore','24-SEP-2023 06:00:00 AM','24-SEP-2023 08:00:00 PM',22,'Close',100004,001);

INSERT INTO train VALUES(12688,'Tambaram - Nagercoil Junction Superfast Express','SuperFast','Tambaram','Nagercoil Junction','27-SEP-2023 06:00:00 PM','28-SEP-2023 05:00:00 AM',16,'Open',100002,004);

INSERT INTO train VALUES(20692,'Nagercoil - Tambaram Antyodaya Express','Antyodaya','Nagercoil Junction','Tambaram','25-SEP-2023 06:45:00 PM','26-SEP-2023 05:00:00 AM',22,'Close',100002,003);

INSERT INTO train VALUES(12633,'Chennai Egmore - Kanniyakumari Express','Express','Chennai Egmore','Kanniyakumari Terminus','25-SEP-2023 07:45:00 PM','26-SEP-2023 05:30:00 AM',14,'Open',100005,005);

INSERT INTO train VALUES(12634,'Kanniyakumari - Chennai Egmore Express','Express','Kanniyakumari Terminus','Chennai Egmore','25-SEP-2023 07:45:00 PM','26-SEP-2023 05:30:00 AM',14,'Open',100004,006);

INSERT INTO train VALUES(12679,'MGR Chennai Central - Coimbatore Intercity SF Express','SuperFast','MGR Chennai Central','Coimbatore','25-SEP-2023 02:35:00 PM','25-SEP-2023 10:20:00 PM',11,'Closed',100006,005);

INSERT INTO train VALUES(12680,'Coimbatore - MGR Chennai Central  Intercity SF Express','SuperFast','Coimbatore','MGR Chennai Central','25-SEP-2023 06:20:00 AM','25-SEP-2023 11:50:00 PM',11,'Closed',100000,001);

INSERT INTO train VALUES(16021,'Kaveri Express','Express','MGR Chennai Central','Mysuru Junction','25-SEP-2023 08:20:00 PM','26-SEP-2023 04:50:00 AM',23,'Open',100001,002);

INSERT INTO train VALUES(12693,'Pearl City SF Express','SuperFast','Chennai Egmore','Tuticorin','25-SEP-2023 7:30:00 PM','26-SEP-2023 6:20:00 AM',17,'Closed',100002,003);

INSERT INTO train VALUES(20607,'MGR Chennai Central - Mysuru Vande Bharat Express','Vande Bharat','MGR Chennai Central','Mysuru Junction','25-SEP-2023 05:50:00 AM','25-SEP-2023 12:20:00 PM',2,'Open',100005,005);
```
# Class Table:

```bash CREATE TABLE class(
class_id int,
class_name varchar2(25),
no_of_compartments int,
seat_per_compartment int,
seat_availability varchar2(10),
opt_for_upgrade varchar2(5),
upgradation_status varchar2(15),
coach_pref varchar2(15),
jou_id int,
l_user_id int,
tr_id int,
PRIMARY KEY(class_id),
FOREIGN KEY(jou_id) REFERENCES journey(j_id),
FOREIGN KEY(l_user_id) REFERENCES login_user(user_id),
FOREIGN KEY(tr_id) REFERENCES train(t_id)
);
```
# Table Entries:

```bash INSERT INTO class VALUES(001,'First Class AC',1,20,'WL1','No','Pending','Nil',001,100004,12688);

INSERT INTO class VALUES(002,'First Class AC',1,20,'PWQL1','No','Pending','Nil',002,100002,12634);

INSERT INTO class VALUES(003,'Sleeper',12,80,'WL129','Yes','Pending','Nil',001,100005,12633);

INSERT INTO class VALUES(004,'First Class AC',1,20,'WL1','No','Pending','Nil',005,100001,12633);
```
# Passenger Table:

```bash CREATE TABLE passenger(
p_id int,
name varchar2(20),
DOB DATE,
email varchar2(50),
p_type varchar2(25),
mob_no int,
opt_insur varchar2(5),
user_id int,
PRIMARY KEY(p_id),
FOREIGN KEY(user_id) REFERENCES login_user(user_id));
```
# Table Entries:

```bash INSERT INTO passenger VALUES(001,'Aashin A P','21-JAN-2005','apaashin@gmail.com','Adult',9489960744,'Yes',100001);

INSERT INTO passenger VALUES(002,'V Tamilselvan','23-JUN-2005','vtamil@gmail.com','Adult',9489960944,'Yes',100000);

INSERT INTO passenger VALUES(003,'Alam','19-FEB-1955','alam7@gmail.com','Senior Citizen',9489935744,'No',100005);

INSERT INTO passenger VALUES(004,'Ravi Shankar','21-Feb-2005','ravishankar@gmail.com','Adult',9489965674,'Yes',100006);
```

# Transaction Table:

```bash CREATE TABLE transaction(
trans_id int,
transamt NUMBER(10,2),
pay_method varchar2(25),
acc_no int,
trans_datetime TIMESTAMP,
trans_status varchar2(25),
baseprice NUMBER(10,2),
tax NUMBER(10,2),
p_id int,
class_id int,
t_id int,
j_id int,
user_id int,
PRIMARY KEY(trans_id),
FOREIGN KEY(p_id) REFERENCES passenger(p_id),
FOREIGN KEY(class_id) REFERENCES class(class_id),
FOREIGN KEY(t_id) REFERENCES train(t_id),
FOREIGN KEY(j_id) REFERENCES journey(j_id),
FOREIGN KEY(user_id) REFERENCES login_user(user_id)
);
```
# Table Entries

```bash INSERT INTO transaction VALUES(001,1256.47,'UPI','7754354636','23-SEP-2023 08:20:00 PM','Success',1240.00,16.47,001,001,12633,001,100000);

INSERT INTO transaction VALUES(002,1556.47,'Net Banking','775433754636','22-SEP-2023 08:20:00 AM','Success',1440.00,116.47,002,002,12634,002,100001);

INSERT INTO transaction VALUES(003,756.47,'UPI','7756554636','23-SEP-2023 08:30:00 PM','Failure',750.00,6.47,003,003,12633,003,100003);

INSERT INTO transaction VALUES(004,756.47,'UPI','7756554636','23-SEP-2023 08:30:00 PM','Success',750.00,6.47,003,003,12633,003,100003);
```
# Ticket Table:

```bash CREATE TABLE ticket(
pnr_no int,
seat int,
gen_datetime TIMESTAMP,
berth varchar2(25),
status varchar2(25),
trans_id int,
p_id int,
class_id int,
t_id int,
j_id int,
user_id int,
PRIMARY KEY(pnr_no),
FOREIGN KEY(trans_id) REFERENCES transaction(trans_id),
FOREIGN KEY(p_id) REFERENCES passenger(p_id),
FOREIGN KEY(class_id) REFERENCES class(class_id),
FOREIGN KEY(t_id) REFERENCES train(t_id),
FOREIGN KEY(j_id) REFERENCES journey(j_id),
FOREIGN KEY(user_id) REFERENCES login_user(user_id)
);
```
# Table Entries

```bash INSERT INTO ticket VALUES(1234567,68,'23-SEP-2023 6:02:00 PM','Middle','In Progress',001,001,001,12634,001,100000);

INSERT INTO ticket VALUES(1342572,12,'20-AUG-2023 09:02:00 AM','Upper','Completed',002,002,002,12633,002,100001);

INSERT INTO ticket VALUES(1563727,16,'27-SEP-2023 07:02:00 AM','Lower','In Progress',003,003,003,12666,003,100002);

INSERT INTO ticket VALUES(1234537,80,'20-SEP-2023 08:02:00 PM','Side Upper','Completed',004,004,004,12634,004,100004);
```

``` bash
CREATE TABLE j_source (
    code VARCHAR2(4) PRIMARY KEY,
    station_name VARCHAR2(100)
);
```
```bash 
INSERT INTO j_source VALUES ('MAS','Chennai Central');
INSERT INTO j_source VALUES ('MS','Chennai egmore');
INSERT INTO j_source VALUES ('TBM','Tambaram');
INSERT INTO j_source VALUES ('CBE','Coimbatore jn');
INSERT INTO j_source VALUES ('MDU','Madurai jn');
INSERT INTO j_source VALUES ('TVC','Tiruvananthapuram central');
INSERT INTO j_source VALUES ('ERS','Ernakulam jn');
INSERT INTO j_source VALUES ('CLT','Kozhikkode');
INSERT INTO j_source VALUES ('KPD','Katpadi');
INSERT INTO j_source VALUES ('TCR','Thrisur');
INSERT INTO j_source VALUES ('AJJ','Arakkonam jn');
INSERT INTO j_source VALUES ('CGL','Chengalpattu jn.');
INSERT INTO j_source VALUES ('TRL','Tiruvallur');
INSERT INTO j_source VALUES ('AVD','Avadi');
INSERT INTO j_source VALUES ('TPJ','Tiruchchirappalli jn');
INSERT INTO j_source VALUES ('TEN','Tirunelveli jn');
INSERT INTO j_source VALUES ('SA','Salem jn');
INSERT INTO j_source VALUES ('TUP','Tiruppur');
INSERT INTO j_source VALUES ('PGT','Palakkad jn.');
INSERT INTO j_source VALUES ('ED','Erode Jn');
INSERT INTO j_source VALUES ('CAN','Kannur');
INSERT INTO j_source VALUES ('NCJ','Nagercoil jn');
INSERT INTO j_source VALUES ('ERN','Ernakulam town');
INSERT INTO j_source VALUES ('QLN','Kollam jn');
INSERT INTO j_source VALUES ('MAQ','Mangalore Central');
INSERT INTO j_source VALUES ('AWY','Aluva');
INSERT INTO j_source VALUES ('KTYM','Kottayam');
INSERT INTO j_source VALUES ('PER','Perambur');
INSERT INTO j_source VALUES ('MAJN','Mangalore jn');
INSERT INTO j_source VALUES ('CNGR','Chengannur');
INSERT INTO j_source VALUES ('SRR','Shoranur jn.');
INSERT INTO j_source VALUES ('DG','Dindigul jn');
INSERT INTO j_source VALUES ('TJ','Thanjavur jn');
INSERT INTO j_source VALUES ('JTJ','Jolarpettai');
INSERT INTO j_source VALUES ('KYJ','Kayankulam jn');
INSERT INTO j_source VALUES ('VM','Villupuram jn.');
INSERT INTO j_source VALUES ('TN','Tuticorin');
INSERT INTO j_source VALUES ('KCVL','Kochuveli');
INSERT INTO j_source VALUES ('TLY','Thalassery');
INSERT INTO j_source VALUES ('TIR','Tirur');
INSERT INTO j_source VALUES ('RMM','Rameswaram');
INSERT INTO j_source VALUES ('ALLP','Alappuzha');
INSERT INTO j_source VALUES ('BDJ','Vadakara');
INSERT INTO j_source VALUES ('MBM','Mambalam');
INSERT INTO j_source VALUES ('GI','Guduvancheri');
INSERT INTO j_source VALUES ('PRGL','Perungalathur (FLAG)');
INSERT INTO j_source VALUES ('KGQ','Kasargod');
INSERT INTO j_source VALUES ('KMU','Kumbakonam');
INSERT INTO j_source VALUES ('VPT','Virudhunagar jn');
INSERT INTO j_source VALUES ('CVP','Kovilpatti');
INSERT INTO j_source VALUES ('MV','Mayiladuthurai jn.');
INSERT INTO j_source VALUES ('TSI','Tenkasi jn');
INSERT INTO j_source VALUES ('PAY','Payyannur');
INSERT INTO j_source VALUES ('TRVL','Tiruvalla');
INSERT INTO j_source VALUES ('KRR','Karur jn.');
INSERT INTO j_source VALUES ('NGT','Nagappattinam');
INSERT INTO j_source VALUES ('RMD','Ramanathapuram');
INSERT INTO j_source VALUES ('OTP','Ottappalam');
INSERT INTO j_source VALUES ('KZE','Kanhangad');
INSERT INTO j_source VALUES ('CAPE','Kanniyakumari');
INSERT INTO j_source VALUES ('PDY','Puducherry');
INSERT INTO j_source VALUES ('MTP','Mettupalaiyam');
INSERT INTO j_source VALUES ('TCN','Tiruchendur');
INSERT INTO j_source VALUES ('VAK','Varkalashivagiri');
INSERT INTO j_source VALUES ('KKDI','Karaikkudi jn');
INSERT INTO j_source VALUES ('CGY','Changanacheri');
INSERT INTO j_source VALUES ('PLNI','Palani');
INSERT INTO j_source VALUES ('QLD','Quilandi');
INSERT INTO j_source VALUES ('KTU','Kuttipuram');
INSERT INTO j_source VALUES ('TRT','Tiruttani');
INSERT INTO j_source VALUES ('AFK','Angamali for kaladi');
INSERT INTO j_source VALUES ('UAM','Udagamandalam');
INSERT INTO j_source VALUES ('MLMR','Melmaruvathur');
INSERT INTO j_source VALUES ('GUV','Guruvayur');
INSERT INTO j_source VALUES ('MAHE','Mahe');
INSERT INTO j_source VALUES ('ONR','Coonoor');
INSERT INTO j_source VALUES ('CJ','Kanchipuram');
INSERT INTO j_source VALUES ('SKL','Singaperumalkoil');
INSERT INTO j_source VALUES ('ULL','Ullal');
INSERT INTO j_source VALUES ('BFR','Bekal Fort flag)');
INSERT INTO j_source VALUES ('VLY','Valliyur');
INSERT INTO j_source VALUES ('FK','Ferok');
INSERT INTO j_source VALUES ('VRI','Vriddhachalam jn.');
INSERT INTO j_source VALUES ('PMK','Paramakkudi');
INSERT INTO j_source VALUES ('TVR','Tiruvarur jn.');
INSERT INTO j_source VALUES ('KZT','Kulitturai');
INSERT INTO j_source VALUES ('RJPM','Rajapalayam');
INSERT INTO j_source VALUES ('SRT','Sattur');
INSERT INTO j_source VALUES ('SPE','Sullurupeta');
INSERT INTO j_source VALUES ('AB','Ambur');
INSERT INTO j_source VALUES ('MQ','Mannargudi');
INSERT INTO j_source VALUES ('CDM','Chidambaram');
INSERT INTO j_source VALUES ('SRTL','Cherthala');
INSERT INTO j_source VALUES ('SNKL','Sankarankovil');
INSERT INTO j_source VALUES ('ALU','Ariyalur');
INSERT INTO j_source VALUES ('PGI','Parapanangadi');
INSERT INTO j_source VALUES ('SVKS','Sivakasi');
INSERT INTO j_source VALUES ('WJR','Walajaroad');
INSERT INTO j_source VALUES ('KIK','Karaikal');
INSERT INTO j_source VALUES ('SRGM','Srirangam');
INSERT INTO j_source VALUES ('ERL','Eraniel');
INSERT INTO j_source VALUES ('TRTR','Tripunittura');
INSERT INTO j_source VALUES ('KPY','Karunagapalli');
INSERT INTO j_source VALUES ('MAP','Morappur');
INSERT INTO j_source VALUES ('SCT','Sengottai');
INSERT INTO j_source VALUES ('PTJ','Podanur jn.');
INSERT INTO j_source VALUES ('MNM','Manamadurai jn');
INSERT INTO j_source VALUES ('PDKT','Pudukkotai');
INSERT INTO j_source VALUES ('TNM','Tiruvannamalai');
INSERT INTO j_source VALUES ('NYP','Nayudupeta');
INSERT INTO j_source VALUES ('VN','Vaniyambadi');
INSERT INTO j_source VALUES ('MVLK','Mavelikara');
INSERT INTO j_source VALUES ('NIL','Nilambur road');
INSERT INTO j_source VALUES ('SVGA','Sivaganga');
INSERT INTO j_source VALUES ('HAD','Haripad');
INSERT INTO j_source VALUES ('NLE','Nileshwar');
INSERT INTO j_source VALUES ('TPT','Tirupattur');
INSERT INTO j_source VALUES ('SVPR','Srivilliputtur');
INSERT INTO j_source VALUES ('PTB','Pattambi');
INSERT INTO j_source VALUES ('CKI','Chalakudi');
INSERT INTO j_source VALUES ('POY','Pollachi');
INSERT INTO j_source VALUES ('DKO','Devakottai road (FLAG)');
INSERT INTO j_source VALUES ('NJT','Nagercoil Town');
INSERT INTO j_source VALUES ('IJK','Irinjalakuda');
INSERT INTO j_source VALUES ('TMV','Tindivanam');
INSERT INTO j_source VALUES ('TDPR','Tiruppadirippuliyur');
INSERT INTO j_source VALUES ('AAM','Angadipuram');
INSERT INTO j_source VALUES ('KQN','Kodaikkanal road');
INSERT INTO j_source VALUES ('TDN','Thirupparankundram');
INSERT INTO j_source VALUES ('CHV','Charvattur');
INSERT INTO j_source VALUES ('PAZ','Payangadi');
INSERT INTO j_source VALUES ('PUT','Puttur');
INSERT INTO j_source VALUES ('NCR','Nagore');
INSERT INTO j_source VALUES ('SY','Sirkazhi');
INSERT INTO j_source VALUES ('NMKL','Namakkal');
INSERT INTO j_source VALUES ('KDNL','Kadayanallur');
INSERT INTO j_source VALUES ('MEJ','Vanchi maniyachi');
INSERT INTO j_source VALUES ('TMQ','Tirumangalam');
INSERT INTO j_source VALUES ('NNN','Nanguneri');
INSERT INTO j_source VALUES ('PASA','Parassala');
INSERT INTO j_source VALUES ('NMJ','Nidamangalam');
INSERT INTO j_source VALUES ('TTL','Tiruttangal (FLAG)');
INSERT INTO j_source VALUES ('PVRD','Piravam road');
INSERT INTO j_source VALUES ('GYM','Gudiyatham');
INSERT INTO j_source VALUES ('TRK','Tirukkovilur');
INSERT INTO j_source VALUES ('AMPA','Ambalapuzha');
INSERT INTO j_source VALUES ('PGTN','Palakkad town');
INSERT INTO j_source VALUES ('ODC','Oddanchatram');
INSERT INTO j_source VALUES ('BQI','Bommidi');
INSERT INTO j_source VALUES ('NYY','Neyyatinkara');
INSERT INTO j_source VALUES ('SHU','Sholinghur');
INSERT INTO j_source VALUES ('STKT','Sasthankotta');
INSERT INTO j_source VALUES ('PML','Papanasam (FLAG)');
INSERT INTO j_source VALUES ('KZK','Kazhakuttom');
INSERT INTO j_source VALUES ('LLI','Lalgudi');
INSERT INTO j_source VALUES ('VLR','Vellore cantonment');
INSERT INTO j_source VALUES ('TA','Tanur');
INSERT INTO j_source VALUES ('WKI','Wadakancheri');
INSERT INTO j_source VALUES ('CRY','Chirayinkil (FLAG)');
INSERT INTO j_source VALUES ('PVU','Paravur');
INSERT INTO j_source VALUES ('VNB','Vaniyambalam');
INSERT INTO j_source VALUES ('SGE','Sankaridurg');
INSERT INTO j_source VALUES ('NZT','Nazareth');
INSERT INTO j_source VALUES ('KMQ','Kumbla');
INSERT INTO j_source VALUES ('KPQ','Kannapuram');
INSERT INTO j_source VALUES ('KLT','Kulitalai');
INSERT INTO j_source VALUES ('SDN','Sholavandan');
INSERT INTO j_source VALUES ('VDR','Vandalur');
INSERT INTO j_source VALUES ('CUPJ','Cuddalore port jn.');
INSERT INTO j_source VALUES ('CHSM','Chinna salem');
INSERT INTO j_source VALUES ('EKM','Ekambarakuppam (FLAG)');
INSERT INTO j_source VALUES ('TP','Tiruchchirappalli fort');
INSERT INTO j_source VALUES ('CTM','Kattangulathur');
INSERT INTO j_source VALUES ('TRB','Tiruverumbur');
INSERT INTO j_source VALUES ('ATU','Attur');
INSERT INTO j_source VALUES ('PGR','Pugalur');
INSERT INTO j_source VALUES ('ASD','Ambasamudram');
INSERT INTO j_source VALUES ('SXT','Salem town');
INSERT INTO j_source VALUES ('VLNK','Velanganni');

create table j_dest as select * from j_source;



-- Create a sequence to generate unique values for j_id
CREATE SEQUENCE journey_seq START WITH 1 INCREMENT BY 1;

-- Create the journey table
CREATE TABLE journey (
    j_id NUMBER PRIMARY KEY,
    source_code VARCHAR2(4),
    dest_code VARCHAR2(4)
);

-- Populate the journey table with data from j_source and j_dest
INSERT INTO journey (j_id, source_code, dest_code)
SELECT
    journey_seq.NEXTVAL,
    s.CODE AS source_code,
    d.CODE AS dest_code
FROM
    j_source s
CROSS JOIN
    j_dest d
WHERE
    s.CODE <> d.CODE;

CREATE TABLE class_details(
class_id varchar2(2) PRIMARY KEY,
class_name varchar2(25),
seat_per_compartment int);

INSERT INTO class_details VALUES('CC','AC Chair Car',78);
INSERT INTO class_details 
VALUES('EC','Exec. Chair Car',56);
INSERT INTO class_details VALUES('1A','AC First Class',22);
INSERT INTO class_details VALUES('2A','AC 2 Tier',54);
INSERT INTO class_details
VALUES('3A','AC 3 Tier',72);
INSERT INTO class_details
VALUES('2S','Second Sitting',106);
INSERT INTO class_details
VALUES('SL','Sleeper',80);
INSERT INTO class_details
VALUES('3E','AC 3 Economy',80);




CREATE TABLE train(
train_id int PRIMARY KEY,
train_name varchar2(50),
source varchar2(4),
dest varchar2(4),
dep_time date,
arr_time date);

INSERT INTO train VALUES
(16128, 'GUV CHENNAI EXP', 'GUV', 'MS', TO_TIMESTAMP('23:15:00', 'HH24:MI:SS'), TO_TIMESTAMP('20:35:00', 'HH24:MI:SS'));

INSERT INTO train VALUES
(12634, 'KANYAKUMARI EXP', 'CAPE', 'MS', TO_TIMESTAMP('17:50:00', 'HH24:MI:SS'), TO_TIMESTAMP('06:30:00', 'HH24:MI:SS'));

INSERT INTO train VALUES
(20636, 'ANANTAPURI EXP', 'QLN', 'MS', TO_TIMESTAMP('14:50:00', 'HH24:MI:SS'), TO_TIMESTAMP('06:10:00', 'HH24:MI:SS'));

INSERT INTO train VALUES
(6082, 'NCJ MS VB SPL', 'NCJ', 'MS', TO_TIMESTAMP('14:25:00', 'HH24:MI:SS'), TO_TIMESTAMP('23:25:00', 'HH24:MI:SS'));

INSERT INTO train VALUES
(6012, 'NCJ TBM SF SPL', 'NCJ', 'TBM', TO_TIMESTAMP('16:35:00', 'HH24:MI:SS'), TO_TIMESTAMP('04:10:00', 'HH24:MI:SS'));

INSERT INTO train VALUES
(22658, 'NCJ TBM SF EXP', 'NCJ', 'TBM', TO_TIMESTAMP('16:30:00', 'HH24:MI:SS'), TO_TIMESTAMP('04:10:00', 'HH24:MI:SS'));

INSERT INTO train VALUES
(12668, 'NCJ MS SF EXP', 'NCJ', 'MS', TO_TIMESTAMP('16:30:00', 'HH24:MI:SS'), TO_TIMESTAMP('04:35:00', 'HH24:MI:SS'));

INSERT INTO train VALUES
(12690, 'NCJ MAS SF EXP', 'NCJ', 'MAS', TO_TIMESTAMP('16:30:00', 'HH24:MI:SS'), TO_TIMESTAMP('04:35:00', 'HH24:MI:SS'));

INSERT INTO train VALUES
(6065, 'MAJN TBM SPL', 'MAJN', 'TBM', TO_TIMESTAMP('10:00:00', 'HH24:MI:SS'), TO_TIMESTAMP('13:15:00', 'HH24:MI:SS'));

CREATE TABLE train_journey(
t_id int,
jo_id int,
PRIMARY KEY(t_id,jo_id),
FOREIGN KEY(t_id) REFERENCES train(train_id),
FOREIGN KEY(jo_id) REFERENCES journey(j_id));

INSERT INTO train_journey (t_id, jo_id)
SELECT
    16128 AS train_id,
    t.j_id AS journey_id
FROM
    journey t
WHERE
    t.source_code IN ('GUV', 'PNQ', 'TCR', 'IJK', 'CKI', 'AFK', 'AWY', 'ERN', 'ERS', 'SRTL', 'ALLP', 'KYJ', 'QLN', 'PVU', 'VAK', 'TVC', 'NYY', 'KZT', 'ERL', 'NCJ', 'AAY', 'VLY', 'NNN', 'TEN', 'MEJ', 'CVP', 'SRT', 'VPT', 'MDU', 'SDN', 'KQN', 'DG', 'MPA', 'TPJ', 'SRGM', 'ALU', 'PNDM', 'VRI', 'VM', 'TMV', 'MLMR', 'CGL', 'TBM', 'MBM', 'MS')
    AND t.dest_code IN ('GUV', 'PNQ', 'TCR', 'IJK', 'CKI', 'AFK', 'AWY', 'ERN', 'ERS', 'SRTL', 'ALLP', 'KYJ', 'QLN', 'PVU', 'VAK', 'TVC', 'NYY', 'KZT', 'ERL', 'NCJ', 'AAY', 'VLY', 'NNN', 'TEN', 'MEJ', 'CVP', 'SRT', 'VPT', 'MDU', 'SDN', 'KQN', 'DG', 'MPA', 'TPJ', 'SRGM', 'ALU', 'PNDM', 'VRI', 'VM', 'TMV', 'MLMR', 'CGL', 'TBM', 'MBM', 'MS')
    AND t.dest_code > t.source_code;



CREATE TABLE dailydate (
    dates DATE,
    day VARCHAR2(20),
    PRIMARY KEY(dates),
    FOREIGN KEY(day) REFERENCES days(day)
);

ALTER TABLE dailydate
ADD PRIMARY KEY (dates),
ADD FOREIGN KEY(day) REFERENCES days(day);

INSERT INTO dailydate (dates, day)
SELECT
    TRUNC(SYSDATE) + LEVEL - 1 AS dates,
    TO_CHAR(TRUNC(SYSDATE) + LEVEL - 1, 'Day') AS day
FROM dual
CONNECT BY LEVEL <= 121;


CREATE TABLE train_day (
    train_id int,
    day VARCHAR2(20),
    PRIMARY KEY (train_id, day)
    FOREIGN KEY (train_id) REFERENCES train(train_id),
    FOREIGN KEY (day) REFERENCES dailydate(DAY)
);
ALTER TABLE train_day
ADD FOREIGN KEY (train_id) REFERENCES train(train_id);

CREATE TABLE train_class (
    train_id NUMBER(38) NOT NULL,
    class_id NOT NULL,
    PRIMARY KEY (train_id, class_id),
    FOREIGN KEY(train_id) REFERENCES train(train_id),
    FOREIGN KEY(class_id) REFERENCES class(class_id)
);
ALTER TABLE train_class
ADD no INT;


INSERT INTO train_class (train_id, class_id, no) VALUES (16128, '2A', 1);
INSERT INTO train_class (train_id, class_id, no) VALUES (16128, '3A', 2);
INSERT INTO train_class (train_id, class_id, no) VALUES (16128, 'SL', 6);
INSERT INTO train_class (train_id, class_id, no) VALUES (16128, '2S', 8);


UPDATE class SET price = 1600 WHERE class_id = 'CC';
UPDATE class SET price = 3200 WHERE class_id = 'EC';
UPDATE class SET price = 3600 WHERE class_id = '1A';
UPDATE class SET price = 2400 WHERE class_id = '2A';
UPDATE class SET price = 1200 WHERE class_id = '3A';
UPDATE class SET price = 600 WHERE class_id = '2S';
UPDATE class SET price = 800 WHERE class_id = 'SL';
UPDATE class SET price = 1000 WHERE class_id = '3E';



CREATE TABLE seat_availability (
    dates DATE NOT NULL,
    train_id NUMBER(38) NOT NULL,
    class_id VARCHAR2(2) NOT NULL,
    no_of_seats NUMBER(38),
    PRIMARY KEY (dates, train_id, class_id),
    FOREIGN KEY (train_id)
    REFERENCES train(train_id),
    FOREIGN KEY (class_id)
    REFERENCES class(class_id),
    FOREIGN KEY (dates) 
    REFERENCES dailydate(dates)
);

INSERT INTO train_day VALUES (16128, 'Monday');
INSERT INTO train_day VALUES (16128, 'Tuesday');
INSERT INTO train_day VALUES (16128, 'Wednesday');
INSERT INTO train_day VALUES (16128, 'Thursday');
INSERT INTO train_day VALUES (16128, 'Friday');
INSERT INTO train_day VALUES (16128, 'Saturday');
INSERT INTO train_day VALUES (16128, 'Sunday');



CREATE OR REPLACE TRIGGER trg_train_date
AFTER INSERT ON train_date
FOR EACH ROW
DECLARE
    v_day VARCHAR2(20);
    v_no_of_seats NUMBER(38);
BEGIN
    -- Get the day for the inserted date
    SELECT day INTO v_day FROM train_day WHERE train_id = :new.train_id;

    -- Check if the train is available on that day
    IF v_day IS NOT NULL THEN
        -- Calculate the number of seats from train_class and class tables
        SELECT no * seat_per_compartment INTO v_no_of_seats
        FROM train_class tc
        JOIN class c ON tc.class_id = c.class_id
        WHERE tc.train_id = :new.train_id;

        -- Insert into seat_availability
        INSERT INTO seat_availability (dates, train_id, class_id, no_of_seats)
        SELECT :new.dates, tc.train_id, tc.class_id, v_no_of_seats
        FROM train_class tc
        WHERE tc.train_id = :new.train_id;

        COMMIT;
    END IF;
END;
/


CREATE OR REPLACE TRIGGER trg_insert_seat_availability
AFTER INSERT ON train_day
FOR EACH ROW
DECLARE
    v_day VARCHAR2(20);
BEGIN
    -- Get the day from the new row in train_day
    v_day := :new.day;

    -- Insert into seat_availability based on matching dates and day
    INSERT INTO seat_availability (DATES, TRAIN_ID, CLASS_ID, NO_OF_SEATS)
    SELECT td.DATES, tc.TRAIN_ID, tc.CLASS_ID, tc.NO * c.SEAT_PER_COMPARTMENT
    FROM train_class tc
    JOIN class c ON tc.CLASS_ID = c.CLASS_ID
    JOIN dailydate td ON td.DAY = v_day
    WHERE tc.TRAIN_ID = :new.train_id;
END;
/

SELECT J_ID
FROM journey
JOIN StationIndex SOURCE_INDEX ON journey.SOURCE_CODE = SOURCE_INDEX.CODE
JOIN StationIndex DEST_INDEX ON journey.DEST_CODE = DEST_INDEX.CODE
WHERE DEST_INDEX.POSITION > SOURCE_INDEX.POSITION;

INSERT INTO train_journey (train_id, journey_id)
SELECT
    18128 AS train_id,
    t.j_id AS journey_id
FROM
    journey t
WHERE
    t.source_code IN ('GUV', 'PNQ', 'TCR', 'IJK', 'CKI', 'AFK', 'AWY', 'ERN', 'ERS', 'SRTL', 'ALLP', 'KYJ', 'QLN', 'PVU', 'VAK', 'TVC', 'NYY', 'KZT', 'ERL', 'NCJ', 'AAY', 'VLY', 'NNN', 'TEN', 'MEJ', 'CVP', 'SRT', 'VPT', 'MDU', 'SDN', 'KQN', 'DG', 'MPA', 'TPJ', 'SRGM', 'ALU', 'PNDM', 'VRI', 'VM', 'TMV', 'MLMR', 'CGL', 'TBM', 'MBM', 'MS')
    AND t.dest_code IN ('GUV', 'PNQ', 'TCR', 'IJK', 'CKI', 'AFK', 'AWY', 'ERN', 'ERS', 'SRTL', 'ALLP', 'KYJ', 'QLN', 'PVU', 'VAK', 'TVC', 'NYY', 'KZT', 'ERL', 'NCJ', 'AAY', 'VLY', 'NNN', 'TEN', 'MEJ', 'CVP', 'SRT', 'VPT', 'MDU', 'SDN', 'KQN', 'DG', 'MPA', 'TPJ', 'SRGM', 'ALU', 'PNDM', 'VRI', 'VM', 'TMV', 'MLMR', 'CGL', 'TBM', 'MBM', 'MS')
    AND t.dest_code > t.source_code; -- Ensuring dest is lower in the list than source


INSERT INTO stationIndex (CODE, POSITION) VALUES ('GUV', 1);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('PNQ', 2);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('TCR', 3);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('IJK', 4);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('CKI', 5);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('AFK', 6);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('AWY', 7);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('ERN', 8);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('ERS', 9);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('SRTL', 10);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('ALLP', 11);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('KYJ', 12);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('QLN', 13);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('PVU', 14);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('VAK', 15);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('TVC', 16);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('NYY', 17);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('KZT', 18);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('ERL', 19);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('NCJ', 20);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('AAY', 21);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('VLY', 22);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('NNN', 23);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('TEN', 24);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('MEJ', 25);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('CVP', 26);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('SRT', 27);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('VPT', 28);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('MDU', 29);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('SDN', 30);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('KQN', 31);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('DG', 32);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('MPA', 33);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('TPJ', 34);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('SRGM', 35);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('ALU', 36);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('PNDM', 37);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('VRI', 38);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('VM', 39);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('TMV', 40);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('MLMR', 41);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('CGL', 42);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('TBM', 43);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('MBM', 44);
INSERT INTO stationIndex (CODE, POSITION) VALUES ('MS', 45);
-- Continue with similar commands for the remaining stations



SELECT j.J_ID, j.SOURCE_CODE, j.DEST_CODE, s1.CODE AS SOURCE_STATION, s2.CODE AS DEST_STATION
FROM journey j
JOIN stationIndex s1 ON j.SOURCE_CODE = s1.CODE
JOIN stationIndex s2 ON j.DEST_CODE = s2.CODE
WHERE s1.POSITION < s2.POSITION;

INSERT INTO train_journey (T_ID, JO_ID)
SELECT 20636 as TRAIN_ID, j.J_ID
FROM journey j
JOIN stationIndex s1 ON j.SOURCE_CODE = s1.CODE
JOIN stationIndex s2 ON j.DEST_CODE = s2.CODE
WHERE s1.POSITION < s2.POSITION;
 

-- Assuming the days of the week are Sunday, Monday, ..., Saturday
INSERT INTO train_day (TRAIN_ID, DAY) VALUES (16128, 'Sunday');
INSERT INTO train_day (TRAIN_ID, DAY) VALUES (16128, 'Monday');
INSERT INTO train_day (TRAIN_ID, DAY) VALUES (16128, 'Tuesday');
INSERT INTO train_day (TRAIN_ID, DAY) VALUES (16128, 'Wednesday');
INSERT INTO train_day (TRAIN_ID, DAY) VALUES (16128, 'Thursday');
INSERT INTO train_day (TRAIN_ID, DAY) VALUES (16128, 'Friday');
INSERT INTO train_day (TRAIN_ID, DAY) VALUES (16128, 'Saturday');



CREATE TABLE train_day(
train_id int,
day varchar2(20),
PRIMARY KEY(train_id,day),
FOREIGN KEY(train_id) REFERENCES train(train_id),
FOREIGN KEY(day) REFERENCES days(day));

INSERT INTO train_day (train_id, day)
SELECT 6068, TO_CHAR(SYSDATE + LEVEL - 1, 'Day')
FROM dual
CONNECT BY LEVEL <= 7;

INSERT INTO train_journey (T_ID, JO_ID)
SELECT 6068 as TRAIN_ID, j.J_ID
FROM journey j
JOIN stationIndex s1 ON j.SOURCE_CODE = s1.CODE
JOIN stationIndex s2 ON j.DEST_CODE = s2.CODE
WHERE s1.POSITION < s2.POSITION;

CREATE OR REPLACE PROCEDURE update_dailydate AS
BEGIN
    -- Truncate existing data
    TRUNCATE TABLE dailydate;

    -- Insert the next 121 days, including today
    INSERT INTO dailydate (DATES, DAY)
    SELECT TRUNC(SYSDATE) + LEVEL - 1, TO_CHAR(TRUNC(SYSDATE) + LEVEL - 1, 'Day')
    FROM dual
    CONNECT BY LEVEL <= 120;
END;
/

-- Create a daily job to execute the procedure
BEGIN
    DBMS_SCHEDULER.create_job (
        job_name        => 'DAILY_UPDATE_JOB',
        job_type        => 'PLSQL_BLOCK',
        job_action      => 'BEGIN update_dailydate; END;',
        start_date      => SYSTIMESTAMP,
        repeat_interval => 'FREQ=DAILY; BYHOUR=0; BYMINUTE=0; BYSECOND=0',
        enabled         => TRUE
    );
END;
/

INSERT INTO train_day (train_id, day)
SELECT 20684, TO_CHAR(SYSDATE + LEVEL - 1, 'Day')
FROM dual
WHERE TO_CHAR(SYSDATE + LEVEL - 1, 'D') = '6'
CONNECT BY LEVEL <= 7;


INSERT INTO dailydate (DATES, DAY)
SELECT TRUNC(SYSDATE) + LEVEL - 1, TO_CHAR(TRUNC(SYSDATE) + LEVEL - 1, 'Day')
FROM dual
CONNECT BY LEVEL <= 119;




INSERT INTO train_day (train_id, day)
SELECT 12632, TO_CHAR(SYSDATE + LEVEL - 1, 'Day')
FROM dual
CONNECT BY LEVEL <= 7;

INSERT INTO train_journey (T_ID, JO_ID)
SELECT 12680 as TRAIN_ID, j.J_ID
FROM journey j
JOIN stationIndex s1 ON j.SOURCE_CODE = s1.CODE
JOIN stationIndex s2 ON j.DEST_CODE = s2.CODE
WHERE s1.POSITION < s2.POSITION;

INSERT INTO train_day (train_id, day)
SELECT 12680, TO_CHAR(SYSDATE + LEVEL - 1, 'Day')
FROM dual
CONNECT BY LEVEL <= 7;

truncate table stationindex;

SELECT * FROM seat_availability WHERE train_id=12634 AND dates = '21-JAN-24';



CREATE TABLE passenger (
    PNR int PRIMARY KEY,
    name VARCHAR2(50) NOT NULL,
    age NUMBER NOT NULL,
    gender VARCHAR2(10) NOT NULL,
    nationality VARCHAR2(20) NOT NULL,
    mob_no int NOT NULL,
    user_id int,
    FOREIGN KEY (user_id) REFERENCES login_user(user_id)
);





CREATE SEQUENCE passenger_seq START WITH 4444444444 INCREMENT BY 1;

CREATE TABLE transaction_table (
  tran_id NUMBER(38) PRIMARY KEY,
  base_fare NUMBER,
  tax NUMBER,
  total_fare NUMBER,
  payment_method VARCHAR2(50),
  user_id NUMBER,
  pnr_no NUMBER(38),
  timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (pnr_no) REFERENCES passenger(pnr),
  FOREIGN KEY (user_id) REFERENCES login_user(user_id)
);

CREATE TABLE ticket(
PNR int,
user_id int,
j_id int,
train_id int,
class_id varchar2(2),
dates DATE,
trans_id int,
PRIMARY KEY(PNR,user_id,j_id,train_id,class_id,dates,trans_id),
FOREIGN KEY(PNR) REFERENCES Passenger(PNR),
FOREIGN KEY(user_id) REFERENCES login_user(user_id),
FOREIGN KEY(j_id) REFERENCES journey(j_id),
FOREIGN KEY(train_id) REFERENCES train(train_id),
FOREIGN KEY(class_id) REFERENCES class(class_id), 
FOREIGN KEY(dates) REFERENCES dailydate(dates),
FOREIGN KEY(trans_id) REFERENCES transaction(tran_id)
);

```




























