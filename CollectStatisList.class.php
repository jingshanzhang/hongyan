<?php
/**
 * @package
 * @subpackage
 * @author               $Author:   zhangjingshan <zhangjingshan@haozu.com>$
 * @file                 $HeadURL$
 * @version              $Rev$
 * @lastChangeBy         $LastChangedBy$
 * @lastmodified         $LastChangedDate$
 * @copyright            Copyright (c) 2017.07.11, www.haozu.com
 */
class Action_Competitor_CollectStatisList extends Action_Common
{
    public function call(){
        //{{{登陆验证
        $authInfo = $this->_user_info;
        $userInfo = $authInfo['data']['output']['data'];
        //}}}
        $arrParams = array();
        $arrParams['user'] = $userInfo;
        //获取提交数据
        $arrParams['arrConds'] =$this->_getParams();
        $ret = $this->_getProxyPage("Service_Page_Competitor_CollectStatis",$arrParams);
        $this->_assign($ret['data']);
        $tdkInfo = array("title"=>'数据收集工作量');
        $this->assign('tdkInfo', $tdkInfo);
        $this->assign('total', $ret['data']['total']);
        $this->display('/competitor/collectstatis.tpl.php');
    }
}
