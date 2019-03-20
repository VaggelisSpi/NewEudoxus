-- MySQL Script
-- -----------------------------------------------------
-- Base is  sdi1500039

DROP TABLE IF EXISTS sdi1500039.Users;
DROP TABLE IF EXISTS sdi1500039.Student;
DROP TABLE IF EXISTS sdi1500039.Secretary;
DROP TABLE IF EXISTS sdi1500039.Publisher;
DROP TABLE IF EXISTS sdi1500039.University;
DROP TABLE IF EXISTS sdi1500039.Department;
DROP TABLE IF EXISTS sdi1500039.Books;
DROP Table IF EXISTS sdi1500039.Subject;
DROP Table IF EXISTS sdi1500039.SubjectBook;
DROP Table IF EXISTS sdi1500039.SubjectBookDilosi;
DROP Table IF EXISTS sdi1500039.Dilosi;

-- -----------------------------------------------------
-- Table sdi1500039.Users
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sdi1500039.Users (
  idUsers INT AUTO_INCREMENT NOT NULL ,
  Email VARCHAR(250) NOT NULL,
  Password VARCHAR(45) NOT NULL,
  FirstName VARCHAR(250) NOT NULL,
  LastName VARCHAR(250) NOT NULL,
  DateOfBirth VARCHAR(250) NOT NULL,
  Phone VARCHAR(10) NULL,
  Address VARCHAR(250) NULL,
  AddressNum VARCHAR(250) NULL,
  Municipality VARCHAR(250) NULL,
  TK VARCHAR(250) NULL,
  UserType VARCHAR(250) NOT NULL,
  PRIMARY KEY (idUsers)
);

-- -----------------------------------------------------
-- Table sdi1500039.Student
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sdi1500039.Student (
  idStudent INT NOT NULL,
  DepartmentName VARCHAR(250) NOT NULL,
  UniversityName VARCHAR(250) NOT NULL,
  AM VARCHAR(10) NOT NULL,
  PRIMARY KEY (idStudent)
);

-- -----------------------------------------------------
-- Table sdi1500039.Secretary
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sdi1500039.Secretary (
  idSecretary INT NOT NULL,
  UniversityName VARCHAR(250) NOT NULL,
  DepartmentName VARCHAR(250) NOT NULL,
  IdNumber VARCHAR(10) NOT NULL,
  PRIMARY KEY (idSecretary)
);

-- -----------------------------------------------------
-- Table sdi1500039.Publisher
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sdi1500039.Publisher (
  idPublisher INT NOT NULL,
  IdNumber VARCHAR(10) NOT NULL,
  TaxNumber VARCHAR(10) NOT NULL,
  Amka VARCHAR(10) NOT NULL,
  PRIMARY KEY (idPublisher)
);

-- -----------------------------------------------------
-- Table sdi1500039.University
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sdi1500039.University (
  UniversityName VARCHAR(250) NOT NULL,
  PRIMARY KEY (UniversityName)
);

-- -----------------------------------------------------
-- Table sdi1500039.Department
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sdi1500039.Department (
  DepartmentName VARCHAR(250) NOT NULL,
  UniversityName VARCHAR(250) NOT NULL,
  CONSTRAINT PK_Department PRIMARY KEY (UniversityName, DepartmentName)
);

-- -----------------------------------------------------
-- Table sdi1500039.Subject
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sdi1500039.Subject (
  SubjectName VARCHAR(250) NOT NULL,
  DepartmentName VARCHAR(250) NOT NULL,
  UniversityName VARCHAR(250) NOT NULL,
  Semester INT NOT NULL,
  Professor VARCHAR(250) NOT NULL,
  CONSTRAINT PK_Subject PRIMARY KEY (UniversityName, DepartmentName, SubjectName)
);

-- -----------------------------------------------------
-- Table sdi1500039.Books
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Books (
  ISBN INT NOT NULL,
  Name VARCHAR(250) NULL,
  Author VARCHAR(250) NULL,
  PublishYear INT NULL,
  Publisher VARCHAR(250) NOT NULL,
  PRIMARY KEY (ISBN)
);

