{\rtf1\ansi\ansicpg1252\deff0\nouicompat\deflang1033{\fonttbl{\f0\fnil\fcharset0 Calibri;}}
{\colortbl ;\red0\green0\blue255;}
{\*\generator Riched20 6.3.9600}\viewkind4\uc1 
\pard\sa200\sl276\slmult1\qc\ul\b\f0\fs28\lang9 Php and MongoDB \par

\pard\li720\sa200\sl276\slmult1\par

\pard\li720\sa200\sl276\slmult1\qc\ulnone\fs22 Sample using php an mongodb with FusionCharts.\ul\fs24\par

\pard\sa200\sl276\slmult1 Getting Started\ulnone\b0  :\fs22\par

\pard\li720\sa200\sl276\slmult1 These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. \par

\pard\sa200\sl276\slmult1\ul\b\fs24 Prerequisites\ulnone\b0\fs22\par

\pard\li720\sa200\sl276\slmult1 1. Mongodb\par
2.  php driver for mongoDB.\par
3. Git shell \par
4. Composer\par
5.xampp\par

\pard\sa200\sl276\slmult1\ul\b\fs24 Steps :\ulnone\b0\fs22\par

\pard\li720\sa200\sl276\slmult1 1. Lets download the php driver for MongoDB from following links:\par
{{\field{\*\fldinst{HYPERLINK https://pecl.php.net/package/mongodb }}{\fldrslt{https://pecl.php.net/package/mongodb\ul0\cf0}}}}\f0\fs22\par
2.Download and extract the package on your system and php_mongodb.dll and put it in PHP/ext folder of XAMPP.\par
3. open your php.ini file and add the below line of code in it:\par
extension=php_mongodb.dll\par
4. Create your project folder and press shift+right click to open command window and run the following code : \par
composer require "mongodb/mongodb=^1.0.0"\par
5. Now run the command "mongod" \par
6. Again run the command "mongo" using git shell to use the database.\par
7.  Now run your php code using xampp. \par
eg. {{\field{\*\fldinst{HYPERLINK http://localhost/phpMongodb/mongoDB_php_fc.php }}{\fldrslt{http://localhost/phpMongodb/mongoDB_php_fc.php\ul0\cf0}}}}\f0\fs22\par
\ul\b\fs24 Versioning\ulnone  :\b0\fs22\par
I have used the current version.\par
php - 5.6\par

\pard\sa200\sl276\slmult1\ul\b\fs24 Authors\ulnone  :\ul\fs22\par

\pard\li720\sa200\sl276\slmult1\ulnone Prerana Singh\b0\par
}
 