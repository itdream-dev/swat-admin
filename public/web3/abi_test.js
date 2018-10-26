  contract_ABI=[{"constant":false,"inputs":[{"name":"_cardId","type":"uint256"}],"name":"purchaseCompanyCard","outputs":[],"payable":true,"stateMutability":"payable","type":"function"},
{"constant":false,"inputs":[{"name":"_cardId","type":"uint256"}],"name":"purchaseCarCard","outputs":[],"payable":true,"stateMutability":"payable","type":"function"},
{"constant":false,"inputs":[{"name":"name","type":"string"},{"name":"address1","type":"address"},{"name":"price","type":"uint256"},{"name":"companyId","type":"uint256"},
{"name":"is_released","type":"bool"}],"name":"addMake","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},
{"constant":true,"inputs":[],"name":"getCarCount","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},
{"constant":false,"inputs":[{"name":"name","type":"string"},{"name":"address1","type":"address"},{"name":"price","type":"uint256"},
{"name":"is_released","type":"bool"}],"name":"addCompany","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},
{"constant":false,"inputs":[],"name":"InitiateWhaleCard","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},
{"constant":false,"inputs":[],"name":"pauseGame","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},
{"constant":false,"inputs":[],"name":"InitiateCars","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},
{"constant":false,"inputs":[{"name":"_cardId","type":"uint256"}],"name":"purchaseMakeCard","outputs":[],"payable":true,"stateMutability":"payable","type":"function"},
{"constant":true,"inputs":[{"name":"_companyId","type":"uint256"}],"name":"getCompany","outputs":[{"name":"name","type":"string"},{"name":"ownerAddress1","type":"address"},
{"name":"curPrice","type":"uint256"},{"name":"is_released","type":"bool"},{"name":"adv_text","type":"string"},{"name":"adv_link","type":"string"},{"name":"adv_price","type":"uint256"},
{"name":"adv_owner","type":"address"},{"name":"id","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},
{"constant":true,"inputs":[{"name":"_carId","type":"uint256"}],"name":"getCar","outputs":[{"name":"name","type":"string"},
{"name":"ownerAddresses","type":"address[4]"},{"name":"curPrice","type":"uint256"},{"name":"companyId","type":"uint256"},{"name":"makeId","type":"uint256"},
{"name":"is_released","type":"bool"},{"name":"adv_text","type":"string"},{"name":"adv_link","type":"string"},{"name":"adv_price","type":"uint256"},
{"name":"adv_owner","type":"address"},{"name":"id","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},
{"constant":false,"inputs":[],"name":"InitiateCompanies","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},
{"constant":true,"inputs":[],"name":"getWhaleCard","outputs":[{"name":"ownerAddress1","type":"address"},
{"name":"curPrice","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},
{"constant":false,"inputs":[{"name":"_cardId","type":"uint256"},{"name":"_text","type":"string"},{"name":"_link","type":"string"}],
"name":"purchaseCarAdv","outputs":[],"payable":true,"stateMutability":"payable","type":"function"},{"constant":true,"inputs":[{"name":"_makeId","type":"uint256"}],
"name":"getMake","outputs":[{"name":"name","type":"string"},{"name":"ownerAddress1","type":"address"},{"name":"curPrice","type":"uint256"},{"name":"companyId","type":"uint256"},
{"name":"is_released","type":"bool"},{"name":"adv_text","type":"string"},{"name":"adv_link","type":"string"},{"name":"adv_price","type":"uint256"},{"name":"adv_owner","type":"address"},
{"name":"id","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":false,"inputs":[{"name":"_makeId","type":"uint256"},
{"name":"is_released","type":"bool"}],"name":"setReleaseMake","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},
{"constant":false,"inputs":[{"name":"_cardId","type":"uint256"},{"name":"_text","type":"string"},{"name":"_link","type":"string"}],
"name":"purchaseMakeAdv","outputs":[],"payable":true,"stateMutability":"payable","type":"function"},
{"constant":true,"inputs":[],"name":"GetIsPauded","outputs":[{"name":"","type":"bool"}],"payable":false,"stateMutability":"view","type":"function"},
{"constant":false,"inputs":[{"name":"_carId","type":"uint256"},{"name":"is_released","type":"bool"}],
"name":"setReleaseCar","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},
{"constant":false,"inputs":[],"name":"playGame","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},
{"constant":false,"inputs":[{"name":"_companyId","type":"uint256"},{"name":"is_released","type":"bool"}],
"name":"setReleaseCompany","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},
{"constant":false,"inputs":[{"name":"_cardId","type":"uint256"},{"name":"_text","type":"string"},
{"name":"_link","type":"string"}],"name":"purchaseCompanyAdv","outputs":[],"payable":true,"stateMutability":"payable","type":"function"},
{"constant":true,"inputs":[],"name":"getMakeCount","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},
{"constant":false,"inputs":[{"name":"name","type":"string"},{"name":"address1","type":"address"},{"name":"price","type":"uint256"},{"name":"companyId","type":"uint256"},
{"name":"makeId","type":"uint256"},{"name":"is_released","type":"bool"}],"name":"addCar","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},
{"constant":true,"inputs":[],"name":"getCompanyCount","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},
{"constant":false,"inputs":[],"name":"InitiateMakes","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},
{"constant":false,"inputs":[],"name":"purchaseWhaleCard","outputs":[],"payable":true,"stateMutability":"payable","type":"function"}];
