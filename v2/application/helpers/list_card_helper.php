<?php

function getListCard($data)
{
    return $listCard = array(
        // 1 => array(
        //     'title' => 'Cash On Hands',
        //     'captionTitle' => $data['tgl_cash_on_hands'],
        //     'content' => $data['cash_on_hands']['angka'],
        //     'captionContent' => $data['cash_on_hands']['satuan'],
        //     'link' => 'transaksi/saldo'
        // ),
        2 => array(
            'title' => 'Account Receivable',
            'captionTitle' => filterDiffDate($data['tgl_acc_receivable']),
            'content' => $data['acc_receivable']['angka'],
            'captionContent' => $data['acc_receivable']['satuan'],
            'link' => 'transaksi/acc_receivable/index/' . $data['tgl_acc_receivable']
        ),
        3 => array(
            'title' => 'Liquidity Forecast',
            'captionTitle' => 'Forecast in 30 days',
            'content' => '0,00',
            'captionContent' => '',
        ),
        4 => array(
            'title' => 'Liquidity Forecast',
            'captionTitle' => 'Forecast in 6 months',
            'content' => '0,00',
            'captionContent' => '',
        ),
        5 => array(
            'title' => 'Account Payable',
            'captionTitle' => 'Outstanding',
            'content' => '0,00',
            'captionContent' => '',
        ),
        8 => array(
            'title' => 'Cash Flow Analysis',
            'captionTitle' => 'Month to Date',
            'content' => '0,00',
            'captionContent' => '',
        ),
        0 => array(
            'title' => 'Piutang Macet',
            'captionTitle' => 'AR Aging > 6 months',
            'content' => '0,00',
            'captionContent' => '',
        ),
        11 => array(
            'title' => 'CASH OUT (YTD)',
            'captionTitle' => 'Payment Statistik',
            'content' => '0,00',
            'captionContent' => '',
        ),
        12 => array(
            'title' => 'Outstanding',
            'captionTitle' => 'LC/SKBDN & BG',
            'listContent' => ['JT', 'REFF'],
            'values' => ['0', '0'],
        ),
        9 => array(
            'title' => 'Debt Maturity',
            'captionTitle' => 'Today',
            'listContent' => ['KMK', 'NCL', 'MTN'],
            'values' => ['0', '0', '0'],
        ),
        6 => array(
            'title' => 'Sisa Plafon',
            'captionTitle' => 'Today',
            'listContent' => ['KMK', 'NCL', 'MTN'],
            'values' => ['0', '0', '0'],
        ),
        // 7 => array(
        //     'title' => 'Cash Position Detail',
        //     'captionTitle' => 'Today',
        //     'listContent' => ['IDR', 'USD', 'EUR'],
        //     'values' => ['0', '0', '0'],
        // ),
    );
}
