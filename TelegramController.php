<?php

// Developer : Azozz ALFiras
// github : https://github.com/AzozzALFiras

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{

private $token = '7165126648:AAFztBxTjC9MRUz9j7WaDVrsprt5X5cDAjg';
private $soura = [
'الفاتحة' => '001',
'البقرة' => '002',
'آل عمران' => '003',
'النساء' => '004',
'المائدة' => '005',
'الأنعام' => '006',
'الأعراف' => '007',
'الأنفال' => '008',
'التوبة' => '009',
'يونس' => '010',
'هود' => '011',
'يوسف' => '012',
'الرعد' => '013',
'إبراهيم' => '014',
'الحجر' => '015',
'النحل' => '016',
'الإسراء' => '017',
'الكهف' => '018',
'مريم' => '019',
'طه' => '020',
'الأنبياء' => '021',
'الحج' => '022',
'المؤمنون' => '023',
'النور' => '024',
'الفرقان' => '025',
'الشعراء' => '026',
'النّمل' => '027',
'القصص' => '028',
'العنكبوت' => '029',
'الرّوم' => '030',
'لقمان' => '031',
'السجدة' => '032',
'الأحزاب' => '033',
'سبأ' => '034',
'فاطر' => '035',
'يس' => '036',
'الصافات' => '037',
'ص' => '038',
'الزمر' => '039',
'غافر' => '040',
'فصّلت' => '041',
'الشورى' => '042',
'الزخرف' => '043',
'الدخان' => '044',
'الجاثية' => '045',
'الاحقاف' => '046',
'محمد' => '047',
'الفتح' => '048',
'الحجرات' => '049',
'ق' => '050',
'الذاريات' => '051',
'الطور' => '052',
'النجم' => '053',
'القمر' => '054',
'الرحمن' => '055',
'الواقعة' => '056',
'الحديد' => '057',
'المجادلة' => '058',
'الحشر' => '059',
'الممتحنة' => '060',
'الصف' => '061',
'الجمعة' => '062',
'المنافقون' => '063',
'التغابن' => '064',
'الطلاق' => '065',
'التحريم' => '066',
'الملك' => '067',
'القلم' => '068',
'الحاقة' => '069',
'المعارج' => '070',
'نوح' => '071',
'الجن' => '072',
'المزّمّل' => '073',
'المدّثر' => '074',
'القيامة' => '075',
'الإنسان' => '076',
'المرسلات' => '077',
'النبأ' => '078',
'النازعات' => '079',
'عبس' => '080',
'التكوير' => '081',
'الإنفطار' => '082',
'المطفّفين' => '083',
'الإنشقاق' => '084',
'البروج' => '085',
'الطارق' => '086',
'الأعلى' => '087',
'الغاشية' => '088',
'الفجر' => '089',
'البلد' => '090',
'الشمس' => '091',
'الليل' => '092',
'الضحى' => '093',
'الشرح' => '094',
'التين' => '095',
'العلق' => '096',
'القدر' => '097',
'البينة' => '098',
'الزلزلة' => '099',
'العاديات' => '100',
'القارعة' => '101',
'التكاثر' => '102',
'العصر' => '103',
'الهمزة' => '104',
'الفيل' => '105',
'قريش' => '106',
'الماعون' => '107',
'الكوثر' => '108',
'الكافرون' => '109',
'النصر' => '110',
'المسد' => '111',
'الإخلاص' => '112',
'الفلق' => '113',
'النّاس' => '114',
];

private $shaikh = [
[],
['id'=> 4, 'name' => 'عبد الباسط عبد الصمد', 'href' => 'http://server7.mp3quran.net/basit/'], //4
['id'=> 5,'name' => 'فارس عباد', 'href' => 'http://server8.mp3quran.net/frs_a/'], //5
['id'=> 6,'name' => 'ناصر القطامي', 'href' => 'http://server6.mp3quran.net/qtm/'], //6
['id'=> 7,'name' => 'صلاح بو خاطر', 'href' => 'http://server8.mp3quran.net/bu_khtr/'], //7
['id'=> 8,'name' => 'أحمد بن علي العجمي', 'href' => 'http://server10.mp3quran.net/ajm/128/'], //8
['id'=> 9,'name' => 'أبو بكر الشاطري', 'href' => 'http://server11.mp3quran.net/shatri/'], //9
['id'=> 10,'name' => 'سعود الشريم', 'href' => 'http://server7.mp3quran.net/shur/'], //10
['id'=> 11,'name' => 'عبد الرحمن السديس', 'href' => 'http://server11.mp3quran.net/sds/'], //11
['id'=> 12,'name' => 'مشاري العفاسي', 'href' => 'http://server8.mp3quran.net/afs/'], //12
['id'=> 13,'name' => 'محمود علي البنا', 'href' => 'http://server8.mp3quran.net/bna/'], //13
['id'=> 14,'name' => 'محمود خليل الحصري', 'href' => 'http://server13.mp3quran.net/husr/'], //14
['id'=> 15,'name' => 'محمد صديق المنشاوي', 'href' => 'http://server10.mp3quran.net/minsh/'], //15
['id'=> 16,'name' => 'محمد جبريل', 'href' => 'http://server8.mp3quran.net/jbrl/'], //16
['id'=> 17,'name' => 'ماهر المعيقلي', 'href' => 'http://server12.mp3quran.net/maher_m/'], //17
['id'=> 18,'name' => 'محمد البراك', 'href' => 'http://server13.mp3quran.net/braak/'], //18
['id'=> 19,'name' => 'ياسر القرشي', 'href' => 'http://server9.mp3quran.net/qurashi/'], //19
['id'=> 20,'name' => 'ياسر الدوسري', 'href' => 'http://server11.mp3quran.net/yasser/'], //20
['id'=> 21,'name' => 'الشيخ ادرس ابكر', 'href' => 'https://server6.mp3quran.net/abkr/'], //21
['id'=> 22,'name' => 'عبدالله الخلف', 'href' => 'https://server14.mp3quran.net/khalf/'], //22
['id'=> 23,'name' => 'أحمد الحواشي', 'href' => 'https://server11.mp3quran.net/hawashi/'], //23
['id'=> 24,'name' => 'أحمد الطرابلسي', 'href' => 'https://server10.mp3quran.net/trabulsi/'], //24
['id'=> 25,'name' => 'ابراهيم الدوسري', 'href' => 'https://server10.mp3quran.net/ibrahim_dosri_hafs/'], //25
['id'=> 26,'name' => 'الزين محمد أحمد', 'href' => 'https://server9.mp3quran.net/alzain/'], //26
['id'=> 27,'name' => 'حسين آل الشيخ', 'href' => 'https://server11.mp3quran.net/alshaik/'], //27
['id'=> 28,'name' => 'جمال شاكر عبدالله', 'href' => 'https://server6.mp3quran.net/jamal/'], //28
['id'=> 29,'name' => 'علي أبو هاشم', 'href' => 'https://server9.mp3quran.net/abo_hashim/'], //29
['id'=> 30,'name' => 'عبدالمحسن العبيكان', 'href' => 'https://server12.mp3quran.net/obk/'], //30        
];

public function getHrefURL($id)
{

$index = array_search($id, array_column($this->shaikh, 'id'));

if ($index !== false) {
return $this->shaikh[$index]['href'];
}

return "Href not found for id: $id";
}

public function webhook(Request $request)
{

// Get the incoming message text
$messageText = $request->input('message.text');
$chatId = $request->input('message.chat.id');

// Log the incoming request
Log::info($messageText);
Log::info($chatId);
Log::info($request);

// Get the chat ID from the incoming message
$chatId = $request->input('message.chat.id');

// Check if the message is the /start command
if ($messageText && $messageText === '/start') {
// Respond with a welcome message and the menu
$responseText = "مرحبًا بك في بوت الشيخ! يرجى اختيار الشيخ من القائمة:";
$encodedKeyboard = $this->generateKeyboard();
$this->sendMessage($chatId, $responseText, $encodedKeyboard);
} else {
// Check if the message matches any of the shaikh names
$selectedShaikh = null;
foreach ($this->shaikh as $index => $item) {
if ($index > 0 && $item['name'] === $messageText) {
$selectedShaikh = $item;
break;
}
}

if ($selectedShaikh) {
// Save the selected Shaikh's name to a file named after the chat ID
$fileName = public_path("{$chatId}.txt");
file_put_contents($fileName, $selectedShaikh['id']);

// Respond with the selected Sheikh's available Surahs
$responseText = "لقد اخترت الشيخ: {$selectedShaikh['name']}. يرجى اختيار سورة:";
$encodedKeyboard = $this->generateSurahKeyboard();
$this->sendMessage($chatId, $responseText, $encodedKeyboard);
} else {
// Check if the message matches any of the surah names
$selectedSoura = $this->soura[$messageText] ?? null;

if ($selectedSoura) {
$fileName = public_path("{$chatId}.txt");
$content = file_get_contents($fileName);
$getHrefURL = $this->getHrefURL($content);
$fullLink = "$getHrefURL$selectedSoura.mp3";
// Respond with the selected sura
$this->sendFileFromURL($chatId, $fullLink, "Here is the file you requested");
// $this->sendMessage($chatId, $fullLink);
} else {
// Respond with the chat ID
$this->sendMessage($chatId, 'رقم الدردشة الخاص بك هو: ' . $chatId);
}
}
}

return response()->json(['status' => 'ok']);
}

// Send a file from a URL to the user
private function sendFileFromURL($chatId, $fileURL, $caption = null)
{
    
    $url   = "https://api.telegram.org/bot$this->token/sendDocument";

    $params = [
        'chat_id' => $chatId,
        'document' => $fileURL,
    ];

    // Add caption to params if provided
    if ($caption) {
        $params['caption'] = $caption;
    }

    $client = new \GuzzleHttp\Client();
    $client->request('POST', $url, [
        'json' => $params,
    ]);
}


private function sendMessage($chatId, $text, $keyboard = null)
{
$url   = "https://api.telegram.org/bot$this->token/sendMessage";

$params = [
'chat_id' => $chatId,
'text' => $text,
];

// Add keyboard to params if provided
if ($keyboard) {
$params['reply_markup'] = $keyboard;
}

$client = new \GuzzleHttp\Client();
$client->request('POST', $url, [
'json' => $params,
]);
}


private function generateSurahKeyboard()
{
$keyboard = [
'keyboard' => [],
'resize_keyboard' => true,
'one_time_keyboard' => true
];

foreach ($this->soura as $souraName => $souraNumber) {
$keyboard['keyboard'][] = [$souraName];
}

return json_encode($keyboard);
}

private function generateKeyboard()
{
$keyboard = [
'keyboard' => [],
'resize_keyboard' => true,
'one_time_keyboard' => true
];

foreach ($this->shaikh as $index => $item) {
if ($index > 0) {
$keyboard['keyboard'][] = [$item['name']];
}
}

return json_encode($keyboard);
}
}