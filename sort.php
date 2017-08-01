<?php
/**
 *  PHP 常用排序算法整理
 *           
 *  Bubble_sort ( _1 & _2 ) 冒泡排序算法      
 *  Selection_sort          选择排序          
 *  Insert_sort             插入排序          
 *  Quick_sort              快速排序          
 *
 */
$arr = array(6, 6, 3, 1, 8, 7, 2, 4);
$len = count($arr);

/**
 *  冒泡排序 方法1
 */

function Bubble_sort_1($arr , $len){

    for($k = 1 ; $k < $len ; $k++){
        for($j = 0; $j < $len - $k ; $j++){
            if($arr[$j] > $arr[$j+1]){
                $tem  = $arr[$j+1];
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $tem;
            }
        }
    }
    return $arr;
}
$sort = Bubble_sort_1($arr , $len);
// 打印函数
echo "<pre>";
print_r($sort);
echo "</pre>";

/**
 *  冒泡排序 方法2
 */

function Bubble_sort_2($arr , $len){
    for($k = 0 ; $k <= $len; $k++){
        for($j = $len - 1 ; $j > $k ; $j--){
            if($arr[$j] < $arr[$j-1]){
                $tem  = $arr[$j-1];
                $arr[$j-1] = $arr[$j];
                $arr[$j] = $tem;
            }
        }
    }
    return $arr;
}
$sort = Bubble_sort_2($arr , $len);
// 打印函数
echo "<pre>";
print_r($sort);
echo "</pre>";

/**
 *  选择排序
 */

function Selection_sort($arr , $len){
    $tem = 0;
    for ($i=0; $i < $len ; $i++) { 
        $min = $arr[$i];
        $min_key = $i;
        for($k = $i + 1 ; $k < $len ; $k++){
            if($arr[$k] < $min){
                $min  =  $arr[$k];
                $min_key = $k;
            }
        }
        $tem = $arr[$i];
        $arr[$i] = $min;
        $arr[$min_key] = $tem;

    }
    return $arr;
    
}

$sort = Selection_sort($arr , $len);

// 打印函数
echo "<pre>";
print_r($sort);
echo "</pre>";

/**
 *  插入排序
 */

function Insert_sort($arr , $len){
    for($i = 1 ; $i < $len ; $i++){
        $tem = $arr[$i];
        for($j = $i - 1 ; $j >= 0 ; $j--){
            if($arr[$j] > $tem ){
                $arr[$j+1] = $arr[$j];
                $arr[$j] = $tem;
            }
        }
    }
    return $arr;
}

$sort = Insert_sort($arr , $len);
// 打印函数
echo "<pre>";
print_r($sort);
echo "</pre>";

/**
 *  快速排序
 */

function Quick_sort($arr){
    if(!isset($arr[1])){
        return $arr;
    }

    $mid = $arr[0];
    $leftArr = array();
    $rightArr = array();
    $midArr = array();

    for ($i = 0; $i < count($arr); $i++) { 
        if($arr[$i] < $mid){
            $leftArr[] = $arr[$i];
        }
        if($arr[$i] > $mid){
            $rightArr[] = $arr[$i];
        }
        if($arr[$i] == $mid){
            $midArr[] = $mid;
        }
    }

    $leftArr = Quick_sort($leftArr);
    $leftArr = array_merge($leftArr , $midArr);

    $rightArr = Quick_sort($rightArr);
    unset($midArr , $mid , $i);
    return array_merge($leftArr , $rightArr);
}

echo "<pre>";
$sort = Quick_sort($arr);
print_r($sort);
echo "</pre>";

?>