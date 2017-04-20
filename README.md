# LandEdit
## Land.yml file editor for EconomyLand
### This program can 
* 1: Delete all land claims owned by a player. 
* 2: Delete all land claims except for a player. 
* 3: Detele all land claims in a geographical area (coming soonish).

### You must have the PECL YAML extension installed.
* http://php.net/manual/en/yaml.installation.php
* Step 1: Type ```brew install php55-yaml``` or whatever version of php you have (is available for 5.5,5.6,7.0,7.1)
* Step 2: Add ```extension=yaml.so``` to your php.ini file. See http://stackoverflow.com/questions/25049696/how-to-install-yaml-1-1-1-into-php/27011976#27011976
* The PECL YAML Extension should now be installed and LandEdit.php can properly parse your Land.yml file.

### Make a backup of your Land.yml file before using this program. 

### How to use:
* Step 1: Download LandEdit.php and move to the location of your Land.yml file.
* Step 2: Open Terminal and navigate to the folder LandEdit.php is located in.
(i.e. type ```cd /Users/keithdavis/Documents/GitHub/LandEdit``` in Terminal)
* Step 3: Type ```php LandEdit.php``` in Terminal
* Step 4: Follow prompts and enjoy weapon of mass land claim destruction. 
