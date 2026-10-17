# BÖTE - HAYEF Ders Yönetimi

Bu proje, PHP ile sayfa tabanlı bir web uygulamasının nasıl düzenlenebileceğini gösteren küçük bir örnektir. Ders listeleme, ders ekleme ve ders silme işlemleri üzerinden; ortak yapıların (head, menü, yollar) tek bir yerden nasıl yönetildiğini anlatır.

Bu README, projeye yeni başlayan birinin **sıfırdan yeni bir sayfa ekleyebilmesi** için hazırlanmıştır.

---

## 1. Gereksinimler

- **MAMP** (veya PHP 7.4+ yüklü herhangi bir sunucu ortamı)
- Tarayıcı (internet bağlantısı gerekir; Bootstrap ve ikonlar CDN üzerinden yüklenir)

Proje klasörünü MAMP'ın `htdocs` dizinine koyun ve tarayıcıdan açın:

```
http://localhost/mehmetefeozcan/
```

> MAMP'ın port ayarına göre adres `http://localhost:8888/mehmetefeozcan/` şeklinde olabilir.

---

## 2. Proje Yapısı

```
mehmetefeozcan/
├── index.php                      # Ana sayfa
├── config/
│   ├── paths_config.php           # Sabit yollar (BASE_URL, COMPONENTS_PATH vb.)
│   ├── head_config.php            # <head> içeriği: meta, başlık, CSS
│   └── script_config.php          # Sayfa sonunda yüklenen JS dosyaları
├── components/
│   ├── layout/
│   │   └── header.php             # Üst menü (navbar)
│   └── modal/
│       └── lesson_info_modal.php  # Ders detay penceresi
├── lessons/
│   ├── index.php                  # Ders listesi
│   ├── create.php                 # Yeni ders formu
│   └── store.php                  # Form verisini kaydeden / silen dosya
└── public/
    ├── css/main.css               # Kendi stillerimiz
    └── img/hayef_logo.png         # Görseller
```

**Kural:** Tarayıcının doğrudan açtığı dosyalar sayfadır (`index.php`, `lessons/*.php`). `config/` ve `components/` içindeki dosyalar ise sayfalara **parça olarak eklenir**; tek başına açılmaz.

---

## 3. Temel Mantık: Her Sayfa Aynı İskeleti Kullanır

Her sayfa üç adımdan oluşur:

1. **Sayfa değişkenlerini tanımla** (`$pageTitle`, `$pagePath`) ve gerekiyorsa veriyi hazırla.
2. **HTML iskeletini kur**; `<head>` içini `head_config.php`'den al.
3. **Ortak parçaları ekle** (menü, modal) ve en sonda JS dosyalarını yükle.

Örnek olarak `index.php`'ye bakalım:

```php
<?php
$pageTitle = "Hoşgeldiniz";   // Tarayıcı sekmesindeki başlığın bir parçası
$pagePath = "/index.php";     // Menüde hangi linkin "aktif" görüneceğini belirler
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include_once "./config/head_config.php" ?>
</head>

<body>
    <?php include_once COMPONENTS_PATH . "/layout/header.php" ?>

    <div class="container"></div>
</body>
<?php include_once "./config/script_config.php" ?>

</html>
```

---

## 4. Ortak Yapıları Anlamak

### 4.1 Yollar: `config/paths_config.php`

Proje içindeki tüm yollar tek dosyada tanımlıdır. Bir yolu değiştirmek gerektiğinde yalnızca burayı düzenlersiniz.

```php
define("ROOT_PATH", dirname(__DIR__));                        // Proje klasörünün fiziksel yolu
define("BASE_URL", "/mehmetefeozcan");                        // Tarayıcıdaki kök adres
define("PUBLIC_CSS_URL", PUBLIC_FOLDER_URL . "/css");         // CSS klasörü
define("PUBLIC_IMAGES_URL", PUBLIC_FOLDER_URL . "/img");      // Görsel klasörü
define("COMPONENTS_PATH", ROOT_PATH . "/components");         // Bileşen klasörünün fiziksel yolu
```

Ayrım önemlidir:

- `*_URL` sabitleri **tarayıcının** kullanacağı adreslerdir (`href`, `src`).
- `*_PATH` sabitleri **sunucunun** kullanacağı dosya yollarıdır (`include` için).

### 4.2 Head: `config/head_config.php`

Her sayfanın `<head>` kısmında tekrar yazılması gereken meta etiketleri, başlık ve CSS dosyaları burada toplanır.

```php
<title><?= htmlspecialchars(!empty($pageTitle) ? $pageTitle . " | BÖTE - HAYEF" : "BÖTE - HAYEF") ?></title>
```

