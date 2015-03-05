<?php
/**
 * @author     Niels Nübel <niels@niels-nuebel.de>
 * @link       http://www.nn-medienagentur.de
 * @copyright  (c) 2014 - 2015 Niels Nübel- NN-Medienagentur
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

class plgContentNNZurbtwentytwenty extends JPlugin
{
	public function onContentPrepare($context, &$row, &$params, $page = 0)
	{
		if (JString::strpos($row->text, '{twentytwenty}') === false) {
			return true;
		}
		$doc = JFactory::getDocument();

		JHtml::_('jquery.framework');

		$doc->addStyleSheet('media/plg_content_nnzurbtwentytwenty/css/twentytwenty.css');

		$doc->addScript('media/plg_content_nnzurbtwentytwenty/js/jquery.event.move.js');

		$doc->addScript('media/plg_content_nnzurbtwentytwenty/js/jquery.twentytwenty.js');

		$doc->addScriptDeclaration('jQuery(window).load(function(){jQuery(".twentytwenty").twentytwenty();});');

		$row->text = str_replace(array("{twentytwenty}","{/twentytwenty}"), array('<div class="twentytwenty">','</div>'), $row->text);
	}
}
