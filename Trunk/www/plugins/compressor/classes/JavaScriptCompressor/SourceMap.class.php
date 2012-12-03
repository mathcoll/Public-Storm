<?php
/**
 * SourceMap class,
 *	reads a generic language source code and returns its map.
 * ______________________________________________________________
 * The SourceMap goals is to create a map of a generic script/program language.
 * The getMap method returns an array/list of arrays/dictionary/objects
 * of source map using delimeters variable to map correctly:
 *  - multi line comments
 *  - single line comments
 *  - double quoted strings
 *  - single quoted strings
 *  - pure code
 *  - everything else (for example regexp [/re/] with javascript), just adding a correct delimeter
 * --------------------------------------------------------------
 * What about the delimeter
 * 	It's an array/list of arrays/dictionary/obects with some properties to find what you're looking for.
 * 
 * parameters are:
 *  - name, the name of the delimeter (i.e. "doublequote")
 *  - start, one or mode chars to find as start delimeter (i.e. " for double quoted string)
 *  - end, one or mode chars to find as end delimeter (i.e. " for double quoted string) [end should be an array/list too]
 * 
 * optional parameters are:
 *  - noslash, if true find the end of the delimeter only if last char is not slashed (i.e. "string\"test" find " after test)
 *  - match, if choosed language has regexp, verify if string from start to end matches used regexp (i.e. /^\/[^\n\r]+\/$/ for JavaScript regexp)
 * 
 * If end parameter is an array, match and noslash are not supported (i.e. ["\n", "\r"] for end delimeter of a single line comment)
 * --------------------------------------------------------------
 * What about SourceMap usage
 * 	It should be a good solution to create sintax highlighter, parser,
 * 	verifier or some other source code parsing procedure
 * --------------------------------------------------------------
 * What about SourceMap performance script/languages
 * 	I've created different version of this class to test each script/program language performance too.
 * Python with or without Psyco is actually the faster parser.
 * However with this PHP version this class has mapped "dojo.js.uncompressed.js" file (about 211Kb) in less than 0.5 second.
 * Test has been done with embed class and PHP as module, any accelerator was used for this PHP test.
 * --------------------------------------------------------------
 * @Compatibility	>= PHP 4
 * @Author		Andrea Giammarchi
 * @Site		http://www.devpro.it/
 * @Date		2006/08/01
 * @LastMOd		2006/08/01
 * @Version		0.1
 * @Application		Last version of JavaScriptCompressor class use this one to map source code.
 */
class SourceMap {
	
