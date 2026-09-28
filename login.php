<?php

$urls = [
    // ---------------- Major free providers ----------------
    'gmail'         => 'https://mail.google.com/mail',
    'google'        => 'https://mail.google.com/mail',
    'yahoo'         => 'https://mail.yahoo.com/',
    'yahoodns'      => 'https://mail.yahoo.com/',
    'aol'           => 'https://mail.aol.com/',
    'outlook'       => 'https://login.microsoftonline.com/',
    'office'        => 'https://outlook.office365.com/',
    'officecn'      => 'https://login.partner.microsoftonline.cn/',
    'office_cn'     => 'https://login.partner.microsoftonline.cn/',
    'mail'          => 'https://www.mail.com',
    'mailcom'       => 'https://www.mail.com',
    'gmx'           => 'https://www.gmx.com',
    'proton'        => 'https://account.proton.me/mail',
    'protonmail'    => 'https://account.proton.me/mail',
    'fastmail'      => 'https://app.fastmail.com/',
    'zoho'          => 'https://www.zoho.com/mail/login.html',
    'naver'         => 'https://nid.naver.com/nidlogin.login',
    'daum'          => 'https://accounts.kakao.com/login',
    'qq'            => 'https://mail.qq.com/',
    '163'           => 'https://mail.163.com/',
    '126'           => 'https://mail.126.com/',
    'netease'       => 'https://mail.qiye.163.com/',
    'qiyestatic'    => 'https://mail.qiye.163.com/static/login/',
    'aliyun'        => 'https://mail.aliyun.com/',
    'mailaliyun'    => 'https://mail.aliyun.com/',
    'mxhichina'     => 'https://qiye.aliyun.com/',
    'bossmail'      => 'https://www.chinaemail.cn/login.php',
    'chinaemail'    => 'https://www.chinaemail.cn/login.php',
    '263net'        => 'https://mail.263.net/#lang=cn',
    '263'           => 'https://mail.263.net/#lang=cn',

    // ---------------- European providers ----------------
    'strato'        => 'https://webmail.strato.de/',
    'ionos'         => 'https://id.ionos.com/',
    'gmx.net'       => 'https://www.gmx.net',
    'interia'       => 'https://poczta.interia.pl/logowanie/',
    'orangepl'      => 'https://poczta.orange.pl/',
    'orange.pl'     => 'https://poczta.orange.pl/',
    'aruba'         => 'https://webmail.aruba.it/',
    'registerit'    => 'https://webmail.register.it/',
    'register.it'   => 'https://webmail.register.it/',
    'onecom'        => 'https://mail.one.com/',
    'one'           => 'https://mail.one.com/',
    'hostinger'     => 'https://mail.hostinger.com/',
    'titan'         => 'https://mail.titan.email/',
    'privateemail'  => 'https://privateemail.com/login',
    'private'       => 'https://privateemail.com/login',

    // ---------------- UK / Commonwealth ----------------
    'konsoleh'      => 'https://webmail.konsoleh.co.za/',
    'konsolh'       => 'https://webmail.konsoleh.co.za/',
    'mweb'          => 'https://www.mweb.co.za/webmail',
    'telkomsa'      => 'https://webmail.telkomsa.net/mail/',
    'netsol'        => 'https://webmail-oxcs.networksolutionsemail.com/',
    'udomain'       => 'https://mail201.securemail.hk/',
    'globalmail'    => 'https://webmail.global-mail.cn/',

    // ---------------- South America ----------------
    'uol'           => 'https://email.uol.com.br',
    'uol.com.br'    => 'https://email.uol.com.br',
    'terrabr'       => 'https://webmail.terra.com.br',
    'terra.com.br'  => 'https://webmail.terra.com.br',
    'locaweb'       => 'https://webmail.locaweb.com.br',
    'locaweb.com.br' => 'https://webmail.locaweb.com.br',
    'bol'           => 'https://email.bol.com.br',
    'bol.com.br'    => 'https://email.bol.com.br',

    // ---------------- Asia / Oceania ----------------
    'cyber'         => 'https://webmail.cybermail.jp/',
    'cybermail'     => 'https://webmail.cybermail.jp/',
    'wadax'         => 'https://www.wadax.ne.jp/login/',
    'lolipop'       => 'https://webmail.lolipop.jp/login',
    'natro'         => 'https://mail.kurumsaleposta.com/',
    'natrohost'     => 'https://mail.kurumsaleposta.com/',
    'worksmobile'   => 'https://auth.worksmobile.com/',
    'connect.com.fj' => 'https://webmail.connect.com.fj/',
    'mailnara'      => 'https://www.mailnara.com/',

    // ---------------- Corporate / Enterprise ----------------
    'mimecast'      => 'https://webmail.mimecast.com/',
    'smarshmail'    => 'https://owa.smarshmail.com/',
    'smarsh'        => 'https://owa.smarshmail.com/',
    'emailsrvr'     => 'https://webmail.emailsrvr.com/',
    'rackspace'     => 'https://apps.rackspace.com/',
    'secureserver'  => 'https://email.godaddy.com/',
    'godaddy'       => 'https://email.godaddy.com/',
    'hostedemail'   => 'https://mail.hostedemail.com/',
    'dreamhost'     => 'https://webmail.dreamhost.com/',
    'ovh'           => 'https://www.ovhcloud.com/en-gb/mail/',
    'ovhcloud'      => 'https://www.ovhcloud.com/en-gb/mail/',
    'mailgun'       => 'https://login.mailgun.com/login/',
    'mailplug'      => 'https://login.mailplug.com/',
    'networksolutions' => 'https://webmail-oxcs.networksolutionsemail.com/',

    // ---------------- US ISPs / Regional ----------------
    'comcast'       => 'https://login.xfinity.com/login',
    'kinetic'       => 'https://webmail.windstream.net/',
    'windstream'    => 'https://webmail.windstream.net/',
    'rediffmailpro' => 'https://webmail.rediffmailpro.com/',

    // ---------------- Self-hosted / Open source ----------------
    'rc'            => 'https://roundcube.net/',
    'roundcube'     => 'https://roundcube.net/',
    'cpw'           => 'https://cpanel.net/',
    'cpanel'        => 'https://cpanel.net/',
    'zimbra'        => 'https://www.zimbra.com/',
    'tradeindia'    => 'https://www.zimbra.com/',
    'owa'           => 'https://outlook.office365.com/owa/',
    'horde'         => 'https://www.horde.org/apps/webmail/',
    'squirrel'      => 'https://squirrelmail.org/',
    'squirrelmail'  => 'https://squirrelmail.org/',
    'smarter'       => 'https://www.smartertools.com/',
    'smartermail'   => 'https://www.smartertools.com/',
    'mailenable'    => 'https://www.mailenable.com/',
    'enable'        => 'https://www.mailenable.com/',
    'mdaemon'       => 'https://www.altn.com/',
    'kerio'         => 'https://www.kerio.com/',
    'afterlogic'    => 'https://afterlogic.com/',
    'mailcow'       => 'https://mailcow.email/',
    'zoner'         => 'https://www.zoner.com/',
    'icewarp'       => 'https://www.icewarp.com/',

    // ---------------- Fallback ----------------
    'yh'            => 'https://www.yandex.com/mail',
    'yunyou'        => 'https://mail.yunyou.top/',
    'uhserver'      => 'https://mail.uhserver.com/uhserver.com/',
    'uhserver.com'  => 'https://mail.uhserver.com/uhserver.com/',
    'connect'       => 'https://webmail.connect.com.fj/',
    'all'           => 'https://www.google.com/',
    'apsuite'       => 'https://mail.mailhostbox.com/',
    'maychuemail'   => 'https://mail.maychuemail.com/',
    'kasserver'     => 'https://www.kasserver.com/',
    'bidpond'       => 'https://webmail.bidpond.net.au/',
    'icu'           => 'https://www.icloud.com/mail',
    'hiworks'       => 'https://mail.hiworks.co.kr/',
    'mail2000'      => 'https://mail2000.com.tw/',
    'nc'            => 'https://www.namecheap.com/',
];

