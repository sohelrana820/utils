<?php

namespace Utils\SohelRana820\Networks;

class Networks
{
    /**
     * @param $url
     * @return mixed
     */
    public static function parseHostName($url)
    {
        $hostname = parse_url($url, PHP_URL_HOST);
        return $hostname;
    }

    /**
     * @param $url
     * @return null|string
     */
    public static function parseHostIP($url)
    {
        $ip = gethostbyname(self::parseHostName($url));
        if ($ip)
            return $ip;
        return null;
    }

    /**
     * @param $url
     * @return array
     */
    public static function parseDnsInfo($url)
    {
        $dnsInfo = dns_get_record(self::parseHostName($url));
        if ($dnsInfo && is_array($dnsInfo))
            return $dnsInfo;
        return [];
    }
}