-- -----------------------------------------------------
-- Table sdi1500039.SubjectBook
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sdi1500039.SubjectBook (
  SubjectName VARCHAR(250) NOT NULL,
  DepartmentName VARCHAR(250) NOT NULL,
  UniversityName VARCHAR(250) NOT NULL,
  ISBN INT NOT NULL,
  CONSTRAINT PK_Subject PRIMARY KEY (UniversityName, DepartmentName, SubjectName, ISBN)
);

-- -----------------------------------------------------
-- Table sdi1500039.SubjectBookDilosi
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sdi1500039.SubjectBookDilosi (
  subjectBookName VARCHAR(250) NOT NULL,
  subjectBookPublisher VARCHAR(250) NOT NULL,
  subjectName VARCHAR(250) NOT NULL,
  bookPososto VARCHAR(250) NOT NULL,
  PRIMARY KEY (subjectBookName)
);

-- -----------------------------------------------------
-- Table sdi1500039.Dilosi
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS sdi1500039.Dilosi (
  ID int NOT NULL AUTO_INCREMENT,
  subjectName VARCHAR(250) NOT NULL,
  subjectBookName VARCHAR(250) NOT NULL,
  studentEmail VARCHAR(250) NOT NULL,
  PRIMARY KEY (ID)
);

-- -----------------------------------------------------
-- Insert some mock data
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Insert SubjectBookDilosi
-- -----------------------------------------------------

INSERT INTO `SubjectBookDilosi`(`subjectBookName`,`subjectBookPublisher`,`subjectName`,`bookPososto`)
                VALUES ('Τεχνητή Νοημοσύνη Μια Εισαγωγή','Κλειδάριθμος','Τεχνητή Νοημοσύνη','64%');

INSERT INTO `SubjectBookDilosi`(`subjectBookName`,`subjectBookPublisher`,`subjectName`,`bookPososto`)
                VALUES ('Τεχνητή Νοημοσύνη Μια Προσέγγιση','Γκιούρδας','Τεχνητή Νοημοσύνη','36%');

INSERT INTO `SubjectBookDilosi`(`subjectBookName`,`subjectBookPublisher`,`subjectName`,`bookPososto`)
                VALUES ('Λειτουργικά Συστήματα για Μηχανικούς','Ασημάκης','Λειτουργικά Συστήματα','24.36%');

INSERT INTO `SubjectBookDilosi`(`subjectBookName`,`subjectBookPublisher`,`subjectName`,`bookPososto`)
                VALUES ('Μια εισαγωγή στα Λειτουργικά Συστήματα','Πατάκης','Λειτουργικά Συστήματα','75.64%');

INSERT INTO `SubjectBookDilosi`(`subjectBookName`,`subjectBookPublisher`,`subjectName`,`bookPososto`)
                VALUES ('Παράλληλα Συστήματα MPI','Κλειδάριθμος','Παράλληλα Συστήματα','55.5%');

INSERT INTO `SubjectBookDilosi`(`subjectBookName`,`subjectBookPublisher`,`subjectName`,`bookPososto`)
                VALUES ('Παράλληλα Συστήματα OpenMP','Πανεπιστημιακές Εκδόσεις Κρήτης','Παράλληλα Συστήματα','44.5%');

INSERT INTO `SubjectBookDilosi`(`subjectBookName`,`subjectBookPublisher`,`subjectName`,`bookPososto`)
                VALUES ('Γραφικά για Μηχανικούς','Μεταίχμιο','Γραφικά 1','70%');

INSERT INTO `SubjectBookDilosi`(`subjectBookName`,`subjectBookPublisher`,`subjectName`,`bookPososto`)
                VALUES ('Προχωρημένα Γραφικά','Συμμετρία','Γραφικά 1','30%');

