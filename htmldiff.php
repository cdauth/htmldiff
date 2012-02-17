<?php
	// The HTMLDiff module uses some MediWiki functions (which are defined in http://svn.wikimedia.org/viewvc/mediawiki/trunk/phase3/includes/GlobalFunctions.php?view=markup&pathrev=58267)
	// This file creates dummy functions so that the HTMLDiff module works without them

	if(!function_exists("wfProfileIn"))
	{
		function wfProfileIn($method)
		{
			// Debugging function, is called at the beginning of some methods
		}
	}

	if(!function_exists("wfProfileOut"))
	{
		function wfProfileOut($method)
		{
			// Debugging function, is called at the end of some methods
		}
	}
	
	if(!function_exists("wfDebug"))
	{
		function wfDebug($msg)
		{
			// Debugging function
		}
	}
	
	if(!function_exists("wfMsg"))
	{
		function wfMsg($key)
		{
			// Looks up a localised message in MediaWiki
			return $key;
		}
	}
	
	if(!function_exists("wfMsgExt"))
	{
		function wfMsgExt($key, $options)
		{
			// Looks up some localised message in MediaWiki
			// The message for the key "diff-movedoutof" is "moved out of $1", for "diff-pre" it is "a preformatted block", for example
			// This is used by the HTMLDiff module to describe the changes in words. As we don’t really use that, we just return
			// some example data here.
			$args = func_get_args();
			return "wfMsgExt(".implode(", ", $args).")";
			// TODO
		}
	}

	if(!function_exists("wfEmptyMsg"))
	{
		function wfEmptyMsg($msg, $wfMsgOut)
		{
			// $msg is $key for wfMsgExt, $wfMsgOut is wfMsgExt($key). Returns true when wfMsgExt could not find a message with that
			// key
			return true;
			// TODO
		}
	}
	
	if(!function_exists("wfUrlProtocols"))
	{
		function wfUrlProtocols()
		{
			return "http:\\/\\/|https:\\/\\/|ftp:\\/\\/|irc:\\/\\/|gopher:\\/\\/|telnet:\\/\\/|nntp:\\/\\/|worldwind:\\/\\/|mailto:|news:|svn:\\/\\/|git:\\/\\/|mms:\\/\\/";
		}
	}
	
	$dir = dirname(__FILE__);
	require_once($dir."/HTMLDiff.php");
	require_once($dir."/Nodes.php");
	require_once($dir."/Xml.php");
	require_once($dir."/Sanitizer.php");
	require_once($dir."/Diff.php");

	/**
	 * Return the difference between two HTML documents.
	 * @param String $a The first HTML document
	 * @param String $b The second HTML document
	 * @param Boolean $describe_formatting_changes If true, changes in the formatting (for example adding a certain HTML attribute
	 *                                             to a tag) are shown in text form.
	 * @return String An HTML document that represents the difference between the two HTML documents by assigning the class names
	 *                diff-html-added and diff-html-removed to the changed elements.
	*/

	function html_diff($a, $b, $describe_formatting_changes = false)
	{
		$out = new ChangeText();
		$htmldiffer = new HTMLDiffer(new DelegatingContentHandler($out));
		$htmldiffer->htmlDiff($a, $b, $describe_formatting_changes);
		return $out->toString();
	}
