<?php
/**
 * Created by PhpStorm.
 * User: liuhe
 * Date: 2018/1/1
 * Time: 20:04
 *适配器模式
 */
class Art
{
  protected $content;

  public function __construct($content)
  {
      $this->content = $content;
  }

  public function decorator(){
      return $this->content;
  }
}

class DecArt extends Art
{
    protected $act = null;

    public function __construct($act)
    {
        $this->act = $act;
    }
    public function decorator()
    {
    }
}

class SeoArt extends DecArt
{
    public function decorator()
    {
        return $this->act->decorator().'seo keywords';
    }
}
class WeArt extends DecArt
{
    public function decorator()
    {
        return $this->act->decoratort().'这是广告';
    }
}

$act = new Art('这是一篇文章');
$act = new SeoArt($act);

echo $act->decorator();