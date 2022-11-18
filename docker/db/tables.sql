use mytheresa;

CREATE TABLE `Categories` (  
    categoryID int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    categoryName VARCHAR(300),
    created_at timestamp NULL DEFAULT NULL,
    updated_at timestamp NULL DEFAULT NULL
);

ALTER TABLE `Categories` ADD INDEX categoryNameIndex (categoryName);

CREATE TABLE `Products` (
   productID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
   sku  BIGINT UNSIGNED NOT NULL DEFAULT 0,
   productName VARCHAR(500) NOT NULL,
   categoryID  INT NOT NULL,
   price  BIGINT(10) DEFAULT 0,
   created_at timestamp NULL DEFAULT NULL,
   updated_at timestamp NULL DEFAULT NULL,
   FOREIGN KEY (categoryID) REFERENCES Categories (categoryID)
);
ALTER TABLE `Products` ADD INDEX productNameIndex (productName);

-- Categories
INSERT INTO `mytheresa`.`Categories` (`categoryName`, `created_at`, `updated_at`) VALUES ('boots', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Categories` (`categoryName`, `created_at`, `updated_at`) VALUES ('sandals', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Categories` (`categoryName`, `created_at`, `updated_at`) VALUES ('sneakers', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Categories` (`categoryName`, `created_at`, `updated_at`) VALUES ('loafers', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Categories` (`categoryName`, `created_at`, `updated_at`) VALUES ('espadrilles', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Categories` (`categoryName`, `created_at`, `updated_at`) VALUES ('slippers', '2022-11-17 09:00:00', '2022-11-17 09:00:00');

-- Products
INSERT INTO `mytheresa`.`Products` (`sku`, `productName`, `categoryID`, `price`, `created_at`, `updated_at`) VALUES ('000001', 'BV Lean leather ankle boots', '1', '89000', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Products` (`sku`, `productName`, `categoryID`, `price`, `created_at`, `updated_at`) VALUES ('000002', 'BV Lean leather ankle boots 2', '1', '99000', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Products` (`sku`, `productName`, `categoryID`, `price`, `created_at`, `updated_at`) VALUES ('000003', 'Ashlington leather ankle boots', '1', '71000', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Products` (`sku`, `productName`, `categoryID`, `price`, `created_at`, `updated_at`) VALUES ('000004', 'Naima embellished suede sandals', '2', '89000', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Products` (`sku`, `productName`, `categoryID`, `price`, `created_at`, `updated_at`) VALUES ('000005', 'BV Lean leather ankle boots', '3', '59000', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Products` (`sku`, `productName`, `categoryID`, `price`, `created_at`, `updated_at`) VALUES ('000006', 'Horsebit jacquard loafer', '4', '58500', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Products` (`sku`, `productName`, `categoryID`, `price`, `created_at`, `updated_at`) VALUES ('000007', 'Mirrored G fringed leather loafers', '4', '66500', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Products` (`sku`, `productName`, `categoryID`, `price`, `created_at`, `updated_at`) VALUES ('000008', 'Veluso suede espadrilles', '5', '15900', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Products` (`sku`, `productName`, `categoryID`, `price`, `created_at`, `updated_at`) VALUES ('000009', 'Embroidered logo canvas espadrilles', '5', '25500', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
INSERT INTO `mytheresa`.`Products` (`sku`, `productName`, `categoryID`, `price`, `created_at`, `updated_at`) VALUES ('000010', 'Horsebit slippers', '6', '45500', '2022-11-17 09:00:00', '2022-11-17 09:00:00');
