const carData = {
    "Toyota": ["Camry", "Corolla", "Prius", "Highlander", "RAV4", "Yaris", "Avalon", "C-HR", "Supra", "Tacoma"],
    "Ford": ["F-150", "Mustang", "Explorer", "Escape", "Fusion", "Edge", "Expedition", "Ranger", "Bronco", "Taurus"],
    "Honda": ["Civic", "Accord", "CR-V", "Pilot", "Fit", "Odyssey", "Ridgeline", "HR-V", "Insight", "Passport"],
    "Chevrolet": ["Silverado", "Equinox", "Malibu", "Tahoe", "Traverse", "Colorado", "Blazer", "Impala", "Trax", "Camaro"],
    "BMW": ["3 Series", "5 Series", "7 Series", "X3", "X5", "X7", "Z4", "M3", "M5", "i3"],
    "Mercedes-Benz": ["C-Class", "E-Class", "S-Class", "GLA", "GLC", "GLE", "GLS", "A-Class", "B-Class", "CLA"],
    "Audi": ["A3", "A4", "A6", "A8", "Q3", "Q5", "Q7", "Q8", "TT", "R8"],
    "Volkswagen": ["Golf", "Jetta", "Passat", "Tiguan", "Atlas", "Beetle", "Arteon", "Touareg", "ID.4", "Polo"],
    "Nissan": ["Altima", "Sentra", "Maxima", "Rogue", "Murano", "Pathfinder", "Versa", "Armada", "370Z", "GT-R"],
    "Hyundai": ["Elantra", "Sonata", "Santa Fe", "Tucson", "Palisade", "Kona", "Veloster", "Ioniq", "Genesis G70", "Genesis G80"],
    "Kia": ["Optima", "Sorento", "Sportage", "Telluride", "Soul", "Stinger", "Forte", "Seltos", "Niro", "Rio"],
    "Subaru": ["Impreza", "Legacy", "Outback", "Forester", "Crosstrek", "Ascent", "WRX", "BRZ", "Tribeca", "Baja"],
    "Mazda": ["Mazda3", "Mazda6", "CX-3", "CX-5", "CX-9", "MX-5 Miata", "CX-30", "Mazda2", "Mazda5", "RX-8"],
    "Tesla": ["Model S", "Model 3", "Model X", "Model Y", "Roadster", "Cybertruck"],
    "Volvo": ["S60", "S90", "XC40", "XC60", "XC90", "V60", "V90", "C40 Recharge", "V60 Cross Country", "S60 Cross Country"],
    "Jaguar": ["XE", "XF", "XJ", "F-Pace", "E-Pace", "I-Pace", "F-Type"],
    "Land Rover": ["Range Rover", "Range Rover Sport", "Range Rover Evoque", "Discovery", "Discovery Sport", "Defender"],
    "Porsche": ["911", "Cayenne", "Panamera", "Macan", "Taycan", "718 Boxster", "718 Cayman"],
    "Ferrari": ["488 GTB", "Portofino", "Roma", "F8 Tributo", "812 Superfast", "GTC4Lusso", "SF90 Stradale"],
    "Lamborghini": ["Huracan", "Aventador", "Urus", "Gallardo", "Murcielago", "Countach"],
    "Maserati": ["Ghibli", "Quattroporte", "Levante", "GranTurismo", "GranCabrio"],
    "Bentley": ["Bentayga", "Continental GT", "Flying Spur", "Mulsanne"],
    "Rolls-Royce": ["Phantom", "Ghost", "Wraith", "Dawn", "Cullinan"],
    "Aston Martin": ["DB11", "Vantage", "DBS Superleggera", "Rapide AMR", "Valkyrie"],
    "McLaren": ["570S", "720S", "650S", "P1", "600LT", "GT", "Senna"],
    "Alfa Romeo": ["Giulia", "Stelvio", "4C", "GTV", "Spider", "MiTo"],
    "Acura": ["ILX", "TLX", "RLX", "RDX", "MDX", "NSX"],
    "Infiniti": ["Q50", "Q60", "Q70", "QX50", "QX60", "QX80"],
    "Lexus": ["IS", "ES", "GS", "LS", "NX", "RX", "GX", "LX", "LC", "RC"],
    "Mitsubishi": ["Outlander", "Eclipse Cross", "Mirage", "Pajero", "Lancer", "ASX"]
};
const phoneData = {
    "Apple": ["iPhone 13", "iPhone 13 Pro", "iPhone 13 Pro Max", "iPhone 13 mini", "iPhone 12", "iPhone 12 Pro", "iPhone 12 Pro Max", "iPhone 12 mini", "iPhone SE", "iPhone 11", "iPhone 11 Pro", "iPhone 11 Pro Max", "iPhone XR", "iPhone XS", "iPhone XS Max", "iPhone X", "iPhone 8", "iPhone 8 Plus", "iPhone 7", "iPhone 7 Plus"],
    "Samsung": ["Galaxy S21", "Galaxy S21+", "Galaxy S21 Ultra", "Galaxy S20", "Galaxy S20+", "Galaxy S20 Ultra", "Galaxy Note 20", "Galaxy Note 20 Ultra", "Galaxy Z Fold 3", "Galaxy Z Flip 3", "Galaxy A series", "Galaxy M series"],
    "Google": ["Pixel 6", "Pixel 6 Pro", "Pixel 5a", "Pixel 5", "Pixel 4a", "Pixel 4", "Pixel 4 XL", "Pixel 3a", "Pixel 3", "Pixel 3 XL", "Pixel 2", "Pixel 2 XL"],
    "OnePlus": ["OnePlus 9", "OnePlus 9 Pro", "OnePlus 8T", "OnePlus 8 Pro", "OnePlus 8", "OnePlus Nord", "OnePlus 7T", "OnePlus 7T Pro", "OnePlus 7 Pro", "OnePlus 7", "OnePlus 6T", "OnePlus 6"],
    "Xiaomi": ["Mi 11", "Mi 11 Pro", "Mi 11 Ultra", "Mi 11 Lite", "Mi 10", "Mi 10 Pro", "Mi 10 Lite", "Redmi Note 11", "Redmi Note 10", "Redmi Note 10 Pro", "Redmi Note 10T", "Redmi 10", "Redmi 10 Prime"],
    "Huawei": ["Mate 40", "Mate 40 Pro", "Mate 40 Pro+", "Mate 30", "Mate 30 Pro", "P40", "P40 Pro", "P40 Pro+", "P30", "P30 Pro", "Nova series", "Honor series"],
    "Sony": ["Xperia 1 III", "Xperia 5 III", "Xperia 10 III", "Xperia 1 II", "Xperia 5 II", "Xperia 10 II", "Xperia 1", "Xperia 5", "Xperia 10", "Xperia L series"],
    "Motorola": ["Moto G Power", "Moto G Stylus", "Moto G Play", "Moto G Fast", "Moto E series", "Moto G series", "Moto Edge series", "Motorola Edge+", "Motorola Razr"],
    "LG": ["LG Velvet", "LG Wing", "LG V60 ThinQ", "LG G8 ThinQ", "LG V50 ThinQ", "LG G7 ThinQ", "LG Stylo series", "LG K series"],
    "Nokia": ["Nokia X20", "Nokia X10", "Nokia 8.3", "Nokia 5.4", "Nokia 3.4", "Nokia 2.4", "Nokia 9 PureView", "Nokia 8.1", "Nokia 7.2", "Nokia 6.2", "Nokia 5.3", "Nokia 4.2"],

};

