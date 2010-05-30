#!/bin/sh

LANGUAGE=fr_FR.utf8
name=Public-Storm
Translator="Mathieu Lory <mathcoll@internetcollaboratif.info>"




rm -f ../cache/*.php 

for file in ../themes/ps/templates/plugins/*; do
  	if [ -d $file ]; then
		plugin=`expr match "$file" '../themes/ps/templates/plugins/\(.*\)'`
		mkdir -p "../i18n/${LANGUAGE}/LC_MESSAGES/"
		mkdir -p "../i18n/sources/plugins/${plugin}/"
		rm -f "../i18n/sources/plugins/${plugin}/${plugin}.gettext.php"
		php tsmarty2c.php $file > "../i18n/sources/plugins/${plugin}/${plugin}.gettext.php"
		echo "Plugin '${plugin}'\t: ok"
	fi
done
mkdir -p "../i18n/sources/plugins/all/"
php tsmarty2c.php ../themes/ps/templates/*.tpl > "../i18n/sources/main.gettext.php"
rm -f ../cache/*.php


# régénérer le fichier po
#echo "msgid \"\"
#msgstr \"\"
#\"Project-Id-Version: ${name}\\\n\"
#\"Report-Msgid-Bugs-To: \\\n\"
#\"POT-Creation-Date: 2010-05-21 23:28+0100\\\n\"
#\"PO-Revision-Date: 2010-05-21 23:29+0100\\\n\"
#\"Last-Translator: ${Translator}\\\n\"
#\"Language-Team: ${Translator}\\\n\"
#\"MIME-Version: 1.0\\\n\"
#\"Content-Type: text/plain; charset=UTF-8\\\n\"
#\"Content-Transfer-Encoding: 8bit\\\n\"
#\"X-Poedit-Language: French\\\n\"
#\"X-Poedit-Country: FRANCE\\\n\"
#\"X-Poedit-SourceCharset: utf-8\\\n\"
#\"X-Poedit-KeywordsList: L;_;gettext\\\n\"
#\"X-Poedit-Basepath: \\\n\"
#\"X-Poedit-SearchPath-0: ../../..\\\n\"" > "./i18n/${LANGUAGE}/LC_MESSAGES/all.po"
