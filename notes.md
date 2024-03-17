## Notes

To what extent should I use the skeleton code from github.com/paquettm/eComH24S1 ? Is all of it necessary, relevant?

Namespaces and slashes are frustrating. See the relevant [PHP manual section](https://www.php.net/manual/en/language.namespaces.php).


MySQL/database stuff is a rabbit hole, even for this simple program.

Amongst many other things, beware differences between MYSQL 8.0 and MariaDB 10.4, see [this section](https://mariadb.com/kb/en/incompatibilities-and-feature-differences-between-mariadb-10-4-and-mysql-8-/) of the MariaDB docs.

<br>

Character sets and encoding:
- Restrict usernames to A-Z + a-z + 0-9 + dashes and underscores, max length 10
- Restrict passwords to A-Z + a-z + 0-9 + dashes and underscores, max length 20
- Restrict posts and comments to unicode, UTF-8?