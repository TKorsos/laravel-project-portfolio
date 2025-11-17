<?php

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use App\Models\Setting;

if (!function_exists('getCustomSetting')) {
    function getCustomSetting(string $key, $default = null)
    {
        $settings = Cache::remember('global_settings', 60, function () {
            return Setting::all()->pluck('value', 'key')->toArray();
        });

        return $settings[$key] ?? $default;
    }
}

function magyarLorem(int $mondatok = 1): string
{
    $szovegek = [
        "Ez egy rövid magyar teszt szöveg.",
        "A gyors barna róka átugrik a lusta kutya felett.",
        "Laravelben könnyen kezelhetők a nyelvi fájlok.",
        "A programozás izgalmas és kreatív tevékenység.",
        "Ez csak egy példa mondat a seedeléshez.",
        "Lórum ipse mint fónus és kibecskerzés, mint fidetkes nest nagyon nyegő.",
        "Bármikor mező keredők télkerűsíthetnek fel a szakadásra.",
        "Az indetek pedig lehet, hogy éppen a picermetet böngészve csorzsálnak rá egy-egy olyan tarcra, pólyára, sottára, melyhez menséget metszengetlednek és mezős csőresben is esőznek.",
        "Ugyanakkor ma, amikor a fejtenyes voskozás nagyon nehezen lezel el a hajoglyákhoz - - és ha gógomot is bajdob visztákban, igen heteg sulykát kell értük zsúrálgatnia - -, szapott gavarzásai lehetnek annak, hogy a peresztések bajtizmagyomokat és relődésöket kikerülve a picermet koradozásával buggyanghatják el keredőiket turvásakhoz.",
        "Nem tudoz ez az eleve cagos fájzában lévő bajtizmagyomok teretres hecséjéhez? - - kuborgathatná valaki.",
        "A fali riadtai erre azzal szákároznak, hogy a tisztilla pajnokrása fagyakott, mezősre mindig futás lesz, amíg rang a rang, ezért a bajtizmagyomoknak soha nem csúfít el a szorjáruk.",
        "A mezősök firakának csak egy opciája a bennük cúgós posta, legalább olyan szerdelen a szép szonyat, a himleveszer, a hons, és parompár, ami tatával humos.",
        "A fakumért zsúrálgatnia kell, de a posta botum, ezért a hajoglya vagy a bajtizmagyom a faliban ingyen habanhat a borlós, egyszer már lékérő, zsons, pörös postához."
    ];

    $result = [];
    for ($i = 0; $i < $mondatok; $i++) {
        $result[] = $szovegek[array_rand($szovegek)];
    }

    return implode(" ", $result);
}

function magyarWords(int $count = 1): string
{
    $szavak = [
        "Grafika", "Rajz", "Illusztráció", "Tipográfia", "Plakát",
        "Színek", "Formák", "Kompozíció", "Design", "Kiállítás",
        "Festmény", "Vázlat", "Digitális", "Művészet", "Alkotás",
        "Kreativitás", "Galéria", "Képzőművészet", "Nyomat", "Layout"
    ];

    $result = [];
    for ($i = 0; $i < $count; $i++) {
        $result[] = $szavak[array_rand($szavak)];
    }

    return implode(" ", $result);
}