/**
 * SyntaxHighlighter
 * http://alexgorbatchev.com/
 *
 * SyntaxHighlighter is donationware. If you are using it, please donate.
 * http://alexgorbatchev.com/wiki/SyntaxHighlighter:Donate
 *
 * @version
 * 2.1.364 (October 15 2009)
 * 
 * @copyright
 * Copyright (C) 2004-2009 Alex Gorbatchev.
 *
 * @license
 * This file is part of SyntaxHighlighter.
 * 
 * SyntaxHighlighter is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * SyntaxHighlighter is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with SyntaxHighlighter.  If not, see <http://www.gnu.org/copyleft/lesser.html>.
 */
SyntaxHighlighter.brushes.Xml = function ()
{
	function process(match, regexInfo)
	{
		var constructor, code, result = [], regex, attributes, matches;

		constructor = SyntaxHighlighter.Match;
		code = match[0];

		if (match.attributes != null) {
			regex = new XRegExp('(?<name> [\\w:\\-\\.]+)\\s*=\\s*(?<value> ".*?"|\'.*?\'|\\w+)', 'xg');
			while ((attributes = regex.exec(code)) != null) {
				result.push(new constructor(attributes.name, match.index + attributes.index, 'xml-attname'));
				result.push(new constructor(attributes.value, match.index + attributes.index + attributes[0].indexOf(attributes.value), 'xml-attvalue'));
			}
		}

		if (match.tag != null) {
			regex = new XRegExp('(?<tag>((&lt;|<)\\w+(&gt;|>)?|(&lt;|<)/\\w+(&gt;|>)|/?(&gt;|>)))', 'xg');
			while ((matches = regex.exec(code)) != null) {
				result.push(new constructor(matches.tag, match.index + matches.index, 'xml-tag'));
			}
		}

		if (new XRegExp('=', 'xg').exec(code) != null) {
			result.push(new constructor('=', match.index, 'xml-equals'));
		}

		return result;
	}

	this.regexList = [
		{ regex: new XRegExp('(&lt;|<)!--.+?--(&gt;|>)', 'gm'),                                           css: 'xml-comment' },  // <!-- ... -->
		{ regex: new XRegExp('(&lt;|<)[\\s\\/\\?]*(\\w+)(?<attributes>.*?)[\\s\\/\\?]*(&gt;|>)', 'sg'),  func: process       },
		{ regex: new XRegExp('(?<tag>((&lt;|<)\\w+(&gt;|>)?|(&lt;|<)/\\w+(&gt;|>)|/?(&gt;|>)))', 'sg'),  func: process       },
		{ regex: new XRegExp('=(?=["\'])', 'sg'),                                                        func: process       }
	];
};

SyntaxHighlighter.brushes.Xml.prototype = new SyntaxHighlighter.Highlighter();
SyntaxHighlighter.brushes.Xml.aliases = ['xml', 'xhtml', 'xslt', 'html', 'xhtml'];