INSERT INTO `SubjectBookDilosi`(`subjectBookName`,`subjectBookPublisher`,`subjectName`,`bookPososto`)
                VALUES ('Αρχές Γλωσσών με Haskel','Αρχιμήδης','Αρχές Γλωσσών Προγραμματισμού','80%');

INSERT INTO `SubjectBookDilosi`(`subjectBookName`,`subjectBookPublisher`,`subjectName`,`bookPososto`)
                VALUES ('Αρχές Γλωσσών Μια εισαγωγή','Κλειδάριθμος','Αρχές Γλωσσών Προγραμματισμού','20%');

INSERT INTO `SubjectBookDilosi`(`subjectBookName`,`subjectBookPublisher`,`subjectName`,`bookPososto`)
                VALUES ('Αριθμητική Ανάλυση μια Σύγχρονη Προσέγγιση','Κλειδάριθμος','Αριθμητική Ανάλυση','48%');

INSERT INTO `SubjectBookDilosi`(`subjectBookName`,`subjectBookPublisher`,`subjectName`,`bookPososto`)
                VALUES ('Εισαγωγή στην Αριθμητική Ανάλυση','Συμμετρία','Αριθμητική Ανάλυση','52%');

-- -----------------------------------------------------
-- Insert Univerities
-- -----------------------------------------------------
INSERT INTO `University`(`UniversityName`)
                VALUES ('Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών');
INSERT INTO `University`(`UniversityName`)
                VALUES ('Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης');
INSERT INTO `University`(`UniversityName`)
                VALUES ('Οικονομικό Πανεπιστήμιο ΑΘηνών');
INSERT INTO `University`(`UniversityName`)
                VALUES ('Πανεπιστήμιο Κρήτης');

