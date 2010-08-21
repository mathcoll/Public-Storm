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

SyntaxHighlighter.brushes.JScript = function()
{
	var keywords = 'break case catch continue default delete do else false for function if in instanceof '
	             + 'new null return super switch this throw true try typeof var while with';
					
	this.regexList = [
		{ regex: SyntaxHighlighter.regexLib.singleLineCComments,  css: 'js-comment'      },  // one line comments
		{ regex: SyntaxHighlighter.regexLib.multiLineCComments,   css: 'js-comment'      },  // multiline comments
		{ regex: SyntaxHighlighter.regexLib.doubleQuotedString,   css: 'js-string'       },  // double quoted strings
		{ regex: SyntaxHighlighter.regexLib.singleQuotedString,   css: 'js-string'       },  // single quoted strings
		{ regex: /\s*#.*/gm,                                      css: 'js-preprocessor' },  // preprocessor tags like #region and #endregion
		{ regex: new RegExp(this.getKeywords(keywords), 'gm'),    css: 'js-keyword'      },  // keywords
		{ regex: /[0-9A-Za-z$]+(?=\()/g,                          css: 'js-function'     },
		{ regex: /\b\d+(\.\d+)?\b/g,                              css: 'js-numval'       }
	];
	
	this.forHtmlScript(SyntaxHighlighter.regexLib.scriptScriptTags);
};

SyntaxHighlighter.brushes.JScript.prototype	= new SyntaxHighlighter.Highlighter();
SyntaxHighlighter.brushes.JScript.aliases	= ['js', 'jscript', 'javascript'];

