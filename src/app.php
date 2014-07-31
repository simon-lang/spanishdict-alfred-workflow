<?php

$json = $wf->request( "http://suggest1.spanishdict.com/dictionary/translate_auto_suggest/".urlencode( $orig ) );
$response = json_decode($json);

$count = 1;
foreach ($response->results->Spanish->sugs as $value) {
  $data = $value->sug;
  $wf->result( $count.'.'.time(), "$data", "$data", 'Search SpanishDict for '.$data, 'icon.png'  );
  $count++;
}

$results = $wf->results();
if ( count( $results ) == 0 ) {
  $wf->result( 'default_search', $orig, 'No Suggestions', 'No search suggestions found. Search SpanishDict for '.$orig, 'icon.png' );
}
  
echo $wf->toxml();
