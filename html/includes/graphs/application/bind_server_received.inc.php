<?php
$name = 'bind';
$app_id = $app['app_id'];
$unit_text     = 'per second';
$colours       = 'psychedelic';
$dostack       = 0;
$printtotal    = 0;
$addarea       = 1;
$transparency  = 15;

$rrd_filename = rrd_name($device['hostname'], array('app', 'bind', $app['app_id'], 'server'));

$rrd_list=array();
if (rrdtool_check_rrd_exists($rrd_filename)) {
    $rrd_list[]=array(
        'filename' => $rrd_filename,
        'descr'    => 'IPv4 Req',
        'ds'       => 'i4rr',
    );
    $rrd_list[]=array(
        'filename' => $rrd_filename,
        'descr'    => 'IPv6 Req',
        'ds'       => 'i6rr',
    );
    $rrd_list[]=array(
        'filename' => $rrd_filename,
        'descr'    => 'TCP Req',
        'ds'       => 'trr',
    );
    $rrd_list[]=array(
        'filename' => $rrd_filename,
        'descr'    => 'TCP Qry',
        'ds'       => 'tqr',
    );
    $rrd_list[]=array(
        'filename' => $rrd_filename,
        'descr'    => 'UDP Qry',
        'ds'       => 'uqr',
    );
    $rrd_list[]=array(
        'filename' => $rrd_filename,
        'descr'    => 'With EDNS(0)',
        'ds'       => 'rwer',
    );
    $rrd_list[]=array(
        'filename' => $rrd_filename,
        'descr'    => 'Other EDNS',
        'ds'       => 'oeor',
    );
    $rrd_list[]=array(
        'filename' => $rrd_filename,
        'descr'    => 'Dup. Qry',
        'ds'       => 'dqr',
    );
} else {
    d_echo('RRD "'.$rrd_filename.'" not found');
}

require 'includes/graphs/generic_multi_line.inc.php';
