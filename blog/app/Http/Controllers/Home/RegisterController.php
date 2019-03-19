<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入用户模型类
use App\Models\Users;
//导入Hash
use Hash;
use Mail;
//导入用户详情表
use App\Models\User_details;
class RegisterController extends Controller
{

    /**
     * 显示用户注册界面
     * 
     * @return view 注册界面
     */
    public function index()
    {
        return view('home.register');
    }

    /**
     *  邮箱方式注册用户
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function insert(Request $request)
    {

        //实例化用户模型类
        $users = new Users();
        //添加用户邮箱
        $users->email = $request->input('email',' ');
        //判断邮箱是否存在
        if(Users::where('email',$request->input('email'))->first()){
            echo '<script>alert("邮箱已存在,请直接登录!");window.location.href="/home/login/index"</script>';exit;
        }
        //添加用户密码
        $users->password = Hash::make($request->input('password',' '));
        //设置用户注册时间
        $users->addtime = time();
        //设置密令
        $users->token = str_random(60);
        //执行添加操作
        if($users->save()){
            //初始化用户详情信息
            $user_details = new User_details();
            $user_details->uid= $users->id;
            $user_details->save();
            //执行发送邮件
            //参数1视图   参数2  携带参数
            Mail::send('home.email.message', ['email' => $users->email,'id'=>$users->id,'token'=>$users->token], function ($m) use ($users) {

                $mes = $m->to($users->email)->subject('用户激活');
                if($mes){
                    echo '<script>alert("注册成功,邮件已发送,请尽快完成激活！");window.location.href="/home/login/index"</script>';
                }else{
                    echo '<script>alert("邮件发送失败,请稍后再试！")</script>';
                }
            });
        }else{
             echo '<script>alert("注册失败")</script>';
        }
        
    }

    /**
     *  账户激活
     * 
     * @param  int $id    0未激活 1激活
     * @param  string $token 随机60位密令
     * @return [type]        [description]
     */
    public function change($id,$token)
    {
        //获取用户信息
        $info = Users::find($id);
        //验证token
        if($info->token != $token){
            echo '<script>alert("链接已失效");window.location.href="/home/login/index"</script>';
            exit;
        }
        //验证是否已经激活
         if($info->status == 1){
            echo '<script>alert("请勿重复激活");window.location.href="/home/login/index"</script>';
            exit;
        }
        //设置为激活模式
        $info->status = 1;
        //重置密令
        $info->token = str_random(60);
        if($info->save()){
            echo '<script>alert("激活成功");window.location.href="/home/login/index"</script>';
        }
    }

    public function store(Request $request)
    {
        //判断验证码是否正确
        if(session('send_phone_code') != $request->phone_code){
            echo '<script>alert("验证码错误");window.location.href="/home/register/index"</script>';exit;
        }
        //实例化用户类
        $users = new Users();
        //设置手机号
        $users->phone = $request->phone;
        //判断邮箱是否存在
        if(Users::where('phone',$request->phone)->first()){
            echo '<script>alert("手机号已存在,请直接登录!");window.location.href="/home/login/index"</script>';exit;
        }
        //设置密码
        $users->password = Hash::make($request->phone);
        if($users->save()){
            //初始化用户详情表
            $user_details = new User_details();
            $user_details->uid= $users->id;
            $user_details->save();
            $request->session()->forget('send_phone_code');
            echo '<script>alert("注册成功");window.location.href="/home/login/index"</script>';exit;
        }

    }

    /**
     *  发送短信到对应手机号
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function sendMobileCode(Request $request)
    {

        //接收用户手机号
        $phone =  $request->phone;
        
        //生成随机4位验证码
        $phone_code = rand(1000,9999);
        //将验证码存储到session中
        session(['send_phone_code' => $phone_code]);
        $url = "http://v.juhe.cn/sms/send";
        $params = array(
            'key'   => '463c2ddf1eee51a08847a37f279932d8', //您申请的APPKEY
            'mobile'    => $phone, //接受短信的用户手机号码
            'tpl_id'    => '144089', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$phone_code //您设置的模板变量，根据实际情况修改
        );

        $paramstring = http_build_query($params);
        $content = self::juheCurl($url, $paramstring);
        //$result = json_decode($content, true);
        if ($content) {
            echo  $content;
        } else {
            //请求异常
            echo  $content;
        }
    }

    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    public static function  juheCurl($url, $params = false, $ispost = 0)
    {
        $httpInfo = array();
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url.'?'.$params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    } 

}