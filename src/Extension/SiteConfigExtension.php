<?php

namespace DorsetDigital\BrowserUpdate;

use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\NumericField;
use SilverStripe\ORM\DataExtension;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'IEVersion' => 'Varchar(3)',
        'FFVersion' => 'Varchar(3)',
        'OperaVersion' => 'Varchar(3)',
        'ChromeVersion' => 'Varchar(3)',
        'SafariVersion' => 'Varchar(3)',
        'Insecure' => 'Boolean(1)',
        'Unsupported' => 'Boolean',
        'AlertPosition' => 'Enum("top","bottom","corner")',
        'ReminderPeriod' => 'Int',
        'ReminderPeriodAfterClose' => 'Int'
    ];

    private static $defaults = [
        'IEVersion' => '-4',
        'FFVersion' => '-3',
        'OperaVersion' => '-3',
        'ChromeVersion' => '-3',
        'SafariVersion' => '-1',
        'Insecure' => 'Boolean(1)',
        'ReminderPeriod' => 24,
        'ReminderPeriodAfterClose' => 150
    ];

    public function updateCMSFields(FieldList $fields)
    {
        parent::updateCMSFields($fields);
        $fields->addFieldsToTab('Root.BrowserUpdate', [
            DropdownField::create('IEVersion', 'IE/Edge', $this->getSelectOptions()),
            DropdownField::create('FFVersion', 'Firefox', $this->getSelectOptions()),
            DropdownField::create('OperaVersion', 'Opera', $this->getSelectOptions()),
            DropdownField::create('ChromeVersion', 'Chrome', $this->getSelectOptions()),
            DropdownField::create('SafariVersion', 'Safari', $this->getSelectOptions()),
            CheckboxField::create('Insecure', 'Notify browsers with security issues'),
            CheckboxField::create('Unsupported', 'Notify browser versions not supported by the vendor'),
            NumericField::create('ReminderPeriod', 'After how many hours the message should re-appear'),
            NumericField::create('ReminderPeriodAfterClose', 'After how many hours the message should re-appear if the user dismisses it')
        ]);
    }

    /**
     * @return array
     */
    private function getSelectOptions()
    {
        $opts = [
            0 => 'Latest version only'
        ];

        for ($x = 1; $x > -7; $x--) {
            $opts[$x] = 'At least ' . $x . ' versions behind latest';
        }

        return $opts;
    }
}