const shoeData = {
    "Nike": ["Air Force 1", "Air Max 90", "Air Jordan 1", "Blazer", "Dunk", "Air Max 97", "React", "Air Max 270", "VaporMax", "Air Presto"],
    "Adidas": ["Superstar", "Stan Smith", "Yeezy Boost 350", "Ultra Boost", "NMD", "Continental 80", "Gazelle", "Samba", "Nite Jogger", "ZX series"],
    "Jordan": ["Air Jordan 1", "Air Jordan 4", "Air Jordan 11", "Air Jordan 6", "Air Jordan 3", "Air Jordan 5", "Air Jordan 12", "Air Jordan 13", "Air Jordan 7", "Air Jordan 8"],
    "Converse": ["Chuck Taylor All Star", "Jack Purcell", "One Star", "Chuck 70", "Run Star Hike", "ERX series", "CONS series"],
    "Vans": ["Authentic", "Old Skool", "Sk8-Hi", "Era", "Slip-On", "Classic Slip-On", "ComfyCush", "Checkerboard", "Style 36"],
    "Puma": ["Suede", "Clyde", "RS-X", "Future Rider", "Cell", "Thunder Spectra", "Basket", "Turin", "Ralph Sampson"],
    "Reebok": ["Classic Leather", "Club C", "Instapump Fury", "Aztrek", "DMX series", "Question Mid", "Nano", "Kamikaze", "Workout Plus"],
    "New Balance": ["574", "990", "997", "327", "990v5", "530", "990v4", "992", "574S", "1500"],
    "Under Armour": ["UA Curry", "UA HOVR", "UA Charged Bandit", "UA Spawn", "UA SC 3ZER0", "UA Project Rock", "UA Surge"],
    "Salomon": ["Speedcross", "XA Pro 3D", "S/Lab XT-6", "Sense Ride", "XA Elevate", "Speedcross 5", "Supercross", "XT-Quest", "Sense Ride 4", "S/Lab Sense Ultra"],
    "Brooks": ["Ghost", "Adrenaline GTS", "Launch", "Ricochet", "Glycerin", "Levitate", "Cascadia", "Bedlam", "Neuro", "Transcend"],
    "ASICS": ["GEL-Kayano", "GEL-Nimbus", "GEL-Lyte III", "GEL-Lyte V", "GEL-Quantum", "GT-2000", "GT-1000", "GEL-Venture", "MetaRide", "DS Trainer"],
    "Mizuno": ["Wave Rider", "Wave Inspire", "Wave Sky", "Wave Prophecy", "Wave Creation", "Wave Shadow", "Waveknit", "Wave Sonic", "Wave Daichi", "Wave Horizon"],
    "Hoka One One": ["Bondi", "Clifton", "Speedgoat", "Arahi", "Challenger", "Torrent", "Rincon", "Mach", "Elevon", "Gaviota"],
    "Merrell": ["Moab", "Jungle Moc", "Chameleon", "Trail Glove", "All Out Blaze", "MQM Flex", "Siren", "Terradora", "Haven", "Ontario"],
    "Timberland": ["6-Inch Boot", "Chukka", "Euro Hiker", "Field Boot", "Boondock", "Sawyer Lane", "Radford", "Davis Square", "CityForce"],
    "Dr. Martens": ["1460", "1461", "1490", "2976", "Pascal", "Jadon", "Church", "Vegan", "8053", "Crazy Horse"],
    "Saucony": ["Jazz", "Kinvara", "Ride", "Hurricane", "Guide", "Endorphin", "Triumph", "Freedom", "Shadow", "Grid"],
    "Clarks": ["Desert Boot", "Wallabee", "Weaver", "TriActive Knit", "TriActive Run", "Batcombe Hall", "Forge Vibe", "Un Lisbon Lane", "Paulson Plain", "Clarkdale Base"],
};

