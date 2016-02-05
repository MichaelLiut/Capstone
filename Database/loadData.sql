-- ADDING USERS
INSERT INTO User(Username, FirstName, LastName, Password) VALUES ('base', 'base', 'base', 'base');
INSERT INTO User(Username, FirstName, LastName, Password) VALUES ('Admin', 'Bob', 'Coons', 'capstone2014');
INSERT INTO User(Username, FirstName, LastName, Password) VALUES ('brandon', 'Brandon', 'Da Silva', 'password');
INSERT INTO User(Username, FirstName, LastName, Password) VALUES ('other', 'Some', 'Dude', 'password');

-- ADDING A TANK
INSERT INTO Tank(UserID, CurrTemp, TargetTemp, WaterFlow, Lights, LightColour, Name, Model) VALUES (1, 21, 21, FALSE, FALSE, 'red', 'Capstone Demo', 'Aquarium 5000');
INSERT INTO Tank(UserID, CurrTemp, TargetTemp, WaterFlow, Lights, LightColour, Name, Model) VALUES (2, 23, 23, FALSE, TRUE, 'green', 'My Aquarium', 'Aquarium Deluxe');
INSERT INTO Tank(UserID, CurrTemp, TargetTemp, WaterFlow, Lights, LightColour, Name) VALUES (1, 21, 21, FALSE, FALSE, 'red', "FISHMO_DEMO");
INSERT INTO Tank(UserID, CurrTemp, TargetTemp, WaterFlow, Lights, LightColour, Name) VALUES (1, 21, 21, FALSE, FALSE, 'red', "FISHMO1");
INSERT INTO Tank(UserID, CurrTemp, TargetTemp, WaterFlow, Lights, LightColour, Name) VALUES (1, 21, 21, FALSE, FALSE, 'red', "FISHMO2");

-- ADDING FISH
INSERT INTO Fish(Name, Picture, TempLow, TempHigh, Compatible, Description, Type) VALUES ('Goldfish', '../images/goldfish.jpg', 20, 22, 'NONE', 'The goldfish is one of the most commonly kept aquarium fish.', 0);
INSERT INTO Fish(Name, Picture, TempLow, TempHigh, Compatible, Description, Type) VALUES ('Guppy', '../images/guppy.jpg', 24, 28, 'Angelfish', 'The guppy is one of the world\'s most widely distributed tropical fish.',1);
INSERT INTO Fish(Name, Picture, TempLow, TempHigh, Compatible, Description, Type) VALUES ('Angelfish', '../images/Angelfish.png', 24, 28, 'Guppy', 'All Angelfish originate from the rivers in tropical South America.',1);
INSERT INTO Fish(Name, Picture, TempLow, TempHigh, Compatible, Description, Type) VALUES ('Betta', '../images/Beta_fish.jpg', 23, 27, 'Fighter Fish', 'The Betta fish is popular as an aquarium fish.',1);
INSERT INTO Fish(Name, Picture, TempLow, TempHigh, Compatible, Description, Type) VALUES ('Fighter', '../images/Fighter_Fish.jpg', 23, 27, 'Beta Fish', 'The Fighter fish is aexteremely aggressive.',1);
INSERT INTO Fish(Name, Picture, TempLow, TempHigh, Compatible, Description, Type) VALUES ('Puffer', '../images/blowfish.jpeg', 24, 26, 'NONE', 'Pufferfish are the second-most poisonous vertebrates in the world.', 0);

-- ADD FISH INTO TANK
INSERT INTO InTank(TankID, FishID) VALUES (1, 2);
INSERT INTO InTank(TankID, FishID) VALUES (1, 3);
INSERT INTO InTank(TankID, FishID) VALUES (1, 4);
INSERT INTO InTank(TankID, FishID) VALUES (1, 5);
INSERT INTO InTank(TankID, FishID) VALUES (2, 2);
INSERT INTO InTank(TankID, FishID) VALUES (2, 3);
INSERT INTO InTank(TankID, FishID) VALUES (2, 5);