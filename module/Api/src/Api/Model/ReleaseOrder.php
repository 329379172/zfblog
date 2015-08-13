<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/13
 * Time: 上午10:08
 */
namespace Api\Model;

class ReleaseOrder{

    protected $id;

    protected $qt;

    protected $tb;

    protected $ip;

    protected $qq;

    protected $level;

    protected $createTime;


    public function exchangeArray($data){
        $this->id = (!empty($data['id'])) ? $data['id'] : null;
        $this->qt = (!empty($data['qt'])) ? $data['qt'] : null;
        $this->tb = (!empty($data['tb'])) ? $data['tb'] : null;
        $this->ip = (!empty($data['ip'])) ? $data['ip'] : null;
        $this->qq = (!empty($data['qq'])) ? $data['qq'] : null;
        $this->level = (!empty($data['level'])) ? $data['level'] : null;
        $this->createTime = (!empty($data['createTime'])) ? $data['createTime'] : null;
    }

    public function toArray(){
        return [
            'id' => (!empty($this->id)) ? $this->id : null,
            'qt' => (!empty($this->qt)) ? $this->qt : null,
            'tb' => (!empty($this->tb)) ? $this->tb : null,
            'ip' => (!empty($this->ip)) ? $this->ip : null,
            'qq' => (!empty($this->qq)) ? $this->qq : null,
            'level' => (!empty($this->level)) ? $this->level : null,
            'createTime' => (!empty($this->createTime)) ? $this->createTime : null,
        ];
    }

    /**
     * @return mixed
     */
    public function getFree()
    {
        return $this->free;
    }

    /**
     * @param mixed $free
     */
    public function setFree($free)
    {
        $this->free = $free;
    }

    protected $pay;

    protected $free;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getQt()
    {
        return $this->qt;
    }

    /**
     * @param mixed $qt
     */
    public function setQt($qt)
    {
        $this->qt = $qt;
    }

    /**
     * @return mixed
     */
    public function getTb()
    {
        return $this->tb;
    }

    /**
     * @param mixed $tb
     */
    public function setTb($tb)
    {
        $this->tb = $tb;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param mixed $ip
     */
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    /**
     * @return mixed
     */
    public function getQq()
    {
        return $this->qq;
    }

    /**
     * @param mixed $qq
     */
    public function setQq($qq)
    {
        $this->qq = $qq;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getCreateTime()
    {
        return $this->createTime;
    }

    /**
     * @param mixed $createTime
     */
    public function setCreateTime($createTime)
    {
        $this->createTime = $createTime;
    }

    /**
     * @return mixed
     */
    public function getPay()
    {
        return $this->pay;
    }

    /**
     * @param mixed $pay
     */
    public function setPay($pay)
    {
        $this->pay = $pay;
    }



}