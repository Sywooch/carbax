<?
$xml = simplexml_load_file('http://www.gazeta.ru/export/rss/auto.xml');
foreach ($xml->channel->item as $it){
   $html = \serhatozles\simplehtmldom\SimpleHTMLDom::file_get_html($it->link);// ($it->link);
   $element=$html->find('.main_pick img');
   echo $element[0]->src . '<br>';
   echo "<div>".$it->link."\n"."</div>";
   echo "<div>".$it->title."\n"."</div>";
   echo "<div>".$it->description."\n"."</div>";
   echo "<div>".$it->pubDate."\n"."</div>";
}
?>