const laptopData = {
    "Apple": ["MacBook Air", "MacBook Pro 13", "MacBook Pro 14", "MacBook Pro 16"],
    "Dell": ["XPS 13", "XPS 15", "Inspiron", "Latitude", "Precision", "Vostro", "Alienware"],
    "Lenovo": ["ThinkPad X1 Carbon", "ThinkPad X1 Yoga", "ThinkPad T series", "ThinkPad X series", "IdeaPad", "Yoga", "Legion"],
    "HP": ["HP Spectre x360", "HP Envy", "HP EliteBook", "HP Pavilion", "HP Omen", "HP ProBook"],
    "Asus": ["Asus ZenBook", "Asus ROG Strix", "Asus VivoBook", "Asus TUF Gaming", "Asus Chromebook"],
    "Acer": ["Acer Swift", "Acer Aspire", "Acer Predator", "Acer Chromebook", "Acer Nitro"],
    "Microsoft": ["Surface Laptop", "Surface Book", "Surface Pro", "Surface Go"],
    "MSI": ["MSI GS66 Stealth", "MSI GE76 Raider", "MSI Prestige", "MSI Modern", "MSI Creator"],
    "Razer": ["Razer Blade 15", "Razer Blade Stealth", "Razer Blade Pro"],
    "Huawei": ["Huawei MateBook X Pro", "Huawei MateBook D", "Huawei MateBook X"],
    "Samsung": ["Samsung Galaxy Book", "Samsung Notebook", "Samsung Chromebook"],
};


function populateSelect(data, selectElement, modelSelectElement) {
    for (const make in data) {
        const option = document.createElement('option');
        option.value = make;
        option.textContent = make;
        selectElement.appendChild(option);
    }

    selectElement.addEventListener('change', function () {
        const selectedMake = selectElement.value;
        // Clear existing options in model dropdown
        modelSelectElement.innerHTML = '<option value="" selected disabled>Select option</option>';

        if (selectedMake) {
            const models = data[selectedMake];
            models.forEach(model => {
                const option = document.createElement('option');
                option.value = model;
                option.textContent = model;
                modelSelectElement.appendChild(option);
            });
        }
    });
}

// For car select
const carSelect = document.querySelector('.car-select-manufacturer');
const carModelSelect = document.querySelector('.car-select-model');
populateSelect(carData, carSelect, carModelSelect);

// For phone select
const phoneSelect = document.querySelector('.phone-select-brand');
const phoneSeriesSelect = document.querySelector('.phone-select-series');
populateSelect(phoneData, phoneSelect, phoneSeriesSelect);

// For shoe select
const shoeSelect = document.querySelector('.shoe-select-brand');
const shoeSelectModel = document.querySelector('.shoe-select-model');
populateSelect(shoeData, shoeSelect, shoeSelectModel);

// For laptop select
const laptopSelect = document.querySelector('.laptop-select-brand');
const laptopSelectModel = document.querySelector('.laptop-select-model');
populateSelect(laptopData, laptopSelect, laptopSelectModel);