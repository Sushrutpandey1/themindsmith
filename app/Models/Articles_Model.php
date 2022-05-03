<?php

namespace App\Models;

use CodeIgniter\Model;

class Articles_Model extends Model
{
  
  protected $table = 'add_articles';
  protected $primary = 'articles_id '; 
  protected $useAutoIncrement = true;
  protected $allowedFields = ['article_thumbnail_img', 'article_link', 'article_play_image','article_description'];
}



?>