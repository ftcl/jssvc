<?php
    $query = 0;
    $userID = "146309116";
    $userPassword = "cqY19960828";

	$query = $_POST['query'];
	$userID = $_POST['userID'];
	$userPassword = $_POST['userPassword'];
	$newPassword = $_POST['newPassword'];
    $cookie_file = tempnam('./temp','cookie');
    $login_url = 'http://jw.jssvc.edu.cn/default2.aspx';
    $post_fields = '__VIEWSTATE=dDwyOTIzOTAzMDY7Oz4nRmjVrBpq+aayEXzelo2PlBkgSQ==&__VIEWSTATEGENERATOR=92719903&TextBox1=$userID&TextBox2=$userPassword&RadioButtonList1=学生&Button1=';
    
    $post = array(
                  '__VIEWSTATE' => 'dDwtMTM0NTkyMTI1NDs7PvS/S47nhWvfVL/PAI7PBO4g9+W5',
                  '__VIEWSTATEGENERATOR' => '9D5B7189',
                  'TextBox1' => $userID,
                  'TextBox2' => $userPassword,
                  'RadioButtonList1' => '学生',
                  'Button1' => ''
                  );

    $ch = curl_init($login_url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
    $contents = curl_exec($ch);
    curl_close($ch);
    
//    $curl = curl_init();//初始化curl模块
//    curl_setopt($curl, CURLOPT_URL, $login_url);//登录提交的地址
//    curl_setopt($curl, CURLOPT_HEADER, 1);//是否显示头信息
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//是否自动显示返回的信息
//    curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie_file); //设置Cookie信息保存在指定的文件中
//    curl_setopt($curl, CURLOPT_POST, 1);//post方式提交
//    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));//要提交的信息
//    $contents = curl_exec($curl);//执行cURL
//    echo $contents;
//    curl_close($curl);//关闭cURL资源，并且释放系统资源
    
//
//    //全校性公选课
//    $url='http://jw.jssvc.edu.cn/xf_xsqxxxk.aspx?xh=126306124';
//    //网上报名
//    $url='http://jw.jssvc.edu.cn/bmxmb.aspx?xh=126306124';
//    //个人信息
//    $url='http://jw.jssvc.edu.cn/xsgrxx.aspx?xh=126306124';
//    //密码修改
//    $url='http://jw.jssvc.edu.cn/mmxg.aspx?xh=126306124';
//    //专业推荐课表查询
//    $url='http://jw.jssvc.edu.cn/tjkbcx.aspx?xh=126306124';
//    //教师个人课表查询
//    $url='http://jw.jssvc.edu.cn/jstjkbcx.aspx?xh=126306124';
//    //学生个人课表
 //   $url='http://jw.jssvc.edu.cn/xskbcx.aspx?xh=126306124';
//    //学生考试查询
 //   $url='http://jw.jssvc.edu.cn/xskscx.aspx?xh=126306124';
//    //成绩查询
//    $url='http://jw.jssvc.edu.cn/xskbcx.aspx?xh=126306125';
//    //等级考试查询
//    $url='http://jw.jssvc.edu.cn/xsdjkscx.aspx?xh=126306124';
//    //培养计划
//    $url='http://jw.jssvc.edu.cn/pyjh.aspx?xh=126306124';
//    //班级实验课情况
//    $url='http://jw.jssvc.edu.cn/xskbcx.aspx?xh=126306124';
//    //课程介绍查询
//    $url='http://jw.jssvc.edu.cn/tjkbcx.aspx?xh=126306124';
//    //自学重修查询
//    $url='http://jw.jssvc.edu.cn/xszxcxcx.aspx?xh=126306124';
//    //学生选课情况查询
//    $url='http://jw.jssvc.edu.cn/xsxkqk.aspx?xh=126306124';
//    //学生选课费查询
//    $url='http://jw.jssvc.edu.cn/xsxkfcx_gc.aspx?xh=126306124';
//    //教学质量评价
//    $url='http://jw.jssvc.edu.cn/xsjxpj.aspx?xh=126306124';
//    //查看公告
//    $url='http://jw.jssvc.edu.cn/lw_ckgg.aspx?xh=126306124';
//    //头像
 //   $url='http://jw.jssvc.edu.cn/readimagexs.aspx?xh=126306124';
    

	//课表查询
	if ($query == 0) {
		$url2="http://jw.jssvc.edu.cn/xskbcx.aspx?xh=".$userID;
		$ch1 = curl_init($url2);
        curl_setopt($ch1, CURLOPT_HEADER, 0);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1, CURLOPT_REFERER, $url2);
        curl_setopt($ch1, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION,1);
        $contents = curl_exec($ch1);
        curl_close($ch1);

        $input = $contents;
        $start = '__VIEWSTATE" value="dD';
        $end = '<input type="hidden" name="__VIEWSTATEGENERATOR"';
        $viewstatestr = substr($input, strlen($start)+strpos($input, $start) - 2,(strlen($input) - strpos($input, $end))*(-1));
        $input1 = $viewstatestr;
        $start1 = '';
        $end1 = '" />';
        $viewstate = substr($input1, strlen($start1)+strpos($input1,0),(strlen($input1) - strpos($input1, $end1))*(-1));
        $contentslength = strpos($contents,'__VIEWSTATEGENERATOR" value="');
        $strlength = strlen('__VIEWSTATEGENERATOR" value="');
        $viewstategenerator = substr($contents,($contentslength + $strlength),8);

        $post1 = array(
            '__EVENTTARGET' => 'xnd',
            '__EVENTARGUMENT' => '',
            '__VIEWSTATE' => $viewstate,
            '__VIEWSTATEGENERATOR' => $viewstategenerator,
            'xnd' => '2014-2015',
            'xqd' => '2'
        );

        $url3="http://jw.jssvc.edu.cn/xskbcx.aspx?xh=".$userID;
        $ch2 = curl_init($url3);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_REFERER, $url3);
        curl_setopt($ch2, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($post1));
        $contents = curl_exec($ch2);
        curl_close($ch2);
        echo $contents;
	}
	//成绩查询
	if ($query == 1) {
		$url2="http://jw.jssvc.edu.cn/xscj_gc.aspx?xh=".$userID;
		$ch1 = curl_init($url2);
        curl_setopt($ch1, CURLOPT_HEADER, 0);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1, CURLOPT_REFERER, $url2);
        curl_setopt($ch1, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION,1);
        $contents = curl_exec($ch1);
        curl_close($ch1);

        $input = $contents;
        $start = '__VIEWSTATE" value="dD';
        $end = '<input type="hidden" name="__VIEWSTATEGENERATOR"';
        $viewstatestr = substr($input, strlen($start)+strpos($input, $start) - 2,(strlen($input) - strpos($input, $end))*(-1));
        $input1 = $viewstatestr;
        $start1 = '';
        $end1 = '" />';
        $viewstate = substr($input1, strlen($start1)+strpos($input1,0),(strlen($input1) - strpos($input1, $end1))*(-1));
        $contentslength = strpos($contents,'__VIEWSTATEGENERATOR" value="');
        $strlength = strlen('__VIEWSTATEGENERATOR" value="');
        $viewstategenerator = substr($contents,($contentslength + $strlength),8);

        $post1 = array(
            '__VIEWSTATE' => $viewstate,
            '__VIEWSTATEGENERATOR' => $viewstategenerator,
            'ddlXN' => '',
            'ddlXQ' => '',
            'Button1' => '按学期查询'
        );

        $url3="http://jw.jssvc.edu.cn/xscj_gc.aspx?xh=".$userID;
        $ch2 = curl_init($url3);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_REFERER, $url3);
        curl_setopt($ch2, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($post1));
        $contents = curl_exec($ch2);
        curl_close($ch2);
        echo $contents;
	}
	//密码修改
	if ($query == 2) {
		$url2="http://jw.jssvc.edu.cn/mmxg.aspx?xh=".$userID;
		$ch1 = curl_init($url2);
        curl_setopt($ch1, CURLOPT_HEADER, 0);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1, CURLOPT_REFERER, $url2);
        curl_setopt($ch1, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION,1);
        $contents = curl_exec($ch1);
        curl_close($ch1);

        $input = $contents;
        $start = '__VIEWSTATE" value="dD';
        $end = '<input type="hidden" name="__VIEWSTATEGENERATOR"';
        $viewstatestr = substr($input, strlen($start)+strpos($input, $start) - 2,(strlen($input) - strpos($input, $end))*(-1));
        $input1 = $viewstatestr;
        $start1 = '';
        $end1 = '" />';
        $viewstate = substr($input1, strlen($start1)+strpos($input1,0),(strlen($input1) - strpos($input1, $end1))*(-1));
        $contentslength = strpos($contents,'__VIEWSTATEGENERATOR" value="');
        $strlength = strlen('__VIEWSTATEGENERATOR" value="');
        $viewstategenerator = substr($contents,($contentslength + $strlength),8);

        $post1 = array(
            '__VIEWSTATE' => $viewstate,
            '__VIEWSTATEGENERATOR' => $viewstategenerator,
            'TextBox2' => $userPassword,
            'TextBox3' => $newPassword,
            'TextBox4' => $newPassword,
            'Button1' => '修改'
        );

        $url3="http://jw.jssvc.edu.cn/mmxg.aspx?xh=".$userID;
        $ch2 = curl_init($url3);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_REFERER, $url3);
        curl_setopt($ch2, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($post1));
        $contents = curl_exec($ch2);
        curl_close($ch2);
        echo $contents;
	}
    //个人信息
    if ($query == 3) {
        $url2="http://jw.jssvc.edu.cn/xsgrxx.aspx?xh=".$userID;
        $ch1 = curl_init($url2);
        curl_setopt($ch1, CURLOPT_HEADER, 0);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch1, CURLOPT_REFERER, $url2);
        curl_setopt($ch1, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION,1);
        $contents = curl_exec($ch1);
        curl_close($ch1);

        $input = $contents;
        $start = '__VIEWSTATE" value="dD';
        $end = '<input type="hidden" name="__VIEWSTATEGENERATOR"';
        $viewstatestr = substr($input, strlen($start)+strpos($input, $start) - 2,(strlen($input) - strpos($input, $end))*(-1));
        $input1 = $viewstatestr;
        $start1 = '';
        $end1 = '" />';
        $viewstate = substr($input1, strlen($start1)+strpos($input1,0),(strlen($input1) - strpos($input1, $end1))*(-1));
        $contentslength = strpos($contents,'__VIEWSTATEGENERATOR" value="');
        $strlength = strlen('__VIEWSTATEGENERATOR" value="');
        $viewstategenerator = substr($contents,($contentslength + $strlength),8);

        $post1 = array(
            '__EVENTTARGET' => 'xnd',
            '__EVENTARGUMENT' => '',
            '__VIEWSTATE' => $viewstate,
            '__VIEWSTATEGENERATOR' => $viewstategenerator
        );

        $url3="http://jw.jssvc.edu.cn/xsgrxx.aspx?xh=".$userID;
        $ch2 = curl_init($url3);
        curl_setopt($ch2, CURLOPT_HEADER, 0);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch2, CURLOPT_REFERER, $url3);
        curl_setopt($ch2, CURLOPT_COOKIEFILE, $cookie_file);
        curl_setopt($ch2, CURLOPT_POST, 1);
        curl_setopt($ch2, CURLOPT_POSTFIELDS, http_build_query($post1));
        $contents = curl_exec($ch2);
        curl_close($ch2);
        echo $contents;
    }
	

    
    //成绩查询
 //   $post1 = array(
 //                 '__VIEWSTATE' => $viewstate,
 //                 '__VIEWSTATEGENERATOR' => $viewstategenerator,
 //                  'ddlXN' => '',
 //                  'ddlXQ' => '',
 //                 'Button1' => '按学期查询'
//                  );
    
//    //课表查询

//    $post1 = array(
//                   '__VIEWSTATE' => $viewstate,
//                   '__VIEWSTATEGENERATOR' => $viewstategenerator,
//                   'TextBox2' => '852158',
//                   'TextBox3' => '852158',
//                   'TextBox4' => '852158',
//                   'Button1' => '修改'
//                   );
    
    
    //个人信息
//    $post1 = array(
//                   '__EVENTTARGET' => 'xnd',
//                   '__EVENTARGUMENT' => '',
//                   '__VIEWSTATE' => $viewstate,
//                   '__VIEWSTATEGENERATOR' => $viewstategenerator
//                   );

    //$url2='http://jw.jssvc.edu.cn/xsgrxx.aspx?xh=126306124';

	
	
?>
