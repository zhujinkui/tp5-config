# tp5-config
> 获取数据库中的配置列表类库

## 案例展示
> 基于ThinkPHP5开发呈现权限管理的效果  
![Image text](http://images.22058.com/github/tp5-config/config_1.jpg)  

## 安装
> composer require zhujinkui/tp5-config

### 数据库建立
> 建立数据库(例如：system),进入system，复制以下Sql语句执行即可，建议使用MySQL版本5.7，当下数据表默认引擎InnoDB，自5.7版本以后默认默认引擎InnoDB

```
-- 主机: localhost
-- 生成日期: 2018 年 03 月 02 日 14:52
-- 服务器版本: 5.5.53
-- PHP 版本: 7.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `system`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_config`
--

CREATE TABLE IF NOT EXISTS `think_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL COMMENT '配置名称',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置类型',
  `title` varchar(50) NOT NULL COMMENT '配置说明',
  `group` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '配置分组',
  `extra` varchar(255) NOT NULL COMMENT '配置值',
  `remark` varchar(100) NOT NULL COMMENT '配置说明',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `value` text NOT NULL COMMENT '配置值',
  `default` varchar(255) NOT NULL COMMENT '默认值',
  `placeholder` varchar(255) NOT NULL COMMENT '参数提示',
  `sort` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `type` (`type`),
  KEY `group` (`group`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

```

## 代码举例使用
> 建立Base控制器作为所有模块基类
```
<?php
namespace app\common\controller;
use think\Controller;
use think\ConfigApi;

class Base extends Controller
{
    public function _initialize()
	  {
        //获取数据列表
        $config = ConfigApi::lists();

        Config::set($config);
    }
 }
 
```
