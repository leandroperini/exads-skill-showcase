USE `exads`;
INSERT INTO `tv_series` (`id`, `title`, `channel`, `gender`) VALUES
(1, 'Friends', 'Sony', 'Comedy'),
(2, 'Stranger Things', 'Netflix', 'Thriller'),
(3, 'Game Of Thrones', 'HBO', 'Drama');

INSERT INTO `tv_series_intervals` (`id`, `id_tv_series`, `week_day`, `show_time`) VALUES
(1, 1, 2, '17'),
(2, 2, 3, '04'),
(3, 1, 5, '17'),
(4, 3, 3, '22'),
(5, 3, 4, '02'),
(6, 2, 1, '22'),
(7, 2, 2, '15');
