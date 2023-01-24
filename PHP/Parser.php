<?php
function css_struct_to_array($string): array
{
  $string = preg_replace('/\s+/', ' ', $string);
  $string = preg_replace('/\s*:\s*/', ':', $string);
  $string = preg_replace('/\s*;\s*/', ';', $string);
  $string = preg_replace('/\s*{\s*/', '{', $string);
  $string = preg_replace('/\s*}\s*/', '}', $string);
  $explode = explode('}', $string);
  array_pop($explode);

  $output = [];
  foreach ($explode as $key)
  {
    $selector = explode('{', $key);
    $propertyes = [];
    $propertyes_explode = explode(';', $selector[1]);

    array_pop($propertyes_explode);

    foreach ($propertyes_explode as $key)
    {
      $property = explode(':', $key);

      $propertyes[$property[0]] = $property[1];
    }
    $output[$selector[0]] = $propertyes;
  }
  return $output;
}