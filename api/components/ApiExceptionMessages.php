<?php

/**
 * Description of ApiException
 *
 */

namespace api\components;

class ApiExceptionMessages
{

    private $message;
    private $code;
    private static $code_genre = [
      'general' => 0000,
      'country' => 1000,
      'company_setting' => 2000,
      'customer' => 3000,
      'currency' => 4000,
      'estimate' => 5000,
      'expense' => 6000,
      'invoice' => 7000,
      'items' => 8000,
      'organization' => 9000,
      'recurring_expense' => 10000,
      'role' => 11000,
      'tax' => 12000,
      'tax_group' => 13000,
      'user' => 14000,
      'user_setting' => 15000,
      'exchange_rate' => 16000,
      'expense_category' => 17000,
      'import' => 18000,
      'update_email' => 19000,
      // temp fix for genre name confliction
      'Tax' => 12000,
      'Expense' => 6000,
      'RecurringExpense' => 10000,
      'Customer' => 3000,
      'Expense' => 6000,
      'Item' => 8000,
      'TaxGroup' => 13000
    ];
    private static $error_codes = [
      01 => 'Internal server error',
      02 => 'Organization id is must',
      03 => 'Duplicate currency',
      04 => 'Duplicate exchange rate',
      05 => 'currency not found',
      06 => 'User not found in this organization',
      07 => 'Duplicate organization',
      08 => 'Organization not found',
      09 => 'Currency code is must',
      10 => 'Currency symbol is must',
      11 => 'decimal precision is must',
      12 => 'currency format is must',
      13 => 'Unauthorized action',
      14 => 'Duplicate Customer name',
      15 => 'First name is must',
      16 => 'Company name is must',
      17 => 'Email is must',
      18 => 'Customer not found',
      19 => 'Customer name is must',
      20 => 'Estimate is must',
      21 => 'Estimate date is must',
      22 => 'Estimate not found',
      23 => 'Currency id is must',
      24 => 'Exchange rate is must',
      25 => 'Exchange rate not found',
      26 => 'Exchange date is must',
      27 => 'Expense name is must',
      28 => 'Expense category is must',
      29 => 'Expense amount is must',
      30 => 'Invoice not found',
      31 => 'Item not found',
      32 => 'Item name is must',
      33 => 'Item rate is must',
      34 => 'Item status is must',
      35 => 'Password is must',
      36 => 'Invalid email and password combination',
      37 => 'Insufficient posted data',
      38 => 'Username is must',
      39 => 'Signature is must',
      40 => 'Duplicate transaction id',
      41 => 'Confirm Email is must',
      42 => 'Confirm Email does not match with Email',
      43 => 'Payment settings are already saved',
      44 => 'Recurring expense profile name is must',
      45 => 'Recurring expense repeat interval is must',
      46 => 'Recurring expense start date is must',
      47 => 'Recurring expense category is must',
      48 => 'Recurring expense amount is must',
      49 => 'Recurring expense end date must be equal to or greater than start date',
      50 => 'Recurring expense not found',
      51 => 'Default role can not be edited or deleted',
      52 => 'This role already exists',
      53 => 'Role\'s display name is must',
      54 => 'Invalid tax value',
      55 => 'Tax name is must',
      56 => 'Tax percentage is must',
      57 => 'Tax not found',
      58 => 'Tax group is must',
      59 => 'Email and password is must',
      60 => 'No New value to update',
      61 => 'Wrong password',
      62 => 'Customer id is must',
      63 => 'Invoice due date is must',
      64 => 'Invoice date is must',
      65 => 'Invoice number is IzapApiExceptionMessagesmust',
      66 => 'Email already exist',
      67 => 'Item Quantity is must',
      68 => 'This Tax is associated with the item.Hence, it cannot be deleted.',
      69 => 'Duplicate Item',
      70 => 'item id is must',
      71 => 'invoice id is must',
      72 => 'Recurring Expense id is must',
      73 => 'Provide Two Taxes',
      74 => 'Create Tax First'
    ];

    public function __construct($code, $genre = 'general', $external_message = Null)
    {
        if ($code == Null && $external_message != Null) {
            $this->message = $external_message;
        } else {
            $this->message = self::$error_codes[$code];
        }
        $this->code = self::$code_genre[$genre] + $code;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getCode()
    {
        return $this->code;
    }
}
