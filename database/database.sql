

create table `category` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(100),
    `url` varchar(255),
    `url_main` varchar(255)
);

create table `newpaper` (
    `id` int PRIMARY KEY AUTO_INCREMENT,
    `title` varchar(100),
    `link` varchar(255),
    `thumb` varchar(255),
    `excrept` varchar(255),
    `id_cate` int REFERENCES `subcategory` (`id`)
);

