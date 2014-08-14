<?php
class Article extends BaseModel {

  public function __toString() { return 'article: '. $this->title; }
}