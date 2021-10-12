-- Table Name: brand.sql
DROP TABLE IF EXISTS brand;
CREATE TABLE IF NOT EXISTS brand (
  brand_id int(11) NOT NULL PRIMARY KEY,
  brand_name varchar(20) NOT NULL
);

INSERT INTO brand (brand_id, brand_name) VALUES
(1, 'Razer'),
(2, 'Beats'),
(3, 'Sony'),
(4, 'SteelSeries'),
(5, 'Bose');

-- Table Name: orders.sql
DROP TABLE IF EXISTS orders;
CREATE TABLE IF NOT EXISTS orders(
   order_id                INT  NOT NULL PRIMARY KEY
  ,create_time             DATETIME 
  ,user_id                 INT  NOT NULL
  ,status                  INT 
  ,delivery_address_line_1 VARCHAR(100)
  ,delivery_address_line_2 VARCHAR(100)
  ,zip_code                VARCHAR(10)
  ,receiver_name           VARCHAR(50)
  ,receiver_contact        VARCHAR(10)
  ,payment_method          VARCHAR(10)
  ,track_number            VARCHAR(10)
);

INSERT INTO orders (order_id, create_time, user_id, status, delivery_address_line_1, delivery_address_line_2, zip_code, receiver_name, receiver_contact, payment_method) VALUES
(24053638, '2021-10-01 15:49:06', 1, 1, '156 Nanyang Cres', '', '636866', 'Haoran Wei', '88888888', 'visa');

-- Table Name: order_items.sql
DROP TABLE IF EXISTS order_items;
CREATE TABLE IF NOT EXISTS order_items(
   order_id   INT  NOT NULL
  ,product_id INT  NOT NULL
  ,qty        INT  NOT NULL
);

INSERT INTO order_items (order_id, product_id, qty) VALUES (24053638, 2, 1);