	/**
	 * public method
         * 	getMap(&$source:string, &$delimeters:array):array
	 * Maps the source code using $delimeters rules and returns map as an array
         * NOTE: read comments to know more about map and delimeter
         *
         * @param	string		generic source code
         * @param	array		array with nested array with code rules
	 */
	function getMap(&$source, &$delimeters) {
		
		# "unsigned" integer variables
		$sourcePosition = 0;
		$delimetersPosition = 0;
		$findLength = 0;
		$len = 0;
		$tempIndex = 0;
		$sourceLength = strlen($source);
		$delimetersLength = count($delimeters);
		
		# integer variables
		$tempPosition = -1;
		$endPosition = -1;
		
		# array variables
		$map = array();
		$tempMap = array();
		$tempDelimeter = array();
		
		while($sourcePosition < $sourceLength) {
			$endPosition = -1;
			for($delimetersPosition = 0; $delimetersPosition < $delimetersLength; $delimetersPosition++) {
				$tempPosition = strpos($source, $delimeters[$delimetersPosition]['start'], $sourcePosition);
				if($tempPosition !== false && ($tempPosition < $endPosition || $endPosition === -1)) {
					$endPosition = $tempPosition;
					$tempIndex = $delimetersPosition;
				}
			}
			if($endPosition !== -1) {
				$sourcePosition = $endPosition;
				$tempDelimeter = &$delimeters[$tempIndex];
				$findLength = strlen($tempDelimeter['start']);
				if(is_array($tempDelimeter['end'])) {
					$delimetersPosition = 0;
					$endPosition = -1;
					for($len = count($tempDelimeter['end']); $delimetersPosition < $len; $delimetersPosition++) {
						$tempPosition = strpos($source, $tempDelimeter['end'][$delimetersPosition], $sourcePosition + $findLength);
						if($tempPosition !== false && ($tempPosition < $endPosition || $endPosition === -1)) {
							$endPosition = $tempPosition;
							$tempIndex = $delimetersPosition;
						}	
					}
					if($endPosition !== -1)
						$endPosition = $endPosition + strlen($tempDelimeter['end'][$tempIndex]);
					else
						$endPosition = $sourceLength;
					array_push($map, array('name'=>$tempDelimeter['name'], 'start'=>$sourcePosition, 'end'=>$endPosition));
					$sourcePosition = $endPosition - 1;
				}
				elseif(isset($tempDelimeter['match'])) {
					$tempPosition = strpos($source, $tempDelimeter['end'], $sourcePosition + $findLength);
					$len = strlen($tempDelimeter['end']);
					if($tempPosition !== false && preg_match($tempDelimeter['match'], substr($source, $sourcePosition, $tempPosition - $sourcePosition + $len))) {
						$endPosition = isset($tempDelimeter['noslash']) ? $this->__endCharNoSlash($source, $sourcePosition, $tempDelimeter['end'], $sourceLength) : $tempPosition + $len;
						array_push($map, array('name'=>$tempDelimeter['name'], 'start'=>$sourcePosition, 'end'=>$endPosition));
						$sourcePosition = $endPosition - 1;
					}
				}
				else {
					if(isset($tempDelimeter['noslash']))
						$endPosition = $this->__endCharNoSlash($source, $sourcePosition, $tempDelimeter['end'], $sourceLength);
					else {
						$tempPosition = strpos($source, $tempDelimeter['end'], $sourcePosition + $findLength);
						if($tempPosition !== false)
							$endPosition = $tempPosition + strlen($tempDelimeter['end']);
						else
							$endPosition = $sourceLength;
					}
					array_push($map, array('name'=>$tempDelimeter['name'], 'start'=>$sourcePosition, 'end'=>$endPosition));
					$sourcePosition = $endPosition - 1;
				}
			}
			else
				$sourcePosition = $sourceLength - 1;
			++$sourcePosition;
		}
		$len = count($map);
		if($len === 0)
			array_push($tempMap, array('name'=>'code', 'start'=>0, 'end'=>$sourceLength));
		else {
			for($tempIndex = 0; $tempIndex < $len; $tempIndex++) {
				if($tempIndex === 0 && $map[$tempIndex]['start'] > 0)
					array_push($tempMap, array('name'=>'code', 'start'=>0, 'end'=>$map[$tempIndex]['start']));
				elseif($tempIndex > 0 && $map[$tempIndex]['start'] > $map[$tempIndex-1]['end'])
					array_push($tempMap, array('name'=>'code', 'start'=>$map[$tempIndex-1]['end'], 'end'=>$map[$tempIndex]['start']));
				array_push($tempMap, array('name'=>$map[$tempIndex]['name'], 'start'=>$map[$tempIndex]['start'], 'end'=>$map[$tempIndex]['end']));
				if($tempIndex + 1 === $len && $map[$tempIndex]['end'] < $sourceLength)
					array_push($tempMap, array('name'=>'code', 'start'=>$map[$tempIndex]['end'], 'end'=>$sourceLength));
			}
		}
		return $tempMap;
	}
	
	function __endCharNoSlash(&$source, $position, &$find, &$len) {
		$temp = strlen($find);
		do {
			$position = strpos($source, $find, $position + 1);
		}while($position !== false && !$this->__charNoSlash($source, $position));
		if($position === false) $position = $len - $temp;
		return $position + $temp;
	}
	
	function __charNoSlash(&$source, &$position) {
		$next = 1; $len = $position - $next;
		while($len > 0 && $source{$len} === '\\') $len = $position - (++$next);
		return (($next - 1) % 2 === 0);
	}
}
?>