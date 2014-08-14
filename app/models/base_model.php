<?php
class BaseModel extends ActiveRecord\Model {
  public function to_json(array $options=array()) {
    $root =  ActiveRecord\Utils::singularize(self::table_name());
    $json = json_encode(array($root => $this->to_array()));
    return $json;
  }
  public static function array_to_json(array $records=array()) {
    return $json = json_encode(
      array(self::table_name() =>
        array_map(function($record){
          return $record->to_array();
        }, $records))
    );
  }
}

