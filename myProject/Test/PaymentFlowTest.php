<?php
namespace myProject\Test;
use myProject\PaymentFlow;

class testTool2 extends \PHPUnit_Framework_TestCase
{

    public function testDeposit()
    {
        $testAccount ='00002';
        $testAccount2 = '00003';
        $testMoney = '0';
        $testMemo = '單元測試-入帳';
        $testType = '入帳';
        $ans_true = true;
        $ans_false = false;

        $payment = new PaymentFlow();
        $deposit = $payment->deposit($testAccount, $testMoney, $testMemo, $testType);
        $deposit2 = $payment->deposit($testAccount2, $testMoney, $testMemo, $testType);

        $this->assertEquals($deposit, $ans_true);
        $this->assertEquals($deposit2, $ans_false);
    }
    public function testWithdrawal()
    {
        $testAccount ='00002';
        $testAccount2 = '00003';
        $testMoney = '0';
        $testMemo = '單元測試-出帳';
        $testType = '出帳';
        $ans_true = true;
        $ans_false = false;

        $payment = new PaymentFlow();
        $withdrawal = $payment->withdrawal($testAccount, $testMoney, $testMemo, $testType);
        $withdrawal2 = $payment->withdrawal($testAccount2, $testMoney, $testMemo, $testType);


        $this->assertEquals($withdrawal, $ans_true);
        $this->assertEquals($withdrawal2, $ans_false);
    }
    public function testGetBalance()
    {
        $testAccount = '00002';
        $ans = 19200;

        $payment = new PaymentFlow();
        $getBalance = $payment->getBalance($testAccount);
        foreach($getBalance as $key)
        {
            $balance = $key['balance'];
        }

        $this->assertEquals($balance, $ans);
    }

    public function testGetList()
    {
        $testAccount = '00002';
        $ans = 1800;

        $payment = new PaymentFlow();
        $getList = $payment->getList($testAccount);
        $money = $getList[0]['money'];

        $this->assertEquals($money, $ans);
    }
}