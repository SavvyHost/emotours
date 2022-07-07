<?php

namespace Modules\Core\Walkers;
class MenuWalker
{
    protected static $currentMenuItem;
    protected $menu;
    protected $activeItems = [];

    public function __construct($menu)
    {
        $this->menu = $menu;
    }

    public static function setCurrentMenuItem($item)
    {
        static::$currentMenuItem = $item;
    }

    public static function getActiveMenu()
    {
        return static::$currentMenuItem;
    }

    public function generate()
    {
        $items = json_decode($this->menu->items, true);
        if (!empty($items)) {
            $this->generateTree($items);
        }
    }

    public function generateTree($items = [], $depth = 0, $parentKey = '')
    {

        foreach ($items as $k => $item) {

            $class = e($item['class'] ?? '');
            $url = $item['url'] ?? '';
            $item['target'] = $item['target'] ?? '';
            if (!isset($item['item_model']))
                continue;
            if (class_exists($item['item_model'])) {
                $itemClass = $item['item_model'];
                $itemObj = $itemClass::find($item['id']);
                if (empty($itemObj)) {
                    continue;
                }
                $url = $itemObj->getDetailUrl();
            }
            if ($this->checkCurrentMenu($item, $url)) {
                $class .= ' active';
                $this->activeItems[] = $parentKey;
            }

            if (!empty($item['children'])) {
                ob_start();
                $this->generateTree($item['children'], $depth + 1, $parentKey . '_' . $k);
                $html = ob_get_clean();
                if (in_array($parentKey . '_' . $k, $this->activeItems)) {
                    $class .= ' active ';
                }
            }
            $class .= ' depth-' . ($depth);
            printf('<li class="%s"> ', $class);

            if($depth == 0){
                $without_sub_menu = '<span><a  target="%s" href="%s" >%s</a></span>' ;
            }else{
                $without_sub_menu = '<a  target="%s" href="%s" >%s</a>';
            }

            printf($without_sub_menu, e($item['target']), e($url), clean($item['name']));

            if (!empty($item['children'])) {
                echo '<ul>';
                echo $html;
                echo "</ul>";
            }
            echo '</li>';
        }
    }

    protected function checkCurrentMenu($item, $url = '')
    {

        if (trim($url, '/') == request()->path()) {
            return true;
        }
        if (!static::$currentMenuItem)
            return false;
        if (empty($item['item_model']))
            return false;
        if (is_string(static::$currentMenuItem) and ($url == static::$currentMenuItem or $url == url(static::$currentMenuItem))) {
            return true;
        }
        if (is_object(static::$currentMenuItem) and get_class(static::$currentMenuItem) == $item['item_model'] && static::$currentMenuItem->id == $item['id']) {
            return true;
        }
        return false;
    }
}