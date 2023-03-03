<?php


// 변수 또는 배열의 이름과 값을 얻어냄. print_r() 함수의 변형
function print_r2($var)
{
    ob_start();
    print_r($var);
    $str = ob_get_contents();
    ob_end_clean();
    $str = str_replace(" ", "&nbsp;", $str);
    echo nl2br("<span style='font-family:Tahoma, 굴림; font-size:9pt;'>$str</span>");
}


$convMsg  = " 中国话, 中文, 漢語 2002년 영문:eng list / 숫자:2002-01 / ① / “사용자”/ ※ ";
$resultArr = array();
echo "\n\n\n";

// 1: 한글
$pattern = '/[\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}]+/u';
preg_match_all($pattern,$convMsg,$match);
$resultArr[1] = $match[0];

// 2: 영문
$pattern = '/[a-zA-Z]/';
preg_match_all($pattern,$convMsg,$match);
$resultArr[2] = $match[0];

// 4: 숫자
$pattern = '/[0-9]/';
preg_match_all($pattern,$convMsg,$match);
$resultArr[4] = $match[0];

// 8: 특수기호
$pattern = '/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9a-zA-Z]+/u';
preg_match_all($pattern,$convMsg,$match);
$resultArr[8] = $match[0];

// 3: 한글 + 영문
$pattern = '/[\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}a-zA-Z]+/u';
preg_match_all($pattern,$convMsg,$match);
$resultArr[3] = $match[0];

// 5: 한글 + 숫자
$pattern = '/[\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9]+/u';
preg_match_all($pattern,$convMsg,$match);
$resultArr[5] = $match[0];

 // 9: 한글 + 특수기호
 $pattern = '/[^0-9a-zA-Z]/';
 preg_match_all($pattern,$convMsg,$match);
 $resultArr[9] = $match[0];

// 6: 영문 + 숫자
$pattern = '/[0-9a-zA-Z]/';
preg_match_all($pattern,$convMsg,$match);
$resultArr[6] = $match[0];

// 10: 영문 + 특수기호
$pattern = '/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9]+/u';
preg_match_all($pattern,$convMsg,$match);
$resultArr[10] = $match[0];

// 12: 숫자 + 특수기호
$pattern = '/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}a-zA-Z]+/u';
preg_match_all($pattern,$convMsg,$match);
$resultArr[12] = $match[0];

// 7: 한글 + 영문 + 숫자
$pattern = '/[\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9a-zA-Z]+/u';
preg_match_all($pattern,$convMsg,$match);
$resultArr[7] = $match[0];

 // 11: 한글 + 영어 + 특수기호
 $pattern = '/[^0-9]/';
 preg_match_all($pattern,$convMsg,$match);
 $resultArr[11] = $match[0];

// 14: 영문 + 숫자 + 특수기호
$pattern = '/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}]+/u';
preg_match_all($pattern,$convMsg,$match);
$resultArr[14] = $match[0];

 // 13: 한글 + 숫자 + 특수기호
 $pattern = '/[^a-zA-Z]/';
 preg_match_all($pattern,$convMsg,$match);
 $resultArr[13] = $match[0];



// 15: 한글 + 영문 + 숫자 + 특수기호
$resultArr[15] = $convMsg;

# 한문 체크 방법.

$pattern ="/[\x{2E80}-\x{2EFF}\x{31C0}-\x{31EF}\x{3200}-\x{32FF}\x{3400}-\x{4DBF}\x{4E00}-\x{9FBF}\x{F900}-\x{FAFF}\x{20000}-\x{2A6DF}\x{2F800}-\x{2FA1F}]+/u";
preg_match_all($pattern,$convMsg,$match);
$resultArr[16] = $match[0];


print_r2($resultArr);
echo "\n\n\n";

/*
Array
(
  [1] => Array
      (
          [0] => 년
          [1] => 영문
          [2] => 숫자
          [3] => 사용자
      )

  [2] => Array
      (
          [0] => e
          [1] => n
          [2] => g
          [3] => l
          [4] => i
          [5] => s
          [6] => t
      )

  [4] => Array
      (
          [0] => 2
          [1] => 0
          [2] => 0
          [3] => 2
          [4] => 2
          [5] => 0
          [6] => 0
          [7] => 2
          [8] => 0
          [9] => 1
      )

  [8] => Array
      (
          [0] =>
          [1] => :
          [2] =>
          [3] =>  /
          [4] => :
          [5] => -
          [6] =>  / ① / “
          [7] => ”/ ※
      )

  [3] => Array
      (
          [0] => 년
          [1] => 영문
          [2] => eng
          [3] => list
          [4] => 숫자
          [5] => 사용자
      )

  [5] => Array
      (
          [0] => 2002년
          [1] => 영문
          [2] => 숫자
          [3] => 2002
          [4] => 01
          [5] => 사용자
      )

  [6] => Array
      (
          [0] => 2
          [1] => 0
          [2] => 0
          [3] => 2
          [4] => e
          [5] => n
          [6] => g
          [7] => l
          [8] => i
          [9] => s
          [10] => t
          [11] => 2
          [12] => 0
          [13] => 0
          [14] => 2
          [15] => 0
          [16] => 1
      )

  [10] => Array
      (
          [0] =>
          [1] => :eng list /
          [2] => :
          [3] => -
          [4] =>  / ① / “
          [5] => ”/ ※
      )

  [12] => Array
      (
          [0] => 2002
          [1] =>
          [2] => :
          [3] =>
          [4] =>  /
          [5] => :2002-01 / ① / “
          [6] => ”/ ※
      )

  [7] => Array
      (
          [0] => 2002년
          [1] => 영문
          [2] => eng
          [3] => list
          [4] => 숫자
          [5] => 2002
          [6] => 01
          [7] => 사용자
      )

  [14] => Array
      (
          [0] => 2002
          [1] =>
          [2] => :eng list /
          [3] => :2002-01 / ① / “
          [4] => ”/ ※
      )

  [15] => 2002년 영문:eng list / 숫자:2002-01 / ① / “사용자”/ ※
)
*/