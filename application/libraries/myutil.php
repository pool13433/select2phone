<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class myutil {

    public $colors = array(
        'bg-red', 'bg-yellow', 'bg-aqua', 'bg-green',
        'bg-blue', 'bg-maroon', 'bg-light-blue', 'bg-green', 'bg-navy',
        'bg-lime', 'bg-orange', 'bg-olive', 'bg-teal',
        'bg-fuchsia', 'bg-purple', 'bg-black');
    public $features = array(
        array(
            'variable_loop' => 'performanc_attr',
            'name' => 'performanc',
            'name_desc' => 'ข้อมูลด้านประสิทธิภาพ',
            'color' => 'bg-yellow'
        ),
        array(
            'variable_loop' => 'mutimedia_attr',
            'name' => 'mutimedia',
            'name_desc' => 'ข้อมูลกล้องถ่ายภาพ',
            'color' => 'bg-teal'
        ),
        array(
            'variable_loop' => 'ass_attr',
            'name' => 'accessory',
            'name_desc' => 'ข้อมูลด้านประโยชน์ใช้สอย',
            'color' => 'bg-fuchsia'
        ),
    );
    public $performanc_attr = array(
        'cpu_vol' => array(
            'caption' => 'Ghz',
            'desc' => 'ความเร็วหน่วยประมวลผล (CPU)',
            'icon' => 'fa fa-cog'
        ),
        'cpu_core' => array(
            'caption' => 'Core',
            'desc' => 'จำนวนหน่วยประมวลผล',
            'icon' => 'fa fa-cogs'
        ),
        'ram' => array(
            'caption' => 'GB',
            'desc' => 'หน่วยความจำ (RAM)',
            'icon' => 'fa fa-save'
        ),
    );
    public $mutimedia_attr = array(
        'cam_f' => array(
            'caption' => 'MP',
            'desc' => 'กล้องหน้า',
            'icon' => 'fa fa-camera-retro'
        ),
        'cam_b' => array(
            'caption' => 'MP',
            'desc' => 'กล้องหลัง',
            'icon' => 'fa fa-camera'
        ),
        'rom_in' => array(
            'caption' => 'GB',
            'desc' => 'ความจำในตัวเครื่อง ',
            'icon' => 'fa fa-hdd-o'
        ),
        'rom_ext' => array(
            'caption' => 'GB',
            'desc' => 'ความจำภายนอก (SD Card)',
            'icon' => 'fa fa-credit-card'
        ),
    );
    public $ass_attr = array(
        'screen_size' => array(
            'caption' => 'นิ้ว',
            'desc' => 'ขนาดหน้าจอ',
            'icon' => 'fa fa-tablet'
        ),
        'weight' => array(
            'caption' => 'กรัม',
            'desc' => 'น้ำหนัก',
            'icon' => 'fa fa-suitcase'
        ),
        'sim' => array(
            'caption' => 'ซิม',
            'desc' => 'จำนวน Sim Card',
            'icon' => 'fa fa-ticket'
        ),'batt' => array(
            'caption' => 'Mah',
            'desc' => 'ความจุแบตเตอรี่',
            'icon' => 'fa fa-flash'
        )
    );

    function get_thump($img) {
        list($fname, $sname) = split('[.]', $img);
        return $fname . '_thumb.' . $sname;
    }

    function get_df($dt) {
        list($yy, $mm, $dd) = split('[-]', $dt);
        return $dd . "-" . $mm . "-" . $yy;
    }

    function swap($mytext_th, $mytext_en, $s_lang) {
        $mytext = $mytext_en;
        if ($s_lang == 'th') {
            $mytext = $mytext_th;
        }
        return $mytext;
    }

    function clt($data) {
        $tmp = str_replace("\n", "<br>", $data);
        $tmp = str_replace(" ", "&nbsp;", $tmp);
        return $tmp;
    }

    function flt($data) {
        $tmp = str_replace("\n", "<w:br/>          ", $data);
        return $tmp;
    }

    function flt2($data) {
        $tmp = str_replace("\n", "<w:br/>", $data);
        return $tmp;
    }

    function readmore($mytext_th, $mytext_en, $s_lang) {
        $chars = 100;
        $mytext = $mytext_en;
        if ($s_lang == 'th') {
            $mytext = $mytext_th;
        }
        $mytext = substr($mytext, 0, $chars);
        $mytext = substr($mytext, 0, strrpos($mytext, ' '));
        return $mytext;
    }

    function money($number) {
        $number = number_format($number, 2, '.', '');
        $txtnum1 = array('ศูนย์', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า', 'สิบ');
        $txtnum2 = array('', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน');
        $number = str_replace(",", "", $number);
        $number = str_replace(" ", "", $number);
        $number = str_replace("บาท", "", $number);
        $number = explode(".", $number);
        if (sizeof($number) > 2) {
            return 'ทศนิยมหลายตัวนะจ๊ะ';
            exit;
        }
        $strlen = strlen($number[0]);
        $convert = '';
        for ($i = 0; $i < $strlen; $i++) {
            $n = substr($number[0], $i, 1);
            if ($n != 0) {
                if ($i == ($strlen - 1) AND $n == 1) {
                    $convert .= 'เอ็ด';
                } elseif ($i == ($strlen - 2) AND $n == 2) {
                    $convert .= 'ยี่';
                } elseif ($i == ($strlen - 2) AND $n == 1) {
                    $convert .= '';
                } else {
                    $convert .= $txtnum1[$n];
                }
                $convert .= $txtnum2[$strlen - $i - 1];
            }
        }
        $convert .= 'บาท';
        if ($number[1] == '0' OR $number[1] == '00' OR $number[1] == '') {
            $convert .= 'ถ้วน';
        } else {
            $strlen = strlen($number[1]);
            for ($i = 0; $i < $strlen; $i++) {
                $n = substr($number[1], $i, 1);
                if ($n != 0) {
                    if ($i == ($strlen - 1) AND $n == 1) {
                        $convert .= 'เอ็ด';
                    } elseif ($i == ($strlen - 2) AND $n == 2) {
                        $convert .= 'ยี่';
                    } elseif ($i == ($strlen - 2) AND $n == 1) {
                        $convert .= '';
                    } else {
                        $convert .= $txtnum1[$n];
                    }
                    $convert .= $txtnum2[$strlen - $i - 1];
                }
            }
            $convert .= 'สตางค์';
        }
        return $convert;
    }

    function m_array() {
        $mm = array(
            "01" => "มกราคม",
            "02" => "กุมภาพันธ์",
            "03" => "มีนาคม",
            "04" => "เมษายน",
            "05" => "พฤษภาคม",
            "06" => "มิถุนายน",
            "07" => "กรกฎาคม",
            "08" => "สิงหาคม",
            "09" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม"
        );
        return $mm;
    }

    function y_array() {
        $yy = array(
            "2009" => "2552",
            "2010" => "2553",
            "2011" => "2554",
            "2012" => "2555",
            "2013" => "2556",
            "2014" => "2557",
            "2015" => "2558",
            "2016" => "2559",
            "2017" => "2560",
        );
        return $yy;
    }

    function thai_date($time) {
        $thai_day_arr = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
        $thai_month_arr = array(
            "0" => "",
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม"
        );
        /*
          $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
          $thai_date_return.= "ที่ ".date("j",$time);
          $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
          $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
          $thai_date_return.= "  ".date("H:i",$time)." น.";
         */
        //$thai_date_return="วัน".$thai_day_arr[date("w",$time)];  
        // $thai_date_return = "วันที่ ".date("j",$time);  
        $thai_date_return = date("j", $time);
        $thai_date_return.=" " . $thai_month_arr[date("n", $time)];
        $thai_date_return.= " " . (date("Y", $time) + 543);
        //$thai_date_return.= "  ".date("H:i",$time)." น.";  

        return $thai_date_return;
    }

    function thai_date_long($time) {
        $thai_day_arr = array("อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์");
        $thai_month_arr = array(
            "0" => "",
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม"
        );
        /*
          $thai_date_return="วัน".$thai_day_arr[date("w",$time)];
          $thai_date_return.= "ที่ ".date("j",$time);
          $thai_date_return.=" เดือน".$thai_month_arr[date("n",$time)];
          $thai_date_return.= " พ.ศ.".(date("Yํ",$time)+543);
          $thai_date_return.= "  ".date("H:i",$time)." น.";
         */
        //$thai_date_return="วัน".$thai_day_arr[date("w",$time)];  
        // $thai_date_return = "วันที่ ".date("j",$time);  
        $thai_date_return = "วันที่ " . date("j", $time);
        $thai_date_return.="    เดือน " . $thai_month_arr[date("n", $time)];
        $thai_date_return.= "    พ.ศ. " . (date("Y", $time) + 543);
        //$thai_date_return.= "  ".date("H:i",$time)." น.";  

        return $thai_date_return;
    }

    function get_mapping_code($mapping_id) {
        $mapping_desc = "";
        if ($mapping_id == "s11")
            $mapping_desc = "7.1.1 หน่วยบริการหรือสถานบริการสาธารณสุข เช่น รพ.สต.";
        if ($mapping_id == "s12")
            $mapping_desc = "7.1.2 หน่วยงานสาธารณสุขอื่นของ อปท. เช่น กองสาธารณสุขของเทศบาล";
        if ($mapping_id == "s13")
            $mapping_desc = "7.1.3 หน่วยงานสาธารณสุขอื่นของรัฐ เช่น สสอ.";
        if ($mapping_id == "s14")
            $mapping_desc = "7.1.4 หน่วยงานอื่นๆ ที่ไม่ใช่หน่วยงานสาธารณสุข เช่น โรงเรียน";
        if ($mapping_id == "s15")
            $mapping_desc = "7.1.5 กลุ่มหรือองค์กรประชาชน";

        if ($mapping_id == "s21")
            $mapping_desc = "7.2.1 สนับสนุนการจัดบริการสาธารณสุขของ หน่วยบริการ/สถานบริการ/หน่วยงานสาธารณสุข [ข้อ 7(1)]";
        if ($mapping_id == "s22")
            $mapping_desc = "7.2.2 สนับสนุนกิจกรรมสร้างเสริมสุขภาพ การป้องกันโรคของกลุ่มหรือองค์กรประชาชน/หน่วยงานอื่น[ข้อ 7(2)]";
        if ($mapping_id == "s23")
            $mapping_desc = "7.2.3 สนับสนุนการจัดกิจกรรมของ ศูนย์เด็กเล็ก/ผู้สูงอายุ/คนพิการ [ข้อ 7(3)]";
        if ($mapping_id == "s24")
            $mapping_desc = "7.2.4 สนับสนุนการบริหารหรือพัฒนากองทุนฯ [ข้อ 7(4)]";
        if ($mapping_id == "s25")
            $mapping_desc = "7.2.5 สนับสนุนกรณีเกิดโรคระบาดหรือภัยพิบัติ [ข้อ 7(5)]";

        if ($mapping_id == "s31")
            $mapping_desc = "7.3.1 กลุ่มหญิงตั้งครรภ์และหญิงหลังคลอด";
        if ($mapping_id == "s32")
            $mapping_desc = "7.3.2 กลุ่มเด็กเล็กและเด็กก่อนวัยเรียน";
        if ($mapping_id == "s33")
            $mapping_desc = "7.3.3 กลุ่มเด็กวัยเรียนและเยาวชน";
        if ($mapping_id == "s34")
            $mapping_desc = "7.3.4 กลุ่มวัยทำงาน";
        if ($mapping_id == "s351")
            $mapping_desc = "7.3.5.1 กลุ่มผู้สูงอายุ";
        if ($mapping_id == "s352")
            $mapping_desc = "7.3.5.2 กลุ่มผู้ป่วยโรคเรื้อรัง";
        if ($mapping_id == "s36")
            $mapping_desc = "7.3.6 กลุ่มคนพิการและทุพพลภาพ";
        if ($mapping_id == "s37")
            $mapping_desc = "7.3.7 กลุ่มประชาชนทั่วไปที่มีภาวะเสี่ยง";

        if ($mapping_id == "s41")
            $mapping_desc = "7.4.1  กลุ่มหญิงตั้งครรภ์และหญิงหลังคลอด";
        if ($mapping_id == "s42")
            $mapping_desc = "7.4.2  กลุ่มเด็กเล็กและเด็กก่อนวัยเรียน";
        if ($mapping_id == "s43")
            $mapping_desc = "7.4.3  กลุ่มเด็กวัยเรียนและเยาวชน";
        if ($mapping_id == "s44")
            $mapping_desc = "7.4.4  กลุ่มวัยทำงาน";
        if ($mapping_id == "s451")
            $mapping_desc = "7.4.5.1 กลุ่มผู้สูงอายุ";
        if ($mapping_id == "s452")
            $mapping_desc = "7.4.5.2 กลุ่มผู้ป่วยโรคเรื้อรัง";
        if ($mapping_id == "s46")
            $mapping_desc = "7.4.6  กลุ่มคนพิการและทุพพลภาพ";
        if ($mapping_id == "s47")
            $mapping_desc = "7.4.7  กลุ่มประชาชนทั่วไปที่มีภาวะเสี่ยง";

        if ($mapping_id == "s411")
            $mapping_desc = "7.4.1.1 การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s412")
            $mapping_desc = "7.4.1.2 การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s413")
            $mapping_desc = "7.4.1.3 การเยี่ยมติดตามดูแลสุขภาพก่อนคลอดและหลังคลอด";
        if ($mapping_id == "s414")
            $mapping_desc = "7.4.1.4 การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s415")
            $mapping_desc = "7.4.1.5 การส่งเสริมการเลี้ยงลูกด้วยนมแม่";
        if ($mapping_id == "s416")
            $mapping_desc = "7.4.1.6 การคัดกรองและดูแลรักษามะเร็งปากมดลูกและมะเร็งเต้านม";
        if ($mapping_id == "s417")
            $mapping_desc = "7.4.1.7 การส่งเสริมสุขภาพช่องปาก";
        if ($mapping_id == "s418")
            $mapping_desc = "7.4.1.8 อื่นๆ (ระบุ)";


        if ($mapping_id == "s421")
            $mapping_desc = "7.4.2.1 การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s422")
            $mapping_desc = "7.4.2.2 การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s423")
            $mapping_desc = "7.4.2.3 การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s424")
            $mapping_desc = "7.4.2.4 การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s425")
            $mapping_desc = "7.4.2.5 การส่งเสริมพัฒนาการตามวัย/กระบวนการเรียนรู้/ความฉลาดทางปัญญาและอารมณ์";
        if ($mapping_id == "s426")
            $mapping_desc = "7.4.2.6 การส่งเสริมการได้รับวัคซีนป้องกันโรคตามวัย";
        if ($mapping_id == "s427")
            $mapping_desc = "7.4.2.7 การส่งเสริมสุขภาพช่องปาก";
        if ($mapping_id == "s428")
            $mapping_desc = "7.4.2.8 อื่นๆ (ระบุ)";

        if ($mapping_id == "s431")
            $mapping_desc = "7.4.3.1 การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s432")
            $mapping_desc = "7.4.3.2 การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s433")
            $mapping_desc = "7.4.3.3 การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s434")
            $mapping_desc = "7.4.3.4 การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s435")
            $mapping_desc = "7.4.3.5 การส่งเสริมพัฒนาการตามวัย/กระบวนการเรียนรู้/ความฉลาดทางปัญญาและอารมณ์";
        if ($mapping_id == "s436")
            $mapping_desc = "7.4.3.6 การส่งเสริมการได้รับวัคซีนป้องกันโรคตามวัย";
        if ($mapping_id == "s437")
            $mapping_desc = "7.4.3.7 การป้องกันและลดปัญหาด้านเพศสัมพันธ์/การตั้งครรภ์ไม่พร้อม";
        if ($mapping_id == "s438")
            $mapping_desc = "7.4.3.8 การป้องกันและลดปัญหาด้านสารเสพติด/ยาสูบ/เครื่องดื่มแอลกอฮอล์";
        if ($mapping_id == "s439")
            $mapping_desc = "7.4.3.9 อื่นๆ(ระบุ)";

        if ($mapping_id == "s441")
            $mapping_desc = "7.4.4.1 การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s442")
            $mapping_desc = "7.4.4.2 การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s443")
            $mapping_desc = "7.4.4.3 การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s444")
            $mapping_desc = "7.4.4.4 การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s445")
            $mapping_desc = "7.4.4.5 การส่งเสริมพฤติกรรมสุขภาพในกลุ่มวัยทำงานและการปรับเปลี่ยนสิ่งแวดล้อมในการทำงาน";
        if ($mapping_id == "s446")
            $mapping_desc = "7.4.4.6 การส่งเสริมการดูแลสุขภาพจิตแก่กลุ่มวัยทำงาน";
        if ($mapping_id == "s447")
            $mapping_desc = "7.4.4.7 การป้องกันและลดปัญหาด้านเพศสัมพันธ์/การตั้งครรภ์ไม่พร้อม";
        if ($mapping_id == "s448")
            $mapping_desc = "7.4.4.8 การป้องกันและลดปัญหาด้านสารเสพติด/ยาสูบ/เครื่องดื่มแอลกอฮอล์";
        if ($mapping_id == "s449")
            $mapping_desc = "7.4.4.9 อื่นๆ (ระบุ)";

        if ($mapping_id == "s4511")
            $mapping_desc = "7.4.5.1.1 การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s4512")
            $mapping_desc = "7.4.5.1.2 การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s4513")
            $mapping_desc = "7.4.5.1.3 การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s4514")
            $mapping_desc = "7.4.5.1.4 การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s4515")
            $mapping_desc = "7.4.5.1.5 การส่งเสริมพัฒนาทักษะทางกายและใจ";
        if ($mapping_id == "s4516")
            $mapping_desc = "7.4.5.1.6 การคัดกรองและดูแลผู้มีภาวะซึมเศร้า";
        if ($mapping_id == "s4517")
            $mapping_desc = "7.4.5.1.7 การคัดกรองและดูแลผู้มีภาวะข้อเข่าเสื่อม";
        if ($mapping_id == "s4518")
            $mapping_desc = "7.4.5.1.8 อื่นๆ (ระบุ)";

        if ($mapping_id == "s4521")
            $mapping_desc = "7.4.5.2.1 การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s4522")
            $mapping_desc = "7.4.5.2.2 การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s4523")
            $mapping_desc = "7.4.5.2.3 การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s4524")
            $mapping_desc = "7.4.5.2.4 การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s4525")
            $mapping_desc = "7.4.5.2.5 การคัดกรองและดูแลผู้ป่วยโรคเบาหวานและความดันโลหิตสูง";
        if ($mapping_id == "s4526")
            $mapping_desc = "7.4.5.2.6 การคัดกรองและดูแลผู้ป่วยโรคหัวใจ";
        if ($mapping_id == "s4527")
            $mapping_desc = "7.4.5.2.7 การคัดกรองและดูแลผู้ป่วยโรคหลอดเลือดสมอง";
        if ($mapping_id == "s4528")
            $mapping_desc = "7.4.5.2.8 การคัดกรองและดูแลผู้ป่วยโรคมะเร็ง";
        if ($mapping_id == "s4529")
            $mapping_desc = "7.4.5.2.9 อื่นๆ (ระบุ)";

        if ($mapping_id == "s461")
            $mapping_desc = "7.4.6.1 การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s462")
            $mapping_desc = "7.4.6.2 การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s463")
            $mapping_desc = "7.4.6.3 การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s464")
            $mapping_desc = "7.4.6.4 การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s465")
            $mapping_desc = "7.4.6.5 การส่งเสริมพัฒนาทักษะทางกายและใจ";
        if ($mapping_id == "s466")
            $mapping_desc = "7.4.6.6 การคัดกรองและดูแลผู้มีภาวะซึมเศร้า";
        if ($mapping_id == "s467")
            $mapping_desc = "7.4.6.7 การคัดกรองและดูแลผู้มีภาวะข้อเข่าเสื่อม";
        if ($mapping_id == "s468")
            $mapping_desc = "7.4.6.8 อื่นๆ (ระบุ)";

        if ($mapping_id == "s471")
            $mapping_desc = "7.4.7.1 การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s472")
            $mapping_desc = "7.4.7.2 การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s473")
            $mapping_desc = "7.4.7.3 การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s474")
            $mapping_desc = "7.4.7.4 การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s475")
            $mapping_desc = "7.4.7.5 การส่งเสริมการปรับเปลี่ยนพฤติกรรมและสิ่งแวดล้อมที่มีผลกระทบต่อสุขภาพ";
        if ($mapping_id == "s476")
            $mapping_desc = "7.4.7.6 อื่นๆ (ระบุ)";

        return $mapping_desc;
    }

    function get_mapping_desc($mapping_id) {
        $mapping_desc = "";
        if ($mapping_id == "s11")
            $mapping_desc = "หน่วยบริการหรือสถานบริการสาธารณสุข เช่น รพ.สต.";
        if ($mapping_id == "s12")
            $mapping_desc = "หน่วยงานสาธารณสุขอื่นของ อปท. เช่น กองสาธารณสุขของเทศบาล";
        if ($mapping_id == "s13")
            $mapping_desc = "หน่วยงานสาธารณสุขอื่นของรัฐ เช่น สสอ.";
        if ($mapping_id == "s14")
            $mapping_desc = "หน่วยงานอื่นๆ ที่ไม่ใช่หน่วยงานสาธารณสุข เช่น โรงเรียน";
        if ($mapping_id == "s15")
            $mapping_desc = "กลุ่มหรือองค์กรประชาชน";

        if ($mapping_id == "s21")
            $mapping_desc = "สนับสนุนการจัดบริการสาธารณสุขของ หน่วยบริการ/สถานบริการ/หน่วยงานสาธารณสุข [ข้อ 7(1)]";
        if ($mapping_id == "s22")
            $mapping_desc = "สนับสนุนกิจกรรมสร้างเสริมสุขภาพ การป้องกันโรคของกลุ่มหรือองค์กรประชาชน/หน่วยงานอื่น[ข้อ 7(2)]";
        if ($mapping_id == "s23")
            $mapping_desc = "สนับสนุนการจัดกิจกรรมของ ศูนย์เด็กเล็ก/ผู้สูงอายุ/คนพิการ [ข้อ 7(3)]";
        if ($mapping_id == "s24")
            $mapping_desc = "สนับสนุนการบริหารหรือพัฒนากองทุนฯ [ข้อ 7(4)]";
        if ($mapping_id == "s25")
            $mapping_desc = "สนับสนุนกรณีเกิดโรคระบาดหรือภัยพิบัติ [ข้อ 7(5)]";

        if ($mapping_id == "s31")
            $mapping_desc = "กลุ่มหญิงตั้งครรภ์และหญิงหลังคลอด";
        if ($mapping_id == "s32")
            $mapping_desc = "กลุ่มเด็กเล็กและเด็กก่อนวัยเรียน";
        if ($mapping_id == "s33")
            $mapping_desc = "กลุ่มเด็กวัยเรียนและเยาวชน";
        if ($mapping_id == "s34")
            $mapping_desc = "กลุ่มวัยทำงาน";
        if ($mapping_id == "s351")
            $mapping_desc = "กลุ่มผู้สูงอายุ";
        if ($mapping_id == "s352")
            $mapping_desc = "กลุ่มผู้ป่วยโรคเรื้อรัง";
        if ($mapping_id == "s36")
            $mapping_desc = "กลุ่มคนพิการและทุพพลภาพ";
        if ($mapping_id == "s37")
            $mapping_desc = "กลุ่มประชาชนทั่วไปที่มีภาวะเสี่ยง";

        if ($mapping_id == "s41")
            $mapping_desc = "กลุ่มหญิงตั้งครรภ์และหญิงหลังคลอด";
        if ($mapping_id == "s42")
            $mapping_desc = "กลุ่มเด็กเล็กและเด็กก่อนวัยเรียน";
        if ($mapping_id == "s43")
            $mapping_desc = "กลุ่มเด็กวัยเรียนและเยาวชน";
        if ($mapping_id == "s44")
            $mapping_desc = "กลุ่มวัยทำงาน";
        if ($mapping_id == "s451")
            $mapping_desc = "กลุ่มผู้สูงอายุ";
        if ($mapping_id == "s452")
            $mapping_desc = "กลุ่มผู้ป่วยโรคเรื้อรัง";
        if ($mapping_id == "s46")
            $mapping_desc = "กลุ่มคนพิการและทุพพลภาพ";
        if ($mapping_id == "s47")
            $mapping_desc = "กลุ่มประชาชนทั่วไปที่มีภาวะเสี่ยง";

        if ($mapping_id == "s411")
            $mapping_desc = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s412")
            $mapping_desc = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s413")
            $mapping_desc = "การเยี่ยมติดตามดูแลสุขภาพก่อนคลอดและหลังคลอด";
        if ($mapping_id == "s414")
            $mapping_desc = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s415")
            $mapping_desc = "การส่งเสริมการเลี้ยงลูกด้วยนมแม่";
        if ($mapping_id == "s416")
            $mapping_desc = "การคัดกรองและดูแลรักษามะเร็งปากมดลูกและมะเร็งเต้านม";
        if ($mapping_id == "s417")
            $mapping_desc = "การส่งเสริมสุขภาพช่องปาก";
        if ($mapping_id == "s418")
            $mapping_desc = "อื่นๆ (ระบุ)";

        if ($mapping_id == "s421")
            $mapping_desc = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s422")
            $mapping_desc = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s423")
            $mapping_desc = "การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s424")
            $mapping_desc = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s425")
            $mapping_desc = "การส่งเสริมพัฒนาการตามวัย/กระบวนการเรียนรู้/ความฉลาดทางปัญญาและอารมณ์";
        if ($mapping_id == "s426")
            $mapping_desc = "การส่งเสริมการได้รับวัคซีนป้องกันโรคตามวัย";
        if ($mapping_id == "s427")
            $mapping_desc = "การส่งเสริมสุขภาพช่องปาก";
        if ($mapping_id == "s428")
            $mapping_desc = "อื่นๆ (ระบุ)";

        if ($mapping_id == "s431")
            $mapping_desc = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s432")
            $mapping_desc = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s433")
            $mapping_desc = "การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s434")
            $mapping_desc = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s435")
            $mapping_desc = "การส่งเสริมพัฒนาการตามวัย/กระบวนการเรียนรู้/ความฉลาดทางปัญญาและอารมณ์";
        if ($mapping_id == "s436")
            $mapping_desc = "การส่งเสริมการได้รับวัคซีนป้องกันโรคตามวัย";
        if ($mapping_id == "s437")
            $mapping_desc = "การป้องกันและลดปัญหาด้านเพศสัมพันธ์/การตั้งครรภ์ไม่พร้อม";
        if ($mapping_id == "s438")
            $mapping_desc = "การป้องกันและลดปัญหาด้านสารเสพติด/ยาสูบ/เครื่องดื่มแอลกอฮอล์";
        if ($mapping_id == "s439")
            $mapping_desc = "อื่นๆ(ระบุ)";

        if ($mapping_id == "s441")
            $mapping_desc = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s442")
            $mapping_desc = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s443")
            $mapping_desc = "การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s444")
            $mapping_desc = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s445")
            $mapping_desc = "การส่งเสริมพฤติกรรมสุขภาพในกลุ่มวัยทำงานและการปรับเปลี่ยนสิ่งแวดล้อมในการทำงาน";
        if ($mapping_id == "s446")
            $mapping_desc = "การส่งเสริมการดูแลสุขภาพจิตแก่กลุ่มวัยทำงาน";
        if ($mapping_id == "s447")
            $mapping_desc = "การป้องกันและลดปัญหาด้านเพศสัมพันธ์/การตั้งครรภ์ไม่พร้อม";
        if ($mapping_id == "s448")
            $mapping_desc = "การป้องกันและลดปัญหาด้านสารเสพติด/ยาสูบ/เครื่องดื่มแอลกอฮอล์";
        if ($mapping_id == "s449")
            $mapping_desc = "อื่นๆ (ระบุ)";

        if ($mapping_id == "s4511")
            $mapping_desc = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s4512")
            $mapping_desc = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s4513")
            $mapping_desc = "การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s4514")
            $mapping_desc = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s4515")
            $mapping_desc = "การส่งเสริมพัฒนาทักษะทางกายและใจ";
        if ($mapping_id == "s4516")
            $mapping_desc = "การคัดกรองและดูแลผู้มีภาวะซึมเศร้า";
        if ($mapping_id == "s4517")
            $mapping_desc = "การคัดกรองและดูแลผู้มีภาวะข้อเข่าเสื่อม";
        if ($mapping_id == "s4518")
            $mapping_desc = "อื่นๆ (ระบุ)";

        if ($mapping_id == "s4521")
            $mapping_desc = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s4522")
            $mapping_desc = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s4523")
            $mapping_desc = "การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s4524")
            $mapping_desc = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s4525")
            $mapping_desc = "การคัดกรองและดูแลผู้ป่วยโรคเบาหวานและความดันโลหิตสูง";
        if ($mapping_id == "s4526")
            $mapping_desc = "การคัดกรองและดูแลผู้ป่วยโรคหัวใจ";
        if ($mapping_id == "s4527")
            $mapping_desc = "การคัดกรองและดูแลผู้ป่วยโรคหลอดเลือดสมอง";
        if ($mapping_id == "s4528")
            $mapping_desc = "การคัดกรองและดูแลผู้ป่วยโรคมะเร็ง";
        if ($mapping_id == "s4529")
            $mapping_desc = "อื่นๆ (ระบุ)";

        if ($mapping_id == "s461")
            $mapping_desc = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s462")
            $mapping_desc = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s463")
            $mapping_desc = "การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s464")
            $mapping_desc = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s465")
            $mapping_desc = "การส่งเสริมพัฒนาทักษะทางกายและใจ";
        if ($mapping_id == "s466")
            $mapping_desc = "การคัดกรองและดูแลผู้มีภาวะซึมเศร้า";
        if ($mapping_id == "s467")
            $mapping_desc = "การคัดกรองและดูแลผู้มีภาวะข้อเข่าเสื่อม";
        if ($mapping_id == "s468")
            $mapping_desc = "อื่นๆ (ระบุ)";

        if ($mapping_id == "s471")
            $mapping_desc = "การสำรวจข้อมูลสุขภาพ การจัดทำทะเบียนและฐานข้อมูลสุขภาพ";
        if ($mapping_id == "s472")
            $mapping_desc = "การตรวจคัดกรอง ประเมินภาวะสุขภาพ และการค้นหาผู้มีภาวะเสี่ยง";
        if ($mapping_id == "s473")
            $mapping_desc = "การเยี่ยมติดตามดูแลสุขภาพ";
        if ($mapping_id == "s474")
            $mapping_desc = "การรณรงค์/ประชาสัมพันธ์/ฝึกอบรม/ให้ความรู้";
        if ($mapping_id == "s475")
            $mapping_desc = "การส่งเสริมการปรับเปลี่ยนพฤติกรรมและสิ่งแวดล้อมที่มีผลกระทบต่อสุขภาพ";
        if ($mapping_id == "s476")
            $mapping_desc = "อื่นๆ (ระบุ)";
        return $mapping_desc;
    }

}
