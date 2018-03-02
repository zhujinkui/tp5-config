<?php
// 获取配置类库     
// +----------------------------------------------------------------------
// | PHP version 5.4+                
// +----------------------------------------------------------------------
// | Copyright (c) 2012-2014 http://www.17php.cn, All rights reserved.
// +----------------------------------------------------------------------
// | Author: zhujinkui <developer@zhujinkui.com>
// +----------------------------------------------------------------------

namespace think;

class Config {
    /**
     * [lists 获取数据库中的配置列表]
     * @return array
     */
    public static function lists(){
        $map    = [
            'status' => 1
        ];

        $data   = db('Config')->where($map)->field('type,name,value')->select();

        $config = [];

        if($data && is_array($data)){
            foreach ($data as $value) {
                $config[$value['name']] = self::parse($value['type'], $value['value']);
            }
        }

        return $config;
    }

    /**
     * [parse 根据配置类型解析配置]
     * @param  integer $type  [配置类型]
     * @param  string $value  [配置值]
     * @return string        
     */
    private static function parse($type, $value){
        switch ($type) {
            case 3: 
            //解析数组
            $array = preg_split('/[,;\r\n]+/', trim($value, ",;\r\n"));

            if(strpos($value,':')){
                $value  = [];
                foreach ($array as $val) {
                    list($k, $v) = explode(':', $val);
                    $value[$k]   = $v;
                }
            }else{
                $value = $array;
            }
            break;
        }
        return $value;
    }
}