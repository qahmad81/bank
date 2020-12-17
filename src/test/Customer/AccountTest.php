<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use qahmad\bank\Customer\Account;

final class AccountTest extends TestCase
{

    public function testItsWorking(): void
    {
        $this->assertInstanceOf(
            Account::class,
            New Account()
        );
    }

    public function testFunctionality(): void
    {
        $account = New Account(100);
        $account->credit(28.50);
        $account->debit(47.94);
        $account->credit(70.1);

        $this->assertEquals(
            150.66,
            $account->getBalance()
        );
    }

    /**
     * @dataProvider additionProvider
     */
    public function testSetOfNumbers(float $initial, array $transactions, float $expected): void
    {
        $account = New Account($initial);

        foreach($transactions as $trans) 
            foreach($trans as $trans_type => $trans_amount) 
                $account->$trans_type($trans_amount);
        
        $this->assertEquals(
            $expected,
            $account->getBalance()
        );
    }

    public function additionProvider(): array
    {
        $tests = [
            'zeros'  => [0, [['credit'=>0],['debit'=>0],['credit'=>0]], 0],
            'integer values'  => [100, [['credit'=>50],['debit'=>50],['credit'=>50]], 150],
            'float values'  => [75.5, [['credit'=>12.8],['debit'=>10.0],['debit'=>13.4],['credit'=>20.0]], 84.9],
            'mix float and int values'  => [23.2, [['credit'=>17],['debit'=>12],['debit'=>21.4],['credit'=>10.3]], 17.1],
            'from zero'  => [0, [['credit'=>50],['credit'=>150],['debit'=>50]], 150],
            'fail debit 1'  => [0, [['credit'=>50],['debit'=>150],['credit'=>50]], 100],
            'fail debit 2'  => [0, [['debit'=>50],['debit'=>70],['credit'=>12]], 12],
            'ignoreding Negative numbers 1'  => [100, [['credit'=>-20],['debit'=>-20],['credit'=>10]], 110],
            'ignoreding Negative numbers 2'  => [-50, [['credit'=>50],['debit'=>-10],['credit'=>20]], 70],
            'low numbers'  => [0.003, [['credit'=>0.007],['debit'=>0.005],['credit'=>1.006]], 1.01],
            'large numbers 1'  => [250000, [['credit'=>150000],['debit'=>73000],['credit'=>1000000]], 1327000],
            'large numbers 2'  => [70000000, [['credit'=>15000000],['debit'=>5000000],['credit'=>20000000]], 100000000],
            'large numbers 3'  => [25000900, [['credit'=>12000001.01],['debit'=>5000001],['credit'=>10000010]], 42000910.01],
        ];

        $randNumber = function($nig = 1) { return rand($nig==1?-10000000000:0,10000000000)/100; };

        // a lot of transactions test
        for($i=0;$i<100;$i++) {
            $expected = $balance = $randNumber(0);
            
            $transAry = array();
            for($j=0;$j<100;$j++) {
                $trans = $randNumber();
                if ($trans >= 0)
                    $transNode = array('credit' => $trans);
                else
                    $transNode = array('debit' => $trans * -1);
                $transAry[] = $transNode;
                if (($expected+$trans) >= 0) $expected += $trans;
            }
            $tests['lot of transactions test ' . $i] = [$balance, $transAry,round($expected, 2)];
        }
        return $tests;
    }


}