-- -----------------------------------------------------
-- Insert Departments
-- -----------------------------------------------------
INSERT INTO `Department`(`DepartmentName`, `UniversityName`)
                VALUES ('Τμήμα Πληροφορικής και Τηλεπικοινωνιών', 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών');

INSERT INTO `Department`(`DepartmentName`, `UniversityName`)
                VALUES ('Τμήμα Χημείας', 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών');

INSERT INTO `Department`(`DepartmentName`, `UniversityName`)
                        VALUES ('Τμήμα Μαθηματικών', 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών');

INSERT INTO `Department`(`DepartmentName`, `UniversityName`)
                         VALUES ('Τμήμα Φυσικής', 'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών');

INSERT INTO `Department`(`DepartmentName`, `UniversityName`)
                        VALUES ('Τμήμα Φυσικής', 'Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης');

INSERT INTO `Department`(`DepartmentName`, `UniversityName`)
                        VALUES ('Τμήμα Μαθηματικών', 'Αριστοτέλειο Πανεπιστήμιο Θεσσαλονίκης');

INSERT INTO `Department`(`DepartmentName`, `UniversityName`)
                        VALUES ('Τμήμα Λογιστικής και Χρηματοοικονομικής', 'Οικονομικό Πανεπιστήμιο ΑΘηνών');

INSERT INTO `Department`(`DepartmentName`, `UniversityName`)
                        VALUES ('Τμήμα Διεθνών και Ευρωπαϊκών Σπουδών', 'Οικονομικό Πανεπιστήμιο ΑΘηνών');

INSERT INTO `Department`(`DepartmentName`, `UniversityName`)
                        VALUES ('Τμήμα Μαθηματικών', 'Πανεπιστήμιο Κρήτης');

INSERT INTO `Department`(`DepartmentName`, `UniversityName`)
                        VALUES ('Τμήμα Φυσικής', 'Πανεπιστήμιο Κρήτης');

-- -----------------------------------------------------
-- Insert student
-- -----------------------------------------------------
INSERT INTO `Users`(`Email`, `Password`, `FirstName`, `LastName`,
                    `DateOfBirth`, `Phone`, `UserType`)
                    VALUES ('test_student@gmail.com', '123456789', 'Leonidas',
                            'Arseniou', '10/10/1995', '2102102102', 'Student');

INSERT INTO `Student`(`idStudent`, `DepartmentName`, `UniversityName`, `AM`)
                VALUES (1, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών',
                        'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών', '1234567890' );

-- -----------------------------------------------------
-- Insert Secretary
-- -----------------------------------------------------
INSERT INTO `Users`( `Email`, `Password`, `FirstName`, `LastName`,
                    `DateOfBirth`, `UserType`)
                    VALUES ( 'test_secret@gmail.com', '123456789', 'Athanasia',
                            'Georgiou', '10/03/1985', 'Secretary');

INSERT INTO `Secretary`(`idSecretary`, `DepartmentName`, `UniversityName`, `IdNumber`)
                    VALUES (2, 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών',
                            'Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών', 'A234567890' );

-- -----------------------------------------------------
-- Insert Publisher
-- -----------------------------------------------------
INSERT INTO `Users`(`Email`, `Password`, `FirstName`, `LastName`,
                    `DateOfBirth`, `UserType`)
                    VALUES ('test_publisher@gmail.com', '123456789', 'Joe',
                            'Doe', '30/08/1075', 'Publisher');

INSERT INTO `Publisher`(`idPublisher`, `IdNumber`, `TaxNumber`, `Amka`)
                    VALUES (3, 'A123456789', '9876543210', '1472583690');

-- -----------------------------------------------------
-- Insert Books
-- -----------------------------------------------------
INSERT INTO `Books`(`ISBN`, `Name`, `Author`, `PublishYear`, `Publisher`)
                    VALUES (111, 'Διακριτά Μαθηματικά', 'Rosen', '1997', 'Εκδότης Α');

INSERT INTO `Books`(`ISBN`, `Name`, `Author`, `PublishYear`, `Publisher`)
                    VALUES (222, 'Calcullus', 'Thomas', '1997', 'Εκδότης Β');

INSERT INTO `Books`(`ISBN`, `Name`, `Author`, `PublishYear`, `Publisher`)
                    VALUES (333, 'Η Γλώσσα Προγραμματισμού C++', 'Stroustup', '1997', 'Εκδότης Γ');

INSERT INTO `Books`(`ISBN`, `Name`, `Author`, `PublishYear`, `Publisher`)
                    VALUES (444, 'Η Γλώσσα Προγραμματισμού C', 'K & R', '1997', 'Εκδότης Α');

INSERT INTO `Books`(`ISBN`, `Name`, `Author`, `PublishYear`, `Publisher`)
                    VALUES (555, 'Γραφικά και Οπτικοποίηση', 'Θεοχάτης', '1997', 'Εκδότης Α');

INSERT INTO `Books`(`ISBN`, `Name`, `Author`, `PublishYear`, `Publisher`)
                    VALUES (666, 'Στοιχεία Διακριτών Μαθηματικών', 'Liu', '1997', 'Εκδότης Β');

INSERT INTO `Books`(`ISBN`, `Name`, `Author`, `PublishYear`, `Publisher`)
                    VALUES (777, 'Εισαγωγή στους Αλγορίθμους', 'Someone', '1997', 'Εκδότης Α');

INSERT INTO `Books`(`ISBN`, `Name`, `Author`, `PublishYear`, `Publisher`)
                    VALUES (888, 'Οδηγός Καριέρας', 'Κάποιος', '1997', 'Εκδότης Γ');

INSERT INTO `Books`(`ISBN`, `Name`, `Author`, `PublishYear`, `Publisher`)
                    VALUES (999, 'Εισαγωγή στην Φιλοσοφία', 'Joe Doe', '1997', 'Εκδότης Γ');

INSERT INTO `Books`(`ISBN`, `Name`, `Author`, `PublishYear`, `Publisher`)
                    VALUES (123, 'Τεχνητή Νοημοσύνη Μία Σύγχρονη Προσέγγιση',
                    'Κουμπαράκης και Τάκης', '1997', 'Εκδότης Β');

INSERT INTO `Books`(`ISBN`, `Name`, `Author`, `PublishYear`, `Publisher`)
                    VALUES (741, 'Ιστορία του Αρχαίου Κόσμου', 'Εγώ', '1997', 'Εκδότης Β');

-- -----------------------------------------------------
-- Insert Subject
-- -----------------------------------------------------
INSERT INTO `Subject`(`SubjectName`, `DepartmentName`, `UniversityName`, `Semester`, `Professor`)
                    VALUES ('Διακριτά Μαθηματικά', 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών',
                           'Εθνικό και Καποδιστριακό Πανεπηστήμιο Αθηνών', '2', 'Κιαγιάς');

INSERT INTO `Subject`(`SubjectName`, `DepartmentName`, `UniversityName`, `Semester`, `Professor`)
                    VALUES ('Εισαγωγή στον Προγραμματισμό', 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών',
                           'Εθνικό και Καποδιστριακό Πανεπηστήμιο Αθηνών', '1', 'Σταματόπουλος');

INSERT INTO `Subject`(`SubjectName`, `DepartmentName`, `UniversityName`, `Semester`, `Professor`)
                    VALUES ('Ανάλυση 1', 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών',
                           'Εθνικό και Καποδιστριακό Πανεπηστήμιο Αθηνών','2', 'Δοδός');

INSERT INTO `Subject`(`SubjectName`, `DepartmentName`, `UniversityName`, `Semester`, `Professor`)
                    VALUES ('Εισαγωγή στην Μαθηματική Ανάλυση', 'Τμήμα Μαθηματικών',
                            'Εθνικό και Καποδιστριακό Πανεπηστήμιο Αθηνών',
                           '1', 'Μπαρμπάτης');

INSERT INTO `Subject`(`SubjectName`, `DepartmentName`, `UniversityName`, `Semester`, `Professor`)
                    VALUES ('Μαθηματικά 1', 'Τμήμα Μαθηματικών',
                            'Αριστοτέλιο Πανεπηστήμιο Θεσσαλονίκης',
                           '1', 'Παπαγιάννης');

-- -----------------------------------------------------
-- Insert SubjectBook
-- -----------------------------------------------------
INSERT INTO `SubjectBook`(`ISBN`, `SubjectName`, `DepartmentName`, `UniversityName`)
                    VALUES (111, 'Διακριτά Μαθηματικά', 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών',
                           'Εθνικό και Καποδιστριακό Πανεπηστήμιο Αθηνών');

INSERT INTO `SubjectBook`(`ISBN`, `SubjectName`, `DepartmentName`, `UniversityName`)
                    VALUES (666, 'Διακριτά Μαθηματικά', 'Τμήμα Πληροφορικής και Τηλεπικοινωνιών',
                           'Εθνικό και Καποδιστριακό Πανεπηστήμιο Αθηνών');

INSERT INTO `SubjectBook`(`ISBN`, `SubjectName`, `DepartmentName`, `UniversityName`)
                    VALUES (222, 'Ανάλυση 1', 'Τμήμα Μαθηματικών',
                           'Εθνικό και Καποδιστριακό Πανεπηστήμιο Αθηνών');

INSERT INTO `SubjectBook`(`ISBN`, `SubjectName`, `DepartmentName`, `UniversityName`)
                    VALUES (222, 'Εισαγωγή στην Μαθηματική Ανάλυση', 'Τμήμα Μαθηματικών',
                           'Εθνικό και Καποδιστριακό Πανεπηστήμιο Αθηνών');

INSERT INTO `SubjectBook`(`ISBN`, `SubjectName`, `DepartmentName`, `UniversityName`)
                    VALUES (222, 'Μαθηματικά 1', 'Τμήμα Μαθηματικών',
                           'Αριστοτέλιο Πανεπηστήμιο Θεσσαλονίκης');
