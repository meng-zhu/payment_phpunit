<?php
namespace myProject\Test;
use myProject\Account;

class testTool1 extends \PHPUnit_Framework_TestCase
{
    public function testAccount()
    {
        $testAccount = '00002';
        $testAccount2 = '11112';
        $ans_true = true;
        $ans_false = false;

        $account = new Account();
        $testcheckAccount = $account->checkAccount($testAccount);
        $testcheckAccount2 = $account->checkAccount($testAccount2);
        $this->assertEquals($testcheckAccount, $ans_true);
        $this->assertEquals($testcheckAccount2, $ans_false);
    }
}