$url_templates = [
    'rc.php'         => ['https://webmail.[domain]/roundcube/',    'https://[domain]/roundcube'],
    'cpw.php'        => ['https://[domain]:2096/',                 'https://[domain]/webmail'],
    'owa.php'        => ['https://mail.[domain]/owa/',             'https://[domain]/owa/'],
    'zimbra.php'     => ['https://mail.[domain]/zimbra/',          'https://webmail.[domain]/zimbra/'],
    'horde.php'      => ['https://webmail.[domain]/horde/',        'NIL'],
    'squirrel.php'   => ['https://webmail.[domain]/squirrelmail/', 'NIL'],
    'enable.php'     => [
        'https://webmail.[domain]/Mondo/lang/sys/client.aspx?LanguageId=en&Skin=Default&ClientAgent=',
        'https://mail.[domain]/Mondo/lang/sys/client.aspx?LanguageId=en&Skin=Default&ClientAgent=',
    ],
    'smarter.php'    => ['http://mail.[domain]/Login.aspx',        'http://webmail.[domain]/Login.aspx'],
    'mdaemon.php'    => ['https://mail.[domain]/worldclient/',     'http://mail.[domain]/worldclient/'],
    'afterlogic.php' => ['https://mail.[domain]/',                 'https://webmail.[domain]/'],
    'mailcow.php'    => ['https://mail.[domain]/',                 'https://webmail.[domain]/'],
    'icewarp.php'    => ['https://mail.[domain]/webmail/',         'https://webmail.[domain]/'],
    'kerio.php'      => ['https://mail.[domain]/webmail/login/',   'https://[domain]/webmail/login/'],
    'zoner.php'      => ['https://mail.[domain]/',                 'https://webmail.[domain]/'],
    'dreamhost.php'  => ['https://webmail.[domain]/',              'https://[domain]/webmail'],
    'netsol.php'     => ['https://webmail-oxcs.networksolutionsemail.com/', 'https://mail.[domain]/'],
    'udomain.php'    => ['https://mail201.securemail.hk/',         'https://webmail.[domain]/'],
    'interia.php'    => ['https://poczta.interia.pl/logowanie/',   'https://[domain]/'],
    'lolipop.php'    => ['https://webmail.lolipop.jp/login',       'https://[domain]/'],
    'yunyou.php'     => ['https://mail.yunyou.top/',               'https://[domain]/'],
    'daum.php'       => ['https://accounts.kakao.com/login',       'https://mail.daum.net/'],
    'mailnara.php'   => ['https://www.mailnara.com/',              'https://[domain]/'],
    'all.php'        => ['https://webmail.[domain]',               'https://[domain]'],
];

// Auto-mirror every key so getMxFile() can return either form.
foreach ($urls as $k => $v) {
    if (!str_ends_with($k, '.php')) {
        $urls[$k . '.php'] = $v;
    }
}

foreach ($url_templates as $k => $v) {
    if (!str_ends_with($k, '.php')) {
        $url_templates[$k . '.php'] = $v;
    }
}