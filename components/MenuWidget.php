<?php

/**
 * Created by PhpStorm.
 * User: SimplyWorld
 * Date: 24.03.2017
 * Time: 15:27
 */

namespace app\components;
use yii\base\Widget;
use app\models\Type;
use Yii;

class MenuWidget extends Widget
{
    public $tpl;
    public $model;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'Menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        // get cache
        if ($this->tpl == 'menu.php')
        {
            $menu = Yii::$app->cache->get('menu');
            if($menu) return $menu;
        }


        $this->data = Type::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        // set cache
        if ($this->tpl == 'menu.php')
        {
            Yii::$app->cache->set('menu', $this->menuHtml, 60);
        }

        return $this->menuHtml;
    }

    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if(!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = '')
    {
        $str = '';
        foreach ($tree as $type) {
            $str .= $this->catToTamplate($type, $tab);
        }
        return $str;
    }

    protected function catToTamplate($type, $tab)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}