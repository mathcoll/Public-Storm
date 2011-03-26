#!/bin/sh

#LANGUAGE=fr_FR.utf8
name=Public-Storm
Translator="Mathieu Lory <mathcoll@internetcollaboratif.info>"
output="../i18n/all.pot"

version="1.0"
# TODO :
#find ../ -name "_global_settings.php" -exec grep "SITE_VERSION" {} \;






rm -f ../cache/*.php 

for file in ../themes/ps/templates/plugins/*; do
  	if [ -d $file ]; then
		plugin=`expr match "$file" '../themes/ps/templates/plugins/\(.*\)'`
		#mkdir -p "../i18n/${LANGUAGE}/LC_MESSAGES/"
		mkdir -p "../i18n/sources/plugins/${plugin}/"
		rm -f "../i18n/sources/plugins/${plugin}/${plugin}.gettext.php"
		php tsmarty2c.php $file > "../i18n/sources/plugins/${plugin}/${plugin}.gettext.php"
		echo "Plugin '${plugin}'\t: ok"
	fi
done
mkdir -p "../i18n/sources/plugins/all/"
php tsmarty2c.php ../themes/ps/templates/*.tpl > "../i18n/sources/main.gettext.php"
rm -f ../cache/*.php

#--keyword=L;_;gettext
touch ${output}
find ../ -iname "*.php" -exec xgettext -nFj --debug --from-code=utf-8 --output=${output} --copyright-holder="${Translator}" --package-name="${name}" --package-version="${version}" {} \;