-- Table Name: products.sql
DROP TABLE IF EXISTS products;
CREATE TABLE IF NOT EXISTS products(
   product_id        INTEGER  NOT NULL PRIMARY KEY 
  ,product_name      VARCHAR(60) NOT NULL
  ,short_description VARCHAR(70) NOT NULL
  ,no_pictures       INTEGER  NOT NULL
  ,brand_id          INTEGER  NOT NULL
  ,price             NUMERIC(6,2) NOT NULL
  ,wireless          BOOLEAN  NOT NULL
  ,wired             BOOLEAN  NOT NULL
  ,earbuds           BOOLEAN  NOT NULL
  ,gaming            BOOLEAN  NOT NULL
  ,sport             BOOLEAN  NOT NULL
  ,bluetooth         BOOLEAN  NOT NULL
  ,stock             INTEGER  NOT NULL
  ,description       VARCHAR(1000) NOT NULL
  ,specification     VARCHAR(2000) NOT NULL
);
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (1,'RAZER HAMMERHEAD TRUE WIRELESS 2019','True Wireless Earbuds',5,1,169.9,1,0,1,0,0,1,10,'Low latency connection, Water-resistant IPX4 design, Custom-tuned 13mm drivers','{"HEADPHONE FREQUENCY RESPONSE": "20 Hz - 20 KHz", "HEADPHONE IMPEDANCE": "32 Ohm (1 kHz)", "HEADPHONE SENSITIVITY": "91 &#177; 3 dB (1 kHz)", "HEADPHONE INPUT POWER": "8 mW", "HEADPHONE DRIVERS": "13 mm", "HEADPHONE CONNECTOR": "Bluetooth", "CABLE LENGTH": "None", "WEIGHT": "45 g", "MICROPHONE PICK UP PATTERN": "Omnidirectional", "MICROPHONE SIGNAL-TO-NOISE RATIO": "55 dB", "MICROPHONE SENSITIVITY (@1KHZ)": "42 &#177; 3 dB (1 kHz)", "COMPATIBILITY": "Devices with Bluetooth connections, Smartphone app available for Android 8.0 Oreo and iOS 11 (or higher)"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (2,'Razer Kraken Kitty - Black','Razer Kitty Ear USB Headset with Chroma',2,1,239.9,0,1,0,1,0,0,20,'Kitty Ears and Earcups Powered by Razer Chroma , Stream Reactive Lighting ,Cosplay Mode','{"FREQUENCY RESPONSE": "20 Hz - 20 kHz", "IMPEDANCE": "32 Ohm (1 kHz)", "SENSITIVITY": "109 dB (1 kHz)", "DRIVER SIZE - DIAMETERS (MM)": "50 mm", "DRIVER TYPE": "Custom Tuned", "EARCUPS": "Cooling Gel-Infused Cushions", "INNER EARCUP DIAMETER": "Major Diameter 65 mm, Minor Diameter 44 mm", "EARPADS MATERIAL": "Heat-Transfer Fabric / Leatherette / Memory Foam", "NOISE CANCELLING": "Active noise-canceling Microphone", "CONNECTION TYPE": "USB Digital", "CABLE LENGTH": "4.27 ft. / 1.3 m", "WEIGHT": "0.90 lbs / 408 g", "MICROPHONE STYLE": "Retractable Unidirectional Microphone", "PICK-UP PATTERN": "Unidirectional ECM boom", "MICROPHONE FREQUENCY RESPONSE": "100 Hz - 10 kHz", "MICROPHONE SENSITIVITY (@1KHZ)": "-45 &#177; 3 dB", "VIRTUAL SURROUND ENCODING": "THX Spatial", "VOLUME CONTROL": "Yes (VOL + and VOL buttons)", "OTHER CONTROLS": "On Microphone Mute Function: Click-to-mute", "On-earcup: THX Spatial on/off toggle": "BATTERY LIFE", "None": "LIGHTING", "Stream reactive kitty ears": "Underglow earcups", "COMPATIBILITY": "Devices with USB Connector"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (3,'Razer Hammerhead Duo Console - Green','Dual Driver In-Ears',5,1,79.9,0,1,0,0,0,0,22,'Dual Driver Technology, Three Silicone Tip Sizes, Aluminum Frame & Braided Cables','{"HEADPHONE FREQUENCY RESPONSE": "20 Hz-20 KHz", "HEADPHONE IMPEDANCE": "32 Ohm &#177; 15%", "HEADPHONE SENSITIVITY": "112 &#177; 3 dB (Max SPL)", "HEADPHONE INPUT POWER": "10 mW/20 mW", "HEADPHONE DRIVERS": "Dynamic + Balanced Armature", "HEADPHONE CONNECTOR": "3.5 mm angled jack", "CABLE LENGTH": "1.2 m", "WEIGHT": "17 g", "MICROPHONE FREQUENCY RESPONSE": "100 Hz -10 kHz", "MICROPHONE PICK UP PATTERN": "Omni-directional", "MICROPHONE SIGNAL-TO-NOISE RATIO": " 58 dB", "MICROPHONE SENSITIVITY (@1KHZ)": "-40 &#177; 3 dB", "COMPATIBILITY": "Devices with 3.5 mm audio jack, Devices with 3.5 mm audio + microphone combined jack"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (4,'Razer Kaira Pro for Xbox - White','Wireless Headset for Xbox Series X and mobile Xbox gaming',4,1,229.9,1,0,0,1,0,1,9,'Razer TriForce Titanium 50mm Drivers, Raze HyperClear Supercardioid Mic, Dedicated mobile mic','{"FREQUENCY RESPONSE": "20 Hz - 20 kHz", "IMPEDANCE": "32 at 1 kHz", "SENSITIVITY": "108 dB", "DRIVER SIZE - DIAMETERS (MM)": "50 mm", "DRIVER TYPE": "Razer TriForce Titanium", "EARCUPS": "Oval ear cushions", "INNER EARCUP DIAMETER": "2.2 x 2.64, 56 mm x 67 mm", "EARPADS MATERIAL": "FlowKnit memory foam ear cushions", "NOISE CANCELLING": "None", "CONNECTION TYPE": "Direct to Xbox / via Xbox Wireless Adapter for Windows 10, Wireless range: 10 m / 30 ft, Wireless frequency: 2.4 GHz / 5 GHz", "CABLE LENGTH": "None", "WEIGHT": "0.80 lbs / 365 g", "MICROPHONE STYLE": "None", "PICK-UP PATTERN": "Unidirectional", "VIRTUAL SURROUND ENCODING": "None", "MICROPHONE FREQUENCY RESPONSE": "100 Hz - 10 kHz", "VOLUME CONTROL": "Yes (VOL + and VOL Wheel)", "OTHER CONTROLS": "On Earcup", "BATTERY LIFE": "Up to 15 hours (with Chroma Lighting), 20 hours (without Chroma Lighting)", "LIGHTING": "Razer Chroma RGB underglow lighting", "COMPATIBILITY": "Xbox One / Xbox One S / Xbox One X/ Xbox Series X|S, PC (Windows 10 or higher) **May require Xbox Wireless Adapter for Windows 10 (not included/ Sold Separately)", "MICROPHONE SENSITIVITY (@1KHZ)": "54 &#177; 3 dB"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (5,'Beats Flex - Black','BEATS FLEX: FLEX ALL DAY',5,2,99.99,0,1,0,0,1,1,26,'In your ears or around your neck, Beats Flex are as versatile as the life you lead. Whether you are listening to music, taking calls, or scrolling your social feed, you will always be ready for what s next. Magnetic earbuds make listening that much easier by automatically playing music when they are in your ears and pausing when they are attached around your neck. The Flex-Form cable provides all-day comfort with durable Nitinol construction while four eartip options offer a personalized fit. And when you are not wearing them, the magnetic earbuds keep Beats Flex tangle-free as they easily coil up into your pocket or purse.','{"Other Features": "Bluetooth, With Mic, Inline Volume Control, Wireless", "Form Factor": "In Ear", "Connections": "Bluetooth, Wireless", "Power Source": "Battery", "Batteries": "Rechargeable lithium-ion", "Height": "0.6 in / 1.6 cm", "Length": "34 in / 86.4 cm", "Width": "4.2 in / 10.6 cm", "Weight": "18.6 g / 0.66 oz"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (6,'PowerBeats Pro - Red','POWERBEATS PRO: POWER. PLAY.',4,2,328,1,0,1,0,1,1,36,'Powerbeats Pro, powered by the Apple H1 headphone chip, will revolutionise the way you work out. Built for elite athletes, these totally wireless earphones have no wires to hold you back. The adjustable, secure-fit earhooks are customisable with multiple ear-tip options for extended comfort and are made to stay in place, no matter how hard you go. This lightweight earphone is built for performance with a reinforced design for IPX4-rated sweat and water resistance, so you can take your workouts to the next level. With up to 9 hours of listening time in each earbud and powerful, balanced sound, you will always have your music to motivate you.','{"Other Features": "Bluetooth, Wireless", "Form Factor": "Ear hook, In Ear", "Connections": "Bluetooth, Wireless", "Batteries": "Rechargeable lithium-ion", "Height": "2.3 cm / 0.9 in. (bud), 4.3 cm / 1.7 in. (case)", "Length": "5.9 cm / 2.3 in. (bud), 7.7 cm / 3 in. (case)", "Width": "3.8 cm / 1.5 in. (bud), 7.7 cm / 3 in. (case)", "Weight": "11g (bud), 80g (case)"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (7,'Beats Solo Pro - Ivory','NOISE CANCELLING WIRELESS HEADPHONES TO STAY INSPIRED',6,2,429,1,0,0,0,0,1,8,'Get inspired with Solo Pro wireless headphones. To deliver sound how you want it, Solo Pro features two listening modes: Active Noise Cancelling (ANC) and Transparency mode. Beats Pure ANC gives you the space to create with fully immersive sound, while Transparency mode helps you stay aware of your surroundings. Every detail of Solo Pro has been carefully considered, right down to the intuitive way the headphones turn on and off via folding. The ergonomic design delivers exceptional comfort for extended wear and sleek style. And with up to 22 hours of battery life, you can keep the music going no matter where your day takes you.','{"Form Factor": "On Ear", "Connections": "Bluetooth, Wireless", "Power Source": "Battery", "Batteries": "Rechargeable lithium-ion", "Height": "17.9 cm/7.05 in.", "Weight": "267 g/9.42 oz."}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (8,'Beats EP - blue','WIRED HEADPHONES BUILT FOR LIFE',5,2,138,0,1,0,1,0,0,25,'Beats EP On-Ear Headphones deliver masterfully tuned sound. The battery-free design offers unlimited playback and their sleek, durable frame is reinforced with lightweight stainless steel. Beats EP is an ideal introduction to Beats for any music lover seeking a dynamic listening experience.','{"Form Factor": "On Ear", "Cable length": "133.9 cm / 52.7 in.", "Height": "6.6 cm / 2.6 in.", "Length": "17.8 cm / 7 in.", "Width": "15.4 cm / 6 in.", "Weight": "200g"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (9,'PowerBeats - White','LIGHTWEIGHT WIRELESS EARPHONES FOR ALL?DAY ACTIVITY',4,2,199,0,1,0,0,1,1,26,'Powered by the Apple H1 headphone chip, high-performance wireless Powerbeats earphones are built to keep you moving. The adjustable, secure-fit earhooks maximise comfort and stability, while a reinforced design for IPX4-rated sweat and water resistance5 lets you take it to the next level. And with up to 15 hours of listening time,1 you can stay charged through multiple workouts and fuel your training with powerful, balanced sound.','{"Other Features": "Bluetooth, Wireless, Noise Isolation", "Form Factor": "Ear hook, In Ear", "Connection": "Bluetooth, Wireless", "Power Source": "Battery", "Batteries": "Rechargeable lithium-ion", "Height": "2.4 cm / 0.9 in.", "Length": "5.9 cm / 2.3 in.", "Width": "3.8 cm / 1.5 in.", "Weight": "27g"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (10,'WF-1000XM4 Wireless Noise Cancelling Headphones','Your sound. Nothing else.',5,3,379,1,0,1,0,1,1,24,'An exceptional listening experience that/ s tailored just for you. The WF-1000XM4 truly wireless headphones take industry-leading noise cancelling1 and audio quality to the next level. Made to fit every ear, they offer a personalised experience that adjusts to every situation.','{"WEIGHT": "Approx. 41 g", "HEADPHONE TYPE": "Truly Wireless", "DRIVER UNIT": "6 mm", "MAGNET": "High power neodymium magnets", "FREQUENCY RESPONSE(BLUETOOTH COMMUNICATION)": "20Hz - 20,000Hz(44.1kHz sampling) / 20Hz - 40,000Hz(LDAC 96kHz sampling, 990kbps)", "WATERPROOF": "Yes(IPX4)", "DSEE EXTREME": "Yes", "BATTERY CHARGE TIME": "Approx. 1.5 hrs", "BATTERY LIFE(CONTINUOUS MUSIC PLAYBACK TIME)": "Max. 8 hrs(NC On) / Max. 12 hrs(NC Off)", "BATTERY LIFE(CONTINUOUS COMMUNICATION TIME)": "Max. 5.5 hrs(NC On) / Max. 6.0 hrs(NC Off)", "BLUETOOTH VERSION": "BLUETOOTH Specification Version5.2", "PROFILE": "A2DP, AVRCP, HFP, HSP", "SUPPORTED AUDIO FORMAT(S)": "SBC, AAC, LDAC", "SUPPORTED CONTENT PROTECTION": "SCMS-T", "AMBIENT SOUND MODE": "Yes", "QUICK ATTENTION": "Yes"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (11,'WF-SP900 Sports Wireless Headphones','Music to take you further',3,3,399,1,0,1,0,1,1,38,'On the track, in the pool or under the ocean, the WF-SP900 headphones are all you need to take you further than ever before. With a truly wireless design and 4GB of on-board storage so you can listen anywhere.','{"WEIGHT": "Approx. 7.3g x 2 (not including the arc supporters)", "HEADPHONE TYPE": "Closed Balanced Armature", "DRIVER UNIT": "Balanced Armature", "FREQUENCY RESPONSE(BLUETOOTH COMMUNICATION)": "20Hz - 20,000Hz (44.1kHz Sampling)", "VOLUME CONTROL": "Yes (Tap sensor)", "WATERPROOF": "IPX5 / IPX8 (Headset only)2", "NFC": "Yes (Charging Case)", "MEMORY SIZE": "4GB3", "MUSIC PLAY MODE": "Normal / Repeat /Shuflle / Shuffle all / Repeat 1 Song / Folder / Playlists / Album", "AUDIO PLAYBACK": "MP3 ( .mp3) WMA ( .wma) FLAC ( .flac) WAV ( .wav) AAC ( .mp4, .m4a, .3gp)4", "AMBIENT SOUND MODE": "Yes", "BATTERY CHARGE TIME": "Approx. 2.5 Hours (Full charge )", "BATTERY CHARGE METHOD": "USB charging (with Charging Case)", "BATTERY LIFE(CONTINUOUS MUSIC PLAYBACK TIME)": "Max. 3 Hours (Ambient sound mode OFF ) *via Bluetooth playback5678", "BATTERY LIFE(CONTINUOUS MUSIC PLAYBACK TIME WITH INTERNAL MEMORY)": "Max. 6 Hours (Ambient sound mode OFF) *internal memory playback5678", "BATTERY LIFE(CONTINUOUS COMMUNICATION TIME)": "Max. 2.5 Hours", "BLUETOOTH VERSION": "Bluetooth Specification Version 4.0", "EFFECTIVE RANGE": "Line of sight approx.30ft (10m)", "FREQUENCY RANGE": "2.4GHz band (2.4000GHz-2.4835GHz)", "PROFILE": "A2DP (Advanced Audio Distribution Profile) ,AVRCP (Audio Video Remote Control Profile) ,HFP (Hands-free Profile) ,HSP (Headset Profile)9", "SUPPORTED AUDIO FORMAT(S)": "SBC, AAC1011", "SUPPORTED CONTENT PROTECTION": "SCMS-T"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (12,'WI-1000XM2 Wireless Noise Cancelling In-ear Headphones','Only music. Nothing else.',7,3,449,0,1,0,0,0,1,7,'Discover a world of uncompromising silence where you can enjoy music without noise or distraction in all-day comfort. Industry-leading noise cancellation1, superior sound quality and the comfort of an angled earphone design take listening to a whole new level.','{"WEIGHT": "Approx. 58 g (main unit approx. 44 g)", "HEADPHONE TYPE": "Closed,Hybrid", "DRIVER UNIT": "Hybrid", "MAGNET": "Neodymium", "IMPEDANCE (OHM)": "50 ohm(1kHz)(when connecting via the headphone cable with the unit turned on), 17 ohm(1kHz)(when connecting via the headphone cable with the unit turned off)", "FREQUENCY RESPONSE": "3 Hz-40,000 Hz", "FREQUENCY RESPONSE (ACTIVE OPERATION)": "20Hz - 20,000Hz (44.1kHz Sampling) / 20Hz - 40,000Hz (LDAC 96kHz Sampling, 990kbps)", "FREQUENCY RESPONSE(BLUETOOTH COMMUNICATION)": "20Hz - 20,000Hz (44.1kHz Sampling) / 20Hz - 40,000Hz (LDAC 96kHz Sampling, 990kbps)", "SENSITIVITIES (DB/MW)": "99 dB/mW (when connecting via the headphone cable with the unit turned on), 94 dB/mW (when connecting via the headphone cable with the unit turned off)", "VOLUME CONTROL": "Yes", "CORD TYPE": "Single-sided (detachable)", "CORD LENGTH": "approx. 1m", "PLUG": "Gold-plated L-shaped Stereo Mini", "INPUT(S)": "Stereo Mini", "WEARING STYLE": "Neckband", "NFC": "Yes", "DSEE HX": "Yes", "PASSIVE OPERATION": "Yes", "BATTERY CHARGE TIME": "Approx. 3.5 hours, This unit can be used for 80 minutes after 10 minutes charging.", "BATTERY CHARGE METHOD": "USB", "BATTERY LIFE(CONTINUOUS MUSIC PLAYBACK TIME)": "Max. 10 hours (NC ON), Max. 12 hours (Ambient Sound Mode), Max. 15 hours (NC OFF)", "BATTERY LIFE(CONTINUOUS COMMUNICATION TIME)": "Max. 9 hours (NC ON), Max. 10 hours (Ambient Sound Mode), Max. 13 hours (NC OFF)", "BATTERY LIFE(WAITING TIME)": "Max. 11 hours (NC ON), Max. 13 hours (Ambient Sound Mode), Max. 100 hours (NC OFF)", "BLUETOOTH VERSION": "Bluetooth Specification Version5.0", "EFFECTIVE RANGE": "Line of sight approx.30ft (10m)", "FREQUENCY RANGE": "2.4GHz band (2.4000GHz-2.4835GHz)", "PROFILE": "A2DP, AVRCP, HFP, HSP", "SUPPORTED AUDIO FORMAT(S)": "SBC, AAC, LDAC", "SUPPORTED CONTENT PROTECTION": "SCMS-T", "NOISE CANCELING ON/OFF SWITCH": "Yes", "AMBIENT SOUND MODE": "Yes"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (13,'IER-H500A h.ear in 2 In-ear Headphones','Compact. Colourful. Crystal-clear audio.',3,3,129,0,1,0,0,0,0,5,'Experience the superior detail of High-Resolution Audio with an in-ear design that comes in a range of colours to suit your style.','{"WEIGHT": "Approx. 5g (0.2 oz) without cable", "HEADPHONE TYPE": "Closed, dynamic", "DRIVER UNIT": "9mm, dome type (CCAW Voice Coil)", "MAGNET": "Neodym", "IMPEDANCE (OHM)": "16ohmsat 1kHz", "DIAPHRAGM": "PET", "FREQUENCY RESPONSE": "5Hz-40,000Hz", "SENSITIVITIES (DB/MW)": "103dB / mW", "CORD TYPE": "Y-type", "CORD LENGTH": "Approx. 1.2m (47 1 / 4 in) silver-coated OFC Litz wire", "PLUG": "L-shaped gold-plated 4-pole mini plug"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (14,'WH-1000XM4 Wireless Noise Cancelling Headphones','Silent White',6,3,499,1,0,0,0,0,1,38,'Designed in a new Silent White colour to reflect the concept of silence and serenity of the noise cancelling headphones.','{"HEADPHONE TYPE": "Closed, dynamic", "DRIVER UNIT": "40mm, dome type (CCAW Voice coil)", "MAGNET": "Neodymium", "DIAPHRAGM": "Aluminum coated LCP", "FREQUENCY RESPONSE": "4Hz-40,000Hz", "FREQUENCY RESPONSE (ACTIVE OPERATION)": "4Hz-40,000Hz", "FREQUENCY RESPONSE(BLUETOOTH COMMUNICATION)": "20Hz - 20,000Hz (44.1kHz Sampling) / 20Hz - 40,000Hz (LDAC 96kHz Sampling, 990kbps)", "SENSITIVITIES (DB/MW)": "105dB / mW (1kHz) (when connecting via the headphone cable with the unit turned on) , 101dB / mW (1kHz) (when connecting via the headphone cable with the unit turned off)", "CORD TYPE": "Single-sided (detachable)", "CORD LENGTH": "Headphone cable (approx. 1.2m, OFC strands, gold-plated stereo mini plug)", "PLUG": "Gold-plated L-shaped stereo mini plug", "WEARING STYLE": "Circumaural", "NFC": "Yes", "DSEE EXTREME": "Yes", "PASSIVE OPERATION": "Yes"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (15,'MDR-1AM2 Headphones','Take music anywhere',5,3,429,0,1,0,0,0,0,17,'The precision sound and full-spectrum clarity of the MDR-1AM2 headphones captures the hearts of music lovers everywhere. And with a lightweight design and soft cushioned earpads, you can listen for hours in total comfort.','{"WEIGHT": "187g", "HEADPHONE TYPE": "Closed Dynamic", "DRIVER UNIT": "40mm (Dome Type)", "MAGNET": "Neodymium", "IMPEDANCE (OHM)": "16 Ohm", "DIAPHRAGM": "Aluminium-Coated LCP", "FREQUENCY RESPONSE": "3-100000Hz2", "SENSITIVITIES (DB/MW)": "98dB / mW", "CORD TYPE": "Detachable / Silver coated OFC", "CORD LENGTH": "1.2m", "PLUG": "Gold-plated L-shaped Stereo Mini", "WEARING STYLE": "Circumaural"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (16,'ARCTIS PRO WIRELESS - black','High fidelity audio comes to gaming for the first time',4,4,369.99,1,0,0,1,0,1,11,'Dual Wireless: 2.4G lossless + Bluetooth, Industry-leading hi-res capable speaker drivers, Lightweight aluminum alloy and steel construction, Swappable dual-battery system','{"Neodymium Drivers": "40mm", "Headphone Frequency Response": "10 - 40,000 Hz", "Headphone Sensitivity": "102 dB SPL", "Headphone Impedance": "32 Ohm", "Headphone Total Harmonic Distortion": "< 1%", "Microphone Type": "Retractable Boom", "Microphone Polar Pattern": "Bidirectional Noise-Canceling", "Microphone Frequency Response": "100 - 10,000 Hz", "Microphone Sensitivity": "-38 dBV/Pa", "Microphone Impedance": "2200 Ohm", "Microphone Noise Cancellation": "Yes", "Wireless 2.4G range": "40 ft, 12m", "Battery Life": "20 hours (10 per battery)", "Bluetooth Version": "4.1", "Bluetooth Profiles": "A2DP, HFP, HSP"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (17,'TUSQ','In-ear mobile gaming headset',4,4,39.9,1,0,0,1,0,0,9,'Tusq gaming earbuds are designed with clear audio, upgraded mic quality, and a comfortable adjustable design to bring the all perks of a gaming headset to mobile earphones.','{"Headphone Style": "In-ear (canalphone)", "Headphone Frequency Response": "20 - 20000Hz", "Headphone Sensitivity": "102 dBSPL @ 1 kHz, 1 mW", "Headphone Total Harmonic Distortion": "<1%", "Microphone Frequency Response": "100 - 10,000 Hz", "Microphone Pattern": "Omnidirectional", "Microphone Sensitivity": "-44 dBV/Pa", "Microphone Location": "Detachable", "Connector Type": "Single 3.5mm, 4-pole plug", "Cable Length": "1.20m / 4ft.", "Cable Material": "Rubber"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (18,'ARCTIS PRO - black','Peerless High Resolution PC Gaming Headset',4,4,199.99,1,0,0,1,0,0,11,'Industry-leading hi-res capable speaker drivers, Lightweight aluminum alloy and steel construction, DTS Headphone:X v2.0 surround sound, ClearCast, the best mic in gaming','{"Neodymium Drivers": "40mm", "Headphone Frequency Response": "10 - 40,000 Hz", "Headphone Sensitivity": "102 dB SPL", "Headphone Impedance": "32 Ohm", "Headphone Total Harmonic Distortion": "< 1%", "Microphone Type": "Retractable Boom", "Microphone Polar Pattern": "Bidirectional Noise-Canceling", "Microphone Frequency Response": "100 - 10,000 Hz", "Microphone Sensitivity": "-38 dBV/Pa", "Microphone Impedance": "2200 Ohm", "Microphone Noise Cancellation": "Yes", "Version Support": "3.12.0 +", "Platform Support": "Windows 7+, Mac OS X 10.9+ (DTS Headphone:X available on Windows 7+ only)"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (19,'ARCTIS 5','Design Exclusively for PC Gaming',5,4,99.99,0,1,0,1,0,1,11,'Specifically designed for the PC Gamer, Arctis 5 combines independent game and chat control, cutting-edge DTS surround sound, and dual zone RGB illumination to create the perfect audio solution for your battlestation.','{"Neodymium Drivers": "40mm", "Headphone Frequency Response": "20 - 2000Hz", "Headphone Sensitivity": "98db", "Headphone Impedance": "32Ohm", "Headphone Total Harmonic Distortion": "< 3%", "Headphone Volume Control": "On Ear Cup", "Microphone Frequency Response": "100Hz - 10000Hz", "Microphone Pattern": "Bidirectional", "Microphone Sensitivity": "-48db", "Microphone Impedance": "2200 Ohm", "Microphone Noise Cancellation": "Yes", "Microphone Location": "Retractable", "Microphone Mute Toggle": "On Ear Cup", "Connector Type": "USB or 4-Pole 3.5mm via included adapter", "Cable Length": "30m / 100ft", "Cable Material": "Rubber", "Adapter": "Single 3.5mm, 4-Pole Plug", "Share Jack": "Yes", "Detachable Cable": "Yes"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (20,'Bose Frames Soprano-black','Nothing in or on your ears',5,5,224,0,1,0,0,0,1,31,'The original Bose Frames debuted in 2019 and quickly became one of our most popular products. Now the sequel is here. Thoughtfully refined and strikingly elegant, Bose Frames Soprano flaunt polarized lenses and premium craftsmanship, while exclusive Bose Open Ear AudioÃ¢â€žÂ¢ technology produces sound youÃ¢â‚¬â„¢d never expect from sunglasses. ItÃ¢â‚¬â„¢s a jaw-dropping experience that leaves you free to engage with the world around you, all while discreetly listening to music. As Esquire noted in choosing Bose Frames for Best Smart Accessory in their 2020 Gadget Guide, "These things are about the coolest wearable tech out there."','{"Frames Soprano": "55 mm x 17 mm x 136 mm(Lens width x Distance between lenses x Temple length)", "Weight": "1.76 oz", "Carrying case dimensions": "6.85 in L x 2.48 in W x 2.28 in", "Frames": "TR-90 nylon with IPX2 water resistant rating", "Lenses": "Shatter- and scratch-resistant premium plastic", "Carrying case": "Protective plastic with soft fabric lining", "Battery life": "Up to 5.5 hours", "Battery charging time": "Up to 1 hour", "Battery charge method": "Custom 4-pin charging cable", "Bluetooth range": "30 ft (9 m)", "Bluetooth version": "5.1", "Input": "Pogo pin charging cable"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (21,'Bose Sport Open Earbuds','HEAR THE MUSIC.AND THE MOMENT.',6,5,199,0,1,1,0,0,1,14,'Bose Sport Open Earbuds are a truly different kind of sport headphone. That s because they are the first of their kind that donÃ¢â‚¬â„¢t go in your ears. Instead, they combine exclusive Bose OpenAudioÃ¢â€žÂ¢ technology with a unique open-ear design to produce high-quality sound without covering your ears. The city. The surf. Your running buddy. Hear it all and your music at the same time with these entirely new, entirely open sport earbuds.','{"Earbuds dimension": "2.2 inch H x 1.9 inch W x 0.75 inch D (0.49 oz each earbud)", "Carrying case dimension": "1.6 inch H x 4.4 inch W x 2.8 inch D (2.4 oz)", "Charging base dimension": "1.2 inch H x 3.8 inch W (1.7 oz)", "Earbuds material": "PC-ABS plastic composite", "Carry case material": "Plastic exterior, fabric inside, rubberized polyurethane", "Charging base material": "Plastic, rubber footing, metal charging pins", "Battery life": "Up to 8 hours", "Battery charging time": "2 hours", "Quick 30-minute charge": "Up to 3 hours", "Battery charge method": "Connect charging base to USB-A port on computer or standard wall charger (e.g. phone charger)", "Bluetooth range": "Up to 30 ft (9 m)", "Bluetooth version": "5.1 (A2DP, HFP, AVRCP, BLE)", "Codec": "SBC and AAC"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (22,'Bose Noise Cancelling Headphones 700 - black','PREMIUM QUIET. BOLD SOUND.',6,5,419,0,1,0,0,0,1,20,'World-class adjustable noise cancellation with situational awareness for when you want to let the world in. High-fidelity audio with adjustable EQ so you can tune music to your liking. Unrivaled voice pickup for the clearest calls. And protein leather cushions for all-day comfort. It s everything you demand from wireless Bluetooth headphones amplified. Bose Noise Cancelling Headphones 700, our most advanced headphones ever. And now they are bundled with the Headphones 700 Charging Case, making them an even smarter and more convenient choice.','{"Battery life": "Up to 20 hours", "Charging case battery life": "Up to 40 hours", "Battery charging time": "Up to 2.5 hours", "Case charging time": "Up to 3 hours", "Quick 15-minute charge": "For up to 3.5 hours", "Battery charge method": "USB-C", "Bluetooth range": "Up to 33 ft (10 m)", "Bluetooth version": "5.0 (including all headphone profiles)", "Codec": "Codec SBC and AAC", "Microphone": "8 total microphones, 6 microphones for Active Noise Cancelling (ANC), 4 microphones for Voice Pickup (2 are shared with ANC)"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (23,'Bose QuietComfort Earbuds','RULE THE QUIET',6,5,279,0,1,1,0,0,1,39,'Better sound begins with better silence. That s why we engineered QuietComfort Earbuds with the world s most effective noise cancelling and high-fidelity audio, plus StayHear Max tips for extra comfort. Because when you eliminate distractions, your music takes centerstage, and so does your passion. Roller skating, street art, woodworking and every other thing that makes you, you. It is an experience you won t find in any other wireless earbud. And now for a limited time, QuietComfort Earbuds are available in two new fashion-forward colors, Stone Blue or Sandstone, exclusive styles only from Bose. Just another way you will stand out from the crowd.','{"Earbuds": "Plastic/gold plating/polymer coating", "Eartips": "Silicone", "Case": "Hard plastic", "Battery life": "Up to 6 hours", "Earbud battery charge time": "2 hours", "Charging case battery charge time": "3 hours", "Quick-charge time": "15 minutes for 2 hours", "Battery charge method": "USB-C or Qi certified wireless charging pad", "Battery type (earbud)": "Lithium-ion (metal-enclosed coin cell)", "Battery type (case)": "Lithium-ion (pouch cell)", "Battery feature": "Automatic on/off feature to preserve battery life", "Bluetooth range": "Up to 30 ft (9.144 m)", "Bluetooth version": "5.1", "Codec": "SBC and AAC", "Microphone": "4 total microphones"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (24,'SoundSport wireless headphones','Engineered to push you forward, not hold you back',3,5,129,0,1,1,0,1,1,18,'Exercise is a demanding activity. And you demand wireless earbuds that are up to the challenge. SoundSport wireless headphones keep you moving with powerful audio and earbuds that stay secure and comfortable.','{"Headphones": "1.2 inch H x 1 inch W x 1.2 inch D (0.8 oz)", "Battery": "Rechargeable lithium-ion battery", "Charging time": "2 hours", "Battery life": "6 hours per full charge"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (25,'Bose QuietComfort 35 II Gaming Headset?','2-in-1 gaming and lifestyle headset with acclaimed lifelike sound',6,5,329,1,0,0,1,0,0,7,'Introducing the Bose QuietComfort 35 II Gaming Headset, engineered to play everything. With our award-winning noise cancelling technology and a detachable gaming module, this is the first 2-in-1 gaming and lifestyle headset from Bose. Designed for hours of competitive gaming and music listening, with a classic look and comfortable fit to wear at home, work, and everywhere in-between.','{"Battery life": "Up to 20 hours wireless, up to 40 hours gaming/wired", "Battery charging time": "2.25 hours", "Quick 15-minute charge": "Up to 2.5 hours wireless, up to 5 hours gaming/wired", "Battery charge method": "Micro USB B", "Microphone": "7 total microphones (1 removable in boom), 4 microphones for Active Noise Cancelling (ANC), 2 microphones for voice pickup, 1 microphone for gaming in the boom mic", "Bluetooth range": "Up to 33 ft (10 m)", "Bluetooth version": "4.2 (A2DP, HFP, AVRCP, BLE)", "Codec": "SBC and AAC"}');
INSERT INTO products(product_id,product_name,short_description,no_pictures,brand_id,price,wireless,wired,earbuds,gaming,sport,bluetooth,stock,description,specification) VALUES (26,'SoundComm B40 Headset','A professional communication headset',6,5,849,1,0,0,1,0,0,15,'Bose Sport Open Earbuds are a truly different kind of sport headphone. That s because they are the first of their kind that do not go in your ears. Instead, they combine exclusive Bose OpenAudio technology with a unique open-ear design to produce high-quality sound without covering your ears. The city. The surf. Your running buddy. Hear it all and your music at the same time with these entirely new, entirely open sport earbuds.','{"Microphone type": "150-ohm Dynamic Noise Cancelling", "Headset variants": "4-pin female XLR connector, 5-pin male XLR connector", "SoundComm B40 Headset": "8 inch H x 6.5 inch W x 3.5 inch D", "On-head weight (not including cable) Single earcup": "10 oz", "On-head weight (not including cable) Dual earcup": "12.7 oz", "Cable length - Headset to control module": "4.8 ft", "Cable length - Control module to XLR connector": "10 inch"}');


-- Table Name: status.sql
DROP TABLE IF EXISTS status;
CREATE TABLE IF NOT EXISTS status (
  status_id int(1) NOT NULL PRIMARY KEY,
  status_name varchar(20) NOT NULL
);

INSERT INTO status (status_id, status_name) VALUES
(1, 'paid'),
(2, 'confirmed'),
(3, 'shipped'),
(4, 'received');

-- Table Name: users.sql
DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(
   user_id    INT  NOT NULL PRIMARY KEY AUTO_INCREMENT
  ,email      VARCHAR(50) NOT NULL
  ,password   VARCHAR(50) NOT NULL
  ,first_name VARCHAR(50) NOT NULL
  ,last_name  VARCHAR(50) NOT NULL
  ,contact    VARCHAR(10) NOT NULL
);

INSERT INTO users (user_id, email, password, first_name, last_name, contact) VALUES (1, 'haoranwei@test.com', 'haoranwei@test.com', 'haoran', 'wei', '88888888');
INSERT INTO users (user_id, email, password, first_name, last_name, contact) VALUES (2, 'sining040@gmail.com', 'sining040@gmail.com', 'sining', 'lin', '88888888');