Bu satır, sayfa `$pageTitle` tanımladıysa başlığı `Sayfa Adı | BÖTE - HAYEF`, tanımlamadıysa `BÖTE - HAYEF` yapar. Bootstrap ve `main.css` de burada yüklenir; yeni bir sayfada bunları tekrar eklemeniz gerekmez.

### 4.3 Script: `config/script_config.php`

Bootstrap'in JavaScript dosyasını yükler (modal, navbar açma/kapama gibi davranışlar için gerekir). Sayfa sonunda çağrılır.

### 4.4 Menü: `components/layout/header.php`

Menü, bir dizi üzerinden oluşturulur:

```php
$menuList = [
    ["id" => 1, "name" => "Ana Sayfa", "route" => "/index.php"],
    ["id" => 2, "name" => "Dersler", "route" => "/lessons/index.php"],
];
```

Her sayfa `$pagePath` değişkenini tanımlar. Menüdeki `route` ile `$pagePath` aynıysa link `active` sınıfını alır ve vurgulanır.

Bu yüzden `lessons/create.php` de `$pagePath = "/lessons/index.php";` tanımlar: "Yeni Ders Oluştur" sayfasındayken de "Dersler" menüsü vurgulu kalır.

---

## 5. Adım Adım: Yeni Bir Sayfa Eklemek

Örnek olarak `lessons/detail.php` adında bir sayfa ekleyelim.

**Adım 1 — Dosyayı oluşturun ve değişkenleri tanımlayın**

```php
<?php
$pageTitle = "Ders Detayı";
$pagePath = "/lessons/index.php";   // Menüde "Dersler" aktif görünsün
?>
```

**Adım 2 — HTML iskeletini yazın**

```php
<!DOCTYPE html>
<html lang="tr">

<head>
    <?php include_once __DIR__ . "/../config/head_config.php" ?>
</head>

<body>
    <?php include_once COMPONENTS_PATH . "/layout/header.php" ?>

    <div class="container p-4 bg-light mt-4 rounded-3">
        <h3><?= $pageTitle ?></h3>
        <p>İçerik buraya gelecek.</p>
    </div>

    <?php include_once __DIR__ . "/../config/script_config.php" ?>
</body>

</html>
```

**Adım 3 — Menüye ekleyin (isteğe bağlı)**

Sayfanın menüde görünmesini istiyorsanız `header.php` içindeki diziye bir satır ekleyin:

```php
["id" => 3, "name" => "Ders Detayı", "route" => "/lessons/detail.php"],
```

**Adım 4 — Tarayıcıda test edin**

```
http://localhost/mehmetefeozcan/lessons/detail.php
```

---

## 6. Veri Akışı: Form → Kayıt → Listeleme

Projedeki en önemli akış, yeni ders eklemektir. Bu akışı anlamak, benzer bir özelliği kendiniz yazmanıza yardımcı olur.

```
create.php (form)  ──POST──▶  store.php (kaydet)  ──redirect──▶  index.php (listele)
```

### 6.1 Formu hazırlamak — `lessons/create.php`

Form verileri `name` attribute'u ile gönderilir. `store.php` bu isimleri kullanır, bu yüzden **ad değiştirirseniz iki dosyada da değiştirmelisiniz**.

```html
<form action="store.php" method="POST">
    <input type="text" name="lessonCode" required>
    ...
</form>
```

Açılır listelerdeki seçenekler PHP dizilerinden üretilir:

```php
$dayList = [
    ["id" => 1, "name" => "Pazartesi"],
    ...
];
```

```php
<?php foreach ($dayList as $day): ?>
    <option value="<?= $day['name'] ?>"><?= $day['name'] ?></option>
<?php endforeach ?>
```

Seçenekleri değiştirmek için yalnızca diziyi düzenlemeniz yeterlidir.

### 6.2 Kaydetmek ve silmek — `lessons/store.php`

Bu dosya iki iş yapar:

| Gelen istek | Ne yapar |
|---|---|
| `POST` (action yok) | Form verisini alır, yeni ders olarak sessiona ekler |
| `POST` + `action=delete` | Verilen `id`'li dersi siler |

Her iki durumda da sonunda `header("Location: index.php")` ile listeye yönlendirilir.

> **Önemli:** `header()` ile yönlendirme yapılacaksa, sayfadan **hiç HTML çıktısı** verilmemiş olmalıdır. Bu yüzden `store.php` içinde yönlendirme kodu, herhangi bir HTML'den önce çalışır.

Yeni ders eklerken `id` otomatik üretilir:

```php
$ids = array_column($_SESSION['lessons'], 'id');
'id' => $ids ? max($ids) + 1 : 1,
```

Form değerleri `trim()` ile temizlenir ve `credit` tam sayıya çevrilir.

### 6.3 Listelemek — `lessons/index.php`

`store.php` dosyasını `require_once` ile çağırır ve `getLessons()` fonksiyonuyla dersleri alır:

