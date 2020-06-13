<?php

define('REQUEST_TIME', microtime(true));
define('MEMORY_ON_START', memory_get_usage());

error_reporting(E_ALL);
date_default_timezone_set('Asia/Yangon');

require_once __DIR__ . '/vendor/autoload.php';

class UserNotExistedException extends Exception
{
    protected $message = 'User ID %s is not existed';

    public function __construct($id)
    {
        $this->message = sprintf($this->messages, $id);
    }
}

class TransactionFailedException extends Exception
{
    protected $message = 'Failed to make a transaction';
}

class NotEnougBalanceException extends Exception
{
    protected $message = 'Your balance is low';
}

class BankAccount
{
    static $users = [];

    protected $id;

    protected $status;

    protected $balance = 0;

    protected $payable = 0;

    function find($id)
    {
        if (!isset(static::$users[$id])) {
            throw new UserNotExistedException($id);
        }
        $user = static::$users[$id];
        $account = new self;
        $account->id = $id;
        $account->name = $user[0];
        $account->balance = $user[1];
        $account->status = $user[2];
        return $account->update();
    }

    function update()
    {
        $this->payable = $this->balance;
        return $this;
    }

    function addBalance(float $value)
    {
        if (!$this->update()->status) {
            return sprintf('User %s (%s) is not active', $this->name, $this->id);
        }
        $this->balance += $value;
    }

    function debit(float $amount)
    {
        if ($this->payable < $amount) {
            throw new NotEnougBalanceException;
        }
        $this->payable -= $amount;
        return $amount;
    }

    function tranfer(array $err)
    {
        if ($err) {
            throw new TransactionFailedException($err[0]);
        }
        $this->balance = $this->payable;
    }
}

class Transcation
{
    protected $payer;

    protected $payee;

    protected $amount = 0;

    public function __construct($payer, BankAccount $payee)
    {
        $this->payer = $payer;
        $this->payee = $payee;
    }

    public function __destruct()
    {
        $data = json_encode(serialize(BankAccount::$users));
        file_put_contents(__DIR__ . '/user.data', $data);
    }

    public function addAmount(float $amount)
    {
        $this->amount += $this->payer->debit($amount);
    }

    function transfer()
    {
        return $this->send();
    }

    function send()
    {
        $this->payer->tranfer(
            (array) $this->payee->addBalance($this->amount)
        );
    }
}

BankAccount::$users = unserialize(json_decode(file_get_contents(__DIR__ . '/user.data')));

$fh = fopen('php://stdin', 'r');

system('clear');

/* [v]--- code begin here ---[v] */
$bank_account = new BankAccount;

echo "\033[1;34m Enter payer ID \33[0;2;34m<111111>\033[0m: ";
$payer = $bank_account->find(trim(fread($fh, 10)) ?: '111111');

echo "\033[1;34m Enter payee ID \33[0;2;34m<555555>\033[0m: ";
$payee = $bank_account->find(trim(fread($fh, 10)) ?: '555555');

echo var_dump($payer, $payee), PHP_EOL;

$tran = new Transcation($payer, $payee);

$ask_amount = function () use ($tran, $fh) {
    echo "\033[1;36m Enter to add an amount \33[0;2;32m[<float>|<null>transfer]\033[0m: ";
    return trim(fread($fh, 10)) ?: 0;
};

$amount = $ask_amount();

while ($amount) {
    $tran->addAmount((float) $amount);
    $amount = $ask_amount();
}

echo "\033[0;31m", PHP_EOL;

$tran->send();

echo "\033[1;42;30m SUCCESS \033[0m", PHP_EOL, var_dump($tran), "\033[0m", PHP_EOL;
/* [^]--- code end here ---[^] */


error_log(sprintf(
    "\nLoadtime: %s%s | Usage Memory: %s%s | Peak Usage: %s%s\n",
    round((microtime(true) - REQUEST_TIME) / 1000, 4),
    'ms',
    round((memory_get_usage() - MEMORY_ON_START) / 1000, 2),
    'KB',
    round(memory_get_peak_usage() / 1000, 2),
    'KB',
));

$unexisted = new Database;

echo '<br/><hr/><pre>', var_dump($unexisted, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), '</pre>';