```php
require_once __DIR__ . "/store.php";
$tableItems = getLessons();
```

Tablo satırları bu diziden `foreach` ile üretilir. Kullanıcıdan gelen her değer ekrana basılmadan önce `htmlspecialchars()` ile temizlenir. Bu, XSS (kötü niyetli kod enjeksiyonu) riskine karşı temel korumadır.

### 6.4 Detay penceresi — Bootstrap Modal

"Detaylar" butonu, dersin bilgilerini `data-bs-*` attribute'larıyla taşır:

```html
<button data-bs-toggle="modal" data-bs-target="#lessonInfoModal"
    data-bs-title="..." data-bs-staff="..." data-bs-detail="...">
```

Sayfanın altındaki küçük JavaScript bloğu, modal açılırken bu değerleri okuyup pencerenin içine yazar. Modalın HTML'i `components/modal/lesson_info_modal.php` dosyasındadır.

### 6.5 Silmek

Silme işlemi bir `<form>` içindedir. Gizli `input` ile `id` ve `action` gönderilir:

```html
<input type="hidden" name="action" value="delete">
<input type="hidden" name="id" value="<?= $item['id'] ?>">
```

`onsubmit="return confirm(...)"` kullanıcıdan onay ister; onaylamazsa form gönderilmez.

---

## 7. Veriyi Nerede Tutuyoruz?

Bu projede veritabanı **yoktur**. Veriler `$_SESSION` içinde tutulur:

- İlk açılışta `store.php` içinde tanımlı 3 örnek ders sessiona yazılır.
- Eklenen ve silinen dersler yalnızca o tarayıcı oturumu boyunca geçerlidir.
- Tarayıcıyı kapatıp açtığınızda veya oturum sona erdiğinde değişiklikler sıfırlanır.

Bu, eğitim amaçlı bir yaklaşımdır. Gerçek bir uygulamada bu kısım bir veritabanı (MySQL vb.) ile değiştirilir; sayfa dosyalarının büyük kısmı aynı kalabilir.

---

## 8. Dikkat Edilmesi Gerekenler

- **Yol (`include`) kullanımı:** Mevcut sayfalarda `"../config/..."` ve `"./config/..."` gibi göreli yollar karışık kullanılıyor. Yeni dosyalarda `__DIR__ . "/../config/..."` kullanmanızı öneririz; bu yol, dosya nereden çağrılırsa çağrılsın doğru çalışır.
- **Script yerleşimi:** `index.php` içinde `script_config.php`, `</html>` etiketinden **sonra** çağrılıyor. Yeni sayfalarda olduğu gibi `</body>`'den hemen önce çağırmanızı öneririz.
- **Session başlatma:** `store.php` içinde `session_start()` vardır. Session kullanan her yeni dosyanın, herhangi bir çıktıdan önce bu kontrolü yapması gerekir.
- **Giriş yap butonu:** Menüdeki "Giriş yap" butonu şu an yalnızca görsel amaçlıdır; kimlik doğrulama özelliği henüz yoktur.
- **Yetkilendirme yok:** Giriş sistemi henüz yoktur. Sayfayı açabilen herkes ders ekleyip silebilir. Gerçek bir kullanım için oturum kontrolü ve CSRF koruması eklenmelidir.

---

## 9. Sık Karşılaşılan Hatalar

| Belirti | Olası neden | Çözüm |
|---|---|---|
| Sayfa boş ya da stilsiz görünüyor | CSS yolu yanlış | `PUBLIC_CSS_URL` ve `BASE_URL` değerlerini kontrol edin |
| `Failed to open stream` hatası | `include` yolu yanlış | `__DIR__` ile yolu yeniden yazın |
| `Cannot modify header information` | `header()` çağrısından önce çıktı var | Dosyanın başında boşluk ya da HTML olmadığını kontrol edin |
| Menüde link vurgulanmıyor | `$pagePath` ile `route` eşleşmiyor | İkisinin de başında `/` olduğundan ve birebir aynı olduğundan emin olun |
| Form verisi kaydedilmiyor | `name` attribute'u `store.php` ile uyuşmuyor | Form alanlarının `name` değerlerini `store.php` içindeki anahtarlarla karşılaştırın |
| Modal içeriği boş açılıyor | `data-bs-*` değeri eksik ya da ID eşleşmiyor | `data-bs-target` ile modalın `id`'sini karşılaştırın |

---

## 10. Hızlı Özet

1. Sabit yollar → `config/paths_config.php`
2. `<head>` ayarları → `config/head_config.php`
3. Menü → `components/layout/header.php`
4. Her sayfa `$pageTitle` ve `$pagePath` tanımlar
5. Form → `store.php` → `index.php` akışıyla veri işlenir
6. Veriler şimdilik `$_SESSION` içinde tutulur
